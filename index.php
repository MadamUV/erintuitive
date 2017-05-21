<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<title>Erintuitive's Psychic Place</title>
</head>
<body>
	<!-- animal or human? -->
	<table>
	<td>
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="init">
					Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">
				</div>
			</td>
			<td id="itemPreview" width="650px">
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
			bottom: 20px;
			left: 50%;
		}
		#itemPreview {
			vertical-align: text-top;
			width: 50%;
			padding: 25px;
			border-width: 5px;
			border-style: solid;
		}
		img {
			padding: 3px;
		}
	</style>
	<script>
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
			if (avatarOptions.getAttribute("class")=="human" || avatarOptions.getAttribute("class")=="animal"){
				avatarOptions.innerHTML = 'Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">';
				itemPreview.innerHTML = "";
			}
			else if (avatarOptions.getAttribute("class")=="animal1"){
				var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
				animalsObjects = shuffle(animalsObjects);
				animalsObjects = animalsObjects.join("");
				avatarOptions.innerHTML = animalsObjects;
			}
			else if (avatarOptions.getAttribute("class")=="human1"){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
			}
		}
		function nextOptions() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
			//var animalDivs = ['<div id="wolf"><div>', '<div id="ant"><div>', '<div id="bee"><div>', '<div id="blackbird"><div>', '<div id="bird"><div>', '<div id="falcon"><div>', '<div id="sun"><div>', '<div id="salamander"><div>', '<div id="yinyang"><div>', '<div id="cat"><div>', '<div id="bat"><div>', '<div id="spiral"><div>', '<div id="mosquito"><div>', '<div id="daisy"><div>', '<div id="rainbow"><div>', '<div id="moon"><div>', '<div id="snake"><div>', '<div id="blackDragon"><div>', '<div id="waterDragon"><div>', '<div id="butterfly"><div>', '<div id="bear"><div>', '<div id="wingFeathers"><div>', '<div id="deer"><div>', '<div id="rabbit"><div>', '<div id="tiger"><div>', '<div id="frog"><div>', '<div id="dog"><div>', '<div id="triangle"><div>', '<div id="square"><div>', '<div id="fox"><div>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			//animalDivs = shuffle(animalDivs);
			//animalDivs = animalDivs.join("");
			if(document.getElementById("notHuman").checked == false){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
				avatarOptions.setAttribute("class", "human");
			}
			else {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				//itemPreview.innerHTML = animalDivs;
				document.getElementById("avatarOptions").setAttribute("class", "animal");
			}
			if(document.getElementById("check").getAttribute("value")=="human"){
				avatarOptions.innerHTML = '<input type="checkbox" id="top" name="top" value="top">I want to wear a top<br><input type="checkbox" id="bottom" name="bottom" value="bottom">I want to wear a bottom<br><input type="checkbox" id="hat" name="hat" value="hat">I want to wear headgear<br><input type="checkbox" id="gloves" name="gloves" value="gloves">I want to wear gloves<br><input type="checkbox" id="ears" name="ears" value="ears">I want to wear special ears or earrings<br><input type="checkbox" id="necklace" name="necklace" value="necklace">I want to wear neckwear<br><input type="checkbox" id="shoes" name="shoes" value="shoes">I want to wear shoes<br><input type="checkbox" id="eyewear" name="eyewear" value="eyewear">I want eyewear<br><div id="top1">Top color<input type="color" name="topColor" value="#ff0000"><br></div><div id="bottom1">Bottom color<input type="color" name="bottomColor" value="#ff0000"><br></div><div id="hat1">Hat color<input type="color" name="hatColor" value="#ff0000"><br></div><div id="gloves1">Glove color<input type="color" name="gloveColor" value="#ff0000"><br></div><div id="ears1">Custom ears/earring color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="necklace1">Necklace color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="shoes1">Shoe color<input type="color" name="shoeColor" value="#ff0000"><br></div><div id="eyewear1">Eyewear color<input type="color" name="eyewearColor" value="#ff0000"><br></div><div id="robe1">Robe/dress color<input type="color" name="robeColor" value="#ff0000"><br></div>';
				//<option value="shirtStripe1">Choose a shirt stripe</option><option value="shirtStripe2">Choose a second shirt stripe</option><option value="bottomStripe1">Choose a pants/skirt stripe color</option><option value="bottomStripe2">Choose another pants/skirt stripe color</option>
			}
		}
		function checkWolf() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			if(document.getElementById("wolf2").checked == true){
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf1.svg" alt="first wolf"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf2.svg" alt="second wolf"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf3.svg" alt="third wolf"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf4.svg" alt="fourth wolf"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf5.svg" alt="fifth wolf"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf6.svg" alt="sixth wolf"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/wolf7.svg" alt="seventh wolf">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant1.svg" alt="first ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant2.svg" alt="second ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant3.svg" alt="third ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant4.svg" alt="fourth ant"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant5.svg" alt="fifth ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant6.svg" alt="sixth ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant7.svg" alt="seventh ant"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/ant8.svg" alt="eighth ant">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee1.svg" alt="first bee"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee2.svg" alt="second bee"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee3.svg" alt="third bee"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee4.svg" alt="fourth bee"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee5.svg" alt="fifth bee"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee6.svg" alt="sixth bee"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bee7.svg" alt="seventh bee">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat1.svg" alt="first bat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat2.svg" alt="second bat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat3.svg" alt="third bat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat4.svg" alt="fourth bat"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat5.svg" alt="fifth bat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bat6.svg" alt="sixth bat">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear1.svg" alt="first bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear2.svg" alt="second bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear3.svg" alt="third bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear4.svg" alt="fourth bear"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear5.svg" alt="fifth bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear6.svg" alt="sixth bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear7.svg" alt="seventh bear"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear8.svg" alt="eighth bear"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bear9.svg" alt="ninth bear">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird1.svg" alt="first bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird2.svg" alt="second bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird3.svg" alt="third bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird4.svg" alt="fourth bird"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird5.svg" alt="fifth bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird6.svg" alt="sixth bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird7.svg" alt="seventh bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird8.svg" alt="eighth bird"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird9.svg" alt="ninth bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/bird10.svg" alt="tenth bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/blackbird1.svg" alt="eleventh bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/blackbird2.svg" alt="twelfth bird"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/blackbird3.svg" alt="thirteenth bird"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/falcon1.svg" alt="fourteenth bird">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/blackDragon1.svg" alt="first blackDragon">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/waterDragon1.svg" alt="first waterDragon">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat1.svg" alt="first cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat2.svg" alt="second cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat3.svg" alt="third cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat4.svg" alt="fourth cat"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat5.svg" alt="fifth cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat6.svg" alt="sixth cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat7.svg" alt="seventh cat"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat8.svg" alt="eighth cat"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/cat9.svg" alt="ninth cat">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/daisy1.svg" alt="first daisy"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/daisy2.svg" alt="second daisy"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/daisy3.svg" alt="third daisy">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly1.svg" alt="first butterfly"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly2.svg" alt="second butterfly"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly3.svg" alt="third butterfly"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly4.svg" alt="fourth butterfly"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly5.svg" alt="fifth butterfly"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly6.svg" alt="sixth butterfly"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/butterfly7.svg" alt="seventh butterfly">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/deer1.svg" alt="first deer"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/deer2.svg" alt="second deer"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/deer3.svg" alt="third deer"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/deer4.svg" alt="fourth deer">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog1.svg" alt="first dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog2.svg" alt="second dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog3.svg" alt="third dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog4.svg" alt="fourth dog"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog5.svg" alt="fifth dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog6.svg" alt="sixth dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog7.svg" alt="seventh dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog8.svg" alt="eighth dog"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog9.svg" alt="ninth dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog10.svg" alt="tenth dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog11.svg" alt="eleventh dog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/dog12.svg" alt="twelfth dog">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/feathers1.svg" alt="first feathers"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/feathers2.svg" alt="second feathers">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog1.svg" alt="first frog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog2.svg" alt="second frog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog3.svg" alt="third frog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog4.svg" alt="fourth frog"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog5.svg" alt="fifth frog"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/frog6.svg" alt="sixth frog">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox1.svg" alt="first fox"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox2.svg" alt="second fox"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox3.svg" alt="third fox"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox4.svg" alt="fourth fox"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox5.svg" alt="fifth fox"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/fox6.svg" alt="sixth fox">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/moon1.svg" alt="first moon"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/moon2.svg" alt="second moon"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/moon3.svg" alt="third moon"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/moon4.svg" alt="fourth moon">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/mosquito1.svg" alt="first mosquito"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/mosquito2.svg" alt="second mosquito"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/mosquito3.svg" alt="third mosquito">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit1.svg" alt="first rabbit"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit2.svg" alt="second rabbit"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit3.svg" alt="third rabbit"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit4.svg" alt="fourth rabbit"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit5.svg" alt="fifth rabbit"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit6.svg" alt="sixth rabbit"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rabbit7.svg" alt="seventh rabbit">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rainbow1.svg" alt="first rainbow"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rainbow2.svg" alt="second rainbow"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rainbow3.svg" alt="third rainbow"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/rainbow4.svg" alt="fourth rainbow">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/salamander1.svg" alt="first salamander"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/salamander2.svg" alt="second salamander"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/salamander3.svg" alt="third salamander">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/snake1.svg" alt="first snake"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/snake2.svg" alt="second snake"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/snake3.svg" alt="third snake"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/snake4.svg" alt="fourth snake"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/snake5.svg" alt="fifth snake">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral1.svg" alt="first spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral2.svg" alt="second spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral3.svg" alt="third spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral4.svg" alt="fourth spiral"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral5.svg" alt="fifth spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral6.svg" alt="sixth spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral7.svg" alt="seventh spiral"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiral8.svg" alt="eighth spiral"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/spiralSun.svg" alt="ninth spiral">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square1.svg" alt="first square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square2.svg" alt="second square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square3.svg" alt="third square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square4.svg" alt="fourth square"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square5.svg" alt="fifth square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square6.svg" alt="sixth square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square7.svg" alt="seventh square"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/square8.svg" alt="eighth square">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun1.svg" alt="first sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun2.svg" alt="second sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun3.svg" alt="third sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun4.svg" alt="fourth sun"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun5.svg" alt="fifth sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun6.svg" alt="sixth sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun7.svg" alt="seventh sun"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun8.svg" alt="eighth sun"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/sun9.svg" alt="ninth sun">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger1.svg" alt="first tiger"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger2.svg" alt="second tiger"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger3.svg" alt="third tiger"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger4.svg" alt="fourth tiger"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger5.svg" alt="fifth tiger"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger6.svg" alt="sixth tiger"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/tiger7.svg" alt="seventh tiger">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle1.svg" alt="first triangle"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle2.svg" alt="second triangle"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle3.svg" alt="third triangle"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle4.svg" alt="fourth triangle"><br><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle5.svg" alt="fifth triangle"><img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/triangle6.svg" alt="sixth triangle">';
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
				document.getElementById("itemPreview").innerHTML = '<img ondragstart="drag(event)" draggable="true" width="130" height="130" src="svg/yinyang.svg" alt="yin yang">';
				return true;
			}
			else {
				document.getElementById("itemPreview").innerHTML = "";
				return true;
			}
		}
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.target.id = "taskId";
			ev.dataTransfer.setData("taskItem", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("taskItem");
			var element = document.getElementById(data);
			document.getElementById("itemPreview").appendChild(element);
			element.setAttribute("width","500");
			element.setAttribute("height", "500");
			ev.target.appendChild(element);
			element.removeAttribute('id');
		}
	</script>
	<!--


<img ondragstart="drag(event)" draggable="true" id="drag1" src="img_logo.gif" draggable="true"
ondragstart="drag(event)" width="336" height="69"> -->
</body>
</html>