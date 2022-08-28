<?php
    include("./connect.php");
    $type = $_GET['type'];
    $year = $_GET['year'];

    $datArr = array();
    $products_arr["data"]=array();

    if($type=="statByTab"){
        $strSQL = "SELECT drowning_province as pro, COUNT(drowning_after_dead) AS total,
            COUNT(drowning_after_dead) - SUM(if(drowning_after_dead='ไม่เสียชีวิต',1, 0 )) AS dead,
            SUM(if(drowning_after_dead='ไม่เสียชีวิต',1, 0 )) AS alive
            FROM report_dead WHERE s_year = '$year' AND age <= 15 GROUP BY drowning_province";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statBySex"){
        $strSQL   = "SELECT * FROM report_dead WHERE s_year = '$year' ORDER BY id";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statByMonth"){
        $strSQL   = "SELECT MONTH(drowning_date) as dmonth, COUNT(drowning_date) AS dcase
            FROM report_dead WHERE s_year = '$year'
            GROUP BY MONTH(drowning_date) ORDER BY MONTH(drowning_date)";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statByType"){
        $strSQL   = "SELECT DISTINCT drowning_type as dtype, count(drowning_type) as dcnt
            FROM report_dead WHERE s_year = '$year'
            GROUP BY drowning_type";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }
    
    http_response_code(200);
    echo json_encode($products_arr); 

?>




  
   