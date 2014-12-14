// Start the terraria server.
function startServer() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      //document.getElementById("poll").innerHTML=xmlhttp.responseText;
      
    }
  }
  xmlhttp.open("GET", window.location.origin + "/_src/php/startserver.php",true);
  xmlhttp.send();
}

// Retrieve the message
function getMessage(args) {
	$.ajax({
	  url: window.location.origin + "/_src/php/loadfile.php?"+args,
	  beforeSend: function( xhr ) {
	    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
	  }
	}).done(function( data ) {
		if(data != lastline) {
			//$("#poll").append(data + "<br>");
			$('.server-output').html(data.replace(/(?:\r\n|\r|\n)/g, '<br />'));
			if(data.substring(data.lastIndexOf("\n")) == "\ndone") {
				stopInterval();
			}
			//$("#lastitem").html("<h2>"+data.substring(data.lastIndexOf("\n"))+"</h2>");
		}
		lastline = data;
	});
}

var done = "done";
var lastline = "";
var checklogs = null;
function checkLog(filepath) {
	checklogs = setInterval(function() { 
		getMessage('file='+filepath);
	}, 500);
}

function stopInterval() {
	clearInterval(checklogs);
	alert("interval stopped");
}
