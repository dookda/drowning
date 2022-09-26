<?php
    include("./connect.php");

    $type = $_GET['type'];
    $year = $_GET['year'];
    $year2 = $year+543;

    $datArr = array();
    $products_arr["data"]=array();

    if($type=="risk"){
        $strSQL = "SELECT x.*, t.tambonname, a.ampurname, p.changwatname  FROM panel_survey x
                INNER JOIN ctambon2 t ON x.tambon = t.tamboncodefull
                INNER JOIN campur2 a ON x.amphur=a.ampurcodefull
                INNER JOIN cchangwat2 p ON x.province=p.changwatcode 
                WHERE YEAR(x.survey_date) = '$year' ORDER BY x.id";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="dead"){
        $strSQL = "SELECT x.*, t.tambonname, a.ampurname, p.changwatname  FROM report_dead x
            INNER JOIN ctambon2 t ON x.drowning_tambon = t.tamboncodefull
            INNER JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
            INNER JOIN cchangwat2 p ON x.drowning_province=p.changwatcode
            WHERE x.s_year='$year' ORDER BY x.id";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }elseif($type=="prev"){
        $strSQL = "SELECT p.prov, p.pop, d.dead, (d.dead*100000)/p.pop as prev
            FROM (	select changwatcode as prov, sum(pop_female + pop_female) as pop 
                    from population_base
                    where byear = '$year2'
                    group by changwatcode ) p
            JOIN (	select drowning_province as prov, 
                    count(drowning_after_dead) - sum(if(drowning_after_dead='ไม่เสียชีวิต',1, 0 )) as dead
                    from report_dead r
                    where s_year = '$year'
                    group by drowning_province) d
            ON p.prov=d.prov";
        $objQuery = mysqli_query($objCon, $strSQL);
        while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
            array_push($products_arr["data"], $row);
        }
    }
    
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   