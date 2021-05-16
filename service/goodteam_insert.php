<?php
		include("./connect.php");
		$cid = time();
		if(!empty($_POST)){
			$sql = "INSERT INTO team(cid)VALUES('$cid')";
			mysqli_query($objCon,$sql);
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value)){
					$sql2 = "UPDATE team SET $key='$value' WHERE cid='$cid'";
					$query = mysqli_query($objCon,$sql2);
				}
			}
			if($query) {
				header("location:./../_report_team.html");
			}
			mysqli_close($objCon);
		}	
?>