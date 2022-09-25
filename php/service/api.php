<?php
include("./connect.php");

$type = $_GET['type'];
$code = '';

if(isset($_GET['code']))
{
    $code = $_GET['code'];
}

$products_arr=array();
$products_arr["data"]=array();

if($_GET['type']=="pro"){
    // $strSQL   = "SELECT * FROM cchangwat WHERE changwatcode='53' OR changwatcode='63' OR changwatcode='64' OR changwatcode='65' OR changwatcode='67' ORDER BY changwatname";
    $strSQL   = "SELECT * FROM cchangwat ORDER BY changwatname";	
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        extract($row);    
            $product_item=array(
                "code" => $changwatcode,
                "name" => $changwatname
            );   
            array_push($products_arr["data"], $product_item);
    }
}elseif($_GET['type']=="amp"){
    $strSQL   = "SELECT * FROM campur WHERE changwatcode = '$code' order by ampurname";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        extract($row);    
            $product_item=array(
                "code" => $ampurcodefull,
                "name" => $ampurname
            ); 
            array_push($products_arr["data"], $product_item);
    } 
}elseif($_GET['type']=="tam"){
    $strSQL   = "SELECT * FROM ctambon WHERE ampurcode = '$code' order by tambonname";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        extract($row);    
            $product_item=array(
                "code" => $tamboncodefull,
                "name" => $tambonname
            ); 
            array_push($products_arr["data"], $product_item);
    } 
}

http_response_code(200);
echo json_encode($products_arr); 

?>




  
   