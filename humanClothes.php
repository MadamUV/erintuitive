<?php
include 'config.php';

?>
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
			<td id="result" ondrop="drop(event)" ondragover="allowDrop(event)" width="350px" style="border-style: dashed; border-width: 6px;">
				<div id="relativeContainer" style="position: relative; margin-left: 80px;" width="86px" height="380px">
				<?php if(isset($_POST['getAvatar']) && isset($_POST['me_id'])){
					$me_id = $_POST['me_id']; 
					$avatar = $_POST['getAvatar'];
					echo urldecode($avatar);
					if($result = $mysqli->query("SELECT * FROM `humans` WHERE `me_id`='". $me_id . "' LIMIT 1;")){
						$row_count = $result->num_rows;
						if ($row_count == 0){
							$sql = "INSERT INTO `humans` (`id`, `me_id`, `avatar`) VALUES (NULL, '".$me_id."', '".$avatar."');";
							$mysqli->query($sql);
						}
						else {
							$sql = "UPDATE `humans` SET `avatar`='".$me_id."' WHERE `me_id`='".$avatar."';";
							$mysqli->query($sql);
						}
					}
					if($result2 = $mysqli->query("SELECT * FROM `humans` WHERE `me_id`='". $me_id . "' LIMIT 1;")){
						if($result2->num_rows > 0){
							$row = mysqli_fetch_row($result2);
							//echo urldecode($row['avatar']);
						}
					}
				} ?>
				</div>
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