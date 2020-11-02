<?php
require_once("private/database.php");

class SearchProvider{
  function __construct()
  {
  $this->connect() ;
  
  
  }
  function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

} 
  function searchByName($key)
  {
  $sql = "SELECT uid,name FROM info WHERE name LIKE'%$key%' ";
// var_dump($sql);
  $result=mysqli_query($this->conn,$sql );
  if($result->num_rows!=0)
  {
 for($i=0;$i<$result->num_rows;$i++)  
 {
 $result->data_seek($i);
 $temp=$result->fetch_assoc();
 echo <<<EOF
    <tr>
    <td>
    <p><b>{$temp['name']}</b></p>
    </td>
    <td>
     <a href="Profile.php?origin=Search.php&id={$temp['uid']}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right float-right mr-5 mt-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg></a>
    </td>
    </tr>
 
 EOF;
 
 }
  }
else echo"<center><h4>No Results Found!</h4></center>";
  }
  
  
}



?>