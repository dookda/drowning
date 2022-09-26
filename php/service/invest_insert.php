<?php
	include("./connect.php");
    // print_r($_POST);
	$gid = time();
        
	if(!empty($_POST)){
		$sql = "INSERT INTO report_dead(gid)VALUES('$gid')";
        // print($sql."<br/>");
		mysqli_query($objCon,$sql);
		$query = "";
		foreach ($_POST as $key => $value) {
			if(!empty($value)){
				$sql2 = "UPDATE report_dead SET $key='$value' WHERE gid='$gid'";
                // print($sql2."<br/>");
				$query = mysqli_query($objCon,$sql2);
			}
		}

        $filename = "uploads/pic_".$gid."_".$_FILES["filUpload"]["name"];

        if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"./../".$filename))
        {
            $sql3 = "UPDATE report_dead SET picture='$filename' WHERE gid='$gid'";
            mysqli_query($objCon,$sql3);
        }

		if($query) {
			header("location:./../_report_invest.html");
		}

		// send notify
		$url = "https://rti2dss.com/p3000/api/pushmsg";
		$data = array(
			'status'=>'รายงานสอบสวน'
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