<?php
    include("./connect.php");
    $id=$_POST["id"];
    // print_r($_POST);
    $datArr = array();
    $products_arr["data"]=array();
    $strSQL = "
	SELECT
	x.*,
	a.ampurname,
	p.changwatname,
	t.tambonname 
FROM
	report_dead AS x
	INNER JOIN campur2 AS a ON x.drowning_amphur = a.ampurcodefull
	INNER JOIN cchangwat2 AS p ON x.drowning_province = p.changwatcode
	INNER JOIN ctambon2 AS t ON x.drowning_tambon = t.tamboncodefull 
WHERE
    x.id='$id'";
    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   