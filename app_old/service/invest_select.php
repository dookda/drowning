<?php
    include("./connect.php");
    $id=$_POST["id"];
    // print_r($_POST);
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
        INNER JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
        INNER JOIN cchangwat2 p ON x.drowning_province=p.changwatcode
        WHERE x.id='$id'";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   