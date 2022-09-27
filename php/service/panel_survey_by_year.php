<?php
    include("./connect.php");

    $type = $_GET['type'];
    $year = $_GET['year'];
    $year2 = $year+543;

    $datArr = array();
    $products_arr["data"]=array();

   
    $strSQL = "SELECT x.*, t.tambonname, a.ampurname, p.changwatname  FROM panel_survey x
        INNER JOIN ctambon2 t ON x.tambon = t.tamboncodefull
        INNER JOIN campur2 a ON x.amphur=a.ampurcodefull
        INNER JOIN cchangwat2 p ON x.province=p.changwatcode 
        WHERE YEAR(x.survey_date) = '$year' ORDER BY x.id";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    
    
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   