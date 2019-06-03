create database class default character set utf8 collate utf8_unicode_ci;

use class;

create table users (
	id varchar(50) primary key,
	name varchar(100),
	password varchar(100),
	role varchar(20),
	class varchar(200)
);

create table courses (
	id integer auto_increment primary key,
	subject varchar(100),
	subject_no varchar(100),
	teacher_id varchar(50)
);

create table course_students (
	course_id integer,
	student_id varchar(50),
	student_name varchar(50),
	class varchar(50),
	created_at timestamp,
	adminPerm varchar(50)
);

create table assignments (
	id integer auto_increment primary key,
	title varchar(200),
	attachment varchar(200),
	created_at timestamp,
	course_id integer
);
create table assignment_records (
	id integer auto_increment primary key,
	assignment_id integer,
	student_id varchar(50),
	created_at timestamp,
	attachment varchar(200),
	score float
);

create table comment (
	id integer auto_increment primary key,
	student_id varchar(50),
	student_name varchar(50),
	teacher_id varchar(50),
	teacher_name varchar(50),
	content varchar(1000)
);

create table emails (
	id integer auto_increment primary key,
	flyfrom_id varchar(50),
	flyfrom_name varchar(50),
	flyto_id varchar(50),
	flyto_name varchar(50),
	content varchar(5000),
	flytime datetime
);

insert into emails (flyfrom_id,flyfrom_name,flyto_id,flyto_name,content,flytime) values ('1115709562','幕后大神','1629210023','毛雯凯','SSSSSSSS','2019-6-2 23:11:12');
insert into emails (flyfrom_id,flyfrom_name,flyto_id,flyto_name,content,flytime) values ('1115709562','幕后大神','1629210023','毛雯凯','ddddddddd','2019-6-2 23:11:12');

insert into comment (student_id,student_name,teacher_id,teacher_name,content) values ('1629210023', '毛雯凯','1629210026', '陶泓宇','SSSSSS');
insert into comment (student_id,student_name,teacher_id,teacher_name,content) values ('1629210023', '毛雯凯','1629210026', '陶泓宇','6666666666S');

insert into users (id, password, role, name) values ('1115709562', 'tao980419', 'teacher', '幕后大神');
