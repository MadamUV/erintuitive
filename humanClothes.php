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
			<td id="itemPreview" width="17%">
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td id="result" width="400px" style="border-style: dashed; border-width: 6px;">
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
				</script>
			</td>
			<div>
			<div>
			</div>
			</div>
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
		var female_tops = ['<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.13 783.615 C 222.463 777.523 239.555 745.442 233.907 737.92 C 228.258 730.398 212.084 703.513 211.008 673.349 C 209.926 643.185 277.459 693.922 281.117 693.926 C 284.784 693.931 258.992 736.045 261.28 738.984 C 263.572 741.925 262.749 737.857 265.04 751.978 C 267.337 766.099 266.946 763.322 266.977 766.097 C 267.008 768.872 279.799 770.012 278.184 780.825 C 264.275 792.601 277.565 817.622 258.637 806.541 C 239.706 795.46 258.609 810.393 219.13 783.615 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" transform="matrix(-0.999542, 0.030274, -0.030274, -0.999542, 514.654955, 1465.287216)" class="clothes" /></svg>', '<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 254.397 667.684 247.277 690.986 C 240.157 714.288 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>', '<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 210.468 761.085 215.629 772.578 C 220.791 784.072 269.579 773.053 272.796 773.049 C 276.015 773.044 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 264.51 701.716 268.182 695.995 C 276.335 685.238 249.984 657.5 244.901 722.558 C 239.818 787.616 255.062 653.866 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>', '<svg width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="skin" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <path d="M 219.708 687.434 C 222.637 693.526 237.647 725.607 232.687 733.129 C 227.728 740.651 213.523 767.536 212.574 797.7 C 211.625 827.864 270.937 777.127 274.154 777.123 C 277.373 777.118 254.719 735.004 256.731 732.065 C 258.743 729.124 258.018 733.192 260.034 719.071 C 262.05 704.95 261.705 707.727 261.732 704.952 C 261.759 702.177 272.996 701.037 271.576 690.224 C 259.36 678.448 271.032 653.427 254.406 664.508 C 237.78 675.589 254.383 660.656 219.708 687.434 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);" class="clothes" /></svg>', '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes"/> <path d="M228.76336669921875,672.991455078125c4.324533905631284,-1.4112558776510014,11.51096896064226,0.22129187068173906,13.058807373046875,3.4365234375c2.31151087718564,2.5279263481900216,4.032802321963857,9.591366653129171,2.061920166015625,13.74615478515625c0.7783387185652941,-11.65323189642561,-6.386462290754537,-17.833338000890194,-15.1207275390625,-17.18267822265625Z" id="e39_area3" fill="black" style="stroke: none; stroke-width: 0px;" transform="matrix(0.846 0 0 0.874739 39.2094 87.7496)" class="clothes"/> <path d="M235.63641888550254,679.8645072644088c4.324533905631284,-1.4112558776510014,10.747296495861264,0.9085970893099784,13.058807373046875,3.4365234375c2.3115108771856403,2.5279263481900216,4.032802321963857,9.591366653129171,2.061920166015625,13.74615478515625c0.7783387185652941,-11.653231896425611,-6.386462290754537,-17.833338000890194,-15.1207275390625,-17.18267822265625Z" id="e9_area3" fill="black" style="stroke: none; stroke-width: 0px;" transform="matrix(-0.806664 0 0 0.847088 450.119 101.46)" class="clothes"/> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes"/> <polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.76 656.485 228.076 661.983 215.017 677.104 209.519 686.726 218.454 734.15 218.454 732.089 229.451 741.711 228.076 727.277 226.701 708.72 232.2 721.092 234.949 732.776 221.89 755.457 212.955 771.952 211.581 787.76 278.249 791.884 270.002 765.079 256.943 738.274 257.63 727.277 263.129 710.782 262.441 732.089 265.191 743.085 274.126 734.838 280.311 699.098 283.748 688.101 283.06 681.228 259.692 657.86" fill="red" class="clothes"/></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="234.262 657.86 248.008 698.411 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 268.627 762.33 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 273.438 767.141 276.875 780.2 278.249 786.386 228.763 792.571 212.955 792.571 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="234.262 657.86 246.633 660.609 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 268.627 762.33 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 273.438 767.141 276.875 780.2 278.249 786.386 228.763 792.571 212.955 792.571 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="black" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="232.887 657.172 258.318 647.55 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 283.061 776.076 287.872 787.76 289.934 959.587 213.643 943.778 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 215.705 679.853" fill="red" class="clothes" /></svg>', '<?xml version="1.0" encoding="utf-8"?><svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;"/> </defs> <polygon class="clothes" id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="212.268 651.674 274.813 642.738 258.318 658.547 280.999 679.853 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 283.061 776.076 287.872 787.76 248.695 887.42 218.454 804.255 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 225.327 663.358" fill="red"/></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e4_polygon" style="stroke-width: 0px; stroke: none;" points="273.438 672.293 273.438 670.918 265.191 698.411 266.565 699.785 267.94 705.284 267.94 710.782 266.565 713.531 261.754 717.655 263.129 734.838 270.689 765.766 287.872 763.705 280.311 754.082 276.187 718.342 282.373 684.664 276.187 674.355" fill="lime" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 285.122 762.33 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e4_polygon" style="stroke-width: 0px; stroke: none;" points="273.438 672.293 273.438 670.918 265.191 698.411 266.565 699.785 267.94 705.284 267.94 710.782 266.565 713.531 261.754 717.655 263.129 734.838 270.689 765.766 287.872 763.705 280.311 754.082 276.187 718.342 282.373 684.664 276.187 674.355" fill="lime" class="clothes" /><polygon id="e5_polygon" style="stroke-width: 0px; stroke: none;" points="221.203 690.163 207.457 688.788 218.454 727.965 218.454 747.209 207.457 769.203 216.392 767.828 229.451 743.085 232.887 727.965" fill="lime" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 290.621 765.079 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e5_polygon" style="stroke-width: 0px; stroke: none;" points="221.203 690.163 207.457 688.788 218.454 727.965 218.454 747.209 207.457 769.203 216.392 767.828 229.451 743.085 232.887 727.965" fill="lime" class="clothes" /></svg>', '<svg class="shirt" xmlns="http://www.w3.org/2000/svg" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMax" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="red" style="stroke-width: 0px; stroke: none;" class="clothes" /> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="clothes" /> <rect id="rect-1" x="-403.988" y="499.579" width="1300" height="550" style="fill: none; stroke: none;" class="clothes" /><polygon id="e1_polygon" style="stroke-width: 0px; stroke: none;" points="239.073 683.29 251.445 672.98 270.689 666.107 276.187 674.355 281.686 686.039 274.813 720.404 277.562 755.457 285.122 763.705 290.621 765.079 269.314 766.454 261.754 731.401 262.441 718.342 262.441 719.03 257.63 733.463 260.379 739.649 274.813 767.828 282.373 780.887 289.934 787.76 206.082 798.07 217.079 782.261 217.079 765.766 233.575 737.587 235.636 726.59 232.2 713.531 227.389 707.346 231.513 723.841 232.2 730.714 224.64 766.454 219.828 765.079 208.144 767.828 208.832 767.828 218.454 748.584 218.454 747.897 219.141 730.027 209.519 689.476 221.89 690.85" fill="red" class="clothes" /><polygon id="e5_polygon" style="stroke-width: 0px; stroke: none;" points="221.203 690.163 207.457 688.788 218.454 727.965 218.454 747.209 207.457 769.203 216.392 767.828 229.451 743.085 232.887 727.965" fill="lime" class="clothes" /></svg>', '<?xml version="1.0" encoding="utf-8"?><svg id="woman" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" class="lines" fill="black" style="stroke-width: 0px; stroke: none;"/> </defs> <path d="M 220.661 688.043 C 223.59 694.135 237.991 726.216 233.031 733.738 C 228.072 741.26 210.812 761.694 215.973 773.187 C 221.135 784.681 269.923 773.662 273.14 773.658 C 276.359 773.653 255.063 735.613 257.075 732.674 C 259.087 729.733 258.362 733.801 260.378 719.68 C 262.394 705.559 262.049 708.336 262.076 705.561 C 262.103 702.786 264.854 702.325 268.526 696.604 C 276.679 685.847 262.658 684.737 250.057 686.113 C 237.456 687.489 243.764 684.409 220.661 688.043 Z" id="path-1" class="skin" style="stroke: none; stroke-width: 0px; fill: rgb(255, 0, 0);"/> <path d="M 225.594 662.974 C 225.594 668.686 221.94 675.979 221.94 683.073 C 221.94 687.346 224.985 696.042 224.985 693.427" style="stroke: rgb(0, 0, 0); stroke-opacity: 0; fill: rgb(254, 0, 0);"/> <path d="M 268.837 688.555 C 270.992 688.555 270.055 682.91 270.055 681.143 C 270.055 676.552 268.461 662.366 263.964 662.366" style="stroke: rgb(0, 0, 0); stroke-opacity: 0; fill: rgb(254, 0, 0);"/></svg>'];
		$("#back").hide();
		var relativeContainer = document.getElementById("relativeContainer");
		var itemPreview = document.getElementById("itemPreview");
		var avatarOptions = document.getElementById("avatarOptions");
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
		var topCount = topIndex+1;
		function backOptions() {
			
		}
		function nextOptions() {
			if(avatarOptions.getAttribute("class")=="tops"){
				if($(".man")[0]){
					
				}
				else if ($(".woman")[0]]{
					$("#relativeContainer").append(female_tops[topIndex]);
					
				}
				avatarOptions.setAttribute("class", "tops2");
			}
		}
	</script>
</body>
</html>