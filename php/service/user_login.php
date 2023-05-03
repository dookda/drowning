<?php
session_start();
    include("./connect.php");
    $username = $_POST["username"];
    $password_hash = $_POST["password"];
    // $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT * FROM user WHERE username='$username' AND MD5(password_hash)='$password_hash'";
    $objQuery = mysqli_query($objCon, $strSQL);
    
	while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
		$_SESSION["level"]=$row["level"];	
		$_SESSION["login_time_stamp"] = time(); 
        array_push($products_arr["data"], $row);
    }

    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   