<html>
<head>
	<script src="js/jquery.js"></script>
	<title>Name it!</title>
</head>
<body>
	Name your character<br><input id="avatarName" maxlength="12" name="avatarName" type="text"/><br>
	<button onclick="postAvatarWithName()">Finish</button>
	<div id="itemPreview"></div>
</body>
<script>
	var animalObject = window.localStorage.getItem("animalObject");
	function postAvatarWithName(){
		var av = document.getElementById("avatarName").value;
		var avatar = escape(document.getElementById("relativeContainer").innerHTML);
		/*$.post("postAvatar.php", {name: av, me_id : me_id2, avatar: avatar}, function(data){
			$("#itemPreview").append("success!");
		});
		//https://www.jasonbase.com/things/nMpo/edit*/
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
					data:'{"person": [{"user_id":"'+me_id+'", "name":"'+theName+'", "avatar":"'+avatar+'", "pos_x": -1, "pos_y": -1, "facingLeft": false, "blink": false, "spinningLeft": false, "spinningRight": false]}',
					contentType:"application/json; charset=utf-8",
					dataType:"json",
					success: function(data, textStatus, jqXHR){
						itemPreview.innerHTML = "Great!";
						window.location.replace("spaceScene.php");
					}
				});
				//https://api.myjson.com/bins/14ovul
				$.ajax({
					url:"https://api.myjson.com/bins/14ovul",
					type:"PUT",
					data:'{"person": [{"user_id":"'+me_id+'", "name":"'+theName+'", "avatar":"'+avatar+'", "pos_x": -1, "pos_y": -1, "facingLeft": false, "blink": false, "spinningLeft": false, "spinningRight": false]}',
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
					if(data3['person'][i]['user_id']==me_id){
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
		});
	}
</script>
</html>