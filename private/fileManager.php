<?php
class fileManager {
    private $pphotoUploadDir="profile/";
	function getProfilePhoto($uid){
	
	
	
	  $fname = md5("Anu".(string)$uid);
	  return $fname.".jpg";
	}


}
//$f = new fileManager();
//$f->getProfile(1);
 ?>