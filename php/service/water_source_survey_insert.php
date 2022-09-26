<?php
	 	
		include("connect.php");
        // print_r($_POST);
		$cid = time();
		if(!empty($_POST)){
            $sql = "INSERT INTO water_source_survey(cid, province, amphur,tambon )
                    VALUES('$cid', '0', '0', '0')";
            // print($sql);
			mysqli_query($objCon,$sql);
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value)){
					$sql2 = "UPDATE water_source_survey SET $key='$value' WHERE cid='$cid'";
                    // print($sql2."<br/>");
					$query = mysqli_query($objCon,$sql2);
				}
			}
			
			if($query) {
				header("location:./../_report_water_resource_survey.html");
			}
	
			$url = "https://rti2dss.com/p3000/api/pushmsg";
			$data = array(
				'status'=>'แหล่งน้ำเสี่ยง'
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