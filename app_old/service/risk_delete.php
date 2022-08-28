<?php
	// session_start();
	// if($_SESSION['UserID'] == "")
	// {
	// 	header("location:index.php");
	// 	exit();
	// }
	 	
		include("connect.php");
		if(!empty($_POST)){
            // print_r($_POST);
            $ampurcode = $_POST["ampurcode"];
            $byear = $_POST["byear"];
			$sql = "DELETE FROM population_target WHERE ampurcode='$ampurcode' and byear='$byear'";
			$query  = mysqli_query($objCon,$sql);
            $data = [ 'status' => 'success'];
            header('Content-Type: application/json');
            echo json_encode($data);
			mysqli_close($objCon);
		}	
?>