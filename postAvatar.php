<?php

   //$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $conn = mysqli_connect("fdb5.freehostingeu.com", "1879270_erintuitive", "iluverintuitive1732", "1879270_erintuitive");
   if(isset($_POST['me_id']) && isset($_POST['avatar'] && isset($_POST['name']){
	   $me_id = $_POST['me_id'];
	   $avatar = $_POST['avatar'];
	   $name = $_POST['name'];
	   $sql = 'SELECT * FROM `humans` WHERE `me_id`="'.$me.'";';
	   $result1 = mysqli_query($conn, $sql);
	   if(mysqli_num_rows($result1)==0){
		   $sql2 = "INSERT INTO `humans`(`id`, `me_id`, `avatar`, `name`) VALUES (NULL, '".$me_id."','".$avatar."','".$name."');";
		   mysqli_query($conn, $sql2);
	   }
	   else {
		   $sql2 = "UPDATE `humans` SET `name`='".$name."' WHERE `me_id`='".$me_id."';";
		   mysqli_query($conn, $sql2);
	   }
   }
   
?>