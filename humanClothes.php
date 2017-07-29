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
				<div id="avatarOptions" class="tops">
					
				</div>
			</td>
			<td id="itemPreview" width="30%">
			</td>
			<td id="result" width="350px" style="border-style: dashed; border-width: 6px;">
				<img src="img/leftArrow.gif" onclick="previousItem();"/>
				<div id="relativeContainer" style="position: relative; margin-left: 55px; margin-top:50px; " width="86px" height="380px">
				<?php if(isset($_POST['getAvatar']) && isset($_POST['me_id'])){
					$me_id = $_POST['me_id']; 
					$avatar = $_POST['getAvatar'];
					//10155567524149846 my user id
				} ?>
				<img src="img/rightArrow.gif" onclick="nextItem();"/>
				</div>
			</td>
		</tr>
	</table>
	<div id="buttons">
		<button id="back" onclick="backOptions()">Back</button>
		<button id="next" onclick="nextOptions()">Next</button>
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
						data3['person'][i]['avatar'] = "<? echo $avatar; ?>";
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
		function getRandomColor() {
	  var letters = '0123456789ABCDEF';
	  var color = '#';
	  for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	  }
	  return color;
	}
	var previous = relativeContainer.innerHTML;
	var topIndex = Math.floor(Math.random()*16);
	function backOptions() {
		
	}
	function nextOptions() {
		if(avatarOptions.getAttribute("class")=="tops"){
			if($(".man")[0]){
				
			}
			else if ($(".woman")[0]){
				$("#relativeContainer").append('<svg class="tops1" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.13 783.615 C 222.463 777.523 239.555 745.442 233.907 737.92 C 228.258 730.398 212.084 703.513 211.008 673.349 C 209.926 643.185 277.459 693.922 281.117 693.926 C 284.784 693.931 258.992 736.045 261.28 738.984 C 263.572 741.925 262.749 737.857 265.04 751.978 C 267.337 766.099 266.946 763.322 266.977 766.097 C 267.008 768.872 279.799 770.012 278.184 780.825 C 264.275 792.601 277.565 817.622 258.637 806.541 C 239.706 795.46 258.609 810.393 219.13 783.615 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" transform="matrix(-0.999542, 0.030274, -0.030274, -0.999542, 514.654955, 1465.287216)" class="clothes" /></svg>');
				$("#relativeContainer .tops1").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			}
			avatarOptions.setAttribute("class", "tops2");
		}
	}
	
	</script>
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
</body>
</html>