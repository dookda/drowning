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
            $id = $_POST["id"];
			$sql = "DELETE FROM news WHERE id='$id'";
            // print($sql);
			$query  = mysqli_query($objCon,$sql);
            $data = [ 'status' => 'success'];
            header('Content-Type: application/json');
            echo json_encode($data);
			mysqli_close($objCon);
		}	
?>