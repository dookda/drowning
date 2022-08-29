<?php
    include("./connect.php");
    $id=$_POST["id"];
    // print_r($_POST);
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT username,password_hash,registration_ip,ampcode FROM user WHERE id='$id'";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   