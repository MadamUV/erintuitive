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
		<tr width="10%">
			<div id="avatarOptions" class="init">
				Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">
			</div>
		</tr>
		<tr id="itemPreview" width="650px">
		</tr>
		<tr id="result" width="550px">
		</tr>
	</table>
	<div id="buttons">
		<button id="back" onclick="backOptions()">Back</button>
		<button id="next" onclick="nextOptions()">Next</button>
	</div>
	<style>
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
			overflow: scroll;
			width: 50%;
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
				var animalsObjects = ['<input type="checkbox" name="animal" onchange="checkAnimal()" value="wolf" id="wolf2">Wolf<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="ant2" value="ant">Ant<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bee2" value="bee">Bee<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="blackbird2" value="blackbird">Blackbird<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bird2" value="bird">Bird<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="falcon2" value="falcon">Falcon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="sun2" value="sun">Sun<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="salamander2" value="salamander">Salamander<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="cat2" value="cat">Cat<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bat2" value="bat">Bat<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="spiral2" value="spiral">Spiral<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="daisy2" value="daisy">Daisy<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="moon2" value="moon">Moon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="snake2" value="snake">Snake<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bear2" value="bear">Bear<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="deer2" value="deer">Deer<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="tiger2" value="tiger">Tiger<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="frog2" value="frog">Frog<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="dog2" value="dog">Dog<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="triangle2" value="triangle">Triangle<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="square2" value="square">Square<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="fox2" value="fox">Fox<br>'];
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
			var animalsObjects = ['<input type="checkbox" name="animal" onchange="checkAnimal()" value="wolf" id="wolf2">Wolf<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="ant2" value="ant">Ant<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bee2" value="bee">Bee<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="blackbird2" value="blackbird">Blackbird<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bird2" value="bird">Bird<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="falcon2" value="falcon">Falcon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="sun2" value="sun">Sun<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="salamander2" value="salamander">Salamander<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="cat2" value="cat">Cat<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bat2" value="bat">Bat<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="spiral2" value="spiral">Spiral<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="daisy2" value="daisy">Daisy<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="moon2" value="moon">Moon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="snake2" value="snake">Snake<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="bear2" value="bear">Bear<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="deer2" value="deer">Deer<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="tiger2" value="tiger">Tiger<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="frog2" value="frog">Frog<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="dog2" value="dog">Dog<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="triangle2" value="triangle">Triangle<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="square2" value="square">Square<br>', '<input type="checkbox" name="animal" onchange="checkAnimal()" id="fox2" value="fox">Fox<br>'];
			var animalDivs = ['<div id="wolf"><div>', '<div id="ant"><div>', '<div id="bee"><div>', '<div id="blackbird"><div>', '<div id="bird"><div>', '<div id="falcon"><div>', '<div id="sun"><div>', '<div id="salamander"><div>', '<div id="yinyang"><div>', '<div id="cat"><div>', '<div id="bat"><div>', '<div id="spiral"><div>', '<div id="mosquito"><div>', '<div id="daisy"><div>', '<div id="rainbow"><div>', '<div id="moon"><div>', '<div id="snake"><div>', '<div id="blackDragon"><div>', '<div id="waterDragon"><div>', '<div id="butterfly"><div>', '<div id="bear"><div>', '<div id="wingFeathers"><div>', '<div id="deer"><div>', '<div id="rabbit"><div>', '<div id="tiger"><div>', '<div id="frog"><div>', '<div id="dog"><div>', '<div id="triangle"><div>', '<div id="square"><div>', '<div id="fox"><div>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			animalDivs = shuffle(animalDivs);
			animalDivs = animalDivs.join("");
			if(document.getElementById("notHuman").checked == false){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
				avatarOptions.setAttribute("class", "human");
			}
			else {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				itemPreview.innerHTML = animalDivs;
				
				document.getElementById("avatarOptions").setAttribute("class", "animal");
			}
			if(document.getElementById("check").getAttribute("value")=="human"){
				avatarOptions.innerHTML = '<input type="checkbox" id="top" name="top" value="top">I want to wear a top<br><input type="checkbox" id="bottom" name="bottom" value="bottom">I want to wear a bottom<br><input type="checkbox" id="hat" name="hat" value="hat">I want to wear headgear<br><input type="checkbox" id="gloves" name="gloves" value="gloves">I want to wear gloves<br><input type="checkbox" id="ears" name="ears" value="ears">I want to wear special ears or earrings<br><input type="checkbox" id="necklace" name="necklace" value="necklace">I want to wear neckwear<br><input type="checkbox" id="shoes" name="shoes" value="shoes">I want to wear shoes<br><input type="checkbox" id="eyewear" name="eyewear" value="eyewear">I want eyewear<br><div id="top1">Top color<input type="color" name="topColor" value="#ff0000"><br></div><div id="bottom1">Bottom color<input type="color" name="bottomColor" value="#ff0000"><br></div><div id="hat1">Hat color<input type="color" name="hatColor" value="#ff0000"><br></div><div id="gloves1">Glove color<input type="color" name="gloveColor" value="#ff0000"><br></div><div id="ears1">Custom ears/earring color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="necklace1">Necklace color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="shoes1">Shoe color<input type="color" name="shoeColor" value="#ff0000"><br></div><div id="eyewear1">Eyewear color<input type="color" name="eyewearColor" value="#ff0000"><br></div><div id="robe1">Robe/dress color<input type="color" name="robeColor" value="#ff0000"><br></div>';
				//<option value="shirtStripe1">Choose a shirt stripe</option><option value="shirtStripe2">Choose a second shirt stripe</option><option value="bottomStripe1">Choose a pants/skirt stripe color</option><option value="bottomStripe2">Choose another pants/skirt stripe color</option>
			}
		}
		function checkAnimal() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			/*var checkboxes = document.getElementsByTagName("input");
			for(i=0; i<checkboxes.length; i++){
				var name = checkboxes[i].getAttribute("value");
				if(checkboxes[i].checked == true){
					$.post("loadPreviews.php", {name: name}, function(data) {
						itemPreview.html = data;
					});
				}
				else {
					itemPreview.html = "";
				}
			}*/
			if(document.getElementById("wolf2").checked == true){
				document.getElementById("wolf").innerHTML = '<img width="130" height="130" src="svg/wolf1.svg" alt="first wolf"><img width="130" height="130" src="svg/wolf2.svg" alt="second wolf"><img width="130" height="130" src="svg/wolf3.svg" alt="third wolf"><br><img width="130" height="130" src="svg/wolf4.svg" alt="fourth wolf"><img width="130" height="130" src="svg/wolf5.svg" alt="fifth wolf"><img width="130" height="130" src="svg/wolf6.svg" alt="sixth wolf"><img width="130" height="130" src="svg/wolf7.svg" alt="seventh wolf">';
			}
			else {
				document.getElementById("wolf").innerHTML = "";
			}
		}
	</script>
</body>
</html>