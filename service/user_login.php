<?php
    include("./connect.php");
    $username = $_POST["username"];
    $password_hash = $_POST["password"];
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT id, username FROM user 
        WHERE username='$username' AND password_hash='$password_hash'";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   