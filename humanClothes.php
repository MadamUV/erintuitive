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
	<table width="740px">
	<td>
		<tr>
			<td width="10%">
				<div id="avatarOptions" class="tops">
					Please wait while your avatar loads.
				</div>
			</td>
			<td id="itemPreview" width="10%">
				<div style="padding:50px;"><label for="color1">Top color</label> <input id="color1" type="text" name="color1" value="#333399" onchange="makeTopColor()"/></div><br>
				<div style="padding:50px;"><label for="color2">Sleeve color</label> <input id="color2" type="text" name="color2" value="#333399" onchange="makeSleeveColor()"/></div>
				
			</td>
			<td id="result" width="500px" style="border-style: dashed; border-width: 6px;">
				
				<div id="relativeContainer" style="position: relative; margin-left: 4px; margin-top:50px; " width="86px" height="380px">
				<?php if(isset($_POST['getAvatar']) && isset($_POST['me_id'])){
					$me_id = $_POST['me_id']; 
					$avatar = $_POST['getAvatar'];
					//10155567524149846 my user id
				} ?>
				<div id="shirtStuff"></div>
				</div>
			</td>
		</tr>
	</table>
	<div id="buttons">
		
	</div>
	<script>
		var previous = '';
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
								previous = relativeContainer.innerHTML;
								document.getElementById("buttons").innerHTML = '<button id="randomize" onclick="randomizeTop()">Randomize top</button><button id="next" onclick="nextOptions()">Next</button>';
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
								previous = relativeContainer.innerHTML;
								document.getElementById("buttons").innerHTML = '<button id="randomize" onclick="randomizeTop()">Randomize top</button><button id="next" onclick="nextOptions()">Next</button>';
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
										previous = relativeContainer.innerHTML;
										document.getElementById("buttons").innerHTML = '<button id="randomize" onclick="randomizeTop()">Randomize top</button><button id="next" onclick="nextOptions()">Next</button>';
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
		$("#relativeContainer .shirtOverlay").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
	}
	function randomizeTop() {
		$("#relativeContainer button").show();
		if($(".man")[0]){
			relativeContainer.innerHTML = previous;
			$("#relativeContainer").append(maleTopOverlays()[0]);
			colorTop();
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'-4px', 'margin-top':'0'});
		}
		else if ($(".woman")[0]){
			relativeContainer.innerHTML = previous;
			//here
			$("#relativeContainer").append(femaleTopOverlays()[0]);
			colorTop();
			$("#relativeContainer .shirt").css({'position':'absolute', 'top':'0', 'left':'0', 'margin-top':'0'});
		}
	}
	function maleTopOverlays(){
		var tops1 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"><defs id="svgEditorDefs"><path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/></defs><rect id="svgEditorBackground" x="202.71499633789062" y="584.431030273437                                                                                                                               5" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/><polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/><polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="238.386 653.06 204.02 670.242 205.48 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 277.133 780.469 269.745 778.75 290.621 778.837 289.676 672.819 259.005 654.434" fill="red" class="shirt"/></svg>';
		var tops2 = '<svg class="shirt" width="86" height="380" viewBox="202.715 584.407 86.5933 380.048" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"> <defs id="svgEditorDefs"> <path id="svgEditorClosePathDefs" fill="moccasin" style="stroke-width: 0px; stroke: none; fill-opacity: 1;" class="shirt"/> </defs> <rect id="svgEditorBackground" x="202.71499633789062" y="584.4310302734375" width="86.59329986572266" height="115.80899810791016" style="fill: none; stroke: none;" class="shirt"/> <polygon id="e7_polygon" style="stroke: none; stroke-width: 0px;" points="254.828 683.96 247.215 684.916 244.518 727.947 245.893 727.947 247.955 690.833" fill="black" transform="matrix(-0.52 0 0 1.46972 403.612 -317.826)" class="shirt"/> <polygon id="e2_polygon" style="stroke-width: 0px; stroke: none;" points="236.324 654.435 204.02 670.242 206.082 779.524 210.206 778.149 215.017 686.737 208.832 792.583 278.937 793.957 274.126 684.676 276.532 778.665 277.562 778.149 290.621 778.837 289.075 671.617 259.005 654.434 259.349 792.927 246.633 791.897 239.417 792.927" fill="red" class="shirt"/></svg>';
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
		return shuffle(maleTops);
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
</body>
</html>