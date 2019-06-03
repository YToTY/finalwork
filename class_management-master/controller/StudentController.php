<?php

include('model/Course.php');
include('model/Assignment.php');
include('model/Comment.php');
include('model/Emails.php');

class StudentController {
	
	public function home() {
		$user = $_SESSION['user'];
		$courseModel = new Course();

		$my_courses = $courseModel->findStudentCourse($user['id']);
		var_export($my_courses);
		include('view/student/home.php');

	}

	public function Emails() {
		$rowNum = 1;
		$user = $_SESSION['user'];
		$emailModel = new Emails();
		$emails = $emailModel->getallemails($user['id']);
		include('view/student/Emails.php');
	}

	public function checkemail() {
		$email_id = $_GET['email_id'];
		$emailModel = new Emails();
		$email = $emailModel->gettheemail($email_id);
		include('view/student/checkemail.php');
	}

	public function create_email() {
		include('view/student/create_email.php');
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
		header("Location: /index.php?r=student/Emails");
	}

	public function delete_email(){
		$email_id = $_GET['email_id'];
		$emailModel = new Emails();
		$emailModel->deleteemailbyid($email_id);
		header("Location: /index.php?r=student/Emails");
	}

	public function my_assignments() {

		$user = $_SESSION['user'];
		$assignmentModel = new Assignment();

		$my_assignments = $assignmentModel->findStudentAssignment($user['id']);

		include('view/student/my_assignments.php');

	}

	public function download_template() {
		$assignmentId = $_REQUEST['id'];

		$assignmentModel = new Assignment();
		$my_assignment = $assignmentModel->getAssignment($assignmentId);

		header("Content-Type:application/octet-stream");
		header("Content-Disposition:attachment;filename=".$my_assignment['attachment']);
		$templateContent = file_get_contents("../storage/uploads/template/" . $my_assignment['attachment']);
		echo $templateContent;
	}

	public function comment_home() {
		$rowNum = 1;
		$user = $_SESSION['user'];
		$commentModel = new Comment();
		$comments = $commentModel->findcomment($user['id']);

		include('view/student/comment_home.php');
	}

	public function add_comment() {
		$commentModel = new Comment();
		$role = 'teacher';
		$teachers = $commentModel->getAllteachers($role);
		include('view/student/add_comment.php');
	}

	public function do_add_comment() {
		$teacher_name = $_POST['teacher'];
		$content = $_POST['content'];
		$user = $_SESSION['user'];
		$commentModel = new Comment();
		$student_name = $commentModel->getmyname($user['id']);
		$teacher = $commentModel->findtheteacher($teacher_name);
		$commentModel->addcommentin($user['id'],$student_name,$teacher['id'],$teacher['name'],$content);

		header("Location: /index.php?r=student/comment_home");
	}

	public function update_comment() {
		$comment_id = $_GET['comment_id'];
		$commentModel = new Comment();
		$comment = $commentModel->findthecomment($comment_id);
		include('view/student/update_comment.php');
	}

	public function do_update_comment() {
		$comment_id = $_POST['comment_id'];
		$content = $_POST['content'];
		$commentModel = new Comment();
		$commentModel -> updatecomment($comment_id,$content);
		header("Location: /index.php?r=student/comment_home");
	}
}
