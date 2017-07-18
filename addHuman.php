<?php

if(isset($_POST['me_id']) && isset($_POST['avatar'])) {
	$me_id = $_POST['me_id'];
	$avatar = $_POST['avatar'];
	if(isset($_POST['wholeData'])){
		$wholeData = $_POST['wholeData'];
		$person = $decoded['person'];
		$newJSON = '{"user_id":"'.$me_id.'", "name":"guest", "avatar":"'.$avatar.'", "pos_x":-1, "pos_y":-1}';
		array_push($decoded, json_decode($newJSON));
		$wholeData['person']=$decoded;
		$encoded = json_encode($wholeData);
		echo $encoded;
	}
}

?>