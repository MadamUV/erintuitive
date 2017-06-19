<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/touch_punch.js"></script>
	<title>Erintuitive's Psychic Place</title>
</head>
<body>
	<!-- animal or human? -->
	<table width="750px">
	<td>
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="init">
					Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">
				</div>
			</td>
			<td id="itemPreview" width="40%">
			</td>
			<td id="result" ondrop="drop(event)" ondragover="allowDrop(event)" width="550px" style="border-style: dashed; border-width: 6px;">
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
		#avatarOptions {
			position: relative;
			float: left;
		}
		#buttons {
			position: fixed;
			top: 444px;
			left: 40%;
		}
		#itemPreview {
			vertical-align: text-top;
			width: 50%;
			padding: 4px;
			border-width: 5px;
			border-style: solid;
		}
		#avatarOptions {
			height: 450px;
		}
	</style>
	<script>
		var count = 0;
		var gender = '';
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
			var itemPreview = document.getElementById("itemPreview");
			var relativeContainer = document.getElementById("relativeContainer");
			var result = document.getElementById("result");
			itemPreview.style.paddingLeft = "0px";
			if (avatarOptions.getAttribute("class")=="human" || avatarOptions.getAttribute("class")=="animal"){
				avatarOptions.innerHTML = 'Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">';
				itemPreview.innerHTML = "";
				avatarOptions.style.overflow = "hidden";
				relativeContainer.innerHTML = "";
				result.style.padding = "0px";
			}
			else if (avatarOptions.getAttribute("class")=="animal1"){
				var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
				animalsObjects = shuffle(animalsObjects);
				animalsObjects = animalsObjects.join("");
				avatarOptions.innerHTML = animalsObjects;
				avatarOptions.style.overflow = "scroll";
			}
		}
		function nextOptions() {
			count+=1;
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			var result = document.getElementById("result");
			var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
			//var animalDivs = ['<div id="wolf"><div>', '<div id="ant"><div>', '<div id="bee"><div>', '<div id="blackbird"><div>', '<div id="bird"><div>', '<div id="falcon"><div>', '<div id="sun"><div>', '<div id="salamander"><div>', '<div id="yinyang"><div>', '<div id="cat"><div>', '<div id="bat"><div>', '<div id="spiral"><div>', '<div id="mosquito"><div>', '<div id="daisy"><div>', '<div id="rainbow"><div>', '<div id="moon"><div>', '<div id="snake"><div>', '<div id="blackDragon"><div>', '<div id="waterDragon"><div>', '<div id="butterfly"><div>', '<div id="bear"><div>', '<div id="wingFeathers"><div>', '<div id="deer"><div>', '<div id="rabbit"><div>', '<div id="tiger"><div>', '<div id="frog"><div>', '<div id="dog"><div>', '<div id="triangle"><div>', '<div id="square"><div>', '<div id="fox"><div>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			//animalDivs = shuffle(animalDivs);
			//animalDivs = animalDivs.join("");
			if(document.getElementById("notHuman").checked == false && count==1){
				window.location.replace("human.php");
			}
			if (document.getElementById("notHuman").checked) {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				//itemPreview.innerHTML = animalDivs;
				document.getElementById("avatarOptions").setAttribute("class", "animal");
				avatarOptions.style.overflow = "scroll";
			}
		}
		function checkWolf() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("wolf2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf1.svg" alt="first wolf"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf2.svg" alt="second wolf"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf3.svg" alt="third wolf"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf4.svg" alt="fourth wolf"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf5.svg" alt="fifth wolf"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf6.svg" alt="sixth wolf"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/wolf7.svg" alt="seventh wolf">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkAnt() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("ant2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant1.svg" alt="first ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant2.svg" alt="second ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant3.svg" alt="third ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant4.svg" alt="fourth ant"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant5.svg" alt="fifth ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant6.svg" alt="sixth ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant7.svg" alt="seventh ant"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/ant8.svg" alt="eighth ant">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkBee() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("bee2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee1.svg" alt="first bee"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee2.svg" alt="second bee"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee3.svg" alt="third bee"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee4.svg" alt="fourth bee"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee5.svg" alt="fifth bee"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee6.svg" alt="sixth bee"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bee7.svg" alt="seventh bee">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkBat() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("bat2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat1.svg" alt="first bat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat2.svg" alt="second bat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat3.svg" alt="third bat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat4.svg" alt="fourth bat"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat5.svg" alt="fifth bat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bat6.svg" alt="sixth bat">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkBear() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("bear2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear1.svg" alt="first bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear2.svg" alt="second bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear3.svg" alt="third bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear4.svg" alt="fourth bear"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear5.svg" alt="fifth bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear6.svg" alt="sixth bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear7.svg" alt="seventh bear"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear8.svg" alt="eighth bear"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bear9.svg" alt="ninth bear">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkBird() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("bird2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird1.svg" alt="first bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird2.svg" alt="second bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird3.svg" alt="third bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird4.svg" alt="fourth bird"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird5.svg" alt="fifth bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird6.svg" alt="sixth bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird7.svg" alt="seventh bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird8.svg" alt="eighth bird"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird9.svg" alt="ninth bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird10.svg" alt="tenth bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird11.svg" alt="eleventh bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird12.svg" alt="twelfth bird"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird13.svg" alt="thirteenth bird"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/bird14.svg" alt="fourteenth bird">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkBlackDragon() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("blackDragon2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/blackDragon1.svg" alt="first blackDragon">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkWaterDragon() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("waterDragon2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/waterDragon1.svg" alt="first waterDragon">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkCat() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("cat2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat1.svg" alt="first cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat2.svg" alt="second cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat3.svg" alt="third cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat4.svg" alt="fourth cat"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat5.svg" alt="fifth cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat6.svg" alt="sixth cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat7.svg" alt="seventh cat"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat8.svg" alt="eighth cat"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/cat9.svg" alt="ninth cat">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkDaisy() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("daisy2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/daisy1.svg" alt="first daisy"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/daisy2.svg" alt="second daisy"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/daisy3.svg" alt="third daisy">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkButterfly() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("butterfly2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly1.svg" alt="first butterfly"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly2.svg" alt="second butterfly"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly3.svg" alt="third butterfly"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly4.svg" alt="fourth butterfly"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly5.svg" alt="fifth butterfly"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly6.svg" alt="sixth butterfly"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/butterfly7.svg" alt="seventh butterfly">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkDeer() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("deer2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/deer1.svg" alt="first deer"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/deer2.svg" alt="second deer"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/deer3.svg" alt="third deer"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/deer4.svg" alt="fourth deer">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkDog() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("dog2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog1.svg" alt="first dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog2.svg" alt="second dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog3.svg" alt="third dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog4.svg" alt="fourth dog"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog5.svg" alt="fifth dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog6.svg" alt="sixth dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog7.svg" alt="seventh dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog8.svg" alt="eighth dog"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog9.svg" alt="ninth dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog10.svg" alt="tenth dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog11.svg" alt="eleventh dog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/dog12.svg" alt="twelfth dog">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkWingFeathers() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("wingFeathers2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/feathers1.svg" alt="first feathers"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/feathers2.svg" alt="second feathers">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkFrog() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("frog2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog1.svg" alt="first frog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog2.svg" alt="second frog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog3.svg" alt="third frog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog4.svg" alt="fourth frog"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog5.svg" alt="fifth frog"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/frog6.svg" alt="sixth frog">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkFox() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("fox2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox1.svg" alt="first fox"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox2.svg" alt="second fox"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox3.svg" alt="third fox"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox4.svg" alt="fourth fox"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox5.svg" alt="fifth fox"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/fox6.svg" alt="sixth fox">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkMoon() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("moon2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/moon1.svg" alt="first moon"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/moon2.svg" alt="second moon"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/moon3.svg" alt="third moon"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/moon4.svg" alt="fourth moon">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkMosquito() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("mosquito2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/mosquito1.svg" alt="first mosquito"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/mosquito2.svg" alt="second mosquito"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/mosquito3.svg" alt="third mosquito">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkRabbit() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("rabbit2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit1.svg" alt="first rabbit"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit2.svg" alt="second rabbit"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit3.svg" alt="third rabbit"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit4.svg" alt="fourth rabbit"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit5.svg" alt="fifth rabbit"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit6.svg" alt="sixth rabbit"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rabbit7.svg" alt="seventh rabbit">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkRainbow() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("rainbow2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rainbow1.svg" alt="first rainbow"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rainbow2.svg" alt="second rainbow"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rainbow3.svg" alt="third rainbow"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/rainbow4.svg" alt="fourth rainbow">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkSalamander() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("salamander2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/salamander1.svg" alt="first salamander"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/salamander2.svg" alt="second salamander"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/salamander3.svg" alt="third salamander">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkSnake() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("snake2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/snake1.svg" alt="first snake"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/snake2.svg" alt="second snake"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/snake3.svg" alt="third snake"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/snake4.svg" alt="fourth snake"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/snake5.svg" alt="fifth snake">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkSpiral() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("spiral2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral1.svg" alt="first spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral2.svg" alt="second spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral3.svg" alt="third spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral4.svg" alt="fourth spiral"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral5.svg" alt="fifth spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral6.svg" alt="sixth spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral7.svg" alt="seventh spiral"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral8.svg" alt="eighth spiral"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/spiral9.svg" alt="ninth spiral">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkSquare() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("square2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square1.svg" alt="first square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square2.svg" alt="second square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square3.svg" alt="third square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square4.svg" alt="fourth square"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square5.svg" alt="fifth square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square6.svg" alt="sixth square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square7.svg" alt="seventh square"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/square8.svg" alt="eighth square">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkSun() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("sun2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun1.svg" alt="first sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun2.svg" alt="second sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun3.svg" alt="third sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun4.svg" alt="fourth sun"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun5.svg" alt="fifth sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun6.svg" alt="sixth sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun7.svg" alt="seventh sun"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun8.svg" alt="eighth sun"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/sun9.svg" alt="ninth sun">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkTiger() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("tiger2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger1.svg" alt="first tiger"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger2.svg" alt="second tiger"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger3.svg" alt="third tiger"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger4.svg" alt="fourth tiger"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger5.svg" alt="fifth tiger"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger6.svg" alt="sixth tiger"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/tiger7.svg" alt="seventh tiger">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkTriangle() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("triangle2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle1.svg" alt="first triangle"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle2.svg" alt="second triangle"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle3.svg" alt="third triangle"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle4.svg" alt="fourth triangle"><br><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle5.svg" alt="fifth triangle"><img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/triangle6.svg" alt="sixth triangle">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function checkYinyang() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("yinyang2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" width="80" height="80" src="svg/yinyang.svg" alt="yin yang">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function allowDrop(ev) {
			if(document.getElementById("avatarOptions").getAttribute("class")!="human"){
				ev.preventDefault();
			}
		}

		function drag(ev) {
			ev.target.id = "taskId";
			ev.dataTransfer.setData("taskItem", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("taskItem");
			var element = document.getElementById(data);
			element.setAttribute("width","280");
			element.setAttribute("height", "280");
			element.setAttribute("class", "swap");
			var src = element.getAttribute("src");
			src = src.substring(0, src.length-4);
			var indexToString = ($("img").length).toString();
			document.getElementById("buttons").innerHTML = '<form action="randomizer.php" method="get"><input type="hidden" name="image" value="'+src+'"><input type="hidden" name="num" value="'+indexToString+'"><input type="submit" value="next"></form>';
			ev.target.appendChild(element);
			element.removeAttribute('id');
			document.getElementById("itemPreview").innerHTML = "Now you have your animal<br>or object, please click next.<br>You can always start over.";
			document.getElementById("avatarOptions").innerHTML = "";
		}
		$("img").draggable();
		/*
		function clicked(this){
			var src = (this).getAttribute("src");
			src = src.substring(0, src.length-4);
			document.getElementById("buttons").innerHTML = '<form action="randomizer.php" method="get"><input type="hidden" name="image" value="'+src+'"><input type="submit" value="next"></form>';
			document.getElementById("result").appendChild(this);
		}*/
	</script>
	<!--


<img onclick="clicked(this)" ondragstart="drag(event)" draggable="true" id="drag1" src="img_logo.gif" draggable="true"
ondragstart="drag(event)" width="336" height="69"> -->
</body>
</html>