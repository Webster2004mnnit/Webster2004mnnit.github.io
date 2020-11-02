function toggle(id)
{
  id=id+0;
var current=$('#ActionBar').text(); 
if(current=="Add friend")
{
 proceed(id, "Addfriend");
}
if(current=="Delete friend"||current =="Delete request")
{
 proceed(id, "DeleteRequest");
}  
}

function proceed(id, action)
{

var link = "action.php?id="+id+"&action="+action;
var text ="" ;
if(action=="Addfriend")
text="Request sent"
else if(action=="AcceptRequest")
text ="Accepted"
else if(action=="DeleteRequest")
text ="Deleted"
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{
//	alert(this.responseText);
	$('#ActionBar' ).text(text);
}
else alert("Server error");



}
else alert("something Went wrong!!");



}



  };
  xhttp.open("GET",link, true);
  xhttp.send();


}

 
