<?php
include_once('model/Model.php');

class Emails extends Model {

	public function getallemails($userid) {
		$statment = $this->pdo->prepare("select * from emails where flyto_id = ? ");
        $statment->execute([$userid]);
        $emails = $statment->fetchall();
        return $emails;
	}

	public function gettheemail($email_id) {
		$statment = $this->pdo->prepare("select * from emails where id = ? ");
        $statment->execute([$email_id]);
        $email = $statment->fetch();
        return $email;
	}

	public function sendemail($flyfrom_id,$flyfrom_name,$flyto_id,$flyto_name,$content,$time) {
		$statment = $this->pdo->prepare("insert into emails (flyfrom_id,flyfrom_name,flyto_id,flyto_name,content,flytime) values 
		(?,?,?,?,?,?) ");
        $statment->execute([$flyfrom_id,$flyfrom_name,$flyto_id,$flyto_name,$content,$time]);
	}

	public function deleteemailbyid($email_id){
		$statment = $this->pdo->prepare("delete from emails where id = ?");
        $statment->execute([$email_id]);
	}

}
