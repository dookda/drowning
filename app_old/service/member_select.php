<?php
    include("./connect.php");
    $id = $_POST['id'];
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT x.* FROM team_member x 
        WHERE x.team_id=$id";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   