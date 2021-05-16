<?php
		include("./connect.php");
		$id = $_POST["id"];
        // print_r($_POST);
		if(!empty($_POST)){
			$query = "";
			foreach ($_POST as $key => $value) {
				if($key != 'id'){
					$sql = "UPDATE team SET $key='$value' WHERE id='$id'";
					$query = mysqli_query($objCon,$sql);
				}
			}
			if($query) {
			    header("location:./../_form_team_detail.html?id=".$id);
			}
			mysqli_close($objCon);
		}	
?>