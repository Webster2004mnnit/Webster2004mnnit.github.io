function  My(text,cid)
{
      var s=`<div class=" send-message shadow-lg"><p class="">`+text+`</p></div><br><br><br>`;
       $('#recentChat').append(s);
}
function  Anothers(text,cid)
{
   // alert();
    var s= `<div class=" rec-message "><p class="">`+text+`</p></div><br><br><br>`; 
    $('#recentChat').append(s);
}
function sendMessage()
{
var text=$('#message-box').val() ; 
var letters = /^[A-Za-z0-9@%#\?. ]+$/;
if(text!=""&&text.match(letters))
{
send(text);
$('#message-box').val("");
}
else {
  alert("invalid characters");
}
}

function send(tosend)
{
 $.post( "action.php", { text: tosend})
  .done(function( data ) {
    fetch(myId);
  });
}


function fetch(myId)
{

var link = "chatProvider.php?chats=1";
//alert(link);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{ //alert("processing");
   processAndshow(this, myId);
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

function processAndshow(xml, myId) {
 // alert(myId+"is under");
  var i;
  var xmlDoc = xml.responseXML;
  //alert(data);
     $('#recentChat').html("");
  var x = xmlDoc.getElementsByTagName("chat" );
 // alert(x.length);
  
  for (i = 0; i <x.length; i++) {
    //alert("inloop");
    
    var text= x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue; 
    var from= x[i].getElementsByTagName("from")[0].childNodes[0].nodeValue; 
    
    
    var id=x[i].id;
    if(from==myId)
    My(text);
    else 
    Anothers(text);
    //alert(from);
  
  }

}