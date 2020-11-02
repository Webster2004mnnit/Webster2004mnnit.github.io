<?php

require_once('database.php');
class GameManager{

private $gid ;
//private  $gname="";

function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

}
function __construct()
{

$this->connect();

}


function add($gname)
{

$q1="create table if not exists ginfo(gid SERIAL,gname VARCHAR(50),PRIMARY KEY(gid)  );";
$q2="insert into ginfo (gname) VALUES ('$gname');";

	//$this->connect();

//$this->connect();
//var_dump($q2);
mysqli_query($this->conn,$q1);
return mysqli_query($this->conn,$q2);

}




function getById($gid)
     {
//$this->connect();
$q1="SELECT * FROM ginfo WHERE gid = $gid";
$result = mysqli_query($this->conn,$q1);
if($result->num_rows!=0)
{
$arr=$result->fetch_assoc();
return $arr['gname'];
}


return null;

     }

function getByName($gname)
     {
//$this->connect();
$q1="SELECT * FROM ginfo WHERE gname = '$gname';";
$result = mysqli_query($this->conn,$q1);
if($result->num_rows!=0)
{
$arr=$result->fetch_assoc();
//var_dump($arr);
return $arr['gid'];
}


return null;

     }






function getByString($all)
{
$length = strlen($all); 
$charArray = array();
 for ($i=0; $i<$length; $i++)
    { $charArray[$i] = $all[$i]; }
//$charArray= str_​split	($all);
$marry=Array();
foreach($charArray as $char)
{
//var_dump($this->getById((int) $char));
$marry[]=$this->getById((int) $char);
}
return $marry;
}

function toString($array)
{
$str='';
foreach($array as $game)
{
//var_dump($this->getByName($game));

$str=$str.(string)$this->getByName($game);
}
//var_dump($str);
return $str;
}



}


/*
uncomment these lines given at time of first use
*/
/*
$g1 = new GameManager();
$g1->add("PUBG");
$g1->add("Clash of Clans");
$g1->add("Call of Duty");
$g1->add("FIFA");
$g1->add("Counter-Strike");
*/
//var_dump($g1->getByString("12311"));
//var_dump($g1->getByName("game1"));

//var_dump($g1->toString(array("game1","game12")));


?>
