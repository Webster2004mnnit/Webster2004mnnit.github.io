<?php

function cleaninput($value)
{
$bad_chars = array("{", "}", "(", ")", ";", ":", "<", ">", "/", "$","'","\"","=");
$value = str_ireplace($bad_chars,"",$value);
// This part below is really overkill because the string replace above removed special characters
$value = htmlentities($value);


$value = strip_tags($value); // Strips html and PHP tags
 if (get_magic_quotes_gpc())
 {
 $value = stripslashes($value); // Gets rid of unwanted quotes
 }
return $value;
}



function isclean($value){

if($value===cleaninput($value)||$value=="")
{return True;}
else{return false; }

}

?>