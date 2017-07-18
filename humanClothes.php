<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/touch_punch.js"></script>
	<script src="js/glide.js"></script>
	<script src="js/jquery.colorPicker.js"></script>
	<link rel="stylesheet" href="css/glide.core.css">
    <link rel="stylesheet" href="css/glide.theme.css">
	<link rel="stylesheet" href="css/colorPicker.css" type="text/css" />
	<title>Erintuitive's Psychic Place</title>
</head>
<body style="background-color: #FFBB22;">
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId            : '817064305070781',
		  autoLogAppEvents : true,
		  xfbml            : true,
		  version          : 'v2.9'
		});
		FB.AppEvents.logPageView();
	  };
	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   FB.getLoginStatus(function(response) {
	   if (response.status === 'connected') {
			//insert stuff here
		  }
		  else {
			FB.login();
		  }
		});
	</script>
	<table width="580px">
	<td>
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="undiesStep2">
					<?php
						if(isset($_GET['leftOff')){
							echo "You left off here. Please continue building your avatar!";
						}
					?>
				</div>
			</td>
			<td id="itemPreview" width="30%">
			</td>
			<td id="result" width="350px" style="border-style: dashed; border-width: 6px;">
				<div id="relativeContainer" style="position: relative; margin-left: 55px; margin-top:50px; " width="86px" height="380px">
				<?php if(isset($_POST['getAvatar']) && isset($_POST['me_id'])){
					$me_id = $_POST['me_id']; 
					$avatar = $_POST['getAvatar'];
					//10155567524149846 my user id
				} ?>
				</div>
				<script>
					var me_id = "<? echo $me_id; ?>";
					var count1 = 0;
					var count2 = 0;
					var countPresent = 0;
					$.get("https://api.myjson.com/bins/vzecj", function (data3, textStatus3, jqXHR3) {
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
								url:"https://api.myjson.com/bins/vzecj",
								type:"PUT",
								data:'{"person": [{"user_id":"<? echo $me_id; ?>", "name":"guest", "avatar":"<? echo $avatar; ?>", "pos_x":-1, "pos_y":-1}]}',
								contentType:"application/json; charset=utf-8",
								dataType:"json",
								success: function(data, textStatus, jqXHR){
									$.get("https://api.myjson.com/bins/vzecj", function (data, textStatus, jqXHR) {
										var avatarJSON = data['person'][0]['avatar'];
										$.post("convertAvatar.php", {convert: avatarJSON}, function(data2){
											document.getElementById("relativeContainer").innerHTML = data2;
										});
									});
								}
							});
						}
						else if(count1 > 0 && count2 == 0){
							var pushThis = {
								"user_id": me_id,
								"name":"guest",
								"avatar":"<? echo $avatar; ?>",
								"pos_x":-1,
								"pos_y":-1
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
									$.get("https://api.myjson.com/bins/vzecj", function (data, textStatus, jqXHR) {
										var avatarJSON = data['person'][len-1]['avatar'];
										$.post("convertAvatar.php", {convert: avatarJSON}, function(data2){
											document.getElementById("relativeContainer").innerHTML = data2;
										});
									});
								}
							});
						}
						else if(count1 > 0 && count2 > 0){
							for(i=0; i<data3['person'].length; i++){
								if(data3['person'][i]['user_id']==me_id){
									data3['person'][i]['avatar']=="<? echo $avatar; ?>";
									$.ajax({
										url:"https://api.myjson.com/bins/vzecj",
										type:"PUT",
										data: JSON.stringify(data3),
										contentType:"application/json; charset=utf-8",
										dataType:"json",
										success: function(data, textStatus, jqXHR){
											$.get("https://api.myjson.com/bins/vzecj", function (data, textStatus, jqXHR) {
												var avatarJSON = data['person'][i]['avatar'];
												$.post("convertAvatar.php", {convert: avatarJSON}, function(data2){
													document.getElementById("relativeContainer").innerHTML = data2;
												});
											});
										}
									});
									break;
								}
							}
							
						}
					});
				</script>
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
		#itemPreview button {
			margin:0;
			padding:0;
			border:0;
			background:transparent;
		}
		#avatarOptions {
			position: relative;
			float: left;
		}
		#buttons {
			position: fixed;
			top: 435px;
			left: 40%;
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
	</style>
	<script>
		$("#back").hide();
		//must add img/humans/ to these
		var patterns = ["small-oval-pattern_311.jpg", "small-oval-pattern_521.jpg", "small-oval-pattern_311.jpg", "small-oval-pattern_669.jpg", "small-oval-pattern_140.jpg", "small-oval-pattern_894.jpg", "small-oval-pattern_655.jpg", "small-oval-pattern_826.jpg", "small-oval-pattern_804.jpg", "small-oval-pattern_860.jpg", "hawaiian-floral-pattern_806.jpg", "hawaiian-floral-pattern_273.jpg", "hawaiian-floral-pattern_899.jpg", "hawaiian-floral-pattern_457.jpg", "hawaiian-floral-pattern_620.jpg", "hawaiian-floral-pattern_838.jpg", "hawaiian-floral-pattern_423.jpg", "hawaiian-floral-pattern_772.jpg", "hawaiian-floral-pattern-256x256.jpg", "diamond-shape-pattern_429.jpg", "diamond-shape-pattern_771.jpg", "diamond-shape-pattern_538.jpg", "diamond-shape-pattern_591.jpg", "diamond-shape-pattern_500.jpg", "diamond-shape-pattern_437.jpg", "diamond-shape-pattern_262.jpg", "diamond-shape-pattern-256x256.jpg", "lines-pattern_188.jpg", "lines-pattern_370.jpg", "lines-pattern_630.jpg", "lines-pattern_751.jpg", "floral-pattern_114.jpg", "floral-pattern_118.jpg", "floral-pattern_279.jpg", "floral-pattern_407.jpg", "floral-pattern-256x256.jpg"];
		function backOptions() {
			
		}
		/*function nextOptions() {
			if(avatarOptions.getAttribute("class")=="undiesStep2"){
				avatarOptions.innerHTML = 'Randomize underwear pattern.<br><button id="randomUndies" onclick="randomizeUndies()">Go<br>random</button>';
				$("#buttons").css({'margin-left':'-30px'});
				//document.getElementById("buttons").style.marginLeft = "-30px";
				//$("#randomUndies").css({'margin-left':'-60px'});
				itemPreview.innerHTML = '<div style="padding:50px;"><p>Press the randomize button to change your underwear pattern.</p><div>';
				//itemPreview.innerHTML = '<img src="svg/human/20140709blogstrip2.svg" width="107px" alt="diagonal stripe pattern"><img src="svg/human/autumn-field-001-52.svg" width="107px" alt="autumn floral pattern"><img src="svg/human/dunno3.svg" width="107px" alt="red blossom pattern"><img src="svg/human/Fall_Pattern2.svg" width="107px" alt="fall pattern"><img src="svg/human/Flowers_Pattern2.svg" width="107px" alt="floral pattern"><img src="svg/human/jbruce_butterfly_(papilio_turnus)_top_view2.svg" width="107px" alt="butterfly stamp"><img src="svg/human/molumen_christmas_tree_icon_22.svg" width="107px" alt="christmas pattern"><img src="svg/human/paisleySimple2.svg" width="107px" alt="swirly pattern"><img src="svg/human/rosros_Rounded_Star_0062.svg" width="107px" alt="rounded star pattern"><img src="svg/human/rwwgub_Art_Nouveau_Tile_Pattern2.svg" width="107px" alt="art nouveau pattern"><img src="svg/human/ryanlerch_red-black_stripe_(gradient)2.svg" width="107px" alt="diagonal stripes"><img src="svg/human/SquaresPattern.svg" width="107px" alt="diagonal square pattern"><img src="svg/human/Woodland_Camouflage.svg" width="107px" alt="camouflage pattern">';
				$("#itemPreview img").css({'margin':'9px'});
				previousUndies = relativeContainer.innerHTML;
				avatarOptions.setAttribute("class", "topsStep1");
			}
			else if(avatarOptions.getAttribute("class")=="topsStep1"){
				avatarOptions.innerHTML = 'Now add a top!';
				if($("#relativeContainer .man")[0]){
					itemPreview.innerHTML = '<div id="man_shirts">"<button id="shirt1" onclick="buttonShirt1()"><img width="55px" src="svg/human/humanClothes/shirt1.svg" alt="shirt1"></button><button id="shirt2" onclick="buttonShirt2()"><img width="55px" src="svg/human/humanClothes/shirt2.svg" alt="shirt2"></button><button id="shirt3" onclick="buttonShirt3()"><img width="55px" src="svg/human/humanClothes/shirt3.svg" alt="shirt3"></button><button id="shirt4" onclick="buttonShirt4()"><img width="55px" src="svg/human/humanClothes/shirt4.svg" alt="shirt4"></button><button id="shirt5" onclick="buttonShirt5()"><img width="55px" src="svg/human/humanClothes/shirt5.svg" alt="shirt5"></button><button id="shirt6" onclick="buttonShirt6()"><img width="55px" src="svg/human/humanClothes/shirt6.svg" alt="shirt6"></button><button id="shirt7" onclick="buttonShirt7()"><img width="55px" src="svg/human/humanClothes/shirt7.svg" alt="shirt7"></button><button id="shirt8" onclick="buttonShirt8()"><img width="55px" src="svg/human/humanClothes/shirt8.svg" alt="shirt8"></button><button id="shirt9" onclick="buttonShirt9()"><img width="55px" src="svg/human/humanClothes/shirt9.svg" alt="shirt9"></button><button id="shirt10" onclick="buttonShirt10()"><img width="55px" src="svg/human/humanClothes/shirt10.svg" alt="shirt10"></button><button id="shirt11" onclick="buttonShirt11()"><img width="55px" src="svg/human/humanClothes/shirt11.svg" alt="shirt11"></button><button id="shirt12" onclick="buttonShirt12()"><img width="55px" src="svg/human/humanClothes/shirt12.svg" alt="shirt12"></button></div>';
					$("#itemPreview button").css({"padding":"5px","margin-top":"-140px"});
					$("#man_shirts").css({"margin-top":"100px"});
					$("#itemPreview").css({"overflow":"hidden"});
				}
				else if($("#relativeContainer .woman")[0]){
					
				}
				avatarOptions.setAttribute("class", "topsStep2");
			}
		}
		function insertDefs(num){
			var defsInside = '<pattern id="svgPatt1" patternUnits="userSpaceOnUse" width="100px" height="100px"><image width="100" height="100" xlink:href="svg/human/'+patterns[num]+'" alt="small oval pattern"></pattern>';
			//<image xlink:href=" /human/chevron-pattern-tile-256x256.jpg" x="0" y="0" width="100" height="100" />
			$(".humanDefs").html(defsInside);
			$(".undies").attr("fill", "url(#svgPatt1)");
		}
		function randomizeUndies(){
			var randUndies = Math.floor(Math.random()*(patterns.length));
			insertDefs(randUndies);
			previousUndies = relativeContainer.innerHTML;
		}*/
	</script>
</body>
</html>