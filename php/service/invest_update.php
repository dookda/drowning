<?php
		include("./connect.php");
        
		if(!empty($_POST)){
			$id = $_POST["id"];
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value)){
					$sql = "UPDATE report_dead SET $key='$value' WHERE id='$id'";
					// print($sql."<br/>");
					$query = mysqli_query($objCon,$sql);
				}
			}

	
			if($query) {
				header("location:./../_report_invest.html");
			}
	
			// $url = "https://rti2dss.com/p3000/api/pushmsg";
			// $data = array(
			// 	'status'=>'แก้ไขรายงานสอบสวน'
			// );
			// $ch = curl_init($url);
			// $jsonDataEncoded = json_encode($data);
			// curl_setopt($ch, CURLOPT_POST, 1);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
			// $result = curl_exec($ch);
	
			mysqli_close($objCon);
		}	
?>