<?php

require_once('database.php');
class Aduser{
private $uid;

function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

}
function __construct($uid)
{
$this->uid=$uid;
$this->connect();

}
function getDetails($cname)
{

$q1="SELECT $cname from Additionalinfo WHERE uid = $this->uid;";
$res=mysqli_query($this->conn,$q1);
if($res->num_rows!=0)
return $res->fetch_assoc()[$cname];

}



function updateDetails($cname,$value)
{

$q1="create table if not exists Additionalinfo ( uid BIGINT, pphoto VARCHAR(50) DEFAULT 'Default.png' ,bio VARCHAR(50), fdevices VARCHAR(50), geners VARCHAR(50), fgames VARCHAR(50), PRIMARY
KEY(uid));";
$q2="UPDATE Additionalinfo SET $cname = '$value' WHERE uid = $this->uid;";
$q3="insert into Additionalinfo (uid,$cname) VALUES($this->uid,'$value');";
//var_dump($q2);
mysqli_query($this->conn,$q1);

return mysqli_query($this->conn,$q3)||mysqli_query($this->conn,$q2);

}


}



//$Adduser1=new Aduser(1);
//var_dump($Adduser1->updateDetails("bio","10528") );
//var_dump($Adduser1->getDetails("fgames"));
?>
