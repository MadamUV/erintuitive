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
		FB.api('/me', function(response) {
			var me_id = response.id;
			window.localStorage.setItem("me_id", me_id);
		});
	}
  function login(){
	FB.login(function(response){
		if (response.status === 'connected'){
			$("#wholeIntro").hide();
			$("#buttons").show();
			$("#logout_button").show();
			getMe();
		}
		else if (response.status === 'not_authorized'){
			$("#wholeIntro").show();
			$("#logout_button").hide();
		}
		else {
			
		}
	});
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
	<div id="wholeIntro">
		Erintuitive is a personality reader. She reads personality instead of minds! Feel free to chat and try to guess things about each other yourself!<br>
		Enjoy the scenery and build your own character! Erintuitive interprets your avatar's appearance and attempts to figure out your personality!<br>
		<button id="loginButton" onclick="login()">Enter!</button>
	</div>
	<table width="750px">
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="init">
					Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">
				</div>
			</td>
			<td>
				<div id="result" width="500px" class="glide">
				Large Previews:<br>
				<div class="glide__arrows">
					<button class="glide__arrow prev" data-glide-dir="<">prev</button>
					<button class="glide__arrow next" data-glide-dir=">">next</button>
				</div>
				<div class="glide__wrapper">
					<ul class="glide__track" id="onTrack">
					</ul>
				</div>
				<div class="glide__bullets"></div>
				</div>
			</td>
			<td id="myChoice">
				
			</td>
		</tr>
	</table>
	<div id="buttons">
		<button id="back" onclick="backOptions()">Back</button>
		<button id="next" onclick="nextOptions()">Next</button>
	</div>
	<style>
		body {
			background-color: #FFBB22;
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
	<script>
		$("#buttons").hide();
		$("#logout_button").hide();
		////////facebook/////////
		
		function statusChangeCallback(response) {
			// The response object is returned with a status field that lets the
			// app know the current login status of the person.
			// Full docs on the response object can be found in the documentation
			// for FB.getLoginStatus().
			if (response.status === 'connected') {
			  // Logged into your app and Facebook.
			  useAPI();
			} else if (response.status === 'not_authorized') {
			  // The person is logged into Facebook, but not your app.
			} else {
			  // The person is not logged into Facebook, so we're not sure if
			  // they are logged into this app or not.
			}
		  }

		  // This function is called when someone finishes with the Login
		  // Button.  See the onlogin handler attached to it in the sample
		  // code below.
		  function checkLoginState() {
			FB.getLoginStatus(function(response) {
			  statusChangeCallback(response);
			});
		  }

		  // FB.getLoginStatus().  This function gets the state of the
		  // person visiting this page and can return one of three states to
		  // the callback you provide.  They can be:
		  //
		  // 1. Logged into your app ('connected')
		  // 2. Logged into Facebook, but not your app ('not_authorized')
		  // 3. Not logged into Facebook and can't tell if they are logged into
		  //    your app or not.
		  //
		  // These three cases are handled in the callback function.
		  $("#login_button").click(function(){
			FB.login(function(response){
				statusChangeCallback(response);
			});
		  });
		  // on login success 
		  function useAPI() {
			FB.api('/me', function(response) {
					var me_id = response.id;
					$("#buttons").show();
					$("#wholeIntro").hide();
			});
		  }
		
		//////////////////
		var slider;
		var slider_api;
		function shuffle(array) {
			var rand, index = -1,
				length = array.length,
				result = Array(length);
			while (++index < length) {
				rand = Math.floor(Math.random() * (index + 1));
				result[index] = result[rand];
				result[rand] = array[index];
			}
			return result;
		}
		function backOptions() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if (avatarOptions.getAttribute("class")=="animal"){
				avatarOptions.innerHTML = 'Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">';
				track.innerHTML = "";
			}
			else if (avatarOptions.getAttribute("class")=="animal1"){
				var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake"></li>Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger"></li>Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
				animalsObjects = shuffle(animalsObjects);
				animalsObjects = animalsObjects.join("");
				avatarOptions.innerHTML = animalsObjects;
				track.innerHTML = "";
				slider_api = slider.data("glide_api");
				slider_api.destroy();
				document.getElementById("buttons").innerHTML = '<button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>'; 
			}
		}
		function nextOptions() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake"></li>Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger"></li>Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			document.getElementById("next").innerHTML = "Ok";
			//animalDivs = shuffle(animalDivs);
			//animalDivs = animalDivs.join("");
			if(document.getElementById("notHuman").checked == false){
				window.location.replace("human2.php");
			}
			else {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				//itemPreview.innerHTML = animalDivs;
				avatarOptions.setAttribute("class", "animal");
			}
		}
		function checkWolf() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("wolf2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/wolf1.svg" alt="first wolf"></li><li class="glide__slide"><img  width="280" height="280" src="svg/wolf2.svg" alt="second wolf"></li><li class="glide__slide"><img  width="280" height="280" src="svg/wolf3.svg" alt="third wolf"></li><li class="glide__slide"><img  width="280" height="280" src="svg/wolf4.svg" alt="fourth wolf"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/wolf5.svg" alt="fifth wolf"></li><li class="glide__slide"><img  width="280" height="280" src="svg/wolf6.svg" alt="sixth wolf"></li><li class="glide__slide"><img  width="280" height="280" src="svg/wolf7.svg" alt="seventh wolf"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkAnt() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("ant2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/ant1.svg" alt="first ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant2.svg" alt="second ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant3.svg" alt="third ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant4.svg" alt="fourth ant"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/ant5.svg" alt="fifth ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant6.svg" alt="sixth ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant7.svg" alt="seventh ant"></li><li class="glide__slide"><img  width="280" height="280" src="svg/ant8.svg" alt="eighth ant"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkBee() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("bee2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/bee1.svg" alt="first bee"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bee2.svg" alt="second bee"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bee3.svg" alt="third bee"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bee4.svg" alt="fourth bee"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bee5.svg" alt="fifth bee"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bee6.svg" alt="sixth bee"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bee7.svg" alt="seventh bee"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkBat() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("bat2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/bat1.svg" alt="first bat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bat2.svg" alt="second bat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bat3.svg" alt="third bat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bat4.svg" alt="fourth bat"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bat5.svg" alt="fifth bat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bat6.svg" alt="sixth bat"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkBear() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("bear2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/bear1.svg" alt="first  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear2.svg" alt="second  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear3.svg" alt="third  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear4.svg" alt="fourth  bear"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bear5.svg" alt="fifth  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear6.svg" alt="sixth  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear7.svg" alt="seventh  bear"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bear8.svg" alt="eighth  bear"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bear9.svg" alt="ninth  bear"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkBird() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("bird2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/bird1.svg" alt="first bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird2.svg" alt="second bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird3.svg" alt="third bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird4.svg" alt="fourth bird"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bird5.svg" alt="fifth bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird6.svg" alt="sixth bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird7.svg" alt="seventh bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird8.svg" alt="eighth bird"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bird9.svg" alt="ninth bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird10.svg" alt="tenth bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird11.svg" alt="eleventh bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird12.svg" alt="twelfth bird"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/bird13.svg" alt="thirteenth bird"></li><li class="glide__slide"><img  width="280" height="280" src="svg/bird14.svg" alt="fourteenth bird"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkBlackDragon() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("blackDragon2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/blackDragon1.svg" alt="first blackDragon"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkWaterDragon() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("waterDragon2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/waterDragon1.svg" alt="first waterDragon"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkCat() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("cat2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/cat1.svg" alt="first cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat2.svg" alt="second cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat3.svg" alt="third cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat4.svg" alt="fourth cat"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/cat5.svg" alt="fifth cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat6.svg" alt="sixth cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat7.svg" alt="seventh cat"></li><li class="glide__slide"><img  width="280" height="280" src="svg/cat8.svg" alt="eighth cat"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/cat9.svg" alt="ninth cat"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkDaisy() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("daisy2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/daisy1.svg" alt="first daisy"></li><li class="glide__slide"><img  width="280" height="280" src="svg/daisy2.svg" alt="second daisy"></li><li class="glide__slide"><img  width="280" height="280" src="svg/daisy3.svg" alt="third daisy"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkButterfly() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("butterfly2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/butterfly1.svg" alt="first butterfly"></li><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly2.svg" alt="second butterfly"></li><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly3.svg" alt="third butterfly"></li><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly4.svg" alt="fourth butterfly"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly5.svg" alt="fifth butterfly"></li><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly6.svg" alt="sixth butterfly"></li><li class="glide__slide"><img  width="280" height="280" src="svg/butterfly7.svg" alt="seventh butterfly"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkDeer() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("deer2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/deer1.svg" alt="first deer"></li><li class="glide__slide"><img  width="280" height="280" src="svg/deer2.svg" alt="second deer"></li><li class="glide__slide"><img  width="280" height="280" src="svg/deer3.svg" alt="third deer"></li><li class="glide__slide"><img  width="280" height="280" src="svg/deer4.svg" alt="fourth deer"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkDog() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("dog2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/dog1.svg" alt="first dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog2.svg" alt="second dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog3.svg" alt="third dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog4.svg" alt="fourth dog"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/dog5.svg" alt="fifth dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog6.svg" alt="sixth dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog7.svg" alt="seventh dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog8.svg" alt="eighth dog"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/dog9.svg" alt="ninth dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog10.svg" alt="tenth dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog11.svg" alt="eleventh dog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/dog12.svg" alt="twelfth dog"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkWingFeathers() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("wingFeathers2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/feathers1.svg" alt="first  feathers"></li><li class="glide__slide"><img  width="280" height="280" src="svg/feathers2.svg" alt="second  feathers"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkFrog() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("frog2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/frog1.svg" alt="first frog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/frog2.svg" alt="second frog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/frog3.svg" alt="third frog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/frog4.svg" alt="fourth frog"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/frog5.svg" alt="fifth frog"></li><li class="glide__slide"><img  width="280" height="280" src="svg/frog6.svg" alt="sixth frog"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkFox() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("fox2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/fox1.svg" alt="first fox"></li><li class="glide__slide"><img  width="280" height="280" src="svg/fox2.svg" alt="second fox"></li><li class="glide__slide"><img  width="280" height="280" src="svg/fox3.svg" alt="third fox"></li><li class="glide__slide"><img  width="280" height="280" src="svg/fox4.svg" alt="fourth fox"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/fox5.svg" alt="fifth fox"></li><li class="glide__slide"><img  width="280" height="280" src="svg/fox6.svg" alt="sixth fox"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkMoon() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("moon2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/moon1.svg" alt="first moon"></li><li class="glide__slide"><img  width="280" height="280" src="svg/moon2.svg" alt="second moon"></li><li class="glide__slide"><img  width="280" height="280" src="svg/moon3.svg" alt="third moon"></li><li class="glide__slide"><img  width="280" height="280" src="svg/moon4.svg" alt="fourth moon"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkMosquito() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("mosquito2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/mosquito1.svg" alt="first mosquito"></li><li class="glide__slide"><img  width="280" height="280" src="svg/mosquito2.svg" alt="second mosquito"></li><li class="glide__slide"><img  width="280" height="280" src="svg/mosquito3.svg" alt="third mosquito"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkRabbit() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("rabbit2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/rabbit1.svg" alt="first rabbit"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit2.svg" alt="second rabbit"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit3.svg" alt="third rabbit"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit4.svg" alt="fourth rabbit"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit5.svg" alt="fifth rabbit"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit6.svg" alt="sixth rabbit"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rabbit7.svg" alt="seventh rabbit"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkRainbow() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("rainbow2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/rainbow1.svg" alt="first rainbow"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rainbow2.svg" alt="second rainbow"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rainbow3.svg" alt="third rainbow"></li><li class="glide__slide"><img  width="280" height="280" src="svg/rainbow4.svg" alt="fourth rainbow"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkSalamander() {
			var avatarOptions = document.getElementById("avatarOptions");
			
			var track = document.getElementById("onTrack");
			if(document.getElementById("salamander2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/salamander1.svg" alt="first salamander"></li><li class="glide__slide"><img  width="280" height="280" src="svg/salamander2.svg" alt="second salamander"></li><li class="glide__slide"><img  width="280" height="280" src="svg/salamander3.svg" alt="third salamander"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkSnake() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("snake2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/snake1.svg" alt="first snake"></li><li class="glide__slide"><img  width="280" height="280" src="svg/snake2.svg" alt="second snake"></li><li class="glide__slide"><img  width="280" height="280" src="svg/snake3.svg" alt="third snake"></li><li class="glide__slide"><img  width="280" height="280" src="svg/snake4.svg" alt="fourth snake"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/snake5.svg" alt="fifth snake"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		
		///goto: replace </li><li with </li><input type radido animal name value blank<li>
		function checkSpiral() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("spiral2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/spiral1.svg" alt="first spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral2.svg" alt="second spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral3.svg" alt="third spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral4.svg" alt="fourth spiral"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/spiral5.svg" alt="fifth spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral6.svg" alt="sixth spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral7.svg" alt="seventh spiral"></li><li class="glide__slide"><img  width="280" height="280" src="svg/spiral8.svg" alt="eighth spiral"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/spiral9.svg" alt="ninth spiral"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkSquare() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("square2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/square1.svg" alt="first square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square2.svg" alt="second square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square3.svg" alt="third square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square4.svg" alt="fourth square"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/square5.svg" alt="fifth square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square6.svg" alt="sixth square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square7.svg" alt="seventh square"></li><li class="glide__slide"><img  width="280" height="280" src="svg/square8.svg" alt="eighth square"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkSun() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("sun2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/sun1.svg" alt="first sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun2.svg" alt="second sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun3.svg" alt="third sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun4.svg" alt="fourth sun"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/sun5.svg" alt="fifth sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun6.svg" alt="sixth sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun7.svg" alt="seventh sun"></li><li class="glide__slide"><img  width="280" height="280" src="svg/sun8.svg" alt="eighth sun"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/sun9.svg" alt="ninth sun"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkTiger() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("tiger2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/tiger1.svg" alt="first tiger"></li><li class="glide__slide"><img  width="280" height="280" src="svg/tiger2.svg" alt="second tiger"></li><li class="glide__slide"><img  width="280" height="280" src="svg/tiger3.svg" alt="third tiger"></li><li class="glide__slide"><img  width="280" height="280" src="svg/tiger4.svg" alt="fourth tiger"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/tiger5.svg" alt="fifth tiger"></li><li class="glide__slide"><img  width="280" height="280" src="svg/tiger6.svg" alt="sixth tiger"></li><li class="glide__slide"><img  width="280" height="280" src="svg/tiger7.svg" alt="seventh tiger"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkTriangle() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("triangle2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img  width="280" height="280" src="svg/triangle1.svg" alt="first triangle"></li><li class="glide__slide"><img  width="280" height="280" src="svg/triangle2.svg" alt="second triangle"></li><li class="glide__slide"><img  width="280" height="280" src="svg/triangle3.svg" alt="third triangle"></li><li class="glide__slide"><img  width="280" height="280" src="svg/triangle4.svg" alt="fourth triangle"></li><br><li class="glide__slide"><img  width="280" height="280" src="svg/triangle5.svg" alt="fifth triangle"></li><li class="glide__slide"><img width="280" height="280" src="svg/triangle6.svg" alt="sixth triangle"></li>';
				slider = $("#result").glide({
					type: "carousel"
				});
				avatarOptions.setAttribute("class", "animal1");
				avatarOptions.innerHTML = "";
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function checkYinyang() {
			var avatarOptions = document.getElementById("avatarOptions");
			var track = document.getElementById("onTrack");
			if(document.getElementById("yinyang2").checked == true){
				track.innerHTML = '<li class="glide__slide"><img id="yinyang" width="280" height="280" src="svg/yinyang.svg" alt="yin yang"></li>';
				slider = $("#result").glide({
					type: "carousel" 
				});
				avatarOptions.setAttribute("class", "animal1");
				avatarOptions.innerHTML = "";
				transferData();
			}
			$("#avatarOptions").hide();
		}
		function transferData(){    
            var index = $("img").length - 4;
			var newIndex = Math.floor(Math.random()*index);
			var src = $("img").eq(newIndex).attr("src");
			//selection on next page
            src = src.substr(3, src.length-7);
            //document.getElementById("choose").innerHTML = src.toString();
            document.getElementById("buttons").innerHTML = "Choose random selection (you can change your selection on the next page.)<br><form action='randomizer.php' method='get'><input type='hidden' name='num' value ='"+index.toString()+"'><input type='hidden' name='image' value ='"+src+"'><input id='mySubmit' type='submit' name='submit' value='Randomize!'></form>";
			document.getElementById("buttons").style.top = "360px";
		}
	</script>
	<div id="choose"></div>
</body>
</html>