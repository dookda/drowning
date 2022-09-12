<?php
		include("./connect.php");
		$cid = $_POST['cid'];
		// print_r($_POST);
		if(!empty($_POST)){
			$sql = "INSERT INTO team_rating(cid)VALUES('$cid')";
			mysqli_query($objCon,$sql);
			$query = "";
			$sumRate = 0;
			foreach ($_POST as $key => $value) {
				if(!empty($value) && $key != 'cid'){
					$sql2 = "UPDATE team_rating SET $key='$value' WHERE cid='$cid'";
					$sumRate += $value;
					$query = mysqli_query($objCon,$sql2);
				}
			}

			$sql2 = "UPDATE team_rating SET sumrating=$sumRate WHERE cid='$cid'";
			mysqli_query($objCon,$sql);
			
			if($query) {
				header("location:./../_report_team.html");
			}
			mysqli_close($objCon);
		}	
?>