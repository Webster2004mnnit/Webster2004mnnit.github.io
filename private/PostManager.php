<?php
require_once("database.php");

class postStats
{
 private $pid;
 function   __construct($uid)
 {
  $this->uid=$uid; 
  $this->connect();
  $this->getTable();
 }
function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

} 
function getTable()
  {
  $q1="CREATE TABLE posts(postId SERIAL,
  createrId BIGINT, pdate DATE, ptime TIME, privacy VARCHAR(20) DEFAULT 'friends' ,caption VARCHAR(50),image1 VARCHAR(50) DEFAULT 'NA.jpg' NOT NULL,PRIMARY KEY(postId) );"; 
  return mysqli_query($this->conn, $q1);
  } 

}

?>