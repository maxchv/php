<?php 

if(!isset($show)) {
	$show = false;
}

// Язык SQL
// DDL - Data Definition Language
// 		CREATE ALERT DROP
if(!empty($show)) {
	echo "<h3>DDL</h3>";
	echo "<h4>Create database</h4>";
	echo "<p>Create database users</p>";
}
$sql = [];
$sql['create db'] = <<<EOQ
create database if not exists users character set utf8 collate utf8_general_ci;
EOQ;

if(!empty($show)) {
	info($sql['create db']);
	
	echo "<h4>Create table</h4>";
	echo "<p>Create table users with columns:</p>";
	echo <<<EOC
<ol class='list-group'>
	<li class='list-group-item list-group-item-success' title='auto'>id</li>
	<li class='list-group-item list-group-item-info' title='required'>login</li>
	<li class='list-group-item list-group-item-info' title='required'>password</li>
	<li class='list-group-item list-group-item-warning' title='not required'>email</li>
	<li class='list-group-item list-group-item-warning' title='not required'>first_name</li>
	<li class='list-group-item list-group-item-warning' title='not required'>last_name</li>
	<li class='list-group-item list-group-item-warning' title='not required'>age</li>
	<li class='list-group-item list-group-item-warning' title='not required'>sex</li>
	<li class='list-group-item list-group-item-warning' title='not required'>birthday</li>
</ol>
EOC;
}

$sql['create table'] = <<<EOQ
create table user 
(
	id 			int primary key auto_increment,
	login 		varchar(80) not null unique,
	password 	varchar(50) not null,
	email 		varchar(60),
	first_name	varchar(60),
	last_name	varchar(60),
	age 		int,
	gender		set('male', 'female')
)
EOQ;

if(!empty($show)) {
	info($sql['create table']);

	echo "<h4>Alert table</h4>";
	echo "<p>Add column:</p>";
	echo <<<EOC
<ol class='list-group'>
	<li class='list-group-item list-group-item-success' title='auto'>reg_date</li>
</ol>
EOC;
}

$sql['alter table'] = <<<EOQ
alter table user drop column age;
alter table user add 
(
	birthday 	date
)
EOQ;

if(!empty($show)) {
	info($sql['alter table']);
	
	echo "<h3>DML</h3>";
	echo "<h4>Insert user #1</h4>";
	echo "User has login: <ins>admin</ins> and password: <ins>12345</ins>";
}

// DML - Data Manipulation Language
//		INSERT UPDATE DELETE

$sql['insert admin'] = <<<EOQ
insert into user(login,password,email)
		values('admin', '12345', 'admin@domain.com');
EOQ;

if(!empty($show)) {
	info($sql['insert admin']);
	
	echo "<h4>Update data</h4>";
	echo "<p>Change password for admin to <ins>qwerty</ins></p>";
}

$sql['update password'] = <<<EOQ
update user set password='qwrty' where login='admin';
EOQ;

if(!empty($show)) {
	info($sql['update password']);

	echo "<h4>Delete user</h4>";
	echo "<p>Delete row witch has id=1</p>";
}

$sql['delete frist'] = <<<EOQ
delete from user where login='admin';
EOQ;

if(!empty($show)) {
	info($sql['delete frist']);

	echo "<h3>Select</h3>";
	echo "<h4>Databases info</h4>";
	echo "<p>Show all databases</p>";
}

// DQL - Data Query Language
//		SELECT

$sql['info databases'] = <<<EOQ
show databases;
EOQ;

if(!empty($show)) {
	info($sql['info databases']);
	
	echo "<h4>Table info</h4>";
	echo "<p>Show info about table</p>";
}

$sql['table info'] = <<<EOQ
describe user;
EOQ;

if(!empty($show)) {
	info($sql['table info']);

	echo "<h4>Select data</h4>";
	echo "<p>Select only id, login and birthday for field id=1</p>";
}

$sql['select first'] = <<<EOQ
select * from user where id=1;
EOQ;

// DCL - Data Control Language
//		GRANT REVOKE

if(!empty($show)) {
	info($sql['select first']);

	echo "<h3>Data Control Language</h3>";
	echo "<h4>Ceate user</h4>";
	echo "<p>Create user with name 'user'</p>";
}

$sql['create user'] = <<<EOQ
grant all on users.* to 'webuser'@'localhost' identified by '12345'
EOQ;

if(!empty($show)) {
	info($sql['create user']);

	echo "<h4>Set password</h4>";
	echo "<p>Change password for 'root'</p>";
}

$sql['set password'] = <<<EOQ
set password=password('new pass');
EOQ;

if(!empty($show)) {
	info($sql['set password']);
}

// TCL - Transaction Control Language
//		BEGIN COMMIT ROLLBACK

