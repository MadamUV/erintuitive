<script src="js/jquery.js"></script>
<span><font style="font-size: 23px;">Randomize the colors until you are satisfied!</font><br>
<button id='random' onclick="clicked()">Randomize</button>
<button id='random' onclick="reverting()">Don't like the result? Revert</button>
</span>
<div id="animalObject" height="800" width="800">
<?php
if(isset($_GET['image'])){
	$img = $_GET['image'];
	$img = "svg/".substr($img, 4).".svg";
	$handle = fopen($img, "r");
	$contents = fread($handle, filesize($img));
	echo '<br><svg width="660" height="660" id="outerSVG">'.$contents.'</svg>';
	fclose($handle);
}
?>
</div>
<style>
	span {
		align: center;
		position: fixed;
		top: 0;
	}
</style>
<script>
	var revert = document.getElementById("animalObject").innerHTML;
	function reverting(){
		document.getElementById("animalObject").innerHTML = revert;
	}
	function clicked(){
		/*var arr6 = document.getElementsByTagName("rect");
		var arr5 = arr6.concat(document.getElementsByTagName("circle"));
		var arr4 = arr5.concat(document.getElementsByTagName("ellipse"));
		var arr3 = arr4.concat(document.getElementsByTagName("polygon"));
		var arr2 = arr3.concat(document.getElementsByTagName("path"));
		var arr = arr2.concat(document.getElementsByTagName("pattern"));
		*/
		//$("circle, ellipse").attr("style", "fill:"+randomColor());
		$("polygon").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
		$("path").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
		$("pattern").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
		$("rect").attr("style", "stroke:"+randomColor()+";stroke-width:"+(Math.floor(Math.random()*9)+1).toString()+";fill:"+randomColor());
		/*while(arr.length > 0){
			for (i=0; i<arr.length; i++){
				var temp = [arr[i]];
				var color = randomColor();
				for (j=1; j<arr.length; j++){
					if(arr[i].getAttribute("style")==arr[j].getAttribute("style") && i != j){
						temp.push(arr[j]);
						arr.splice(i, 1);
						arr.splice(j, 1);					
					}
				}
				for(k=0; k<temp; k++){
					var fillColor = "fill:"+color;
					temp[k].setAttribute("style", fillColor);
				}
			}
		}
		var color = randomColor();
		for (i=0; i<arr.length; i++){
			var style = "fill:"+color;
			arr[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr2.length; i++){
			var style = "fill:"+color;
			arr2[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr3.length; i++){
			var style = "fill:"+color;
			arr3[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr4.length; i++){
			var style = "fill:"+color;
			arr4[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr5.length; i++){
			var style = "fill:"+color;
			arr5[i].setAttribute("style", style);
		}
		color = randomColor();
		for (i=0; i<arr6.length; i++){
			var style = "fill:"+color;
			arr6[i].setAttribute("style", style);
		}*/
	}
	function randomColor() {
		//from https://www.hscripts.com/codes-snippets/PHP/random-hex-color.php
		var rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
		var color = "#"+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1]+rand[Math.floor(Math.random()*15)+1];
		return color;
	}
</script>