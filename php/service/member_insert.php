<?php
	// session_start();
	// if($_SESSION['UserID'] == "")
	// {
	// 	header("location:index.php");
	// 	exit();
	// }
	 	
		include("connect.php");
        // print_r($_POST);
        $team_id = $_POST["team_id"];
        // print($team_id);
		$cid = time();
		if(!empty($_POST)){
			$sql = "INSERT INTO team_member(cid, team_id)VALUES('$cid', '$team_id')";
			mysqli_query($objCon,$sql);
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value) && $key != "team_id" ){
					$sql2 = "UPDATE team_member SET $key='$value' WHERE cid='$cid'";
                    // print($sql2."<br/>");
					$query = mysqli_query($objCon,$sql2);
				}
			}
			if($query) {
				header("location:./../_form_team_detail.html?id=".$team_id);
			}
			mysqli_close($objCon);
		}	
?>