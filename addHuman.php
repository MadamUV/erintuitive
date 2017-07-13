<?php

include 'config.php';
if(isset($_POST['me_id']) && isset($_POST['myPrevious']) && isset($_POST['myPreviousEyes']) && isset($_POST['myPreviousMouth']) && isset($_POST['myPreviousHair']) && isset($_POST['myPreviousHairStreak']) && isset($_POST['myPreviousUndies'])) {
	$me_id = $_POST['me_id'];
	$previous = $_POST['myPrevious'];
	$previousEyes = $_POST['myPreviousEyes'];
	$previousMouth = $_POST['myPreviousMouth'];
	$previousHair = $_POST['myPreviousHair'];
	$previousHairStreak = $_POST['myPreviousHairStreak'];
	$previousUndies = $_POST['myPreviousUndies'];
	//get data
	if($result = $mysqli->query("SELECT * FROM levels WHERE me_id='" . $me_id . "' LIMIT 1")){
		$row_count = $result->num_rows;
		if ($row_count == 0){
			$sql = "INSERT INTO humans (me_id, previous, previousEyes, previousMouth, previousHair, previousHairStreak, previousUndies) VALUES ('" . $me_id . "', '" . $previous . "', '" . $previousEyes . "', '" . $previousMouth . "', '" . $previousHair . "', '" . $previousHairStreak . "', '" . $previousUndies . "')";
			$mysqli->query($sql);
		}
		else {
			$sql = "UPDATE human SET previous='".$previous."', previousEyes='".$previousEyes."', previousMouth='".$previousMouth."', previousHair='".$previousHair."', previousHairStreak='".$previousHairStreak."', previousUndies='".$previousUndies."' WHERE id='".$me_id."'";
			$mysqli->query($sql);
		}
	}
}

?>