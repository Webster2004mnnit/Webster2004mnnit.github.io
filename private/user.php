﻿<?php
require_once('database.php');
class User{
private $name="";
private $username="";
private $email="";
private $password="";
private $age="";
private $phone="";
private $city="";
private $registered=false;
private $loggedin=false;
function __construct()
{

$this->db = new database;
$this->conn=$this->db->dbconnect('web');
}

function init($name,$username,$email,$password,$age,$phone,$city)
{
$this->name=$name;
$this->email=$email;
$this->password=$password;
$this->age=$age;
$this->phone=$phone;
$this->city=$city;
$this->username=$city;


}




function setregistered($status)
{
$this->registered=$status;


}

function isregistered()
{
return $this->registered;


}

function setloggedin($status)
{
$this->loggedin=$status;


}

function isloggedin()
{
return $this->loggedin;


}

function register()
{



$q1="create table if not exists info ( uid SERIAL, name VARCHAR(50),username VARCHAR(50), email VARCHAR(50), password VARCHAR(50), age INT(3), phone VARCHAR(20), city VARCHAR(15), PRIMARY
KEY(uid));";
$q2 = "insert into info(name,username,email,password,age,phone,city) VALUES('$this->name','$this->username','$this->email','$this->password','$this->age','$this->phone','$this->city')";
mysqli_query($this->conn,$q1);
return mysqli_query($this->conn,$q2);


}

function login($username,$password)
{
$query="SELECT * FROM info WHERE username = '$username' AND password ='$password';";
$result=mysqli_query($this->conn,$query);
if($result->num_rows!=0)
	{
		$array=$result->fetch_assoc();
		$this->init($array['name'], $array['username'],$array['email'],$array['password'],$array['age'],$array['phone'],$array['city']);
		$this->setloggedin(true);
		
	return true;
	}
else return false;
}



}

//$u1 = new User("durgesh","kumar","pass","34","45555","ddf");
//$u1->register();
//echo("succes");




?>
