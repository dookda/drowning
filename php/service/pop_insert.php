<?php
	// session_start();
	// if($_SESSION['UserID'] == "")
	// {
	// 	header("location:index.php");
	// 	exit();
	// }
	 	
		include("connect.php");
        print_r($_POST);
        $amp = $_POST["ampurcode"];
        $byear=$_POST["byear"];
		$cid = time();
		if(!empty($_POST)){
			$sql = "INSERT INTO population_base(cid, ampurcode, byear)VALUES('$cid','0','0')";
			mysqli_query($objCon,$sql);
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value)){
					$sql2 = "UPDATE population_base SET $key='$value' WHERE cid='$cid'";
                    // print($sql2."<br/>");
					$query = mysqli_query($objCon,$sql2);
				}
			}
			if($query) {
				header("location:./../_report_pop.html");
			}
			mysqli_close($objCon);
		}	
?>