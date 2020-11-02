<?php SESSION_START();
require_once('private/user.php');
require_once('private/Aduser.php');
require_once('private/gameManager.php');
require_once('private/cleaninput.php');
require_once('private/fileManager.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));


//$_SESSION['user']->additionalInfo();

$fm=new fileManager() ;
$ad=new Aduser($_SESSION['user']->uid) ;
$dir="profiles/" ;

if(isset($_FILES["pphoto"])) 
{
if($_FILES['pphoto']['name'] !="" ) 
{

$tmp=$_FILES['pphoto']['tmp_name'] ;

$file = $fm->getProfilePhoto($_SESSION['user']->uid);


if(move_uploaded_file($tmp,$dir.$file)&&$ad->updateDetails("pphoto",$file)) 
echo "<script>alert('Profile photo uploaded') ;</script>" ;

} 
else 
{
echo "<script>alert(No file choosen') ;</script>" ;
} 


} 
$final=$dir.$ad->getDetails("pphoto") ;
//var_dump($_SESSION['user']->isloggedin());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <style>
         #update{
             min-height: 75px;
             padding: 5px;
             background-color:rgb(255, 145, 0);
             border-radius: 20px;
             font-size: 30px;
             font-family:Georgia;
             
         }
         #Box{
            padding: 10px;
            border: 2px groove;
            border-radius:20px;
            background-color:aliceblue;
            
         }
         .Text{
             font-size: 20px;
             text-align:center;
             font-family:Georgia;
         }
         #head{
             text-shadow: 5px 5px 8px black;
             font-size:40px;
         }
         #nav-c{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   <!-- header -->
    <div class="container-fluid   overflow-auto  " id="nav-c"  >
        <center><p class=" text-white " id="head" style="font-family: 'Galada',Cursive;">TheGamer'sZone</p></Center>
        </div>
        <br>
        <!-- header close -->
        <div class="container-fluid"><p class="Text  text-dark">Hey! Gamer Please update these informations</p></div>
        
        <div class="container text-center text-dark  overflow-auto" id="update">Update Your Information</div>
       <!-- form -->
        <div class="container shadow-lg p-5 mb-5 " id="Box">
             <form class="form" action="#" method="post" name ="uploadImage" enctype="multipart/form-data">
                

<?php      
echo <<<EOF
                <center><img src="{$final}" class="rounded-circle border border-info" width="300" height="300"></center>
EOF;
?>
                <br>
                <p class="text-dark">Upload picture or Choose an Avatar</p>
 <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />

                <input type="file" class="form-control-file" value="Upload Image" name="pphoto" accept="image/*" > <button class="btn btn-outline-primary" type ="submit">Change Avatar</button>
               <br>
               <br>
     </form>
<!--

     <form class="form" action="#" method="post" name ="Details" >
                <label>Bio:</label><input type="textarea" class="form-control " id="Bio-Box " name="bio" >
                <br>
                <br>
                <div class="form-check">
                  <b>You Like to do Gaming in:</b><br>
                  <table class="table">
                  <tr>
                    <td>
                       <input type="checkbox" name="PC" class="form-check-input" id="PC">
                        <label class="form-check-label" for="PC">PC</label>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <input type="checkbox" name="Mobile" class="form-check-input" id="Mobile">
                        <label class="form-check-label" for="Mobile">Mobile</label>
                     </td>
                  </tr>
                </table>
                  
                  <b>Gaming Genre You like:</b><br>
                  <table class="table ">
                   <tr>
                     <td>
                        <input type="checkbox" name="GenreAction" class="form-check-input" id="Action">
                         <label class="form-check-label" for="Action">Action</label>
                      </td>
                   </tr>
                   <tr>
                       <td>
                       <input type="checkbox" name="GenreArcade" class="form-check-input" id="Arcade">
                       <label class="form-check-label" for="Arcade">Arcade</label>
                       </td>
                     </tr>
                   <tr>
                       <td>
                       <input type="checkbox" name="GenreRacing" class="form-check-input" id="Racing">
                        <label class="form-check-label" for="Racing">Racing</label>
                       </td>
                  </tr>
                  <tr>
                     <td>
                       <input type="checkbox" name="GenreSports" class="form-check-input" id="Sports">
                       <label class="form-check-label" for="Sports">Sports</label>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <input type="checkbox" name="GenreStratagy" class="form-check-input" id="Strategy">
                        <label class="form-check-label" for="Strategy">Strategy</label>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <input type="checkbox" name="GenreOthers" class="form-check-input" id="Others">
                        <label class="form-check-label" for="Others">Others</label>
                     </td>
                  </tr>
                  </table>
                 <br>
                 <br>
                  
                 <b>Games you Like:</b><br>
               <table class="table ">
                <tr>
                  <td>
                     <input type="checkbox" name="GamesPubg" class="form-check-input" id="PUBG">
                      <label class="form-check-label" for="PUBG">PUBG</label>
                   </td>
                </tr>
                <tr>
                    <td>
                    <input type="checkbox" name="GamesCOC" class="form-check-input" id="COC">
                    <label class="form-check-label" for="COC">Clash of Clan</label>
                    </td>
                  </tr>
                <tr>
                    <td>
                    <input type="checkbox" name="GamesCOD" class="form-check-input" id="COD">
                     <label class="form-check-label" for="COD">Call of Duty</label>
                    </td>
               </tr>
               <tr>
                  <td>
                    <input type="checkbox" name="Gamesff" class="form-check-input" id="ff">
                    <label class="form-check-label" for="ff">FIFA</label>
                  </td>
               </tr>
               <tr>
                <td>
                  <input type="checkbox" name="GamesCounterStrike" class="form-check-input" id="Other">
                  <label class="form-check-label" for="Other">Counter-Strike</label>
                </td>
             </tr>
             </table>
            </div>
            <center><input type="submit" class="btn btn-outline-warning " value="Update"><a href="HomeUser.php">  <input type="Button" value="Skip" class="btn btn-primary "></a></center>
            <br>
            <br>
            </form>
-->
              <!-- form closed -->
        </div>
         <br>
           <!-- footer -->
           <diV class="container-fluid " id="nav-c">
            <br>
            <br>
            <center><a class="text-white" href="#">Contact Us</a>|<a class="text-white" href="#">About Us</a></center>
            <br>
            <br>
             </diV>
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
             <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
          
</body>
</html>
<?php 



if(isset($_POST['submit']))
{
$gm = new gameManager();
$Aduser1=new Aduser((int)$_SESSION['user']->uid);

if(isset($_POST['bio']))
	{
    if(isclean($_POST['bio'])&&$_POST['bio']!='')	
	{
	$temp['bio']=$_POST['bio'];
	$Aduser1->updateDetails("bio",$temp['bio']);
	}
	else $error[]="invalid charecters in bio";
	}

	
if(isset($_POST['GamesCOC'])&&$_POST['GamesCOC']=="on")
	{
	$temp['games'][]="Clash of Clans";
	}
	if(isset($_POST['GamesCOD'])&&$_POST['GamesCOD']=="on")
	{
	$temp['games'][]="Call of Duty";
	}
	
	if(isset($_POST['GamesPubg'])&&$_POST['GamesPubg']=="on")
	{
	$temp['games'][]="PUBG";
	}
	if(isset($_POST['Gamesff'])&&$_POST['Gamesff']=="on")
	{
	$temp['games'][]="FIFA";
	}
	if(isset($_POST['GamesCounterStrike'])&&$_POST['GamesCounterStrike']=="on")
	{
	$temp['games'][]="Counter-Strike";
	}
//var_dump($error);
//var_dump($temp);


$Aduser1->updateDetails("fgames",$gm->toString((Array)$temp['games']));

//var_dump($Aduser1->getDetails("fgames"));
//var_dump($gm->getByString($Aduser1->getDetails("fgames")));
}



?>



