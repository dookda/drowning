<?php
		include("./connect.php");

		$gid = $_POST["gid"];
        // print($gid);
        
		if(!empty($_POST)){
			$query = "";
			foreach ($_POST as $key => $value) {
				// print($key);
				if(!empty($value) && $key!=='gid'){
					$sql2 = "UPDATE report_dead SET $key='$value' WHERE gid='$gid'";
                    print($sql2."<br/>");
					// $query = mysqli_query($objCon,$sql2);
				}
			}

            // $filename = "uploads/pic_".$gid."_".$_FILES["filUpload"]["name"];

            // if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"./../".$filename))
            // {
            //     $sql3 = "UPDATE report_dead SET picture='$filename' WHERE gid='$gid'";
            //     mysqli_query($objCon,$sql3);
            // }

			if($query) {
				header("location:./../_report_invest.html");
			}
            
			mysqli_close($objCon);
		}	
?>