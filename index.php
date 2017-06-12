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
		#man, #woman {
			margin-left: 60px;
		}
		#relativeContainer {
			padding-top: 40px;
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
				avatarOptions.style.overflow = "hidden";
			}
			else if (avatarOptions.getAttribute("class")=="animal1"){
				var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
				animalsObjects = shuffle(animalsObjects);
				animalsObjects = animalsObjects.join("");
				avatarOptions.innerHTML = animalsObjects;
				avatarOptions.style.overflow = "scroll";
			}
			else if (avatarOptions.getAttribute("class")=="human1"){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
			}
		}
		function nextOptions() {
			var avatarOptions = document.getElementById("avatarOptions");
			var itemPreview = document.getElementById("itemPreview");
			var result = document.getElementById("result");
			var animalsObjects = ['<input type="radio" name="animal" onchange="checkWolf()" value="wolf" id="wolf2">Wolf<br>', '<input type="radio" name="animal" onchange="checkAnt()" id="ant2" value="ant">Ant<br>', '<input type="radio" name="animal" onchange="checkBee()" id="bee2" value="bee">Bee<br>', '<input type="radio" name="animal" onchange="checkBird()" id="bird2" value="bird">Bird<br>', '<input type="radio" name="animal" onchange="checkSun()" id="sun2" value="sun">Sun<br>', '<input type="radio" name="animal" onchange="checkSalamander()" id="salamander2" value="salamander">Salamander<br>', '<input type="radio" name="animal" onchange="checkYinyang()" id="yinyang2" value="yinyang">Yin-Yang<br>', '<input type="radio" name="animal" onchange="checkCat()" id="cat2" value="cat">Cat<br>', '<input type="radio" name="animal" onchange="checkBat()" id="bat2" value="bat">Bat<br>', '<input type="radio" name="animal" onchange="checkSpiral()" id="spiral2" value="spiral">Spiral<br>', '<input type="radio" name="animal" onchange="checkMosquito()" id="mosquito2" value="mosquito">Mosquito<br>', '<input type="radio" name="animal" onchange="checkDaisy()" id="daisy2" value="daisy">Daisy<br>', '<input type="radio" name="animal" onchange="checkRainbow()" id="rainbow2" value="rainbow">Rainbow<br>', '<input type="radio" name="animal" onchange="checkMoon()" id="moon2" value="moon">Moon<br>', '<input type="radio" name="animal" onchange="checkSnake()" id="snake2" value="snake">Snake<br>', '<input type="radio" name="animal" onchange="checkBlackDragon()" id="blackDragon2" value="blackDragon">Black Dragon<br>', '<input type="radio" name="animal" onchange="checkWaterDragon()" id="waterDragon2" value="waterDragon">Water Dragon<br>', '<input type="radio" name="animal" onchange="checkButterfly()" id="butterfly2" value="butterfly">Butterfly<br>', '<input type="radio" name="animal" onchange="checkBear()" id="bear2" value="bear">Bear<br>', '<input type="radio" name="animal" onchange="checkWingFeathers()" id="wingFeathers2" value="wingFeathers">Wing Feathers<br>', '<input type="radio" name="animal" onchange="checkDeer()" id="deer2" value="deer">Deer<br>', '<input type="radio" name="animal" onchange="checkRabbit()" id="rabbit2" value="rabbit">Rabbit<br>', '<input type="radio" name="animal" onchange="checkTiger()" id="tiger2" value="tiger">Tiger<br>', '<input type="radio" name="animal" onchange="checkFrog()" id="frog2" value="frog">Frog<br>', '<input type="radio" name="animal" onchange="checkDog()" id="dog2" value="dog">Dog<br>', '<input type="radio" name="animal" onchange="checkTriangle()" id="triangle2" value="triangle">Triangle<br>', '<input type="radio" name="animal" onchange="checkSquare()" id="square2" value="square">Square<br>', '<input type="radio" name="animal" onchange="checkFox()" id="fox2" value="fox">Fox<br>'];
			//var animalDivs = ['<div id="wolf"><div>', '<div id="ant"><div>', '<div id="bee"><div>', '<div id="blackbird"><div>', '<div id="bird"><div>', '<div id="falcon"><div>', '<div id="sun"><div>', '<div id="salamander"><div>', '<div id="yinyang"><div>', '<div id="cat"><div>', '<div id="bat"><div>', '<div id="spiral"><div>', '<div id="mosquito"><div>', '<div id="daisy"><div>', '<div id="rainbow"><div>', '<div id="moon"><div>', '<div id="snake"><div>', '<div id="blackDragon"><div>', '<div id="waterDragon"><div>', '<div id="butterfly"><div>', '<div id="bear"><div>', '<div id="wingFeathers"><div>', '<div id="deer"><div>', '<div id="rabbit"><div>', '<div id="tiger"><div>', '<div id="frog"><div>', '<div id="dog"><div>', '<div id="triangle"><div>', '<div id="square"><div>', '<div id="fox"><div>'];
			animalsObjects = shuffle(animalsObjects);
			animalsObjects = animalsObjects.join("");
			//animalDivs = shuffle(animalDivs);
			//animalDivs = animalDivs.join("");
			if(document.getElementById("notHuman").checked == false){
				avatarOptions.innerHTML = '<input type="radio" name="gender" value="male"> Male<br><input type="radio" name="gender" value="female"> Female<br><input type="radio" name="gender" value="other"> Other<br>Skin color<input type="color" name="skinColor" value="#ff0000"><br>Hair color<input type="color" name="hairColor" value="#ff0000"><br>Eye color<input type="color" name="eyeColor" value="#ff0000"><br></div>';
				avatarOptions.setAttribute("class", "human");
				avatarOptions.style.overflow = "hidden";
				var man = '<svg id="man" alt="man" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" ><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;"/></defs><rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;"/><path id="path1106" style="fill-opacity: 1; fill-rule: nonzero; stroke: none;" d="M1585.43,14995.4c0,0,-31.210000000000036,18,-48.13000000000011,-3.5c-16.940000000000055,-21.5,-1.5299999999999727,-40.399999999999636,4.240000000000009,-61.20000000000073c5.779999999999973,-20.799999999999272,6.930000000000064,-64.70000000000073,41.57999999999993,-50.79999999999927l2.3099999999999454,115.5" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1108" style="fill-opacity: 1; fill-rule: nonzero; stroke-width: 0px; stroke: none;" d="M2104.75,14986.2c0,0,31.210000000000036,18,48.11000000000013,-3.5c16.949999999999818,-21.600000000000364,1.5399999999999636,-40.399999999999636,-4.230000000000018,-61.20000000000073c-5.769999999999982,-20.799999999999272,-6.929999999999836,-64.70000000000073,-41.570000000000164,-50.79999999999927l-2.3099999999999454,115.5" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1110" class="skin" style="fill-opacity: 1; fill-rule: nonzero; stroke-width: 0px; stroke: none;" d="M2111.550000000001,14996.583479999332C2111.550000000001,14996.583479999332,2098.850000000001,15084.28347999933,2026.0799999999995,15155.884479999331C1970.2099999999994,15210.884479999331,1883.0599999999993,15213.384479999331,1845.6099999999992,15211.68347999933C1808.1399999999994,15213.384479999331,1720.9999999999993,15210.884479999331,1665.1199999999992,15155.884479999331C1592.3599999999992,15084.28347999933,1579.6599999999994,14996.583479999332,1579.6599999999994,14996.583479999332C1579.6599999999994,14996.583479999332,1558.8699999999992,14863.68347999933,1613.1399999999994,14790.983479999331C1667.4199999999994,14718.18347999933,1713.6199999999992,14722.78347999933,1743.6499999999994,14710.083479999332C1771.0599999999993,14698.483479999331,1798.1499999999994,14681.384479999331,1835.1099999999992,14678.18347999933L1836.6699999999994,14677.78347999933C1839.7199999999993,14677.583479999332,1842.6899999999994,14677.583479999332,1845.6099999999992,14677.583479999332C1848.5099999999993,14677.583479999332,1851.4799999999993,14677.583479999332,1854.5199999999993,14677.78347999933L1856.0899999999992,14678.18347999933C1893.0599999999993,14681.384479999331,1920.1399999999994,14698.483479999331,1947.5499999999993,14710.083479999332C1977.5799999999992,14722.78347999933,2023.7799999999993,14718.18347999933,2078.060000000001,14790.983479999331C2132.340000000001,14863.68347999933,2111.550000000001,14996.583479999332,2111.550000000001,14996.583479999332" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1112" style="fill-opacity: 1; fill-rule: nonzero; stroke: none;" d="M2079.9100000000017,14344.815479999317c-21.36999999999989,167.29999999999927,-79.24000000000001,336.7000000000007,-234.48000000000002,336.7000000000007c-164.55999999999995,0,-219.31999999999994,-169.39999999999964,-237.58999999999992,-336.7000000000007h472.06999999999994" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path d="M203.33308423253618,684.2599844792421c0.14561897137809865,40.55701966991933,1.9612229976511344,90.78620258653996,0.6872997812537278,103.62751111525336c-1.2739232163974066,12.841308528713398,-1.3651010872549136,13.13691370033473,-1.374603271484375,15.12066650390625c-0.009502184229461363,1.9837528035714058,-1.3265163523703905,-1.223776159939689,0,0.68731689453125c1.3265163523703905,1.911093054470939,10.010763638308958,12.058504641853233,11.684188842773438,13.74609375c1.673425204464479,1.687589108146767,-5.911000595565326,-12.685497543833662,0.6873016357421875,0.68731689453125c6.5983022313074855,8.155343285363756,34.90694890706695,-200.51328059314733,-11.684186988285006,-139.08637631122326Z" id="e2_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;" transform="matrix(1 0 0 0.92212 0 52.7372)"/><path d="M209.99465779056467,685.2303662817187c2.577622118976251,43.482733802671646,4.393226145249287,93.71191671929228,3.11930292885188,106.55322524800567c-1.2739232163974066,12.841308528713398,-1.3651010872549136,13.13691370033473,-1.374603271484375,15.12066650390625c-0.009502184229461363,1.9837528035714058,-1.3265163523703905,-1.223776159939689,0,0.68731689453125c1.3265163523703905,1.911093054470939,10.010763638308958,12.058504641853233,11.684188842773438,13.74609375c1.673425204464479,1.687589108146767,-5.911000595565326,-12.685497543833662,0.6873016357421875,0.68731689453125c6.598302231307514,13.372814438364912,46.74974691814302,-203.31423130742337,-14.11619013588313,-136.79461929097442Z" id="e18_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;" transform="matrix(-1.12884 0 0 0.924885 525.692 45.3198)"/><rect x="219.1410352589071" y="699.1089502884427" id="e3_rectangle" class="skin" style="stroke-width: 0px; stroke: none;" width="53.6098" height="108.594" class="skin" fill="moccasin" transform="matrix(1 0 0 1.10112 -0.687305 -70.0014)"/><path d="M248.37167883537217,798.0809623336122c-37.906769016318066,10.088012717517472,-23.562211548397528,22.567512717527848,-24.742984287735453,23.368365757461902c-1.1807727393379253,0.8008530399340543,-7.131606348101087,-16.468016369641987,-8.247665405273438,7.56036376953125c-11.425637336597958,14.406107078375953,2.434719667900481,122.90636611595937,0.24250550842839405,163.57862285048213c22.065755780702403,-15.686771193004006,10.404701114728482,-10.551283001190086,14.31097911344034,-8.247673246107865c2.1270929850926734,0.9289993178254009,8.691765193692532,9.93622536345788,3.3164505134977844,-3.4364884097915365c15.24384187865661,-37.42839642524268,4.916118269973907,-144.79983813510705,15.120714557642373,-182.82319072157588Z" id="e19_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;" transform="matrix(-1.21421 0 0 1 541.175 -26.8049)"/><path d="M236.32373046875,947.2261962890625c-0.14319425186278067,2.9437532994327285,-1.9324997476343242,9.506517564607975,-0.6873016357421875,10.3095703125c1.2451981118921367,0.8030527478919112,-0.11374472478115649,-3.5135606206113152,1.374603271484375,0.68731689453125c1.4883479962655315,4.200877515142565,-35.51994354093682,10.13113942193263,-34.365264892578125,3.4365234375c1.154678648358697,-6.69461598443263,9.608658491773895,-11.803747409611105,13.058807373046875,-15.1207275390625c3.4501488812729804,-3.3169801294513945,20.762350135651843,-2.2564364049014785,20.619155883789062,0.68731689453125Z" id="e4_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;"/><path d="M256.9428870276014,949.9754171635759c-0.14319425186278073,2.9437532994327285,-1.9324997476343242,9.506517564607975,-0.6873016357421877,10.3095703125c1.2451981118921367,0.8030527478919111,-0.11374472478115653,-3.5135606206113152,1.374603271484375,0.68731689453125c1.4883479962655315,4.200877515142565,-35.51994354093682,10.13113942193263,-34.365264892578125,3.4365234375c1.154678648358697,-6.69461598443263,9.608658491773895,-11.803747409611105,13.058807373046875,-15.1207275390625c3.4501488812729804,-3.3169801294513945,20.762350135651843,-2.2564364049014785,20.619155883789062,0.68731689453125Z" id="e15_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;" transform="matrix(-0.919844 0 0 1 489.474 -4.12383)"/><polygon id="e6_polygon" style="stroke: none; stroke-width: 0px;" points="221.89 683.988 212.955 694.298 211.581 727.976 212.955 727.976 215.017 690.861" class="lines" fill="black" transform="matrix(1 0 0 1.48194 0 -328.904)"/><polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" class="lines" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)"/><path d="M244.97159878627374,802.8920988640106c-37.906769016318066,10.088012717517472,-23.562211548397528,22.567512717527848,-24.742984287735453,23.368365757461902c-1.1807727393379253,0.8008530399340543,-7.131606348101087,-16.468016369641987,-8.247665405273438,7.56036376953125c-11.425637336597958,14.406107078375953,2.434719667900481,122.90636611595937,0.24250550842839408,163.57862285048213c22.065755780702403,-15.686771193004006,10.404701114728482,-10.551283001190086,14.31097911344034,-8.247673246107865c2.1270929850926734,0.928999317825401,8.691765193692532,9.93622536345788,3.3164505134977844,-3.4364884097915365c15.24384187865661,-37.42839642524268,4.916118269973907,-144.79983813510705,15.120714557642373,-182.82319072157588Z" id="e1_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px; fill-opacity: 1;" transform="matrix(1.17067 0 0 1 -41.3208 -19.2445)"/><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="182.049 807.703 204.043 821.45 212.978 836.57 229.474 837.258 239.096 818.7 239.096 820.075 263.152 800.143 260.402 798.081 224.662 808.391 179.988 802.892" class="clothes" fill="silver" transform="matrix(0.836879 0 0 1.15584 58.2764 -131.551)"/></svg>';
				var woman = '<svg id="woman" alt="woman" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" ><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;"/><path id="path1106" style="fill-opacity: 1; fill-rule: nonzero; stroke: none;" d="M1585.43,14995.4c0,0,-31.210000000000036,18,-48.13000000000011,-3.5c-16.940000000000055,-21.5,-1.5299999999999727,-40.399999999999636,4.240000000000009,-61.20000000000073c5.779999999999973,-20.799999999999272,6.930000000000064,-64.70000000000073,41.57999999999993,-50.79999999999927l2.3099999999999454,115.5" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1108" style="fill-opacity: 1; fill-rule: nonzero; stroke-width: 0px; stroke: none;" d="M2104.75,14986.2c0,0,31.210000000000036,18,48.11000000000013,-3.5c16.949999999999818,-21.600000000000364,1.5399999999999636,-40.399999999999636,-4.230000000000018,-61.20000000000073c-5.769999999999982,-20.799999999999272,-6.929999999999836,-64.70000000000073,-41.570000000000164,-50.79999999999927l-2.3099999999999454,115.5" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1110" style="fill-opacity: 1; fill-rule: nonzero; stroke-width: 0px; stroke: none;" d="M2111.550000000001,14996.583479999332C2111.550000000001,14996.583479999332,2098.850000000001,15084.28347999933,2026.0799999999995,15155.884479999331C1970.2099999999994,15210.884479999331,1883.0599999999993,15213.384479999331,1845.6099999999992,15211.68347999933C1808.1399999999994,15213.384479999331,1720.9999999999993,15210.884479999331,1665.1199999999992,15155.884479999331C1592.3599999999992,15084.28347999933,1579.6599999999994,14996.583479999332,1579.6599999999994,14996.583479999332C1579.6599999999994,14996.583479999332,1558.8699999999992,14863.68347999933,1613.1399999999994,14790.983479999331C1667.4199999999994,14718.18347999933,1713.6199999999992,14722.78347999933,1743.6499999999994,14710.083479999332C1771.0599999999993,14698.483479999331,1798.1499999999994,14681.384479999331,1835.1099999999992,14678.18347999933L1836.6699999999994,14677.78347999933C1839.7199999999993,14677.583479999332,1842.6899999999994,14677.583479999332,1845.6099999999992,14677.583479999332C1848.5099999999993,14677.583479999332,1851.4799999999993,14677.583479999332,1854.5199999999993,14677.78347999933L1856.0899999999992,14678.18347999933C1893.0599999999993,14681.384479999331,1920.1399999999994,14698.483479999331,1947.5499999999993,14710.083479999332C1977.5799999999992,14722.78347999933,2023.7799999999993,14718.18347999933,2078.060000000001,14790.983479999331C2132.340000000001,14863.68347999933,2111.550000000001,14996.583479999332,2111.550000000001,14996.583479999332" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path id="path1112" style="fill-opacity: 1; fill-rule: nonzero; stroke: none;" d="M2079.9100000000017,14344.815479999317c-21.36999999999989,167.29999999999927,-79.24000000000001,336.7000000000007,-234.48000000000002,336.7000000000007c-164.55999999999995,0,-219.31999999999994,-169.39999999999964,-237.58999999999992,-336.7000000000007h472.06999999999994" transform="matrix(0.13333330353101047, 0, 0, -0.13333330353101047, 0, 2613.333251953125)" class="skin" fill="moccasin"/><path d="M210.31825121914548,686.6418337624407c9.194929623787175,28.76220364390406,9.57947037835828,50.43767223079885,1.3538411068427934,56.59208925181133c-3.261640703097868,3.2701517123041413,-10.188785305579188,12.076551812437174,-8.122848510742188,11.73297119140625c2.065936794837029,-0.3435806210309238,3.314761381874149,-1.048073562933041,4.5126953125,-0.90252685546875c1.1979339306258225,0.1455467074642911,-3.571600276383748,5.786737309318028,-3.6101531982421875,4.9639892578125c-0.03855292185841108,-0.8227480515056413,-0.8520875333658466,-0.2616126221143986,0,-0.4512939453125c0.8520875333658466,-0.18968132319810138,6.436736030889932,-1.0201127154200549,6.3177642822265625,-2.70758056640625c-0.11897174866342652,-1.6874678509861951,5.012098712919169,-11.190391270289865,5.41522216796875,-9.927978515625c0.4031234550495526,1.2624127546648651,-1.4004052235764846,10.737493320822523,-0.90252685546875,12.63555908203125c0.49787836810773456,1.898065761208727,3.06337520852216,4.50260288370896,3.6101531982421875,3.61016845703125c0.5467779897200273,-0.8924344266777098,-2.2420140276160794,1.5340497870022318,0,-4.5126953125c2.2420140276160794,-6.046745099502232,6.174384577393909,-24.56670405521072,11.281783940645596,-43.53761370297218c-5.271871803039289,-18.49363047539339,-2.8771503267729486,-53.80449822229616,-19.855931443972764,-27.4950883418079Z" id="e12_area3" style="stroke-width: 1px; stroke: none;" class="skin" fill="moccasin" transform="matrix(1 0 0 1.40814 0 -277.343)"/><path d="M223.40496883414204,706.2298519723753c10.177440154832171,2.2659944971890127,15.233907703932232,25.26351865929462,10.379241370936086,32.491522539343464c-4.854666332996146,7.2280038800488455,-21.749736657538563,26.86277174657721,-16.697052001953125,37.9068603515625c5.052684655585438,11.04408860498529,52.80818551404849,0.4556258264196913,55.95770263671875,0.45123291015625c3.149517122670261,-0.004392916263441295,-22.461235273171894,-49.94680389551672,-18.050872802734375,-45.57843017578125c4.410362470437576,4.368373719735473,-1.1980496621030738,2.547447623864059,0.451263427734375,0.4512939453125c1.6493130898374486,-2.096153678551559,6.752729433154458,-17.575193151492158,6.769073486328125,-20.3072509765625c0.016344053173668275,-2.732057825070342,-5.5888931025112925,-3.434926764258762,0,-0.4512939453125c-2.9852689702100292,-1.5290840614335366,11.579080652967036,-2.88426723978273,9.927978515625,-10.83050537109375c-1.6511021373420363,-7.94623813131102,-69.29402361236032,-19.865551552787906,-48.737334632654836,5.866570722375286Z" id="e24_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px;"/><path d="M200.7741964888989,683.5905113711252c9.194929623787175,28.76220364390406,9.57947037835828,50.43767223079885,1.3538411068427934,56.59208925181133c-3.261640703097868,3.2701517123041413,-10.188785305579188,12.076551812437174,-8.122848510742188,11.73297119140625c2.065936794837029,-0.3435806210309238,3.314761381874149,-1.048073562933041,4.5126953125,-0.90252685546875c1.1979339306258225,0.1455467074642911,-3.571600276383748,5.786737309318028,-3.6101531982421875,4.9639892578125c-0.03855292185841108,-0.8227480515056413,-0.8520875333658466,-0.2616126221143986,0,-0.4512939453125c0.8520875333658466,-0.18968132319810138,6.436736030889932,-1.0201127154200549,6.3177642822265625,-2.70758056640625c-0.11897174866342652,-1.6874678509861951,5.012098712919169,-11.190391270289865,5.41522216796875,-9.927978515625c0.4031234550495526,1.2624127546648651,-1.4004052235764846,10.737493320822523,-0.90252685546875,12.63555908203125c0.49787836810773456,1.898065761208727,3.06337520852216,4.50260288370896,3.6101531982421875,3.61016845703125c0.5467779897200273,-0.8924344266777098,-2.2420140276160794,1.5340497870022318,0,-4.5126953125c2.2420140276160794,-6.046745099502232,6.174384577393909,-24.56670405521072,11.281783940645596,-43.53761370297218c-5.271871803039289,-18.49363047539339,-2.8771503267729486,-53.80449822229616,-19.855931443972764,-27.4950883418079Z" id="e36_area3" style="stroke-width: 1px; stroke: none;" class="skin" fill="moccasin" transform="matrix(-1.10438 0 0 1.40814 503.366 -277.343)"/><path d="M219.0899010001928,771.3813519169545c-15.942724452142954,4.7867192991168395,-6.973186208840218,5.225779607377831,-5.688747316804438,24.65129053674889c21.5111225108661,51.02970408379349,22.479439676532763,108.99404788343725,24.65126416094003,121.36010363691162c9.756830841468599,16.790642795093618,13.299047797414545,0.877726012891344,13.273769051590051,-70.16132015770779c-3.185698061266635,-24.264840302054154,-5.337655035268455,-78.11662160988067,-15.802093267988766,-70.16129653837595c-19.945696179047076,1.634486440620094,-13.765229300451267,0.26992889581015334,-16.434192627736877,-5.688777477576764Z" id="e26_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px;" transform="matrix(1 0 0 1.17402 0 -133.036)"/><path d="M272.81703043312814,768.853027819491c-18.646168883346434,-14.585781472077997,-34.790152488805575,4.4270436072815755,-27.811678502065888,8.849174083238381c-15.144461221356039,10.742969106841201,27.851976206117968,44.357962801292274,22.122913449797124,56.88758081211438c-5.729062756320843,12.529618010822105,-18.882878656774693,51.590878016308466,-15.802078247070312,63.2083740234375c3.080800409704352,11.617496007129034,20.216793446918018,30.067019622023167,22.755020141601562,24.6512451171875c2.5382266946835443,-5.415774504835781,-13.373751652174292,-34.643666694694616,-6.320831298828125,-45.510009765625c7.052920353346167,-10.866343070930384,18.784358045570684,-65.43598642157758,17.066253662109375,-67.00091552734375c-1.7181043834613092,-1.5649291057661685,-19.278868708823495,-47.99051861593796,-12.009599205543736,-41.08544874300901Z" id="e28_area3" class="skin" fill="moccasin" style="stroke: none; stroke-width: 0px;" transform="matrix(1 0 0 1.17012 0 -128.703)"/><path d="M224.22486387143704,686.9779694481701c5.52614660171588,-3.4156014198443927,10.277879963056591,-7.168815625511911,12.009597778320312,-5.056640625c6.285405673812164,1.542964018193402,10.041529401803956,18.275647776487062,12.00958251953125,10.11334228515625c1.9680531177273224,-1.9009846858266428,2.322775030437498,-9.137235991066404,9.481277465820312,-9.48126220703125c3.1740255591528808,0.22518476635377738,10.201439295552177,3.412914696032999,9.481231689453125,7.5849609375c-6.412317429284656,11.00257802928968,-15.437660346326453,13.339438999928461,-21.42796037196706,4.672769880352803c-4.851878061003362,7.271238385343736,-14.931027685847198,6.742480444094895,-17.066268920898324,0.7645354747027113c-2.135241235051211,-4.270312022436656,-2.0446530095156277,-8.597370219747518,-4.487460160259616,-8.597705745680514Z" id="e3_area3" class="clothes" fill="silver" style="stroke: none; stroke-width: 0px;" transform="matrix(1.20747 0 0 1.20747 -51.6855 -141.522)"/><path d="M214.66531372070312,768.85302734375c1.2782465385533328,11.91083753217606,22.03371125380957,25.990569084709023,31.604202270507812,24.65130615234375c9.570491016698298,-1.3392629323652727,24.359016657508334,-16.826113539882726,24.019180297851562,-28.44378662109375c17.990595669908146,6.712758948353894,-48.0524550236745,-11.910860241956584,-55.623382568359375,3.79248046875Z" id="e37_area3" class="clothes" fill="silver" style="stroke: none; stroke-width: 0px;"/><path d="M228.76336669921875,672.991455078125c4.324533905631284,-1.4112558776510014,11.51096896064226,0.22129187068173906,13.058807373046875,3.4365234375c2.31151087718564,2.5279263481900216,4.032802321963857,9.591366653129171,2.061920166015625,13.74615478515625c0.7783387185652941,-11.65323189642561,-6.386462290754537,-17.833338000890194,-15.1207275390625,-17.18267822265625Z" id="e39_area3" class="skin" class="lines" fill="black" style="stroke: none; stroke-width: 0px;" transform="matrix(0.846 0 0 0.874739 39.2094 87.7496)"/><path d="M235.63641888550254,679.8645072644088c4.324533905631284,-1.4112558776510014,10.747296495861264,0.9085970893099784,13.058807373046875,3.4365234375c2.3115108771856403,2.5279263481900216,4.032802321963857,9.591366653129171,2.061920166015625,13.74615478515625c0.7783387185652941,-11.653231896425611,-6.386462290754537,-17.833338000890194,-15.1207275390625,-17.18267822265625Z" id="e9_area3" class="skin" class="lines" fill="black" style="stroke: none; stroke-width: 0px;" transform="matrix(-0.806664 0 0 0.847088 450.119 101.46)"/></svg>';
				itemPreview.innerHTML = man+woman;
				result.innerHTML = '<div id="relativeContainer" width="86px" height="380px"></div>';
				result.style.paddingLeft = "80px";
				var skins = document.getElementsByClassName("skin");
				var skinColors = ["brown", "black", "white", "khaki", "moccasin", "beige", "tan", "chocolate", "darksalmon", "antiquewhite", "burlywood", "goldenrod", "indianred", "peru", "pink", "salmon", "peachpuff", "papayawhip", "navajowhite", "tan", "darkred", "blue", "yellow", "green"];
				var d = new Date();
				var time = d.getTime();
				var randomNum = time % 24;
				var skinTone = skinColors[randomNum];
				for (i=0; i<skins.length; i++){
					skins[i].setAttribute("fill", skinTone);
				}
				
			}
			else {
				//insert animal section here
				avatarOptions.innerHTML = animalsObjects;
				//itemPreview.innerHTML = animalDivs;
				document.getElementById("avatarOptions").setAttribute("class", "animal");
				avatarOptions.style.overflow = "scroll";
			}
			if(avatarOptions.getAttribute("class")=="human"){
				avatarOptions.innerHTML = 'Design your initial outfit!<br>You can change colors or randomize in the next step.';
				avatarOptions.style.overflow = "hidden";
				//<option value="shirtStripe1">Choose a shirt stripe</option><option value="shirtStripe2">Choose a second shirt stripe</option><option value="bottomStripe1">Choose a pants/skirt stripe color</option><option value="bottomStripe2">Choose another pants/skirt stripe color</option>
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
			document.getElementById("itemPreview").innerHTML = "Now you have your animal, please click next.<br>You can always start over.";
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