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
	
			// send notify
			$url = "https://rti2dss.com/p3000/api/pushmsg";
			$data = array(
				'status'=>'ทีมผู้ก่อการดี'
			);
			$ch = curl_init($url);
			$jsonDataEncoded = json_encode($data);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
			$result = curl_exec($ch);
	
			mysqli_close($objCon);
		}	
?>