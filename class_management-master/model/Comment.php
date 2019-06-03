<?php

include_once('model/Model.php');

class Comment extends Model {

	public function findcomment($student_id){
		$statment = $this->pdo->prepare('select * from comment where student_id = ?');
		$statment -> execute([$student_id]);
        $comments = $statment->fetchAll();
        return $comments;
	}

	public function getAllteachers($role){
		$statment = $this->pdo->prepare('select * from users where role = ? ');
		$statment -> execute([$role]);
		$teachers = $statment->fetchAll();
		return $teachers;
	}

	public function getmyname($id){
		$statment = $this->pdo->prepare('select * from users where id = ? ');
		$statment -> execute([$id]);
		$user = $statment -> fetch();
		$username = $user['name'];
		return $username;
	}

	public function findtheteacher($name){
		$statment = $this->pdo->prepare('select * from users where name = ? ');
		$statment -> execute([$name]);
		$teacher = $statment->fetch();
		return $teacher;
	}

	public function addcommentin($student_id,$student_name,$teacher_id,$teacher_name,$content) {
		$statment = $this->pdo->prepare('insert into comment (student_id,student_name,teacher_id,teacher_name,content) values (?,?,?,?,?) ');
		$statment -> execute([$student_id,$student_name,$teacher_id,$teacher_name,$content]);
	}

	public function findthecomment($comment_id) {
		$statment = $this->pdo->prepare('select * from comment where id = ? ');
		$statment -> execute([$comment_id]);
		$comment = $statment->fetch();
		return $comment;
	}

	public function updatecomment($comment_id,$content) {
		$statment = $this->pdo->prepare('update comment set content = ? where id = ? ');
		$statment -> execute([$content,$comment_id]);
	}

	public function findteachercomment($teacher_id) {
		$statment = $this->pdo->prepare('select * from comment where teacher_id = ? ');
		$statment -> execute([$teacher_id]);
		$comments = $statment -> fetchAll();
		return $comments;
	}

	public function deletethecomment($comment_id) {
		$statment = $this->pdo->prepare('delete from comment where id = ? ');
		$statment -> execute([$comment_id]);
	}







}
