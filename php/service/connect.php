<?php
$db_config = array(
    "host" => "db",  // กำหนด host
    "user" => "admin", // กำหนดชื่อ user      root
    "pass" => "AAaa2023", //                    AAaa@!2019
    // "pass"=>"qazwsxedcr112233",   // กำหนดรหัสผ่าน
    "dbname" => "jomnam2",  // กำหนดชื่อฐานข้อมูล
    "charset" => "utf8"  // กำหนด charset
);
$objCon = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}

$objCon->set_charset("utf8");
