<?php SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));

if(isset($_SESSION['user'])){
if($_SESSION['user']->isloggedin())
die(header("Location:"."HomeUser.php"));

else if($_SESSION['user']->isregistered())
die(header("Location:"."Login.php"));
}
//var_dump($_SESSION['user']->isloggedin());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registeration</title>
    <style>
      #Box{
        
       
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        
      
      }
	   #Form-box{
        
        border: 2px groove;
        border-bottom-left-radius: 10px;   
         border-bottom-right-radius: 10px;
        background-color:aliceblue;
      
      }
      label{
        text-shadow: 1px 1px 1px grey;
        font-weight: bold;
      }
      #head{
        text-shadow: 3px 3px 3px black;
		font-size: 40px;
       
    }
    #nav-c{
         background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
       }
       #welcome{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
     min-height: 75px;
      font-size: 25px;
      font-family:georgia;
      padding-top: 10px;
      text-align:center;
    }
    </style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<body style="background-color:#DCDCDC;">
<div class="container-fluid overflow-auto  " id="nav-c" >
<center><p class=" text-white " id="head" style="font-family: 'Galada',Cursive;">TheGamer'sZone</p></center>
</div>

<div class="alert alert-danger" role="alert">
  <p>Let's take first step towards your Social Gaming ,Just create Your account and Get Connect with your gaming Friends</p>
  </div>
<br>
  <div class="container bg-dark  overflow-auto " id="Box" style="height:80px" >
    <p class="text-white  "  id="head"  style="font-family:georgia;" >Get Register Now!</p>
    </div>

<div class=" container shadow-lg p-3 mb-5 "id="Form-box" >
<form class= "form" action="#" method="post">

<label>Name:</label><input type="text" name="name" class="form-control" id="name" placeholder="Name">
<p id="checkname"></p>
<br>
<label>Gaming Name/Username:</label><input type="text" name="username" id="username" class="form-control " placeholder="Username">
<p id="checkUsername"></p>
<br>
<label>Email:</label><input type="email" name="email" id="email" class="form-control"  placeholder="Email">

<br> 
<label>Age:</label><input type="number" name="age" class="form-control" id="age"  placeholder="Age">
<p id="checkage"></p>
<br>
<label>Phone No. </label><input type="number" name="phone" id="phn" class="form-control"  placeholder="Phone No.">
<p id="checkphn"></p>
<br> 
<label>City:</label><input type="text" name="city" class="form-control"  placeholder="City"><br> 
<label>Password:</label><input type="password" name='password' id="pass" class="form-control" placeholder="Password">
<p id="checkpass"></p>
<br>
<label>Confirm Password:</label><input type="password" name='cpassword' id="pass1" class="form-control" placeholder="Confirm Password">
<p id="confpass"></p>
<br>
<center><input type ="submit" class="btn btn-primary " id="submitbtn" value="Submit"></center>
</form> 
</div>
<br>
<center> <p >Already have an Account? Then <a href="Login.php"><button class="btn btn-warning">Sign In</button></a></p></center>
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
    
	<script >
      $(document).ready(function(){
        $('#checkname').hide();
        $('#checkUsername').hide();
        $('#checkphn').hide();
        $('#checkpass').hide();
        $('#confpass').hide();
        $('#checkage').hide();
       
        var name_err=true;
        var user_err =true;
        var pass_err=true;
        var pass1_err=true;
        var phn_err =true;
        var age_err=true;
       

       // name validation 
        $('#name').keyup(function(){
          name_check();
          
        });

        function name_check(){
          var name_val = $('#name').val();
          
          if(name_val.length ==''){
            $('#checkname').show();
            $('#checkname').html("*Required ");
            $('#checkname').focus();
            $('#checkname').css("color","red");
            name_err =false;
            return false;

          }else{
                 $('#checkname').hide();
          }

        }
   
        //username validation
        $('#username').keyup(function(){
          username_check();
          
        });

        function username_check(){
          var user_val = $('#username').val();
          
          if(user_val.length ==''){
            
            $('#checkUsername').show();
            $('#checkUsername').html("*Required ");
            $('#checkUsername').focus();
            $('#checkUsername').css("color","red");
            user_err =false;
            return false;

          }else{
                 $('#checkUsername').hide();
          }

          if((user_val.length < 6 ) || (user_val.length > 12)){
            
            $('#checkUsername').show();
            $('#checkUsername').html("*Username must be between 6-12 ");
            $('#checkUsername').focus();
            $('#checkUsername').css("color","red");
            user_err =false;
            return false;

          }else{
                 $('#checkUsername').hide();
          }
        }
        
        //phn no. validation
        $('#phn').keyup(function(){
          phn_check();
        });
        function phn_check(){
          var phn_val = $('#phn').val();

          if(phn_val.length !=10){
            
            $('#checkphn').show();
            $('#checkphn').html("**Enter a valid phone No. ");
            $('#checkphn').focus();
            $('#checkphn').css("color","red");
            phn_err =false;
            return false;

          }else{
                 $('#checkphn').hide();
          }
          if(isNaN(phn_val.val())){
            $('#checkphn').show();
            $('#checkphn').html("**Enter a valid No.");
            $('#checkphn').focus();
            $('#checkphn').css("color","red");
            phn_err =false;
            return false;
          }
          else {
            $('#checkphn').hide();
          }
          
        }
        //Age Validation
        $('#age').keyup(function(){
           age_check();
        });
        
        function age_check(){
          var age_val = $('#age').val();

        
        if( age_val.length <2)
        {
          $('#checkage').show();
          $('#checkage').html("*Age must be above 10 ");
          $('#checkage').focus();
          $('#checkage').css("color","red");
          age_err =false;
          return false;
        }
        else if(age_val.length > 2)
        {
          
          $('#checkage').show();
          $('#checkage').html("*Invalid Age ");
          $('#checkage').focus();
          $('#checkage').css("color","red");
          age_err =false;
          return false;
        }
        else if(age_val.length=='')
        {
          
          $('#checkage').show();
          $('#checkage').html("*Required ");
          $('#checkage').focus();
          $('#checkage').css("color","red");
          age_err =false;
          return false;
        }
        else{
          $('#checkage').hide();
        }
      }
        //password validation
        $('#pass').keyup(function(){
          pass_check();
          
        });

        function pass_check(){
          var pass_val = $('#pass').val();
          
          if(pass_val.length ==''){
            
            $('#checkpass').show();
            $('#checkpass').html("*Required ");
            $('#checkpass').focus();
            $('#checkpass').css("color","red");
            pass_err =false;
            return false;

          }else{
                 $('#checkpass').hide();
          }

          if((pass_val.length < 6 ) || (pass_val.length > 12)){
            
            $('#checkpass').show();
            $('#checkpass').html("*password must be between 6-12 ");
            $('#checkpass').focus();
            $('#checkpass').css("color","red");
            user_err =false;
            return false;

          }else{
                 $('#checkpass').hide();
          }
        }

        
       //password confirmation
        $('#pass1').keyup(function(){
          conf_pass();
        });
        function conf_pass(){
          var pass_val = $('#pass').val();
          var pass1_val = $('#pass1').val();

              if(pass1_val != pass_val){
            $('#confpass').show();
            $('#confpass').html("**It should match with the password given above");
            $('#confpass').focus();
            $('#confpass').css("color","red");

            pass1_err=false;
            return false;
              }
              else
              {
                $('#confpass').hide();  
              }

        }
		
		$('#submitbtn').click(function(){
		var name_err=true;
        var user_err =true;
        var pass_err=true;
        var pass1_err=true;
        var phn =true;
        var age_err=true;
		
		name_check();
		username_check();
		 phn_check();
		 age_check();
		 pass_check();
		 conf_pass();
		 
		 if((user_err == true) && (pass_err == true) && (age_err == true) && (phn_err == true) && (pass_err ==true) && (conf_pass == true))
		 { return true;
		 }
		 else {
			 return false;
		 }
			 
		});


      });

    </script>

    
</body>
</html>
<?php //

if(isset($_POST['username'])&&!isset($_SESSION['user']->username))
{

	
	
require_once('private/user.php');
$_SESSION['user']=new User();
$_SESSION['user']->init($_POST['name'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['age'],$_POST['phone'],$_POST['city']);
if($_SESSION['user']->register())
	{
	$_SESSION['newUser']=true;
	echo "<script>alert('Succes');window.location.replace('Login.php');</script>";
	
	
	}





}


//var_dump($_SESSION['user']);
?>
