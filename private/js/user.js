
function logout() 
{
 // alert("logging off... ");
if(confirm("Are you sure you want to logout?" ) ) 
{
proceedToLogout() ;
} 

} 


function proceedToLogout()
{

var link = "Logout.php";

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{
	alert("Success");
}
else alert("Server error");



}
else alert("something Went wrong!!");



}



  };
  xhttp.open("GET",link, true);
  xhttp.send();


}
