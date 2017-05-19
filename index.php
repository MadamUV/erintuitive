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
		<tr id="itemPreview" width="45%">
		</tr>
		<tr id="result" width="45%">
		</tr>
	</table>
		<button id="back" onclick="backOptions()">Back</button>
		<button id="next" onclick="nextOptions()">Next</button>
	<style>
		#avatarOptions {
			position: relative;
			float: left;
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
			if (avatarOptions.getAttribute("class")=="human" || avatarOptions.getAttribute("class")=="animal"){
				avatarOptions.innerHTML = 'Is your character an animal or object?<input type="checkbox" id="notHuman" name="species" value="animal">';
			}
			else if (avatarOptions.getAttribute("class")=="animal1"){
				var animalsObjects = ['<input type="checkbox" name="animal" value="wolf">Wolf<br>', '<input type="checkbox" name="animal" value="ant">Ant<br>', '<input type="checkbox" name="animal" value="bee">Bee<br>', '<input type="checkbox" name="animal" value="blackbird">Blackbird<br>', '<input type="checkbox" name="animal" value="bird">Bird<br>', '<input type="checkbox" name="animal" value="falcon">Falcon<br>', '<input type="checkbox" name="animal" value="sun">Sun<br>', '<input type="checkbox" name="animal" value="salamander">Salamander<br>', '<input type="checkbox" name="animal" value="yinyang">Yin-Yang<br>', '<input type="checkbox" name="animal" value="cat">Cat<br>', '<input type="checkbox" name="animal" value="bat">Bat<br>', '<input type="checkbox" name="animal" value="spiral">Spiral<br>', '<input type="checkbox" name="animal" value="bird">Bird<br>', '<input type="checkbox" name="animal" value="mosquito">Mosquito<br>', '<input type="checkbox" name="animal" value="daisy">Daisy<br>', '<input type="checkbox" name="animal" value="rainbow">Rainbow<br>', '<input type="checkbox" name="animal" value="moon">Moon<br>', '<input type="checkbox" name="animal" value="snake">Snake<br>', '<input type="checkbox" name="animal" value="blackDragon">Black Dragon<br>', '<input type="checkbox" name="animal" value="waterDragon">Water Dragon<br>', '<input type="checkbox" name="animal" value="butterfly">Butterfly<br>', '<input type="checkbox" name="animal" value="bear">Bear<br>', '<input type="checkbox" name="animal" value="wingFeathers">Wing Feathers<br>', '<input type="checkbox" name="animal" value="deer">Deer<br>', '<input type="checkbox" name="animal" value="rabbit">Rabbit<br>', '<input type="checkbox" name="animal" value="tiger">Tiger<br>', '<input type="checkbox" name="animal" value="frog">Frog<br>', '<input type="checkbox" name="animal" value="dog">Dog<br>', '<input type="checkbox" name="animal" value="triangle">Triangle<br>', '<input type="checkbox" name="animal" value="square">Square<br>', '<input type="checkbox" name="animal" value="fox">Fox<br>'];
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
			var animalsObjects = ['<input type="checkbox" name="animal" value="wolf">Wolf<br>', '<input type="checkbox" name="animal" value="ant">Ant<br>', '<input type="checkbox" name="animal" value="bee">Bee<br>', '<input type="checkbox" name="animal" value="blackbird">Blackbird<br>', '<input type="checkbox" name="animal" value="bird">Bird<br>', '<input type="checkbox" name="animal" value="falcon">Falcon<br>', '<input type="checkbox" name="animal" value="sun">Sun<br>', '<input type="checkbox" name="animal" value="salamander">Salamander<br>', '<input type="checkbox" name="animal" value="yinyang">Yin-Yang<br>', '<input type="checkbox" name="animal" value="cat">Cat<br>', '<input type="checkbox" name="animal" value="bat">Bat<br>', '<input type="checkbox" name="animal" value="spiral">Spiral<br>', '<input type="checkbox" name="animal" value="bird">Bird<br>', '<input type="checkbox" name="animal" value="mosquito">Mosquito<br>', '<input type="checkbox" name="animal" value="daisy">Daisy<br>', '<input type="checkbox" name="animal" value="rainbow">Rainbow<br>', '<input type="checkbox" name="animal" value="moon">Moon<br>', '<input type="checkbox" name="animal" value="snake">Snake<br>', '<input type="checkbox" name="animal" value="blackDragon">Black Dragon<br>', '<input type="checkbox" name="animal" value="waterDragon">Water Dragon<br>', '<input type="checkbox" name="animal" value="butterfly">Butterfly<br>', '<input type="checkbox" name="animal" value="bear">Bear<br>', '<input type="checkbox" name="animal" value="wingFeathers">Wing Feathers<br>', '<input type="checkbox" name="animal" value="deer">Deer<br>', '<input type="checkbox" name="animal" value="rabbit">Rabbit<br>', '<input type="checkbox" name="animal" value="tiger">Tiger<br>', '<input type="checkbox" name="animal" value="frog">Frog<br>', '<input type="checkbox" name="animal" value="dog">Dog<br>', '<input type="checkbox" name="animal" value="triangle">Triangle<br>', '<input type="checkbox" name="animal" value="square">Square<br>', '<input type="checkbox" name="animal" value="fox">Fox<br>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			if(document.getElementById("notHuman").checked == false){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
				avatarOptions.setAttribute("class", "human");
			}
			else {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				document.getElementById("avatarOptions").setAttribute("class", "animal");
			}
			if(document.getElementById("check").getAttribute("value")=="human"){
				avatarOptions.innerHTML = '<input type="checkbox" id="top" name="top" value="top">I want to wear a top<br><input type="checkbox" id="bottom" name="bottom" value="bottom">I want to wear a bottom<br><input type="checkbox" id="hat" name="hat" value="hat">I want to wear headgear<br><input type="checkbox" id="gloves" name="gloves" value="gloves">I want to wear gloves<br><input type="checkbox" id="ears" name="ears" value="ears">I want to wear special ears or earrings<br><input type="checkbox" id="necklace" name="necklace" value="necklace">I want to wear neckwear<br><input type="checkbox" id="shoes" name="shoes" value="shoes">I want to wear shoes<br><input type="checkbox" id="eyewear" name="eyewear" value="eyewear">I want eyewear<br><div id="top1">Top color<input type="color" name="topColor" value="#ff0000"><br></div><div id="bottom1">Bottom color<input type="color" name="bottomColor" value="#ff0000"><br></div><div id="hat1">Hat color<input type="color" name="hatColor" value="#ff0000"><br></div><div id="gloves1">Glove color<input type="color" name="gloveColor" value="#ff0000"><br></div><div id="ears1">Custom ears/earring color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="necklace1">Necklace color<input type="color" name="necklaceColor" value="#ff0000"><br></div><div id="shoes1">Shoe color<input type="color" name="shoeColor" value="#ff0000"><br></div><div id="eyewear1">Eyewear color<input type="color" name="eyewearColor" value="#ff0000"><br></div><div id="robe1">Robe/dress color<input type="color" name="robeColor" value="#ff0000"><br></div>';
				//<option value="shirtStripe1">Choose a shirt stripe</option><option value="shirtStripe2">Choose a second shirt stripe</option><option value="bottomStripe1">Choose a pants/skirt stripe color</option><option value="bottomStripe2">Choose another pants/skirt stripe color</option>
			}
			else if (avatarOptions.getAttribute("class")=="animal"){
				
				//avatarOptions.setAttribute("class", "animal1");
			}
		}
	</script>
</body>
</html>