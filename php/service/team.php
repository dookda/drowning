<?php
    include("./connect.php");

    // $type = $_GET['type'];
    // $code = $_GET['code'];

    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "SELECT x.*, a.ampurname, p.changwatname,
                DATE_ADD(x.approv_date , INTERVAL 730 DAY) as expire,
                CASE WHEN now() > DATE_ADD(x.approv_date , INTERVAL 730 DAY)  THEN 'ครบกำหนด' ELSE 'ยังไม่ครบกำหนด' END as renew
            FROM team x
            INNER JOIN campur2 a ON x.ampur=a.ampurcodefull
            INNER JOIN cchangwat2 p ON x.changwat=p.changwatcode ORDER BY x.approv_date DESC";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   