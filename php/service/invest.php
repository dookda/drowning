<?php
    include("./connect.php");
    
    // $type = $_GET['type'];
    $ampcode = $_GET['drowning_ampcode'];
	$ampcode2 = substr($_GET['drowning_ampcode'],0,2);
    $username = $_GET['drowning_username'];
	$level = $_GET['drowning_level'];
    	// echo $ampcode."<br>";
	// echo $ampcode2."<br>";
	// echo $level."<br>";
    $strSQL;
    if($level=="superadmin"){
        $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
        LEFT JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
        LEFT JOIN cchangwat2 p ON x.drowning_province=p.changwatcode 
        ORDER BY id DESC";
    }elseif($level=="cw"){
        $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
            LEFT JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
            LEFT JOIN cchangwat2 p ON x.drowning_province=p.changwatcode 
            WHERE x.drowning_province = '$ampcode2'
            ORDER BY id DESC";
    }elseif($level=="ap"){
        $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
            LEFT JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
            LEFT JOIN cchangwat2 p ON x.drowning_province=p.changwatcode 
            WHERE x.drowning_amphur = '$ampcode'
            ORDER BY id DESC";
	}
	/*
    if($username=="admin"){
        $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
        LEFT JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
        LEFT JOIN cchangwat2 p ON x.drowning_province=p.changwatcode 
        ORDER BY id DESC";
    }else{
        $strSQL = "SELECT x.*, a.ampurname, p.changwatname  FROM report_dead x
            LEFT JOIN campur2 a ON x.drowning_amphur=a.ampurcodefull
            LEFT JOIN cchangwat2 p ON x.drowning_province=p.changwatcode 
            WHERE x.amphur_addr = '$ampcode'
            ORDER BY id DESC";
    }
	*/
    $datArr = array();
    $products_arr["data"]=array();

    $objQuery = mysqli_query($objCon, $strSQL);
    while($row = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
        array_push($products_arr["data"], $row);
    }
    http_response_code(200);
    echo json_encode($products_arr); 
?>




  
   
