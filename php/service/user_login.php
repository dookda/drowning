<?php
session_start();
    include("./connect.php");
    $username = mysqli_real_escape_string($objCon,$_POST["username"]);
    $password_hash = mysqli_real_escape_string($objCon,$_POST["password"]);
    // $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT * FROM user WHERE username='$username' AND MD5(password_hash)='$password_hash'";
    $objQuery = mysqli_query($objCon, $strSQL);
	while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
	
    $objQuery2 = mysqli_query($objCon, $strSQL);
	while($row2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)){
		$_SESSION["level"] = $row2["level"];	
		$_SESSION["login_time_stamp"] = time(); 
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   
