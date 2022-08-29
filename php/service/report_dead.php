<?php
include("./connect.php");

$type = $_GET['type'];
$code = $_GET['code'];

// print($type);
$datArr = array();
$products_arr["data"]=array();
$strSQL   = "SELECT * FROM report_dead order by id";
$objQuery = mysqli_query($objCon, $strSQL);
while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
    // print($row);
    // $datArr[] = $row;
    array_push($products_arr["data"], $row);
}
http_response_code(200);
echo json_encode($products_arr); 

?>




  
   