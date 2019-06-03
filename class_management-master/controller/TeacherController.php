<?php

include('libs/PHPExcel/PHPExcel/IOFactory.php');
include('model/Course.php');
include('model/User.php');
include('model/CourseStudent.php');
include('model/Comment.php');
include('model/Emails.php');


class TeacherController {

	public function home() {

		$user = $_SESSION['user'];
		$courseModel = new Course();
		$courses = $courseModel->find($user['id']);

		include('view/teacher/home.php');

	}

	public function studentManager() {
		$rowNum = 1;
		$studentModel = new CourseStudent();
		$students = $studentModel->getStudents();
		include('view/teacher/studentManager.php');
	}

	public function commentManager() {
		$rowNum = 1;
		$user = $_SESSION['user'];
		$commentModel = new Comment();
		$comments = $commentModel->findteachercomment($user['id']);
		include('view/teacher/commentManager.php');
	}


	public function Emails() {
		$rowNum = 1;
		$user = $_SESSION['user'];
		$emailModel = new Emails();
		$emails = $emailModel->getallemails($user['id']);
		include('view/teacher/Emails.php');
	}

	public function checkemail() {
		$email_id = $_GET['email_id'];
		$emailModel = new Emails();
		$email = $emailModel->gettheemail($email_id);
		include('view/teacher/checkemail.php');
	}

	public function create_email() {
		include('view/teacher/create_email.php');
	}

	public function send_email(){
		$user = $_SESSION['user'];
		$flyto_id = $_POST['flyto_id'];
		$content = $_POST['content'];
		$commentModel = new Comment();
		$flyto_name = $commentModel->getmyname($flyto_id);
		$time = date('Y-m-d H:i:s');
		$emailModel = new Emails();
		$emailModel->sendemail($user['id'],$user['name'],$flyto_id,$flyto_name,$content,$time);
		header("Location: /index.php?r=teacher/Emails");
	}

	public function delete_email(){
		$email_id = $_GET['email_id'];
		$emailModel = new Emails();
		$emailModel->deleteemailbyid($email_id);
		header("Location: /index.php?r=teacher/Emails");
	}

	public function add_course() {
		include('view/teacher/add_course.php');
	}

	public function Updateinfo(){
		$studentId = $_GET['student_id'];
		$studentModel = new CourseStudent();
		$TheStudent = $studentModel->getTheStudent($studentId);
		$UserStudent = $studentModel->getUserStudent($studentId);
		include('view/teacher/Updateinfo.php');
	}

	public function do_update_student(){
		$id = $_POST['student_id'];
		$name = $_POST['name'];
		$class = $_POST['class'];
		$password = $_POST['password'];
		$permit = $_POST['permit'];
		$role = $_POST['role'];
		if ($permit == '不可登陆') {
			$password = '000000';
		}else{
			$password = "$id";
		}

		// var_dump($id,$name,$class);
		// exit();
		$studentModel = new CourseStudent();
		$studentModel->UpdateStudent($id,$name,$class,$password,$permit,$role);
		header("Location: /index.php?r=teacher/studentManager");
	}

	public function deletecomment() {
		$comment_id = $_GET['comment_id'];
		$commentModel = new Comment();
		$commentModel -> deletethecomment($comment_id);
		header("Location: /index.php?r=teacher/commentManager");
	}


	public function do_add_course() {
		$tmp_name = $_FILES['nameBook']['tmp_name'];
		$filename = $_FILES['nameBook']['name'];
		$clean_filename = iconv("UTF-8","gbk","../storage/uploads/name_book/" . $filename);
		move_uploaded_file($tmp_name,  $clean_filename);

		$objPHPExcel = PHPExcel_IOFactory::load($clean_filename);

		$workSheet = $objPHPExcel->getActiveSheet();

		$courseName = $workSheet->getCell('E3')->getCalculatedValue();
		$courseNo = $workSheet->getCell('A3')->getCalculatedValue();

		$courseModel = new Course();
		if (!$courseModel->exists($courseNo)) {
			$user = $_SESSION['user'];
			$courseId = $courseModel->save($courseNo, $courseName, $user['id']);
			$rowNum = 6;
			$userModel = new User();
			$courseStudentModel = new CourseStudent();
			while (true) {
				$studentNo = $workSheet->getCell('B' . $rowNum)->getCalculatedValue();
				if (!$studentNo) {
					break;
				}
				$studentName = $workSheet->getCell('C' . $rowNum)->getCalculatedValue();
				$studentClass = $workSheet->getCell('E' . $rowNum)->getCalculatedValue();
				if (!$userModel->exists($studentNo)) {
					$userModel->save($studentNo, $studentName, $studentNo, "student", $studentClass);
				}
				$courseStudentModel->save($studentNo, $studentName, $studentClass, $courseId);
				$rowNum = $rowNum + 1;
			}
		}
		header("Location: /index.php?r=teacher/home");
	}

}