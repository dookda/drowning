<?php
	// session_start();
	// if($_SESSION['UserID'] == "")
	// {
	// 	header("location:index.php");
	// 	exit();
	// }
	 	
		include("connect.php");
        // print_r($_POST);
        $token = '$2y$10$j3dXzcAfyuBzNBN0lGRd0.N3jnkknlnEGgtj7Kxi0G6OZy0yr8d8W';
        // $auth_key = time();
        // print($team_id);
		// $cid = time();
		if(!empty($_POST)){
            if($_POST["token"]==$token){

                $username = $_POST["username"];
                $registration_ip = $_POST["registration_ip"];
                $password_hash = $_POST["password"];
                $ampcode = $_POST["ampcode"];

                $sql = "INSERT INTO user(username,password_hash,registration_ip,ampcode)
                        VALUES('$username','$password_hash','$registration_ip','$ampcode')";
                // print($sql);
                $query = mysqli_query($objCon,$sql);
                if($query) {
                    header("location:./../_report_user.html");
                }
                mysqli_close($objCon);
            }
			
		}	
?>