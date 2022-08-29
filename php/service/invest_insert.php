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
            
			mysqli_close($objCon);
		}	
?>