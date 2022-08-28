<?php
    include("./connect.php");
    $ampurcode = $_POST["ampurcode"];
    $byear=$_POST["byear"];
    // print_r($_POST);
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT x.* FROM population_base x WHERE x.ampurcode='$ampurcode' and x.byear='$byear'";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   