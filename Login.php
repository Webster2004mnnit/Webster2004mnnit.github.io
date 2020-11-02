<?php SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));



if(isset($_SESSION['user'])&&$_SESSION['user']->isloggedin())
{
  if($_SESSION['newUser']) 
  die(header("Location:"."Updateinfo.php"));
  else die(header("Location:"."HomeUser.php"));
}
/*
if(isset($_SESSION['user'])&&$_SESSION['user']->isregistered()&&$_SESSION['user']->isloggedin())

if(isset($_SESSION['user'])&&$_SESSION['user']->isloggedin())
die(header("Location:"."HomeUser.php"));
*/
//var_dump($_SESSION['user']->isloggedin());
?>

<!DOCTYPE html>
<html lang="en"><head>
     <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="356323827990-24jd949fu72chqcbjcolll3be892apis.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>  
	    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #Form-box{
            border:0.05px groove;
            border-radius: 10px;
            width: 500px;
            background-color:aliceblue;
        }
        #Box{
            border:groove;
            border-radius: 10px;
            width: 500px;
            
        }
        #Input-Box{
            margin: 10px;
            padding:20px;   
        }
        #head{
            font-size:40px;
            text-shadow: 5px 5px 5px black;
        }
        #nav-c{
         background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
       }
       @media all and (max-width: 600px)
       {
        #Box{
            width:350px;
        } 
        #Form-box{
            width:350px
        }
       }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background-color:#DCDCDC;">
    <div class="container-fluid overflow-auto " id="nav-c"  >
        <center><p class=" text-white " id="head" style="font-family: 'Galada',Cursive;">TheGamer'sZone</p></Center>
        </div>
        <br>
        <div class="container bg-dark  overflow-auto " id="Box" >
            <center><p class="display-4 text-white" style="font-family:georgia;" >Login</p></center>
            </div>
            
        <div class="container shadow-lg p-3 mb-5 "  id="Form-box">
        <form class="form" method="post" id="Input-Box">  
        <label><b>Username:</b></label><input type="text" name="username" class="form-control" placeholder="Username"><br>
        <label ><b>Password:</b></label><input type="password" name="password" class="form-control" placeholder="Password"><br>
        <center><input type ="submit" class="btn btn-outline-warning"value="Submit"></center> 
        </form>
       <br>
           <center><div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div></center> 
        <br>
        <center><a href="#">Forget Password</a></center>
        <br>
          <center> <p>New to Gamer's Zone?<br><button class="btn"><a href="Register.php">Sign up</a> </button></p></center> 
       
         </div>
         <br>
         
         
         <div class="container-fluid " id="nav-c">
            <br>
            <br>
            <center><a class="text-white" href="#">Contact Us</a>|<a class="text-white" href="#">About Us</a></center>
            <br>
            <br>
             </div>

             
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
             <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
          
 <script>
   function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        alert("hi");
       var profile = googleUser.getBasicProfile();
       alert(profile);
   } 
   
 </script>        
        
</body>
</html>
<?php
if(isset($_POST['username']))
{

$utemp= new User();


if($utemp->login($_POST['username'],$_POST['password']))
{

	
$_SESSION['user']=$utemp;
	
	
	
echo "<script>window.location.replace('HomeUser.php');</script>";

}
else {
echo "<script>alert('Username/Password is incorrect');</script>";
}
}


?>
