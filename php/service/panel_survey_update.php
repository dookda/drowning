<?php
		include("connect.php");
        // print_r($_POST);	
        if(!empty($_POST)){
			$id = $_POST["id"];
			$query = "";
			foreach ($_POST as $key => $value) {
				if(!empty($value) && $key!='id'){
					$sql = "UPDATE panel_survey SET $key='$value' WHERE id='$id'";
					// print($sql."<br/>");
					$query = mysqli_query($objCon,$sql);
				}
			}

			if($query) {
				header("location:./../_report_panel_survey.html");
			}
	
			mysqli_close($objCon);
		}	
?>