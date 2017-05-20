<?php

if(isset($_POST['name'])){
	$name = $_POST['name'];
	$param = $name."*";
	foreach(glob($param) as $filename){
		echo '<img alt="'.$name.'" src="'.$filename.'">';
	}
}

?>