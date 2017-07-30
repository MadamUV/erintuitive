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
			<td id="itemPreview" width="10%">
			</td>
			<td id="leftButtons">
				<button id="topButton1" onclick="previousTop();"><img src="img/leftArrow.gif" width="80px"/></button>
			</td>
			<td id="result" width="500px" style="border-style: dashed; border-width: 6px;">
				
				<div id="relativeContainer" style="position: relative; margin-left: 4px; margin-top:50px; " width="86px" height="380px">
				<?php if(isset($_POST['getAvatar']) && isset($_POST['me_id'])){
					$me_id = $_POST['me_id']; 
					$avatar = $_POST['getAvatar'];
					//10155567524149846 my user id
				} ?>
				</div>
			</td>
			<td id="rightButtons">
				<button id="topButton1" onclick="nextTop();"><img src="img/rightArrow.gif" width="80"/>
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
		#relativeContainer button {
			margin:0;
			padding:0;
			border:0;
			background:transparent;
		}
	</style>
	<script>
		var num = 0;
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
				$("#relativeContainer").append('<svg class="tops" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.13 783.615 C 222.463 777.523 239.555 745.442 233.907 737.92 C 228.258 730.398 212.084 703.513 211.008 673.349 C 209.926 643.185 277.459 693.922 281.117 693.926 C 284.784 693.931 258.992 736.045 261.28 738.984 C 263.572 741.925 262.749 737.857 265.04 751.978 C 267.337 766.099 266.946 763.322 266.977 766.097 C 267.008 768.872 279.799 770.012 278.184 780.825 C 264.275 792.601 277.565 817.622 258.637 806.541 C 239.706 795.46 258.609 810.393 219.13 783.615 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" transform="matrix(-0.999542, 0.030274, -0.030274, -0.999542, 514.654955, 1465.287216)" class="clothes" /></svg>');
				$("#relativeContainer .tops").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
			}
			avatarOptions.setAttribute("class", "tops2");
		}
	}
	function previousTop(){
		
	}
	function nextTop(){
		if(num==0){
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append('<svg clas="tops" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 254.397 667.684 247.277 690.986 C 240.157 714.288 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>');
		}
		else if(num==1){
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append('<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 249.984 657.5 244.901 722.558 C 239.818 787.616 255.062 653.866 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>');
		}
		else if(num==2){
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append('<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 213.523 767.536 212.574 797.7 C 211.625 827.864 270.937 777.127 274.154 777.123 C 277.373 777.118 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 272.996 701.037 271.576 690.224 C 259.36 678.448 271.032 653.427 254.406 664.508 C 237.78 675.589 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>');
		}
		else if(num==2){
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append();
		}
		$("#relativeContainer .tops").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
	}
	</script>
</body>
</html>