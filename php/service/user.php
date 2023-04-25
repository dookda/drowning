<?php
session_start();
if ($_SESSION["level"]<>'superadmin' || time()-$_SESSION["login_time_stamp"] >1800)
			{
				session_destroy();
				echo "<script>";
				echo "window.location.assign('../')";
				echo "</script>";
			} else {
				require('./connect.php');
	}
    // $type = $_GET['type'];
    // $code = $_GET['code'];

    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT * FROM user";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   