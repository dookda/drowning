<?php
    include("./connect.php");
    $id = $_POST['id'];
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM team x 
        INNER JOIN campur2 a ON x.ampur=a.ampurcodefull
        INNER JOIN cchangwat2 p ON x.changwat=p.changwatcode
        WHERE x.id=$id";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   