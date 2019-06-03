<?php

include_once('model/Model.php');

class CourseStudent extends Model {

	public function save($studentNo, $studentName, $studentClass,$courseId) {
		$statment = $this->pdo->prepare("insert into course_students (course_id,student_name,class,student_id,adminPerm) values (?,?,?,?,'可登陆')");
        $statment->execute([$courseId,$studentName,$studentClass,$studentNo]);
	}

	public function getStudents(){
		$statment = $this->pdo->prepare('select * from course_students');
		$statment -> execute();
        $students = $statment->fetchAll();
        return $students;
	}

	public function getTheStudent($studentId) {
		$statment = $this->pdo->prepare('select * from course_students where student_id = ?');
		$statment -> execute([$studentId]);
		$TheStudent = $statment->fetch();
		return $TheStudent;
	}

	public function getUserStudent($studentId) {
		$statment = $this->pdo->prepare('select * from users where id = ?');
		$statment -> execute([$studentId]);
		$UserStudent = $statment->fetch();
		return $UserStudent;
	}

	public function UpdateStudent($id,$name,$class,$password,$permit,$role) {
		$statment = $this->pdo->prepare('update course_students set student_name = ?,class = ?,adminPerm = ? where student_id = ?');
		$statment -> bindValue(1, $name, PDO::PARAM_STR);
		$statment -> bindValue(2, $class, PDO::PARAM_STR);
		$statment -> bindValue(3, $permit, PDO::PARAM_STR);
		$statment -> bindValue(4, $id, PDO::PARAM_INT);
		$statment -> execute();
		$statment = $this->pdo->prepare('update users set name = ?,password = ?,role = ?,class = ? where id = ?');
		$statment -> bindValue(1, $name, PDO::PARAM_STR);
		$statment -> bindValue(2, $password, PDO::PARAM_STR);
		$statment -> bindValue(3, $role, PDO::PARAM_STR);
		$statment -> bindValue(4, $class, PDO::PARAM_STR);
		$statment -> bindValue(5, $id, PDO::PARAM_INT);
		$statment -> execute();
	}
}