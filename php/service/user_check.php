<?php
    include("./connect.php");
    $type = $_POST["type"];
    
    // print_r($_POST);
    // $datArr = array();
    $products_arr["data"]=array();

    if($_POST["type"]=="username"){
        $username = $_POST["username"];
        $strSQL = "SELECT count(id) as cnt FROM user WHERE username='$username'";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }else{
        array_push($products_arr["data"], 0);
    }
    
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   