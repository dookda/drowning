<?php
    include("./connect.php");
    $type = $_GET['type'];
    $year = $_GET['year'];

    $datArr = array();
    $products_arr["data"]=array();

    if($type=="statByTab"){
        // $strSQL = "SELECT drowning_province as pro, COUNT(drowning_after_dead) AS total,
        //     COUNT(drowning_after_dead) - SUM(if(drowning_after_dead='ไม่เสียชีวิต',1, 0 )) AS dead,
        //     SUM(if(drowning_after_dead='ไม่เสียชีวิต',1, 0 )) AS alive
        //     FROM report_dead WHERE s_year = '$year' AND age <= 15 GROUP BY drowning_province";
        $strSQL = "SELECT drowning_province as pro,
                    sum(CASE WHEN age <= 15 THEN drowning_number_dead ELSE 0 END) as dead_lt15,
                    sum(CASE WHEN age > 15 THEN drowning_number_dead ELSE 0 END) as dead_gt15,
                    sum(CASE WHEN age >= 0 THEN drowning_number_dead ELSE 0 end) as dead_total,
                    sum(CASE WHEN age <= 15 THEN drowning_number_alive ELSE 0 END) as alive_lt15,
                    sum(CASE WHEN age > 15 THEN drowning_number_alive ELSE 0 END) as alive_gt15,
                    sum(CASE WHEN age >= 0 THEN drowning_number_alive ELSE 0 END) as alive_total
                FROM report_dead rd 
                WHERE (drowning_province=53 OR drowning_province=63 OR drowning_province=64 OR drowning_province=65 OR drowning_province=67) AND YEAR(drowning_date) =  '$year'  
                GROUP BY drowning_province" ;  
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statBySex"){
        $strSQL   = "SELECT sex,
            sum(CASE WHEN age <= 15 THEN drowning_number_dead ELSE 0 END) as dead_lt15,
            sum(CASE WHEN age > 15 THEN drowning_number_dead ELSE 0 END) as dead_gt15,
            sum(CASE WHEN age >= 0 THEN drowning_number_dead ELSE 0 end) as dead_total,
            sum(CASE WHEN age <= 15 THEN drowning_number_alive ELSE 0 END) as alive_lt15,
            sum(CASE WHEN age > 15 THEN drowning_number_alive ELSE 0 END) as alive_gt15,
            sum(CASE WHEN age >= 0 THEN drowning_number_alive ELSE 0 END) as alive_total
        FROM report_dead rd 
        WHERE (drowning_province=53 OR drowning_province=63 OR drowning_province=64 OR drowning_province=65 OR drowning_province=67) AND YEAR(drowning_date) =  '$year' 
        GROUP BY sex ";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statByMonth"){
        $strSQL   = "SELECT MONTH(drowning_date) as dmonth, COUNT(drowning_date) AS dcase
            FROM report_dead 
            WHERE s_year = '$year' AND age <= 15
            GROUP BY MONTH(drowning_date) ORDER BY MONTH(drowning_date)";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="statByType"){
        $strSQL   = "SELECT DISTINCT drowning_type as dtype, count(drowning_type) as dcnt
            FROM report_dead 
            WHERE s_year = '$year' AND age <= 15
            GROUP BY drowning_type";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }
    
    http_response_code(200);
    echo json_encode($products_arr); 

?>




  
   