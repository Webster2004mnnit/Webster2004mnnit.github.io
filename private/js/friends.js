function show()
{
alert("checkup")  ;
  
}




function showRequest(name,uid)
{var s = `<tr style="height:50px;"><td><a href="Profile.php?origin=Friends.php&id=`+uid+`" ><img src="profiles/Default.png" width="40px" height="40px" class="img-fluid rounded-circle mr-2"></a>`+name+`</td> <td><button id="`+uid+`AcceptRequest" class="btn btn-primary btn-sm mr-2" onClick="proceed(`+uid+`,'AcceptRequest')">Confirm</button><button id="`+uid+`DeleteRequest"  class="btn btn-outline-danger btn-sm" onClick="proceed(`+uid+`, 'DeleteRequest' )" >Delete</button></td></tr>`; 

$('#RequestTable').append(s);  

} 

function showSuggested(name,uid)
{var s =  `<tr style="margin:auto;width:100%;" ><td><a href="Profile.php?origin=Friends.php&id=`+uid+`" ><img src="profiles/Default.png" class="img-fluid rounded-circle" width="30px" height="30px"></a></td><td><p >`+name+`</p></td><td><button id="`+uid+`Addfriend"  class="btn btn-outline-primary" onClick="proceed(`+uid+`,'Addfriend')" >Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
           </svg></button></td>
     </tr>`; 

$('#SuggestionTable').append(s);  

} 

function showFriend(name,uid)
{ var s=`<tr><td><p><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg><a href="Profile.php?origin=Friends.php&id=`+uid+`"><img src="Game1.jpg" class="img-fluid rounded-circle ml-3" width="65" height="65"></a><label class="ml-3">`+name+`</label><a href="Chatting.php?origin=Friends.php&friend=`+uid+`"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right float-right mr-5 mt-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg></a></p></td></tr>`;

$('#AllFriendsTable').append(s);  
//alert("done");
} 


function fetch(data)
{

var link = "resource.php?"+data+"=1";
//alert(link);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{ //alert("processing");
   processAndshow(this, data);
  // alert(data);
}
else alert("Server error");



}
else alert("something Went wrong!!");



}



  };
  xhttp.open("GET",link, true);
  xhttp.send();
  

} 



function processAndshow(xml,data) {
  
  var i;
  var xmlDoc = xml.responseXML;
  //alert(data);
 
  var x = xmlDoc.getElementsByTagName("info");
 // alert(x.length);
     
  for (i = 0; i <x.length; i++) {
    
    var name=x[i].childNodes[0].nodeValue;
    var id=x[i].id;
    
    
    if(data=="suggestions")
showSuggested(name, id);
    else if(data=="requests")
showRequest(name, id);
    else if(data=="friends")
showFriend(name, id);
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
	$('#'+id+action).text(text);
}
else alert("Server error");



}
else alert("something Went wrong!!");



}



  };
  xhttp.open("GET",link, true);
  xhttp.send();


}

 
