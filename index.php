<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/glide.js"></script>
	<link rel="stylesheet" href="css/glide.core.css">
    <link rel="stylesheet" href="css/glide.theme.css">
	<title>Erintuitive's Avatar Demo</title>
</head>
<body>
	<script>
  //stuff that needs to be here
  window.fbAsyncInit = function() {
		FB.init({
		appId      : '817064305070781',
		cookie     : true,  // enable cookies to allow the server to access 
							// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.9' // use version 2.9
		});
		FB.getLoginStatus(function(response){
			if (response.status === 'connected'){
				$("#wholeIntro").hide();
				$("#buttons").show();
				$("#logout_button").show();
				getMe();
			}
			else if (response.status === 'not_authorized'){
				$("#wholeIntro").show();
				$("#buttons").hide();
				$("#logout_button").hide();
			}
			else {
				
			}
		});
    };
	function getMe() {
		window.location.replace("human2.php");
	}
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  //for later
 
  /*function performChat() {
	$("#sentence_text").keyup(function(){
		var theSentence = $(this).val();
		//replacement
		//use a for loop
		var iconArray = [["/caution", '<img src="icons/caution.png" alt="caution">'], ["/heart", '<img src="icons/heart.png" alt="heart">'], ["/inside", '<img src="icons/inside.png" alt="inside">'], ["/music", '<img src="icons/musical_note.png" alt="music">'], ["/shamrock", '<img src="icons/shamrock.png" alt="shamrock">'], ["/redo", '<img src="icons/redo.png" alt="redo">'], ["/undo", '<img src="icons/undo.png" alt="undo">'], ["/star", '<img src="icons/star.png" alt="star">'], ["/phone", '<img src="phone/caution.png" alt="phone">'], ["/time", '<img src="icons/waiting.png" alt="time">'], ["/wider", '<img src="icons/wider.png" alt="wider">'], ["/taller", '<img src="icons/taller.png" alt="taller">'], ["/ice", '<img src="icons/Ice.png" alt="ice">'], ["/clouds", '<img src="icons/Overcast.png" alt="clouds">'], ["/rainbow", '<img src="icons/Rainbow.png" alt="rainbow">'], ["/sun", '<img src="icons/Sunny.png" alt="sun">'], ["/fire", '<img src="icons/fire.png" alt="fire">'], ["/afraid", '<img src="icons/afraid.png" alt="afraid">'], ["/happy", '<img src="icons/happy.png" alt="happy">'], ["/delighted", '<img src="icons/delighted.png" alt="delighted">'], ["/disgusted", '<img src="icons/disgusted.png" alt="disgusted">'], ["/angry", '<img src="icons/angry.png" alt="angry">'], ["/confused", '<img src="icons/confused.png" alt="confused">'], ["/bird", '<img src="icons/bird_contour.png" alt="bird">'], ["/bull", '<img src="icons/bull_contour.png" alt="bull">'], ["/cat", '<img src="icons/cat_contour.png" alt="cat">'], ["/cow", '<img src="icons/cow_contour.png" alt="cow">'], ["/duck", '<img src="icons/duck_contour.png" alt="duck">'], ["/elephant", '<img src="icons/elephant_contour.png" alt="elephant">'], ["/fish", '<img src="icons/fish_contour.png" alt="fish">'], ["/horse", '<img src="icons/horse_contour.png" alt="horse">'], ["/ladybug", '<img src="icons/ladybug_contour.png" alt="ladybug">'], ["/leopard", '<img src="icons/leopard_contour.png" alt="leopard">'], ["/lion", '<img src="icons/lion_contour.png" alt="lion">'], ["/zero", '<img src="icons/zero.png" alt="zero">'], ["/one", '<img src="icons/one.png" alt="one">'], ["/two", '<img src="icons/two.png" alt="two">'], ["/three ", '<img src="icons/three.png" alt="three">'], ["/four", '<img src="icons/four.png" alt="four">'], ["/five", '<img src="icons/five.png" alt="five">'], ["/six", '<img src="icons/six.png" alt="six">'], ["/seven", '<img src="icons/seven.png" alt="seven">'], ["/eight", '<img src="icons/eight.png" alt="eight">'], ["/nine", '<img src="icons/nine.png" alt="nine">'], ["/miserable", '<img src="icons/miserable.png" alt="miserable">'], ["/surprised", '<img src= "icons/surprised.png" alt="surprised">'], ["/outside", '<img src="icons/outside.png" alt="outside">'], ["/sad", '<img src="icons/sad.png" alt="sad">']]; //alter theSentence.
		var i=0;
		var theSentenceProcessed=theSentence;
		for(i=0; i<iconArray.length; i++){
			theSentenceProcessed = theSentenceProcessed.replace(iconArray[i][0], iconArray[i][1]);
		}
		$.post("php_post/new_bad_words_script.php", {my_sentence : theSentenceProcessed}, function(bads){
			$("#sentence").html(bads);
		});
		});
		$("#submitSentence").click(function(){
			var sentence = $("#sentence").html();
			$.post("php_post/comb.php", {comb : sentence, me_id : me_id}, function(combing){
				$("#sentence").html(combing);
			});
		});
  }*/
	</script>
	<!-- animal or human? -->
	<!-- <div id="wholeIntro">
		Erintuitive is a personality reader. She reads personality instead of minds! Feel free to chat and try to guess things about each other yourself!<br>
		Enjoy the scenery and build your own character! Erintuitive interprets your avatar's appearance and attempts to figure out your personality!<br>
		--><button id="loginButton" onclick="login()">Enter!</button><!--
	</div>
	<br><img alt="virtual psychic" src="img/giphy.gif"/><br> -->
	Welcome to Erintuitive's avatar maker demo! Login to continue.
	<style>
		body {
			background-color: #CC22DC;
		}
		#intro {
			position: absolute;
			z-index: 100;
		}
		#words {
			position: absolute;
			top: 300px;
			left: 250px;
		}
		#avatarOptions {
			position: relative;
			float: left;
		}
		#buttons {
			position: fixed;
			top: 395px;
			left: 600px;
		}
		#result {
			vertical-align: text-top;
			width: 300px;
			padding-left: 5px;
			border-width: 5px;
			border-style: solid;
		}
		#avatarOptions {
			overflow: scroll;
			height: 450px;
		}
	</style>
</body>
</html>