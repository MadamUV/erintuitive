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
				<div id="avatarOptions" class="init">
					
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
							$.get("https://api.myjson.com/bins/vzecj", function (wholeData, textStatus, jqXHR) {
								$.post("addHuman.php", {me_id: me_id, avatar: avatar, wholeData: wholeData}, function(dataFinal){
									$.ajax({
										url:"https://api.myjson.com/bins/vzecj",
										type:"PUT",
										data: dataFinal,
										contentType:"application/json; charset=utf-8",
										dataType:"json",
										success: function(data, textStatus, jqXHR){
											$.get("https://api.myjson.com/bins/vzecj", function (data4, textStatus4, jqXHR4) {
												var pointer = 0;
												for(i=0; i<data4.person.length; i++){
													if(data4.person[i]['user_id']==me_id){
														pointer = i;
													}
												}
												var avatarJSON = data4.person[pointer]['avatar'];
												$.post("convertAvatar.php", {convert: avatarJSON}, function(data5){
													document.getElementById("relativeContainer").innerHTML = data5;
												});
											});
										}
									});
								});
							});
						}
						else if(count1 > 0 && count2 > 0){
							data3['person'][countPresent]['avatar'] = "<? echo $avatar; ?>";
							$.ajax({
								url:"https://api.myjson.com/bins/vzecj",
								type:"PUT",
								data: data3,
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
		
	</script>
</body>
</html>