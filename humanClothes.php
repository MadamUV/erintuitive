<!DOCTYPE html>
<html>
<head>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2image.js"></script>
	<script src="js/base64.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/touch_punch.js"></script>
	<script src="js/glide.js"></script>
	<script src="js/jquery.colorPicker.js"></script>
	<link rel="stylesheet" href="css/glide.core.css">
    <link rel="stylesheet" href="css/glide.theme.css">
	<link rel="stylesheet" href="css/colorPicker.css" type="text/css" />
	<!-- pubnub -->
	<script src="https://cdn.pubnub.com/pubnub.min.js"></script>
	<title>Erintuitive's Psychic Place</title>
</head>
<body style="background-color: #FFBB22;">
	<script>
	var me_id = '';
	function getMe() {
		FB.api('/me', function(response) {
			me_id = response.id;
		});
	}
	window.fbAsyncInit = function() {
		FB.init({
		  appId            : '817064305070781',
		  autoLogAppEvents : true,
		  xfbml            : true,
		  version          : 'v2.9'
		});
		FB.AppEvents.logPageView();
		FB.getLoginStatus(function(response){
			if (response.status === 'connected'){
				getMe();
			}
			else if (response.status === 'not_authorized'){
			}
			else {
				
			}
		});
	  };
	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<table width="740px">
	<td>
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="topsBottoms">
					Please wait while your avatar loads.
				</div>
			</td>
			<td id="itemPreview" width="10%">
				Avatar builder step. You can skip any step by pressing "Next".
				
			</td>
			<td id="result" width="500px" style="border-style: dashed; border-width: 6px;">
				
				<div id="relativeContainer" style="position: relative;" width="86px" height="380px">
				<div id="shirtStuff"></div>
				</div>
			</td>
		</tr>
	</table>
	<div id="buttons">
		
	</div>
	<div id="aftermath"></div>
	<script>
		//avatar vars global
		var name = '';
		var avatar = '';
		//previous vars
		var previous = '';
		var previousClothes = '';
		var previousShoes = '';
		var previousTail = '';
		var previousWings = '';
		var previousAccessories = '';
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
		var num = 0;
		var count1 = 0;
		var count2 = 0;
		var countPresent = 0;
		$.post("convertAvatar.php", {convert: window.localStorage.getItem("avatarNaked")}, function(data2){
			document.getElementById("relativeContainer").innerHTML = data2;
			previous = relativeContainer.innerHTML;
			document.getElementById("buttons").innerHTML = '<button id="randomize" onclick="randomizeTop()">Randomize top</button><button id="randomize" onclick="randomizeBottom()">Randomize bottom</button><button id="next" onclick="nextOptions()">Next</button>';
		});
	function getRandomColor() {
		var letters = '0123456789ABCDEF';
		var color = '#';
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}
	var shirtStuff = document.getElementById("shirtStuff");
	var relativeContainer = document.getElementById("relativeContainer");
	var itemPreview = document.getElementById("itemPreview");
	var avatarOptions = document.getElementById("avatarOptions");
	if(document.getElementById("relativeContainer").innerHTML != ''){
		document.getElementById("avatarOptions").innerHTML = "Press Randomize until you find the perfect outfit for your avatar.";
	}
	function colorTop() {
		$(".shirt").find("path, polygon").attr("fill", getRandomColor());
		$(".shirt").find("path, polygon").css({"fill": getRandomColor()});
		var randColor = getRandomColor();
		$(".sleeves").find("path, polygon").attr("fill", randColor);
		$(".sleeves").find("path, polygon").css({"fill": randColor});
		$(".pants").find("path, polygon").attr("fill", randColor);
		$(".pants").find("path, polygon").css({"fill": randColor});	
	}
	function randomizePets() {
		$("#relativeContainer .pets").remove();
		$("#relativeContainer").append(pet()[0]);
		$("#relativeContainer .pets").css({'position':'absolute', 'top':'-6px', 'left':'8px', 'margin-top':'0', 'z-index':'31'});
		if($("#relativeContainer .pets")[0].getAttribute("src")!=="svg/human/humanClothes/pets/pet19.svg" && $("#relativeContainer .pets")[0].getAttribute("src")!=="svg/human/humanClothes/pets/female_pet19.svg" && $("#relativeContainer .pets")[0].getAttribute("src")!=="svg/human/humanClothes/pets/pet8.svg" && $("#relativeContainer .pets")[0].getAttribute("src")!=="svg/human/humanClothes/pets/pet3.svg"){
			$("#relativeContainer .pets").css({'top':'-72px', '-webkit-transform':'scale(2.4)', '-ms-transform':'scale(2.4)', 'transform':'scale(2.4)'});
		}
		if($("#relativeContainer .pets")[0].getAttribute("src")=="svg/human/humanClothes/pets/pet15.svg"){
			$("#relativeContainer .pets").css({'top':'-5px'});
		}
		else if($("#relativeContainer .pets")[0].getAttribute("src")=="svg/human/humanClothes/pets/pet16.svg" || $("#relativeContainer .pets")[0].getAttribute("src")=="svg/human/humanClothes/pets/pet17.svg" || $("#relativeContainer .pets")[0].getAttribute("src")=="svg/human/humanClothes/pets/pet18.svg"){
			$("#relativeContainer .pets").css({'top':'-25px'});
		}
		else if($("#relativeContainer .pets")[0].getAttribute("src")=="svg/human/humanClothes/pets/pet3.svg"){
			$("#relativeContainer .pets").css({'top':'-15px', '-webkit-transform':'scale(1.2)', '-ms-transform':'scale(1.2)', 'transform':'scale(1.2)'});
		}
	}
	function randomizeCapes() {
		$("#relativeContainer .capes").remove();
		$("#relativeContainer").append(cape()[0]);
		$("#relativeContainer .capes").css({'position':'absolute', 'top':'0', 'left':'45px', 'margin-top':'0', 'z-index':'-42', '-webkit-transform':'scale(2.1)', '-ms-transform':'scale(2.1)', 'transform':'scale(2.1)'});
	}
	function randomizeNecklaces() {
		$("#relativeContainer .necklaces").remove();
		$("#relativeContainer").append(necklace()[0]);
		$("#relativeContainer .necklaces").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
	}
	function randomizeShoes() {
		if($(".man")[0]){
			relativeContainer.innerHTML = previousClothes;
			$("#relativeContainer").append(maleShoes()[0]);
			$("#relativeContainer .shoes").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			if($(".shoes")[0].getAttribute("src")=="svg/human/humanClothes/shoes/shoes11.svg" || $(".shoes")[0].getAttribute("src")=="svg/human/humanClothes/shoes/shoes12.svg" || $(".shoes")[0].getAttribute("src")=="svg/human/humanClothes/shoes/shoes13.svg"){
				$("#relativeContainer .shoes").css({'top':'6px'});
			}
		}
		else if($(".woman")[0]){
			relativeContainer.innerHTML = previousClothes; 
			$("#relativeContainer").append(femaleShoes()[0]);
			$("#relativeContainer .shoes").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
		}
	}
	function backOptions(){
		if(avatarOptions.getAttribute("class")=="shoes"){
			relativeContainer.innerHTML = previousClothes;
			avatarOptions.setAttribute("class", "topsBottoms");
			document.getElementById("buttons").innerHTML = '<button id="randomize" onclick="randomizeTop()">Randomize top</button><button id="randomize" onclick="randomizeBottom()">Randomize bottom</button><button id="next" onclick="nextOptions()">Next</button>';
		}
		else if(avatarOptions.getAttribute("class")=="tails"){
			relativeContainer.innerHTML = previousShoes;
			avatarOptions.setAttribute("class", "shoes");
			$("#buttons").html('<button id="randomizeShoes" onclick="randomizeShoes()">Randomize shoes</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="wings"){
			$(".wings").remove();
			avatarOptions.setAttribute("class", "tails");
			$("#buttons").html('<button id="randomizeTail" onclick="randomizeTail()">Randomize tail</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="accessories"){
			$(".accessories").remove();
			avatarOptions.setAttribute("class", "wings");
			$("#buttons").html('<button id="randomizeWings" onclick="randomizeWings()">Randomize wings</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="glasses"){
			$(".glasses").remove();
			avatarOptions.setAttribute("class", "accessories");
			$("#buttons").html('<button id="randomizeAccessories" onclick="randomizeAccessories()">Randomize accessories</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="hairPieces"){
			$(".hairPieces").remove();
			avatarOptions.setAttribute("class", "glasses");
			$("#buttons").html('<button id="randomizeGlasses" onclick="randomizeGlasses()">Randomize glasses</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="necklaces"){
			$(".necklaces").remove();
			avatarOptions.setAttribute("class", "hairPieces");
			$("#buttons").html('<button id="randomizeHairPieces" onclick="randomizeHairPieces()">Randomize hairPieces</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="capes"){
			$(".capes").remove();
			avatarOptions.setAttribute("class", "necklaces");
			$("#buttons").html('<button id="randomizeNecklaces" onclick="randomizeNecklaces()">Randomize necklace</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		else if(avatarOptions.getAttribute("class")=="pets"){
			$(".pets").remove();
			avatarOptions.setAttribute("class", "capes");
			$("#buttons").html('<button id="randomizeCapes" onclick="randomizeCapes()">Randomize cape</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
		}
		//topsBottoms, shoes, tail, wings, accessories, glasses, hairPieces, necklaces, capes, pets
		
	}
		function nextOptions(){
		if(avatarOptions.getAttribute("class")=="topsBottoms"){
			previousClothes = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeShoes" onclick="randomizeShoes()">Randomize shoes</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "shoes");
		}
		else if(avatarOptions.getAttribute("class")=="shoes"){
			previousShoes = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeTail" onclick="randomizeTail()">Randomize tail</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "tails");
		}
		else if(avatarOptions.getAttribute("class")=="tails"){
			previousTail = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeWings" onclick="randomizeWings()">Randomize wings</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "wings");
		}
		else if(avatarOptions.getAttribute("class")=="wings"){
			previousTail = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeAccessories" onclick="randomizeAccessories()">Randomize accessories</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "accessories");
		}
		else if(avatarOptions.getAttribute("class")=="accessories"){
			previousAccessories = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeGlasses" onclick="randomizeGlasses()">Randomize glasses</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "glasses");
		}
		else if(avatarOptions.getAttribute("class")=="glasses"){
			previousAccessories = relativeContainer.innerHTML;
			$("#buttons").html('<button id="randomizeHairPieces" onclick="randomizeHairPieces()">Randomize hairPieces</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "hairPieces");
		}
		else if(avatarOptions.getAttribute("class")=="hairPieces"){
			$("#buttons").html('<button id="randomizeNecklaces" onclick="randomizeNecklaces()">Randomize necklace</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "necklaces");
		}
		else if(avatarOptions.getAttribute("class")=="necklaces"){
			$("#buttons").html('<button id="randomizeCapes" onclick="randomizeCapes()">Randomize cape</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "capes");
		}
		else if(avatarOptions.getAttribute("class")=="capes"){
			$("#buttons").html('<button id="randomizePets" onclick="randomizePets()">Randomize pet</button><button id="back" onclick="backOptions()">Back</button><button id="next" onclick="nextOptions()">Next</button>');
			avatarOptions.setAttribute("class", "pets");
		}
		else if(avatarOptions.getAttribute("class")=="pets"){
			itemPreview.innerHTML = 'Name your character<br><input id="avatarName" maxlength="12" name="avatarName" type="text"/>';
			$("#buttons").html('<button onclick="postAvatarWithName()">Finish</button>');
			$("#buttons").css({"left":"200px"});
		}
	}
	function render_html_to_canvas(html, ctx, x, y, width, height) {
		var data = "data:image/svg+xml;charset=utf-8,"+'<svg xmlns="http://www.w3.org/2000/svg" width="'+width+'" height="'+height+'">' +
							'<foreignObject width="100%" height="100%">' +
							html_to_xml(html)+
							'</foreignObject>' +
							'</svg>';

		var img = new Image();
		img.onload = function () {
			ctx.drawImage(img, x, y);
		}
		img.src = data;
	}
	function html_to_xml(html) {
		var doc = document.implementation.createHTMLDocument('');
		doc.write(html);

		// You must manually set the xmlns if you intend to immediately serialize     
		// the HTML document to a string as opposed to appending it to a
		// <foreignObject> in the DOM
		doc.documentElement.setAttribute('xmlns', doc.documentElement.namespaceURI);

		// Get well-formed markup
		html = (new XMLSerializer).serializeToString(doc.body);
		return html;
	}
	function postAvatarWithName(){
		name = document.getElementById("avatarName").value;
		avatar = document.getElementById("relativeContainer").innerHTML;
		document.getElementById("itemPreview").innerHTML = "Great!";
		
		/*$("#relativeContainer").css({'margin':'0px', 'margin-left':'0px', 'width':'400px'});
		$("table").remove();
		document.getElementById("aftermath").innerHTML = '<audio loop><source src="audio/Chipmunks2.mp3" type="audio/mpeg"></audio><canvas style="border:2px solid black;" id="canvas1" width="600" height="500"></canvas>';
		//pubnub init
		var PUBNUB_mine = PUBNUB.init({
			publish_key: 'pub-c-a495ff0a-174c-4c53-8ecc-156ece178e0c',
			subscribe_key: 'sub-c-b18ceac4-a61e-11e7-88d7-aa3d3dcf7b8c',
			ssl: true
		  });*/
		//$(".blinking .blink").css({'visibility':'visible'});
		////////////////////////////////////////////////////////////////////////////////////////////////////
		//avatar = escape(avatar);
		/*
		var rand = Math.floor(Math.random()*1000).toString();
		var theName = av+rand;
		if (av == ""){
			theName = "guest";
		}
		if (me_id == "10155567524149846"){
			theName = "Erintuitive";
		}
		var num = 0;
		var count1 = 0;
		var count2 = 0;
		var countPresent = 0;
		window.localStorage.setItem("avatar", avatar);
		////jsonbin.io/b/59c42edabbab4566375b747c
		//POST (RAW) /b/:id
		//POST (RAW) /b/update/:id
		$.post("http://www.jsonapi.eu3.biz/test.php", {var1: count1});
		$.get("https://jsonbin.io/b/59c42edabbab4566375b747c", function (data3, textStatus3, jqXHR3) {
			if(data3['person'].length == 0){
				$.ajax({
					url:"https://jsonbin.io/b/update/59c42edabbab4566375b747c",
					type:"PUT",
					data: '{"person": [{"user_id":"'+me_id+'", "name":"'+theName+'", "avatar":"'+avatar+'", "pos_x": -1, "pos_y": -1, "facingLeft": false, "blink": false, "spinningLeft": false, "spinningRight": false]}',
					contentType:"application/json; charset=utf-8",
					dataType:"json",
					success: function(data, textStatus, jqXHR){
						itemPreview.innerHTML = "Great!";
						window.location.replace("spaceScene.php");
					}
				});
			}
			for(i=0; i<data3['person'].length; i++){
				if(data3['person'][i]['user_id'] != me_id){
					count1 += 1;
				}
				else {
					count2 += 1;
					countPresent = i;
				}
			}
			if(count1 == 0 && count2 > 0){
				$.ajax({
					url:"https://jsonbin.io/b/update/59c42edabbab4566375b747c",
					type:"PUT",
					data: '{"person": [{"user_id":"'+me_id+'", "name":"'+theName+'", "avatar":"'+avatar+'", "pos_x": -1, "pos_y": -1, "facingLeft": false, "blink": false, "spinningLeft": false, "spinningRight": false]}',
					contentType:"application/json; charset=utf-8",
					dataType:"json",
					success: function(data, textStatus, jqXHR){
						itemPreview.innerHTML = "Great!";
						window.location.replace("spaceScene.php");
					}
				});
			}
			else if(count1 > 0 && count2 == 0){
				var pushThis = {
					"user_id": me_id,
					"name":theName,
					"avatar":avatar,
					"pos_x": -1,
					"pos_y": -1,
					"facingLeft": false,
					"blink": false,
					"spinningLeft": false,
					"spinningRight": false
				};
				data3['person'].push(pushThis);
				var len = data3['person'].length;
				document.getElementById("relativeContainer").innerHTML = "ok";
				$.ajax({
					url:"https://api.myjson.com/bins/vzecj",
					type:"PUT",
					data: JSON.stringify(data3),
					contentType:"application/json; charset=utf-8",
					dataType:"json",
					success: function(data, textStatus, jqXHR){
						itemPreview.innerHTML = "Great!";
						window.location.replace("spaceScene.php");
					}
				});
			}
			else if(count1 > 0 && count2 > 0){
				for(i=0; i<data3['person'].length; i++){
					if(data3['person'][i]['user_id'] == me_id){
						data3['person'][i]['avatar'] = avatar;
						data3['person'][i]['name'] = theName;
						data3['person'][i]['pos_x'] = -1;
						data3['person'][i]['pos_y'] = -1;
						data3['person'][i]['facingLeft'] = false;
						data3['person'][i]['blink'] = false;
						data3['person'][i]['spinningLeft'] = false;
						data3['person'][i]['spinningRight'] = false;
						$.ajax({
							url:"https://api.myjson.com/bins/vzecj",
							type:"PUT",
							data: JSON.stringify(data3),
							contentType:"application/json; charset=utf-8",
							dataType:"json",
							success: function(data, textStatus, jqXHR){
								itemPreview.innerHTML = "Great!";
								window.location.replace("spaceScene.php");
							}
						});
						break;
					}
				}
				
			}
		});*/
	}
	function spriteSheet(){
		html2canvas($("#sprite"), {
			onrendered: function(canvas) {
				document.body.appendChild(canvas);
				Canvas2Image.saveAsPNG(canvas);
				$("#img-out").append(canvas);
			}
		});
	}
	function pet(){
		var pets = [''];
		for(i=1; i<=18; i++){
			pets.push('<img class="pets" src="svg/human/humanClothes/pets/pet'+i.toString()+'.svg" alt="pet">');
		}
		if($(".woman")[0]){
			pets.push('<img class="pets" src="svg/human/humanClothes/pets/female_pet19.svg" alt="pet">');
		}
		else if($(".woman")[0]){
			pets.push('<img class="pets" src="svg/human/humanClothes/pets/pet19.svg" alt="pet">');
		}
		return shuffle(pets);
	}
	function cape(){
		var capes = [''];
		for(i=1; i<=4; i++){
			capes.push('<img class="capes" src="svg/human/humanClothes/capes/cape'+i.toString()+'.svg" alt="cape">')
		}
		return shuffle(capes);
	}
	function necklace(){
		var necklaces = [''];
		for(i=1; i<=6; i++){
			necklaces.push('<img class="necklaces" src="svg/human/humanClothes/necklaces/necklace'+i.toString()+'.svg" alt="necklace">');
		}
		return shuffle(necklaces);
	}
	function tail(){
		var tails = ['', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 163.34844970703125 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 265.744 774.119 C 271.009 774.119 276.283 781.537 279.473 784.728 C 282.045 787.3 289.036 788.251 290.706 791.592 C 295.682 801.544 300.067 810.189 300.067 823.419 C 300.067 827.399 305.154 831.873 303.812 835.9 C 303.275 837.509 300.669 837.171 300.067 837.772 C 298.923 838.916 301.211 843.493 300.067 844.637 C 297.675 847.03 297.639 853.794 296.323 857.742 C 291.395 872.525 282.679 889.824 288.21 906.418 C 289.798 911.18 293.946 911.53 296.947 914.531 C 299.27 916.854 299.918 920.622 301.939 922.643 C 302.552 923.256 299.121 919.179 298.819 918.275 C 297.385 913.974 295.699 909.245 295.699 903.922 C 295.699 903.563 294.554 896.433 295.075 896.433 C 297.504 896.433 302.602 908.368 303.812 910.786 C 308.083 919.329 315.847 926.706 325.653 929.508 C 326.913 929.868 335.665 934.474 336.886 933.252 C 339.062 931.077 327.342 918.715 326.277 917.651 C 325.195 916.568 326.277 909.237 326.277 907.666 C 326.277 901.512 324.363 888.278 320.661 884.576 C 320.174 884.089 320.037 876.464 320.037 876.464 C 320.037 876.464 330.799 889.565 331.27 890.193 C 332.17 891.393 332.934 892.689 333.766 893.937 C 334.598 895.185 335.402 896.452 336.262 897.681 C 337.867 899.974 341.879 906.72 341.879 903.922 C 341.879 893.535 351.608 876.419 344.999 867.727 C 333.893 853.12 332.773 865.686 334.39 834.652 C 334.507 832.4 347.807 816.866 344.999 814.058 C 342.489 811.549 342.979 804.292 340.007 800.329 C 338.787 798.703 329.398 789.72 329.398 789.72 C 329.398 789.72 332.865 789.628 333.142 789.72 C 337.89 791.303 342.949 792.573 347.495 794.089 C 349.237 794.669 350.615 799.081 350.615 799.081 C 350.615 799.081 349.446 786.757 348.743 785.352 C 346.49 780.845 338.616 778.345 335.014 774.743 C 332.13 771.859 329.538 766.771 326.277 763.51 C 322.176 759.409 327.484 764.536 316.292 761.014 C 307.815 758.346 295.814 776.614 275.105 772.246" style="stroke: rgb(0, 0, 0); fill: rgb(216, 216, 216);"/><path d="M 283.842 787.187 C 287.017 787.187 290.196 792.836 292.12 795.265 C 293.671 797.224 297.886 797.948 298.893 800.493 C 301.893 808.072 304.537 814.655 304.537 824.73 C 304.537 827.76 307.604 831.168 306.795 834.235 C 306.471 835.46 304.9 835.202 304.537 835.66 C 303.847 836.531 305.227 840.017 304.537 840.888 C 303.095 842.71 303.073 847.861 302.279 850.868 C 299.308 862.125 294.053 875.299 297.388 887.936 C 298.345 891.562 300.846 891.828 302.656 894.114 C 304.056 895.883 304.447 898.752 305.666 900.292 C 306.035 900.758 303.966 897.653 303.784 896.965 C 302.92 893.689 301.903 890.088 301.903 886.035 C 301.903 885.762 301.213 880.331 301.527 880.331 C 302.992 880.331 306.065 889.42 306.795 891.262 C 309.37 897.768 314.051 903.386 319.964 905.52 C 320.723 905.793 326 909.301 326.737 908.37 C 328.049 906.714 320.982 897.301 320.34 896.49 C 319.688 895.665 320.34 890.083 320.34 888.886 C 320.34 884.2 319.186 874.122 316.954 871.303 C 316.66 870.932 316.578 865.125 316.578 865.125 C 316.578 865.125 323.066 875.101 323.35 875.58 C 323.893 876.494 324.354 877.481 324.855 878.431 C 325.357 879.381 325.842 880.346 326.36 881.283 C 327.328 883.028 329.747 888.165 329.747 886.035 C 329.747 878.125 335.613 865.09 331.628 858.472 C 324.932 847.348 324.257 856.917 325.232 833.284 C 325.302 831.57 333.321 819.739 331.628 817.601 C 330.115 815.691 330.41 810.164 328.618 807.146 C 327.883 805.908 322.222 799.067 322.222 799.067 C 322.222 799.067 324.312 798.997 324.479 799.067 C 327.342 800.273 330.392 801.24 333.133 802.395 C 334.183 802.836 335.014 806.196 335.014 806.196 C 335.014 806.196 334.309 796.811 333.886 795.74 C 332.527 792.309 327.78 790.404 325.608 787.662 C 323.869 785.465 322.306 781.591 320.34 779.108 C 317.867 775.985 321.068 779.889 314.32 777.206 C 309.208 775.175 301.973 789.086 289.486 785.761" style="stroke: rgb(0, 0, 0); fill: rgb(78, 78, 78);"/></svg>', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 163.34844970703125 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 265.744 774.119 C 271.009 774.119 276.283 781.537 279.473 784.728 C 282.045 787.3 289.036 788.251 290.706 791.592 C 295.682 801.544 300.067 810.189 300.067 823.419 C 300.067 827.399 305.154 831.873 303.812 835.9 C 303.275 837.509 300.669 837.171 300.067 837.772 C 298.923 838.916 301.211 843.493 300.067 844.637 C 297.675 847.03 297.639 853.794 296.323 857.742 C 291.395 872.525 282.679 889.824 288.21 906.418 C 289.798 911.18 293.946 911.53 296.947 914.531 C 299.27 916.854 299.918 920.622 301.939 922.643 C 302.552 923.256 299.121 919.179 298.819 918.275 C 297.385 913.974 295.699 909.245 295.699 903.922 C 295.699 903.563 294.554 896.433 295.075 896.433 C 297.504 896.433 302.602 908.368 303.812 910.786 C 308.083 919.329 315.847 926.706 325.653 929.508 C 326.913 929.868 335.665 934.474 336.886 933.252 C 339.062 931.077 327.342 918.715 326.277 917.651 C 325.195 916.568 326.277 909.237 326.277 907.666 C 326.277 901.512 324.363 888.278 320.661 884.576 C 320.174 884.089 320.037 876.464 320.037 876.464 C 320.037 876.464 330.799 889.565 331.27 890.193 C 332.17 891.393 332.934 892.689 333.766 893.937 C 334.598 895.185 335.402 896.452 336.262 897.681 C 337.867 899.974 341.879 906.72 341.879 903.922 C 341.879 893.535 351.608 876.419 344.999 867.727 C 333.893 853.12 332.773 865.686 334.39 834.652 C 334.507 832.4 347.807 816.866 344.999 814.058 C 342.489 811.549 342.979 804.292 340.007 800.329 C 338.787 798.703 329.398 789.72 329.398 789.72 C 329.398 789.72 332.865 789.628 333.142 789.72 C 337.89 791.303 342.949 792.573 347.495 794.089 C 349.237 794.669 350.615 799.081 350.615 799.081 C 350.615 799.081 349.446 786.757 348.743 785.352 C 346.49 780.845 338.616 778.345 335.014 774.743 C 332.13 771.859 329.538 766.771 326.277 763.51 C 322.176 759.409 327.484 764.536 316.292 761.014 C 307.815 758.346 295.814 776.614 275.105 772.246" style="stroke: rgb(0, 0, 0); fill: rgb(235, 172, 48);"/><path d="M 283.842 787.187 C 287.017 787.187 290.196 792.836 292.12 795.265 C 293.671 797.224 297.886 797.948 298.893 800.493 C 301.893 808.072 304.537 814.655 304.537 824.73 C 304.537 827.76 307.604 831.168 306.795 834.235 C 306.471 835.46 304.9 835.202 304.537 835.66 C 303.847 836.531 305.227 840.017 304.537 840.888 C 303.095 842.71 303.073 847.861 302.279 850.868 C 299.308 862.125 294.053 875.299 297.388 887.936 C 298.345 891.562 300.846 891.828 302.656 894.114 C 304.056 895.883 304.447 898.752 305.666 900.292 C 306.035 900.758 303.966 897.653 303.784 896.965 C 302.92 893.689 301.903 890.088 301.903 886.035 C 301.903 885.762 301.213 880.331 301.527 880.331 C 302.992 880.331 306.065 889.42 306.795 891.262 C 309.37 897.768 314.051 903.386 319.964 905.52 C 320.723 905.793 326 909.301 326.737 908.37 C 328.049 906.714 320.982 897.301 320.34 896.49 C 319.688 895.665 320.34 890.083 320.34 888.886 C 320.34 884.2 319.186 874.122 316.954 871.303 C 316.66 870.932 316.578 865.125 316.578 865.125 C 316.578 865.125 323.066 875.101 323.35 875.58 C 323.893 876.494 324.354 877.481 324.855 878.431 C 325.357 879.381 325.842 880.346 326.36 881.283 C 327.328 883.028 329.747 888.165 329.747 886.035 C 329.747 878.125 335.613 865.09 331.628 858.472 C 324.932 847.348 324.257 856.917 325.232 833.284 C 325.302 831.57 333.321 819.739 331.628 817.601 C 330.115 815.691 330.41 810.164 328.618 807.146 C 327.883 805.908 322.222 799.067 322.222 799.067 C 322.222 799.067 324.312 798.997 324.479 799.067 C 327.342 800.273 330.392 801.24 333.133 802.395 C 334.183 802.836 335.014 806.196 335.014 806.196 C 335.014 806.196 334.309 796.811 333.886 795.74 C 332.527 792.309 327.78 790.404 325.608 787.662 C 323.869 785.465 322.306 781.591 320.34 779.108 C 317.867 775.985 321.068 779.889 314.32 777.206 C 309.208 775.175 301.973 789.086 289.486 785.761" style="stroke: rgb(0, 0, 0); fill: rgb(228, 47, 47);"/></svg>', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 163.34844970703125 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 273.233 769.751 C 292.036 769.751 313.837 766.67 330.022 782.856 C 333.747 786.581 333.442 796.562 335.638 800.953 C 338.344 806.364 339.397 814.653 336.886 819.675 C 333.56 826.327 330.998 834.924 325.029 840.893 C 321.955 843.967 306.33 840.87 301.939 845.261 C 299.102 848.098 291 852.896 285.714 850.253 C 275.952 845.373 259.758 832.896 267.616 817.179 C 270.859 810.693 277.294 808.432 280.098 802.825 C 281.311 800.399 298.819 798.457 298.819 798.457 C 298.819 798.457 281.346 792.841 281.346 792.841 C 281.346 792.841 312.386 789.559 315.044 792.216 C 316.482 793.654 301.332 812.49 298.195 814.058 C 297.334 814.489 299.443 804.073 299.443 804.073 C 299.443 804.073 267.127 819.186 280.098 832.156 C 293.336 845.393 316.984 831.397 323.781 817.803 C 337.903 789.558 304.102 782.329 288.834 777.239 C 283.212 775.365 262.624 780.495 262.624 774.743" style="stroke: rgb(0, 0, 0); fill: rgb(255, 0, 0);"/></svg>', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 163.34844970703125 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 272.609 769.751 C 291.412 769.751 313.213 766.67 329.398 782.856 C 333.123 786.581 332.818 796.562 335.014 800.953 C 337.72 806.364 338.773 814.653 336.262 819.675 C 332.936 826.327 330.374 834.924 324.405 840.893 C 321.331 843.967 305.706 840.87 301.315 845.261 C 298.478 848.098 290.376 852.896 285.09 850.253 C 275.328 845.373 259.134 832.896 266.992 817.179 C 270.235 810.693 276.67 808.432 279.474 802.825 C 280.687 800.399 298.195 798.457 298.195 798.457 C 298.195 798.457 280.722 792.841 280.722 792.841 C 280.722 792.841 311.762 789.559 314.42 792.216 C 315.858 793.654 300.708 812.49 297.571 814.058 C 296.71 814.489 298.819 804.073 298.819 804.073 C 298.819 804.073 266.503 819.186 279.474 832.156 C 292.712 845.393 316.36 831.397 323.157 817.803 C 337.279 789.558 303.478 782.329 288.21 777.239 C 282.588 775.365 262 780.495 262 774.743" style="stroke: rgb(0, 0, 0); fill: rgb(255, 179, 0);"/></svg>', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 198.848388671875 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 260.412 758.125 C 264.974 758.125 279.031 748.189 284.243 745.582 C 296.946 739.231 312.219 752.605 322.499 747.464 C 330.787 743.32 339.798 739.424 348.212 732.412 C 350.167 730.783 378.886 706.016 373.298 700.428 C 368.552 695.683 366.495 684.846 360.755 679.105 C 358.289 676.639 344.343 676.85 342.568 676.597 C 322.865 673.782 320.709 657.429 315.601 642.104 C 314.582 639.049 312.435 630.218 315.601 627.053 C 326.15 616.503 346.494 612.547 358.873 606.357 C 359.892 605.848 353.961 610.747 351.975 610.747 C 347.727 610.747 341.292 618.315 339.432 622.035 C 335.732 629.435 346.694 614.246 351.975 619.527 C 353.684 621.236 336.816 637.607 341.94 642.731 C 342.822 643.613 346.7 634.947 349.466 637.714 C 349.605 637.853 351.496 655.092 351.975 656.528 C 354.705 664.718 370.374 666.36 375.179 675.97 C 381.265 688.141 387.116 685.42 382.705 714.225 C 382.547 715.255 378.067 724.463 377.06 726.141 C 370.626 736.864 362.616 744.995 356.365 757.498 C 355.609 759.01 342.988 762.935 342.568 762.515 C 340.607 760.555 350.972 763.707 351.348 763.77 C 357.946 764.869 359.249 754.069 370.162 750.599 C 372.586 749.828 387.129 749.346 384.586 749.346 C 371.704 749.346 334.24 777.873 322.499 773.176 C 313.036 769.391 299.376 756.244 290.515 756.244" style="stroke: rgb(0, 0, 0); fill: rgb(148, 148, 148);"/></svg>', '<svg class="tails" width="86" height="380" viewBox="202.71499633789062 584.406982421875 198.848388671875 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 260.412 758.125 C 264.974 758.125 279.031 748.189 284.243 745.582 C 296.946 739.231 312.219 752.605 322.499 747.464 C 330.787 743.32 339.798 739.424 348.212 732.412 C 350.167 730.783 378.886 706.016 373.298 700.428 C 368.552 695.683 366.495 684.846 360.755 679.105 C 358.289 676.639 344.343 676.85 342.568 676.597 C 322.865 673.782 320.709 657.429 315.601 642.104 C 314.582 639.049 312.435 630.218 315.601 627.053 C 326.15 616.503 346.494 612.547 358.873 606.357 C 359.892 605.848 353.961 610.747 351.975 610.747 C 347.727 610.747 341.292 618.315 339.432 622.035 C 335.732 629.435 346.694 614.246 351.975 619.527 C 353.684 621.236 336.816 637.607 341.94 642.731 C 342.822 643.613 346.7 634.947 349.466 637.714 C 349.605 637.853 351.496 655.092 351.975 656.528 C 354.705 664.718 370.374 666.36 375.179 675.97 C 381.265 688.141 387.116 685.42 382.705 714.225 C 382.547 715.255 378.067 724.463 377.06 726.141 C 370.626 736.864 362.616 744.995 356.365 757.498 C 355.609 759.01 342.988 762.935 342.568 762.515 C 340.607 760.555 350.972 763.707 351.348 763.77 C 357.946 764.869 359.249 754.069 370.162 750.599 C 372.586 749.828 387.129 749.346 384.586 749.346 C 371.704 749.346 334.24 777.873 322.499 773.176 C 313.036 769.391 299.376 756.244 290.515 756.244" style="stroke: rgb(0, 0, 0); fill: rgb(146, 208, 130);"/></svg>'];
		return shuffle(tails);
	}
	function glasses(){
		var glasses = [''];
		for(i=1; i<=6; i++){
			glasses.push('<img class="glasses" src="svg/human/humanClothes/glasses/glasses'+i.toString()+'.svg" alt="glasses">');
		}
		return shuffle(glasses);
	}
	function accessories(){
		var accessories = [''];
		for(i=1; i<=8; i++){
			accessories.push('<img class="accessories" id="accessory'+i.toString()+'" src="svg/human/humanClothes/accessories/accessory'+i.toString()+'.svg" alt="accessories">');
		}
		return shuffle(accessories);
	}
	function wings(){
		var wings = [''];
		for(i=1; i<=12; i++){
			wings.push('<img class="wings" src="svg/human/humanClothes/wings/wings'+i.toString()+'.svg" alt="wings">');
		}
		return shuffle(wings);
	}
	function maleShoes(){
		var maleShoes = [];
		for (i=1; i<=13; i++){
			maleShoes.push('<img class="shoes" src="svg/human/humanClothes/shoes/shoes'+i.toString()+'.svg" alt="shoes">');
		}
		maleShoes.push('');
		return shuffle(maleShoes);
	}
	function femaleShoes(){
		var femaleShoes = [];
		for (i=1; i<=16; i++){
			femaleShoes.push('<img class="shoes" src="svg/human/humanClothes/female_shoes/female_shoes'+i.toString()+'.svg" alt="shoes">');
		}
		femaleShoes.push('');
		return shuffle(femaleShoes);
	}
	function maleHairPieces(){
		var maleHairPieces = ['', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece1.svg" style="position: absolute; z-index: 41; top: -40px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece2.svg" style="position: absolute; z-index: 41; top: -30px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece3.svg" style="position: absolute; z-index: 41; top: -78px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece4.svg" style="position: absolute; z-index: 41; top: -40px; left: -7px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece5.svg" style="position: absolute; z-index: 41; top: -15px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece6.svg" style="position: absolute; z-index: 41; top: -60px; left: 2px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece7.svg" style="position: absolute; z-index: 41; top: -67px; left: -9px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/neutralHairPiece8.svg" style="position: absolute; z-index: 41; top: -30px; left: 0;"/>', /*only male hairpieces*/ '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/maleHairPiece1.svg" style="position: absolute; z-index: 41; top: -30px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/male_hairPieces/maleHairPiece2.svg" style="position: absolute; z-index: 41; top: -18px; left: 0;"/>'];
		return shuffle(maleHairPieces);
	}
	function femaleHairPieces(){
		var femaleHairPieces = ['', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/female_hairPiece1.svg" style="position: absolute; z-index: 41; top: -14px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/female_hairPiece2.svg" style="position: absolute; z-index: 41; top: -14px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/female_hairPiece3.svg" style="position: absolute; z-index: 41; top: 15px; left: 0px; -ms-transform: scale(1.18, 1.3); -webkit-transform: scale(1.18, 1.3); transform: scale(1.18, 1.3);"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/female_hairPiece6.svg" style="position: absolute; z-index: 41; top: -27px; left: -22px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece1.svg" style="position: absolute; z-index: 41; top: -40px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece2.svg" style="position: absolute; z-index: 41; top: -27px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece3.svg" style="position: absolute; z-index: 41; top: -78px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece4.svg" style="position: absolute; z-index: 41; top: -37px; left: -7px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece5.svg" style="position: absolute; z-index: 41; top: -15px; left: 0;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece6.svg" style="position: absolute; z-index: 41; top: -60px; left: 2px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece7.svg" style="position: absolute; z-index: 41; top: -67px; left: -9px;"/>', '<img class="hairPieces" src="svg/human/humanClothes/female_hairPieces/neutralHairPiece8.svg" style="position: absolute; z-index: 41; top: -27px; left: 0;"/>'];
		return shuffle(femaleHairPieces);
	}
	function randomizeHairPieces(){
		$(".hairPieces").remove();
		if($(".man")[0]){
			$("#relativeContainer").append(maleHairPieces()[0]);
		}
		else if($(".woman")[0]){
			$("#relativeContainer").append(femaleHairPieces()[0]);
		}
		$("#neutralHairPiece7").css({'top':'-28px', 'left':'-20px'});
		$("#neutralHairPiece6").css({'top':'-26px', 'left':'2px'});
		$("#neutralHairPiece5").css({'top':'3px'});
		$("#neutralHairPiece4").css({'top':'-7px', 'left':'-7px'});;
	}
	function randomizeGlasses(){
		$(".glasses").remove();
		$("#relativeContainer").append(glasses()[0]);
		$("#relativeContainer .glasses").css({'position':'absolute', 'z-index':'40', 'top':'5px', 'left':'0', 'margin-top':'0'});
	}
	function randomizeAccessories(){
		$(".accessories").remove();
		$("#relativeContainer").append(accessories()[0]);
		$("#relativeContainer .accessories").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0', 'z-index':'30'});
		$("#accessory6").css({'position':'absolute', 'top':'0', 'left':'25px', 'margin-top':'0'});
		$("#accessory7").css({'position':'absolute', 'top':'0', 'left':'25px', 'margin-top':'0'});
		$("#accessory8").css({'position':'absolute', 'top':'0', 'left':'25px', 'margin-top':'0'});
	}
	function randomizeWings() {
		$(".wings").remove();
		$("#relativeContainer").append(wings()[0]);
		$("#relativeContainer .wings").css({'position':'absolute', 'top':'0', 'left':'0', 'z-index':'-18', 'margin-top':'0', '-ms-transform': 'scale(3)', '-webkit-transform': 'scale(3)', 'transform': 'scale(3)'});
	}
	function randomizeTail() {
		relativeContainer.innerHTML = '';
		$("#relativeContainer").append(tail()[0]);
		$("#relativeContainer .tails").css({'position':'absolute', 'top':'0', 'left':'51px', 'margin-top':'0'});
		$("#relativeContainer").append(previousShoes);
		$("#relativeContainer .tails").css({'position':'absolute', 'top':'0', 'eft':'0', 'z-index':'1', 'margin-top':'0'});
		$(".tails").find("path, polygon").attr("fill", getRandomColor());
	}
	function randomizeTop() {
		$("#relativeContainer button").show();
		if($(".man")[0]){
			var pants = $("#relativeContainer .pants")[0];
			var pantsOverlay = $("#relativeContainer .bottomOverlay")[0];
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append(maleTopOverlays()[0]);
			colorTop();
			$("#relativeContainer").append(pants);
			$("#relativeContainer").append(pantsOverlay);
			var mouth = $("#relativeContainer .mouth")[0];
			$("#relativeContainer .mouth").remove();
			$("#relativeContainer").append(mouth);
			$("#relativeContainer .mouth").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'-2px', 'margin-top':'0'});
			$("#relativeContainer .shirtOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
		}
		else if ($(".woman")[0]){
			var pants = $("#relativeContainer .pants")[0];
			var pantsOverlay = $("#relativeContainer .bottomOverlay")[0];
			relativeContainer.innerHTML = previous;
			//here
			$("#relativeContainer").append(femaleTopOverlays()[0]);
			colorTop();
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer .shirtOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer").append(pants);
			$("#relativeContainer").append(pantsOverlay);
			var mouth = $("#relativeContainer .mouth")[0];
			$("#relativeContainer .mouth").remove();
			$("#relativeContainer").append(mouth);
			$("#relativeContainer .mouth").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
		}
	}
	function randomizeBottom() {
		$("#relativeContainer button").show();
		if($(".man")[0]){
			var shirtOverlay = $("#relativeContainer .shirtOverlay")[0];
			var shirt = $("#relativeContainer .shirt")[0];
			var randColor = getRandomColor();
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append(maleBottomOverlays()[0]);
			$("#relativeContainer .shirt").remove();
			$("#relativeContainer .shirtOverlay").remove();
			$("#relativeContainer .pants").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer .bottomOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer").append(shirt);
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer").append(shirtOverlay);
			$("#relativeContainer .shirtOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			var mouth = $("#relativeContainer .mouth")[0];
			$("#relativeContainer .mouth").remove();
			$("#relativeContainer").append(mouth);
			$("#relativeContainer .mouth").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$(".pants").find("path, polygon").attr("fill", randColor);
			$(".pants").find("path, polygon").css({"fill": randColor});
		}
		else if ($(".woman")[0]){
			var shirtOverlay = $("#relativeContainer .shirtOverlay")[0];
			var shirt = $("#relativeContainer .shirt")[0];
			var randColor = getRandomColor();
			relativeContainer.innerHTML = previous;
			//here
			$("#relativeContainer").append(femaleBottomOverlays()[0]);
			$("#relativeContainer .shirt").remove();
			$("#relativeContainer .shirtOverlay").remove();
			$("#relativeContainer .pants").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer .bottomOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer").append(shirt);
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$("#relativeContainer").append(shirtOverlay);
			$("#relativeContainer .shirtOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			var mouth = $("#relativeContainer .mouth")[0];
			$("#relativeContainer .mouth").remove();
			$("#relativeContainer").append(mouth);
			$("#relativeContainer .mouth").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			$(".pants").find("path, polygon").attr("fill", randColor);
			$(".pants").find("path, polygon").css({"fill": randColor});
		}
	}
	function maleTopOverlays(){
		var tops1 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/></defs><rect id="svgEditorBackground" x="202.71499633789062" y="584.431030273437                                                                                                                               5" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/><polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/><polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 205.48 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 277.133 780.469 269.745 778.75 290.621 778.837 289.676 672.819 259.005 654.434" fill="red" class="shirt"/></svg>';
		var tops2 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="236.324 654.435 204.02 670.242 206.082 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 276.532 778.665 277.562 778.149 290.621 778.837 289.075 671.617 259.005 654.434 259.349 792.927 246.633 791.897 239.417 792.927" fill="red" class="shirt"/></svg>';
		var tops3 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="230.138 657.184 204.02 670.242 204.879 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 277.133 778.063 277.562 778.149 290.621 778.837 289.676 671.016 264.503 657.871 266.909 693.268 246.633 791.897 227.732 692.58 234.004 656.582 242.338 665.259 234.455 703.341 245.817 742.11 259.928 705.274 251.863 663.144 260.981 655.379" fill="red" class="shirt"/> <polygon id="e3_polygon" style="stroke-width: 0px; stroke: none;" points="243.197 661.307 233.575 703.92 246.633 741.035 247.321 741.035 261.067 704.607 251.444 661.307" fill="lime" class="ties"/></svg>';
		var tops3 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="230.138 657.184 204.02 670.242 204.879 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 277.133 778.063 277.562 778.149 290.621 778.837 289.676 671.016 264.503 657.871 266.909 693.268 246.633 791.897 227.732 692.58 234.004 656.582 242.338 665.259 234.455 703.341 245.817 742.11 259.928 705.274 251.863 663.144 260.981 655.379" fill="red" class="shirt"/> <polygon id="e3_polygon" style="stroke-width: 0px; stroke: none;" points="243.197 661.307 233.575 703.92 246.633 741.035 247.321 741.035 261.067 704.607 251.444 661.307" fill="lime" class="ties"/></svg>';
		var tops4 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 199.896 735.536 212.955 734.849 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 272.751 734.161 281.686 736.223 291.308 736.224 288.473 671.617 259.005 654.434" fill="red" class="shirt" transform=""/></svg>';
		var tops5 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 204.02 697.906 228.763 692.579 204.707 700.311 204.965 709.01 209.347 712.21 215.361 715.862 204.879 718.138 199.896 735.536 212.955 734.849 215.017 686.737 208.832 792.583 280.14 792.754 274.126 684.676 272.751 734.161 281.686 736.223 291.308 736.224 287.013 706.326 287.614 698.937 268.971 695.673 290.106 693.955 289.676 671.617 259.005 654.434 248.352 704.608 265.191 719.041 244.915 735.536 265.706 736.224 241.737 756.499 267.554 755.64 239.911 762.084 246.634 774.026 222.578 755.297 251.788 743.87 227.389 735.193 238.386 721.103 226.015 716.292 242.51 705.983" fill="red" class="shirt"/></svg>';
		var tops6 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" ><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt" /></defs><rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt" /><polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt" /><polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 201.958 701.858 211.581 701.858 212.268 688.112 208.832 792.583 278.937 793.957 280.312 765.778 280.312 697.734 289.246 699.109 291.308 676.428 288.559 675.741 259.005 654.434" fill="red" class="shirt" /></svg>';
		var tops7 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt" /></defs><g transform="matrix(0.987432, 0, 0, 1.836878, 569.032532, -276.123749)"><polygon stroke="black" id="polygon-1" points="-368.388 511.137 -364.319 584.419 -294.47 586.138 -294.47 585.867 -287.971 510.866 -315.819 507.414 -329.533 551.616 -340.296 507.279" style="stroke-width: 0; fill: rgb(255, 0, 0);" transform="" class="shirt" /><path d="M -316.131 519.16 C -305.842 516.588 -305.842 521.732 -295.553 519.16 L -295.553 537.166 C -305.842 539.738 -305.842 534.593 -316.131 537.166 Z" stroke="black" id="e4_shape" style="vector-effect: non-scaling-stroke; stroke-width: 0; fill: rgb(255, 0, 0);" class="shirt" /><rect x="30.75" y="62.677" stroke="black" id="e5_rectangle" width="3.738" height="40.469" transform="matrix(1.000001, 0, 0, 0.999999, -362.041074, 480.968523)" style="stroke-width: 0; fill: rgb(255, 0, 0);" class="shirt" /></g></svg>';
		var tops8 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt" /></defs><g><g transform="matrix(0.987432, 0, 0, 1.836878, 569.032532, -276.123749)"><polygon stroke="black" id="polygon-1" points="-368.388 511.137 -364.319 584.419 -294.47 586.138 -294.47 585.867 -287.971 510.866 -315.819 507.414 -329.533 551.616 -340.296 507.279" style="stroke-width: 0; fill: rgb(255, 0, 0);" transform="" class="shirt" /><path d="M -316.131 519.16 C -305.842 516.588 -305.842 521.732 -295.553 519.16 L -295.553 537.166 C -305.842 539.738 -305.842 534.593 -316.131 537.166 Z" stroke="black" id="e4_shape" style="vector-effect: non-scaling-stroke; stroke-width: 0; fill: rgb(255, 0, 0);" class="shirt" /><rect x="30.75" y="62.677" stroke="black" id="e5_rectangle" width="3.738" height="40.469" transform="matrix(1.000001, 0, 0, 0.999999, -362.041074, 480.968523)" style="stroke-width: 0; fill: rgb(255, 0, 0);" class="shirt" /></g><rect x="206.525" y="726.243" width="74.708" height="75.246" style="fill: rgb(255, 0, 0);" class="shirt" /><rect x="211.362" y="664.434" width="20.424" height="23.111" style="fill: rgb(255, 0, 0);" class="shirt" /></g></svg>';
		var tops9 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/></defs><g transform="matrix(0.916286, 0.023126, -0.044, 1.743336, 181.70813, 533.261719)"> <polygon stroke="black" id="polygon-1" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="31.895 74.704 39.477 149.163 105.813 149.705 105.813 149.434 112.312 74.433 79.347 70.981 70.75 115.183 59.987 70.846" class="shirt"/> <rect x="69.236" y="111.844" stroke="black" id="e5_rectangle" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" width="3.925" height="36.974" class="shirt"/> <polygon stroke="black" id="polygon-2" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="59.242 71.425 47.599 92.815 62.762 99.313 62.762 107.707 68.719 106.894 73.322 107.165 77.925 108.248 77.383 97.688 90.109 92.273 89.838 92.544 79.279 71.154 71.426 106.353 69.531 106.353" class="shirt"/> <circle id="e7_circle" cx="57.665" cy="84.313" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.511" transform="matrix(1.000003, 0, 0, 1, 22.020321, 27.863701)" class="shirt"/> <circle id="e8_circle" cx="52.219" cy="84.507" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.577" transform="matrix(0.999876, -0.015871, 0.015871, 0.999876, 25.58953, 36.223357)" class="shirt"/> </g></svg>';
		var tops10 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e6_polygon" style="stroke: none; stroke-width: 0px;" points="221.89 684.725 212.955 700.004 211.581 749.913 212.955 749.913 215.017 694.911" fill="black" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="276.463 752.052 272.504 750.647 271.101 687.404 271.816 687.404 272.889 741.951" fill="black" transform="matrix(-1, 0, 0, -1, 547.564033, 1439.45605)" class="shirt"/> <g transform="matrix(0.99938, 0.035204, -0.061664, 1.750514, 180.211166, 531.28833)"> <polygon stroke="black" id="polygon-1" points="38.156 78.428 39.477 149.163 105.131 148.66 105.443 143.443 100.486 76.295 79.304 70.276 70.75 115.183 59.987 70.846" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <rect x="68.992" y="107.212" stroke="black" id="e5_rectangle" width="3.085" height="40.575" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <polygon stroke="black" id="polygon-2" points="59.242 71.425 47.599 92.815 62.762 99.313 62.762 107.707 68.719 106.894 73.322 107.165 77.925 108.248 77.383 97.688 90.109 92.273 89.838 92.544 79.279 71.154 71.426 106.353 69.531 106.353" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <circle id="e7_circle" cx="57.665" cy="84.313" stroke="black" r="2.511" transform="matrix(1.000003, 0, 0, 1, 22.020321, 27.863701)" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <circle id="e8_circle" cx="52.219" cy="84.507" stroke="black" r="2.577" transform="matrix(0.999873, -0.015869, 0.015872, 0.999876, 25.589551, 36.223096)" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <circle id="e1_circle" cx="36.875" cy="93.924" stroke="black" r="2.577" transform="matrix(0.999874, -0.015868, 0.015871, 0.999876, 25.589611, 36.223228)" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> <circle id="e2_circle" cx="37.215" cy="104.673" stroke="black" r="2.577" transform="matrix(0.999874, -0.015868, 0.015871, 0.999873, 25.589619, 36.223515)" style="stroke-width: 0; stroke-opacity: 0; fill: rgb(255, 0, 0);" class="shirt"/> </g></svg>';
		var tops11 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e6_polygon" style="stroke: none; stroke-width: 0px;" points="221.89 684.725 212.955 700.004 211.581 749.913 212.955 749.913 215.017 694.911" fill="black" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="276.463 752.052 272.504 750.647 271.101 687.404 271.816 687.404 272.889 741.951" fill="black" transform="matrix(-1, 0, 0, -1, 547.564033, 1439.45605)" class="shirt"/> <g transform="matrix(1, 0, 0, 1.617883, 175.693512, 552.261353)"> <polygon stroke="black" id="polygon-1" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="36.041 73.017 34.586 140.473 35.153 153.722 99.636 153.321 105.433 139.957 104.866 110.309 99.586 71.726 87.994 67.893 71.562 146.591 50.723 67.14" class="shirt"/> <circle id="e7_circle" cx="74.993" cy="82.418" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.511" transform="matrix(1, 0, 0, 1.000003, 22.0205, 27.86345)" class="shirt"/> <circle id="e8_circle" cx="71.875" cy="91.589" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.577" transform="matrix(0.999873, -0.015871, 0.015871, 0.999876, 25.589714, 36.223337)" class="shirt"/> <circle id="e1_circle" cx="17.752" cy="70.332" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.577" transform="matrix(0.999874, -0.015871, 0.015871, 0.999876, 25.58961, 36.223383)" class="shirt"/> <circle id="e3_circle" cx="16.022" cy="90.166" stroke="black" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" r="2.577" transform="matrix(0.999873, -0.015871, 0.015871, 0.999876, 25.589627, 36.22335)" class="shirt"/> <polygon stroke="black" id="e10_polygon" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="45.704 92.003 41.914 92.815 40.289 96.605 45.163 99.042 48.412 94.71" class="shirt"/> <polygon stroke="black" id="e2_polygon" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="45.433 111.768 41.643 112.58 40.018 116.371 44.892 118.808 48.141 114.476" class="shirt"/> <polygon stroke="black" id="e13_polygon" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="95.825 96.335 93.118 102.291 98.803 102.021" class="shirt"/> <polygon stroke="black" id="e14_polygon" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="94.742 81.714 92.305 89.295 99.616 88.483" class="shirt"/> <polygon stroke="black" id="e15_polygon" style="stroke-opacity: 0; stroke-width: 0; fill: rgb(255, 0, 0);" points="43.297 80.089 40.861 88.483 47.359 88.212" class="shirt"/> </g></svg>';
		var tops12 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt" /> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt" /> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 201.958 701.858 211.581 701.858 212.268 688.112 208.832 792.583 278.937 793.957 280.312 765.778 280.312 697.734 289.246 699.109 291.308 676.428 288.559 675.741 259.005 654.434" fill="red" class="shirt" /> <rect transform="matrix(0.998386, 0.056753, -0.056754, 0.998388, -167.451984, 545.466651)" x="375.517" y="103.761" width="12.97" height="87.703" style="fill: lime; stroke-width: 0;" class="sleeves" /> <rect transform="matrix(0.998988, -0.044969, 0.044969, 0.998989, -102.095139, 587.324724)" x="375.516" y="103.761" width="12.97" height="87.703" style="fill: lime; stroke-width: 0;" class="sleeves" /></svg>';
		var tops13 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="clothes" /> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 201.958 701.858 211.581 701.858 212.268 688.112 208.832 792.583 278.937 793.957 280.312 765.778 280.312 697.734 289.246 699.109 291.308 676.428 288.559 675.741 259.005 654.434" fill="red" class="clothes" /> <rect transform="matrix(0.998387, 0.056753, -0.056754, 0.998389, -168.981584, 572.374657)" x="375.516" y="76.81" width="12.97" height="64.923" style="fill: rgb(43, 255, 0); stroke-width: 0;" class="clothes" /> <rect transform="matrix(0.998988, -0.044969, 0.044969, 0.998989, -100.664373, 619.10861)" x="375.516" y="71.945" width="12.97" height="60.811" style="fill: rgb(68, 255, 0); stroke-width: 0;" class="clothes" /></svg>';
		var maleTops = [tops1, tops2, tops3, tops4, tops5, tops6, tops7, tops8, tops9, tops10, tops11, tops12, tops13];
		var numbers = [12, 12, 12, 12, 6, 12, 12, 12, 12, 12, 12, 12, 12];
		for (k=0; k<13; k++){
			for (i=1; i<=numbers[k]; i++){
				maleTops.push(maleTops[k]+'<img class="shirtOverlay" src="svg/human/humanClothes/shirt'+(k+1).toString()+'_stickers/shirt'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		maleTops.push('');
		return shuffle(maleTops);
	}
	function maleBottomOverlays(){
		var bottoms1 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /></defs><path d="M 211.308 792.118 C 211.308 808.017 201.794 832.875 201.794 849.921 C 201.794 859.339 203.259 867.793 203.259 876.666 C 203.259 893.079 205.453 909.588 205.453 925.842 C 205.453 931.835 203.259 937.124 203.259 941.371 C 203.259 947.224 203.99 952.183 203.99 956.038 C 204.964 956.901 209.113 960.953 209.113 961.214 C 211.347 962.077 210.577 960.472 210.577 956.038 C 213.955 955.175 218.926 950.861 225.212 950.861 C 227.619 948.887 232.351 949.999 234.726 949.999 C 234.726 930.51 240.581 909.496 240.581 888.744 C 240.581 879.717 242.776 873 242.776 866.313 C 242.776 859.699 242.776 853.947 242.776 848.196 C 242.776 843.882 242.776 840.431 242.776 836.98 C 242.776 841.019 243.508 844.156 243.508 847.333 C 243.508 852.797 243.508 857.398 243.508 861.999 C 243.508 866.401 242.044 871.383 242.044 873.215 C 242.044 878.104 242.044 882.13 242.044 886.156 C 242.044 892.195 242.044 897.372 242.044 902.548 C 242.044 908.953 244.971 913.009 244.971 918.077 C 244.971 921.873 245.703 925.215 245.703 928.43 C 245.703 934.533 246.435 938.818 246.435 943.959 C 246.435 947.659 253.609 947.41 255.947 947.41 C 258.013 947.41 262.152 947.823 263.265 949.136 C 266.68 949.136 269.364 949.136 272.047 949.136 C 272.778 944.325 279.364 935.017 279.364 929.293 C 283.599 918.447 278.633 907.207 278.633 898.234 C 278.633 887.592 280.828 880.102 280.828 870.627 C 280.828 867.015 283.047 845.607 283.755 845.607 C 283.755 839.464 283.755 836.139 283.755 830.941 C 283.755 825.291 282.292 819.843 282.292 813.686 C 282.292 810.049 280.828 809.447 280.828 805.921 C 280.096 804.269 278.633 800.536 278.633 797.294 C 277.9 793.464 276.437 793.904 276.437 791.255 C 272.121 791.255 269.127 787.804 269.12 787.804 C 265.461 787.804 262.534 787.804 259.606 787.804 C 254.918 787.804 252.022 786.941 248.629 786.941 C 246.281 788.848 241.414 787.804 239.117 787.804 C 236.677 787.804 234.969 787.804 233.262 787.804 C 228.312 792.777 226.282 788.667 223.749 788.667 C 220.381 787.804 219.671 786.078 216.431 786.078 C 213.723 786.078 212.041 789.04 212.041 791.255 Z" style="stroke: black; fill: rgb(195, 255, 0);" class="clothes" /></svg>';
		var bottoms2 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /></defs><path d="M 211.308 791.108 C 211.308 804.347 201.794 825.047 201.794 839.242 C 201.794 847.084 203.259 854.124 203.259 861.513 C 203.259 875.181 205.453 888.928 205.453 902.463 C 205.453 907.454 203.259 911.858 203.259 915.395 C 203.259 920.269 203.99 924.398 203.99 927.608 C 204.964 928.327 208.25 933.426 208.25 933.644 C 210.484 934.362 210.577 931.301 210.577 927.608 C 213.955 926.89 218.926 923.297 225.212 923.297 C 227.619 921.654 232.351 922.579 234.726 922.579 C 234.726 906.35 240.581 888.852 240.581 871.571 C 240.581 864.054 242.776 858.46 242.776 852.892 C 242.776 847.384 242.776 842.594 242.776 837.805 C 242.776 834.213 242.776 831.339 242.776 828.466 C 242.776 831.829 243.508 834.441 243.508 837.087 C 243.508 841.637 243.508 845.468 243.508 849.3 C 243.508 852.965 242.044 857.114 242.044 858.639 C 242.044 862.711 242.044 866.063 242.044 869.416 C 242.044 874.445 242.044 878.756 242.044 883.066 C 242.044 888.399 244.971 891.777 244.971 895.997 C 244.971 899.158 245.703 901.941 245.703 904.618 C 245.703 909.701 246.435 913.269 246.435 917.55 C 246.435 920.631 253.609 920.424 255.947 920.424 C 258.013 920.424 262.152 920.767 263.265 921.861 C 266.68 921.861 277.991 924.449 280.674 924.449 C 281.405 920.443 279.364 910.104 279.364 905.337 C 283.599 896.305 278.633 886.945 278.633 879.473 C 278.633 870.612 280.828 864.374 280.828 856.484 C 280.828 853.477 283.047 835.649 283.755 835.649 C 283.755 830.534 283.755 827.765 283.755 823.437 C 283.755 818.732 282.292 814.195 282.292 809.068 C 282.292 806.039 280.828 805.538 280.828 802.602 C 280.096 801.226 278.633 798.118 278.633 795.418 C 277.9 792.229 276.437 792.595 276.437 790.389 C 272.121 790.389 269.127 787.515 269.12 787.515 C 265.461 787.515 262.534 787.515 259.606 787.515 C 254.918 787.515 252.022 786.797 248.629 786.797 C 246.281 788.385 241.414 787.515 239.117 787.515 C 236.677 787.515 234.969 787.515 233.262 787.515 C 228.312 791.656 226.282 788.234 223.749 788.234 C 220.381 787.515 219.671 786.078 216.431 786.078 C 213.723 786.078 212.041 788.545 212.041 790.389 L 211.308 791.108 Z" style="stroke: black; fill: rgb(195, 255, 0);" class="clothes" /></svg>';
		var bottoms3 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /></defs><path d="M 211.01 790.335 C 211.314 791.026 210.936 797.952 209.792 797.952 C 207.557 800.491 208.631 798.08 207.354 801.911 C 206.902 803.267 204.941 822.324 202.479 822.324 C 202.479 831.989 203.83 844.862 202.479 854.312 C 202.043 857.369 203.547 861.014 202.175 863.758 C 196.573 863.148 208.486 863.77 214.056 864.367 C 222.131 865.232 228.407 864.671 236.296 864.671 C 240.257 863.096 240.866 862.263 240.866 861.015 C 239.179 857.336 240.866 849.131 240.866 845.173 C 240.866 843.345 240.866 841.822 240.866 840.299 C 240.866 839.122 241.071 836.033 241.78 836.033 C 242.439 836.338 242.819 836.947 243.913 836.947 C 246.047 835.118 245.741 841.473 245.741 842.127 C 245.741 845.627 247.266 856.139 245.131 858.273 C 245.131 859.656 244.827 860.571 244.827 861.929 C 244.827 863.623 252.6 864.062 254.271 864.062 C 264.701 864.062 274.975 861.625 285.041 861.625 C 286.09 861.625 288.828 862.234 287.479 862.234 C 287.174 860.439 287.949 850.133 288.697 846.392 C 288.748 846.138 288.604 839.676 288.393 838.776 C 286.524 830.794 287.174 827.586 287.174 820.801 C 287.174 818.843 287.479 817.043 287.479 815.621 C 287.479 812.325 285.346 808.162 285.346 806.482 C 285.346 804.123 282.909 802.585 282.909 800.389 C 282.604 798.57 281.995 797.208 281.995 795.819 C 280.598 794.117 280.446 794.296 278.644 794.296 C 277.935 793.991 278.034 791.443 278.034 790.944 C 277.387 789.992 277.73 786.358 277.73 785.156 C 277.73 782.566 262.849 783.937 259.755 783.937 C 251.491 783.937 239.345 783.196 231.422 785.46 C 225.01 787.292 217.698 790.03 211.314 790.03 C 211.01 789.505 209.912 789.726 211.01 789.726 L 211.01 790.335 Z" style="stroke: black; stroke-width: 0; fill: rgb(186, 218, 85);" class="clothes" /></svg>';
		var maleBottoms = [bottoms1, bottoms2, bottoms3];
		var numbers = [17, 12, 12];
		for (k=0; k<3; k++){
			for (i=1; i<=numbers[k]; i++){
				maleBottoms.push(maleBottoms[k]+'<img class="bottomOverlay" src="svg/human/humanClothes/pants'+(k+1).toString()+'_stickers/pants'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		var maleSkirt1 = '<svg class="pants" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="212.268 789.833 204.708 818.7 204.708 864.062 228.076 863.375 239.76 863.375 250.07 862.688 261.067 862.688 287.872 862 287.184 817.326 284.435 800.143 280.999 793.957 276.187 792.583 278.249 782.96 241.822 784.335" fill="lime" class="clothes" /></svg>';
		var maleSkirt2 = '<svg class="pants" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="212.268 789.833 204.708 818.7 209.519 957.536 230.138 960.285 253.506 958.911 268.627 958.224 289.933 955.474 287.872 862 287.184 817.326 284.435 800.143 280.999 793.957 276.187 792.583 278.249 782.96 241.822 784.335" fill="lime" class="clothes" /></svg>';
		var maleBottom = [maleSkirt1, maleSkirt2];
		numbers = [4, 4];
		for (k=0; k<2; k++){
			for (i=1; i<=numbers[k]; i++){
				maleBottoms.push(maleBottom[k]+'<img class="bottomOverlay" src="svg/human/humanClothes/skirt'+(k+1).toString()+'_stickers/skirt'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		maleBottoms.push('');
		return shuffle(maleBottoms);
	}
	function femaleBottomOverlays(){
		var bottoms1 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="clothes" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M 230.645 746.605 C 188.927 765.057 231.558 848.205 234.883 901.936 C 253.505 904.807 257.997 893.032 247.932 902.624 C 247.489 909.466 258.167 808.557 245.756 791.967 C 256.994 805.619 269.609 833.938 264.568 834.58 C 259.526 835.223 243.432 910.905 252.206 908.809 C 263.729 912.213 257.481 913.652 273.802 909.497 C 263.318 877.161 286.182 832.456 285.503 815.336 C 282.075 798.903 277.587 781.27 266.118 757.602 C 258.773 754.553 239.701 768.705 230.645 746.605 Z" id="e2_area3" class="clothes" fill="black" style="stroke: none; stroke-width: 0px;"/></svg>';
		var bottoms2 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="clothes" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M 230.645 746.605 C 191.343 763.245 227.935 821.633 231.26 875.364 C 249.882 878.235 244.711 883.973 243.101 888.734 C 258.36 872.627 258.167 808.557 245.756 791.967 C 256.994 805.619 269.609 833.938 264.568 834.58 C 259.526 835.223 243.432 892.184 252.206 890.088 C 263.729 893.492 260.501 897.346 276.822 893.191 C 269.358 860.855 286.182 832.456 285.503 815.336 C 282.075 798.903 277.587 781.27 266.118 757.602 C 258.773 754.553 239.701 768.705 230.645 746.605 Z" id="e2_area3" class="clothes" fill="black" style="stroke: none; stroke-width: 0px;"/></svg>';
		var bottoms3 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" class="clothes" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M214.66531372070312,768.85302734375c1.2782465385533328,11.91083753217606,22.03371125380957,25.990569084709023,31.604202270507812,24.65130615234375c9.570491016698298,-1.3392629323652727,24.359016657508334,-16.826113539882726,24.019180297851562,-28.44378662109375c17.990595669908146,6.712758948353894,-48.0524550236745,-11.910860241956584,-55.623382568359375,3.79248046875Z" id="e37_area3" class="clothes" class="clothes" fill="silver" style="stroke: none; stroke-width: 0px;"/> <path d="M 230.122 750.726 C 188.707 767.366 230.632 826.412 227.404 853.777 C 247.027 856.648 251.19 848.193 260.312 852.35 C 245.537 837.926 252.391 803.702 239.313 787.112 C 251.155 800.764 257.49 823.476 261.866 829.382 C 266.242 835.288 256.433 858.605 265.678 856.509 C 277.82 859.913 263.082 860.618 280.28 856.463 C 285.142 825.335 284.717 834.894 284.001 817.774 C 269.73 788.438 279.587 785.391 267.501 761.723 C 259.762 758.674 239.665 772.826 230.122 750.726 Z" id="e2_area3" class="clothes" fill="black" style="stroke: none; stroke-width: 0px;"/></svg>';
		var bottoms4 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M214.66531372070312,768.85302734375c1.2782465385533328,11.91083753217606,22.03371125380957,25.990569084709023,31.604202270507812,24.65130615234375c9.570491016698298,-1.3392629323652727,24.359016657508334,-16.826113539882726,24.019180297851562,-28.44378662109375c17.990595669908146,6.712758948353894,-48.0524550236745,-11.910860241956584,-55.623382568359375,3.79248046875Z" id="e37_area3" fill="silver" style="stroke: none; stroke-width: 0;" class="clothes" /> <path d="M 155.577 765.951 C 159.377 794.668 193.813 781.19 164.085 819.22 C 187.898 822.09 236.119 885.202 176.139 853.726 C 175.572 860.568 212.395 809.785 199.613 788.364 C 222.479 813.491 267.186 846.037 229.848 845.47 C 192.51 844.903 225.215 865.63 236.435 863.535 C 251.171 866.938 219.787 881.911 231.617 864.222 C 245.842 842.952 173.171 803.656 250.441 816.564 C 240.651 782.617 240.318 777.063 225.652 753.395 C 217.031 739.476 222.761 734.907 155.577 765.951 Z" id="e2_area3" style="stroke: none; stroke-width: 0;" transform="matrix(0.781994 0 0 1 90.2638 4.81114)" class="clothes" /> <path d="M 218.533 768.392 C 211.89 799.503 220.345 822.044 220.345 842.07 C 223.472 845.8 228.196 852.767 228.196 857.771 C 229.412 859.592 231.216 869.086 231.216 871.057 C 231.216 876.784 233.631 883.864 233.631 890.383 C 234.235 897.497 237.255 903.656 237.255 909.104 C 237.255 898.174 248.379 896.4 249.333 885.551 C 253.383 839.472 239.197 870.584 237.255 868.642 C 236.651 867.109 237.47 854.752 237.255 854.752 C 237.255 852.49 225.743 845.052 224.573 843.881 C 223.317 842.626 222.981 836.634 221.553 836.634 C 221.553 831.049 228.196 824.589 228.196 820.328 C 228.196 812.99 217.326 808.482 217.326 801.607 C 216.722 797.295 229.404 785.558 229.404 781.678 C 229.404 776.89 214.306 783.036 214.306 778.658 C 213.341 778.054 213.099 777.841 213.099 776.847 L 218.533 768.392 Z" style="stroke: black; stroke-width: 0;" class="clothes" /> <path d="M 255.372 776.847 C 248.963 791.156 254.768 806.98 254.768 811.27 C 254.768 813.561 289.394 855.959 258.996 823.348 C 259.6 828.292 284.964 816.37 284.964 821.537 C 284.964 823.909 263.523 854.148 262.015 854.148 C 259.456 862.429 268.055 905.718 278.925 858.98 C 279.552 856.283 280.94 856.965 257.788 895.214 C 252.13 910.981 255.976 888.329 255.976 886.759 C 258.427 883.704 257.788 865.148 257.788 861.395 C 257.788 856.765 257.788 852.739 257.788 848.713 C 257.788 846.251 258.642 834.219 256.58 834.219 C 255.976 830.325 253.561 829.193 253.561 826.368 C 252.957 822.912 250.541 819.206 250.541 814.893 C 253.913 810.918 245.106 797.042 245.106 792.548 C 245.106 790.039 243.294 786.414 243.294 785.301 L 255.372 776.847 Z" style="stroke: black; stroke-width: 0;" class="clothes" /> <path style="stroke: black; fill: none; stroke-width: 0;" class="clothes" /> <path style="stroke: black; fill: none; stroke-width: 0;" class="clothes" /> <path d="M 260.808 828.783 L 257.184 828.783 L 260.808 828.783 Z" style="stroke: black; fill: none; stroke-width: 0;" class="clothes" /> <path style="stroke: black; fill: none; stroke-width: 0;" class="clothes" /> <path style="stroke: black; fill: none; stroke-width: 0;" class="clothes" /> <path d="M 244.502 894.61 C 244.502 879.882 249.333 869.671 249.333 855.96 C 251.419 852.392 245.71 843.166 245.71 839.654 C 245.71 819.634 249.937 799.498 249.937 780.47 C 249.937 779.769 249.937 786.826 249.937 788.321 C 249.937 794.36 249.937 800.399 249.937 806.438 C 249.937 823.652 249.937 840.409 249.937 857.771 C 249.937 870.027 248.729 881.854 248.729 893.402 C 248.729 896.221 248.729 898.435 248.729 900.649 C 242.97 900.649 237.255 904.289 237.255 909.104 C 235.005 909.708 243.294 896.387 243.294 894.61 L 244.502 894.61 Z" style="stroke: black; stroke-width: 0;" class="clothes" /> <g transform="matrix(1, 0, 0, 1, 30.195789, 60.391579)"> <path d="M 246.396 829.739 C 246.396 815.01 251.227 804.799 251.227 791.088 C 253.313 787.52 226.364 778.386 226.364 774.875 C 226.364 754.854 227.789 735.28 208.926 732.783 C 183.828 729.46 236.693 735.413 236.693 736.908 C 236.693 742.947 251.137 753.851 251.137 759.89 C 251.137 777.104 253.582 791.328 253.582 808.69 C 253.582 820.945 250.623 816.982 250.623 828.53 C 250.623 831.349 250.623 833.564 250.623 835.778 C 244.864 835.778 239.149 839.417 239.149 844.232 C 236.899 844.836 245.188 831.515 245.188 829.739 L 246.396 829.739 Z" style="stroke: black; stroke-width: 0;" transform="matrix(0.965591, 0.260065, -0.260065, 0.965591, 211.265143, -36.95749)" class="clothes" /> </g></svg>';
		var bottoms5 = '<svg class="pants" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M214.66531372070312,768.85302734375c1.2782465385533328,11.91083753217606,22.03371125380957,25.990569084709023,31.604202270507812,24.65130615234375c9.570491016698298,-1.3392629323652727,24.359016657508334,-16.826113539882726,24.019180297851562,-28.44378662109375c17.990595669908146,6.712758948353894,-48.0524550236745,-11.910860241956584,-55.623382568359375,3.79248046875Z" id="e37_area3" class="clothes" fill="silver" style="stroke: none; stroke-width: 0px;" class="clothes" /> <path d="M 222.683 762.123 C 218.756 762.123 216.668 770.538 212.585 775.587 C 212.585 790.408 213.707 796.142 215.951 810.368 C 226.045 810.368 238.441 810.929 246.244 810.929 C 244.787 808.911 246.805 800.819 246.805 797.465 C 246.805 795.721 249.049 807.579 249.049 810.929 C 249.049 814.697 253.461 810.929 256.342 810.929 C 261.952 810.929 261.952 805.88 267.001 805.88 C 268.123 803.066 272.236 801.767 273.733 800.27 C 275.086 798.356 279.343 796.099 279.343 794.66 C 274.85 794.099 270.805 775.308 274.855 773.904 C 275.628 773.636 268.707 763.245 267.001 763.245 C 251.267 761.845 242.107 750.903 226.61 750.903 C 226.61 751.464 221.561 759.318 221.561 759.318 L 222.683 762.123 Z" style="stroke: black; stroke-width: 0;" class="clothes" /> <path d="M 174.999 783.441 L 175.56 782.88 Z" style="stroke: black; fill: none;" class="clothes" /></svg>';
		var femaleBottoms = [bottoms1, bottoms2, bottoms3, bottoms4, bottoms5];
		var numbers = [25, 29, 12, 6, 9];
		for (k=0; k<5; k++){
			for (i=1; i<=numbers[k]; i++){
				femaleBottoms.push(femaleBottoms[k]+'<img class="bottomOverlay" src="svg/human/humanClothes/female_pants'+(k+1).toString()+'_stickers/female_pants'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		var femaleSkirt1 = '<svg class="pants" width="86" height="380" viewBox="202.71499633789062 584.406982421875 86.58999633789062 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M 223.018 756.348 C 218.577 758.667 221.796 762.012 219.846 763.962 C 213.582 770.226 214.135 783.972 214.135 792.513 C 214.135 797.478 204.056 825.578 207.156 828.678 C 210.681 832.203 218.4 834.212 221.749 837.561 C 225.973 841.785 224.573 850.536 227.459 853.423 C 228.051 854.014 239.196 854.217 247.763 847.713 C 248.825 846.907 269.245 844.451 269.969 845.175 C 270.937 846.143 283.933 827.415 289.003 832.485 C 289.792 833.274 288.369 826.386 288.369 822.968 C 288.369 817.445 288.003 810.547 285.196 807.741 C 278.618 801.162 280.774 783.65 274.41 777.286 C 272.668 775.544 276.314 769.038 276.314 769.038 C 276.314 769.038 269.335 762.816 264.894 755.714" style="stroke: rgb(0, 0, 0); fill: rgb(216, 216, 216);"/></svg>';
		var femaleSkirt2 = '<svg class="pants" width="86" height="380" viewBox="202.71499633789062 584.406982421875 86.58999633789062 380.0480041503906" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M 223.018 756.348 C 218.577 758.667 221.796 762.012 219.846 763.962 C 213.582 770.226 214.135 783.972 214.135 792.513 C 214.135 797.478 205.325 931.535 208.425 934.635 C 211.95 938.16 214.481 931.851 219.211 932.097 C 227.242 932.514 237.262 931.748 240.148 934.635 C 240.74 935.226 266.478 939.871 275.045 933.367 C 276.107 932.561 288.279 914.877 289.003 915.601 C 289.971 916.569 287.189 839.422 289.003 832.485 C 289.792 829.467 288.369 826.386 288.369 822.968 C 288.369 817.445 288.003 810.547 285.196 807.741 C 278.618 801.162 280.774 783.65 274.41 777.286 C 272.668 775.544 272.507 767.136 272.507 767.136 C 272.507 767.136 269.335 762.816 264.894 755.714" style="stroke: rgb(0, 0, 0); fill: rgb(216, 216, 216);"/></svg>';
		var femaleBottom = [femaleSkirt1, femaleSkirt2];
		numbers = [10, 10];
		for (k=0; k<2; k++){
			for (i=1; i<=numbers[k]; i++){
				femaleBottoms.push(femaleBottom[k]+'<img class="bottomOverlay" src="svg/human/humanClothes/female_skirt'+(k+1).toString()+'_stickers/female_skirt'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		femaleBottoms.push('');
		return shuffle(femaleBottoms);
	}
	function femaleTopOverlays(){
		var tops1 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M 219.13 783.615 C 222.463 777.523 239.555 745.442 233.907 737.92 C 228.258 730.398 212.084 703.513 211.008 673.349 C 209.926 643.185 277.459 693.922 281.117 693.926 C 284.784 693.931 258.992 736.045 261.28 738.984 C 263.572 741.925 262.749 737.857 265.04 751.978 C 267.337 766.099 266.946 763.322 266.977 766.097 C 267.008 768.872 279.799 770.012 278.184 780.825 C 264.275 792.601 277.565 817.622 258.637 806.541 C 239.706 795.46 258.609 810.393 219.13 783.615 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" transform="matrix(-0.999542, 0.030274, -0.030274, -0.999542, 514.654955, 1465.287216)" class="clothes" /></svg>';
		var tops2 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 254.397 667.684 247.277 690.986 C 240.157 714.288 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>';
		var tops3 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 249.984 657.5 244.901 722.558 C 239.818 787.616 255.062 653.866 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>';
		var tops4 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 213.523 767.536 212.574 797.7 C 211.625 827.864 270.937 777.127 274.154 777.123 C 277.373 777.118 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 272.996 701.037 271.576 690.224 C 259.36 678.448 271.032 653.427 254.406 664.508 C 237.78 675.589 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>';
		var tops5 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M231.51259393835142,657.8595841129164c12.2541186535191,-3.669447789489709,15.749501702100503,-3.1539934285680147,28.86681758008524,-0.6873545778818198c17.24114718975511,22.398490190909342,24.267617462317162,28.969019474366746,24.055673082761018,28.17955375378483c1.8499712763288017,6.770891684329968,-9.503539340620478,39.3768337497595,-8.247645636353923,32.30330704321182c-5.617158482017317,-0.20047452026381052,-12.913781502269671,6.275497954175989,-13.746124267578125,3.4365234375c-0.8323427653084536,-2.8389745166759894,0.03002471660397532,-15.197294576822515,1.3746337890625,-13.74609375c1.3446090724585247,1.4512008268225145,-1.6754182592098914,43.64363477218296,-4.811139312131559,30.928762952395346c-7.946857583320366,-0.3433778844769222,-31.146551370871606,2.4362293325948485,-26.80490643433066,-1.3745987613539228c0.9051188433990944,-5.185438531205591,2.9341932989911186,-14.56253202515802,2.7492244573997198,-17.869960089478923c-0.1849688415913988,-3.307428064320902,-6.442546484651217,-10.827097913395733,-6.185760498046875,-10.3095703125c0.25678598660434204,0.5175276008957326,5.392936811721768,13.790003487630202,2.061920166015625,15.1207275390625c-3.3310166457061428,1.3307240514322984,-10.727368421098163,0.16453993974334935,-13.746105425902897,0.6872961983673349c-2.3314317861762675,4.646587570394445,-8.114035596930364,-25.8371671686358,-7.560352093628353,-35.052591608523585c0.5536835033020395,-9.215424439887784,11.114256376385782,-10.76392356938436,21.99376459264829,-31.616001824583577Z" id="e4_area3" fill="red" style="stroke: none; stroke-width: 0px;" class="clothes" /></svg>';
		var tops6 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes"/></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.76 656.485 228.076 661.983 215.017 677.104 209.519 686.726 218.454 734.15 218.454 732.089 229.451 741.711 228.076 727.277 226.701 708.72 232.2 721.092 234.949 732.776 221.89 755.457 212.955 771.952 211.581 787.76 278.249 791.884 270.002 765.079 256.943 738.274 257.63 727.277 263.129 710.782 262.441 732.089 265.191 743.085 274.126 734.838 280.311 699.098 283.748 688.101 283.06 681.228 259.692 657.86" fill="red" class="clothes"/></svg>';
		var tops7 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="234.262 657.86 248.008 698.411 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 268.627 762.33 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 273.438 767.141 276.875 780.2 278.249 786.386 228.763 792.571 212.955 792.571 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes" /></svg>';
		var tops8 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes"/></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="234.262 657.86 246.633 660.609 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 268.627 762.33 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 273.438 767.141 276.875 780.2 278.249 786.386 228.763 792.571 212.955 792.571 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes"/></svg>';
		var tops9 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes"/></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="232.887 657.172 244.475 660.764 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 283.061 776.076 287.872 787.76 289.934 959.587 213.643 943.778 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes"/></svg>';
		var tops10 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;"/></defs><polygon class="clothes" id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="210.359 632.026 244.611 653.366 274.672 632.623 264.639 664.123 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 283.061 776.076 287.872 787.76 248.695 887.42 218.454 804.255 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 225.327 663.358" fill="red" transform=""/></svg>';
		var tops11 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /></svg>';
		var tops12 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e4_polygon" style="stroke-width: 0px; stroke: none;" points="273.438 672.293 273.438 670.918 265.191 698.411 266.565 699.785 267.94 705.284 267.94 710.782 266.565 713.531 261.754 717.655 263.129 734.838 270.689 765.766 287.872 763.705 280.311 754.082 276.187 718.342 282.373 684.664 276.187 674.355" fill="lime" class="clothes" /></svg>';
		var tops13 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e4_polygon" style="stroke-width: 0px; stroke: none;" points="273.438 672.293 273.438 670.918 265.191 698.411 266.565 699.785 267.94 705.284 267.94 710.782 266.565 713.531 261.754 717.655 263.129 734.838 270.689 765.766 287.872 763.705 280.311 754.082 276.187 718.342 282.373 684.664 276.187 674.355" fill="lime" class="clothes" /><polygon id="e5_polygon" style="stroke-width: 0px; stroke: none;" points="221.203 690.163 207.457 688.788 218.454 727.965 218.454 747.209 207.457 769.203 216.392 767.828 229.451 743.085 232.887 727.965" fill="lime" class="clothes" /></svg>';
		var tops14 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 290.621 765.079 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e5_polygon" style="stroke-width: 0px; stroke: none;" points="221.203 690.163 207.457 688.788 218.454 727.965 218.454 747.209 207.457 769.203 216.392 767.828 229.451 743.085 232.887 727.965" fill="lime" class="clothes" /></svg>';
		var tops15 = '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet"  xmlns:xlink="http://www.w3.org/1999/xlink"><rect id="svgEditorBackground" x="202.71499633789062" y="584.406982421875" width="86.59329986572266" height="380.0480041503906" style="fill: none; stroke: none;" class="clothes" /><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs"  class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /></defs><path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 254.397 667.684 247.277 690.986 C 240.157 714.288 254.383 660.656 219.708 687.434 Z" id="path-1"  class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="207.457 777.462 207.457 776.087 213.643 760.279 215.705 761.654 221.203 756.843 230.138 774.025 224.64 762.341 241.822 758.217 247.321 774.025 243.884 757.53 269.315 758.905 263.129 771.276 267.252 756.843 276.188 761.654 276.187 763.028 283.748 770.589 281.686 781.586 278.249 772.651 274.126 771.963 276.187 777.462 264.503 779.524 260.379 775.4 263.129 772.651 255.568 778.836 243.884 779.524 236.324 780.898 221.203 775.4 212.955 771.276 212.955 774.713 208.832 777.462" fill="fuchsia"  class="clothes" /></svg>';
		var tops16 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/></defs><path d="M 220.661 688.043 C 223.59 694.135 237.991 726.216 233.031 733.738 C 228.072 741.26 210.812 761.694 215.973 773.187 C 221.135 784.681 269.923 773.662 273.14 773.658 C 276.359 773.653 255.063 735.613 257.075 732.674 C 259.087 729.733 258.362 733.801 260.378 719.68 C 262.394 705.559 262.049 708.336 262.076 705.561 C 262.103 702.786 264.854 702.325 268.526 696.604 C 276.679 685.847 262.658 684.737 250.057 686.113 C 237.456 687.489 243.764 684.409 220.661 688.043 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);"/><path d="M 225.594 662.974 C 225.594 668.686 221.94 675.979 221.94 683.073 C 221.94 687.346 224.985 696.042 224.985 693.427" style="stroke: rgb(0, 0, 0); stroke-opacity: 0; fill: rgb(254, 0, 0);"/><path d="M 268.837 688.555 C 270.992 688.555 270.055 682.91 270.055 681.143 C 270.055 676.552 268.461 662.366 263.964 662.366" style="stroke: rgb(0, 0, 0); stroke-opacity: 0; fill: rgb(254, 0, 0);"/></svg>';
		var femaleTops = [tops1, tops2, tops3, tops4, tops5, tops6, tops7, tops8, tops9, tops10, tops11, tops12, tops13, tops14, tops15, tops16];
		var numbers = [22, 16, 27, 24, 13, 20, 25, 22, 20, 20, 15, 16, 15, 15, 14, 3];
		for (k=0; k<16; k++){
			for (i=1; i<=numbers[k]; i++){
				femaleTops.push(femaleTops[k]+'<img class="shirtOverlay" src="svg/human/humanClothes/female_shirt'+(k+1).toString()+'_stickers/female_shirt'+(k+1).toString()+'_sticker'+i.toString()+'.svg">');
			}
		}
		femaleTops.push('');
		return shuffle(femaleTops);
	}
	</script>
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
			top: 464px;
			left: 15%;
		}
		#itemPreview {
			vertical-align: text-top;
			width: 50%;
			padding: 4px;
			border-width: 5px;
			border-style: solid;
			position: relative;
			padding-left: 50px;
			height: 420px;
		}
		#avatarOptions {
			height: 450px;
		}
		.eyes {
			position: relative;
			margin-top: -310px;
		}
		#chooseSkin {
			position: fixed;
			top: 360px;
		}
		#relativeContainer button {
			margin:0;
			padding:0;
			border:0;
			background:transparent;
		}
		
	</style>
</body>
</html>