<title>Gencode</title>
<?php

date_default_timezone_set('Asia/Bangkok');
$host="localhost";
$user = "root";
$pass = "AAaa@!2019";
$dbname="jomnam2";
mysql_pconnect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อได้");
mysql_select_db($dbname);
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$table="report_dead";	
//*** $_POST

echo "<b>TABLE : </b>".$table."<br>" ; 
echo ' $v999=$_SESSION["FirstName"]; '."<br>"; 
echo ' $v998="V4.0, 23Sep2015"; '."<br><br>"; 

$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
	//Loop Create Variables
	$i=0;
    while ($row = mysql_fetch_assoc($result)) {
		echo "\$v".$i."=\$_POST['".$row['Field']."'];<br>";	
		//echo "echo \"".$row['Field']." : \"".".\$v".$i.".\""."<"."\br".">"."\";"                 ."<br>" ;	

		$i++;

    }	
}
echo "<br>";

//*** Insert
echo "INSERT INTO ".$table." (";
$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
	//Loop Create Variables
	$i=0;
    while ($row = mysql_fetch_assoc($result)) {
		echo  "".$row['Field'].",";	
		$i++;

    }	
}
echo ") "."VALUES "."(";
$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
	//Loop Create Variables
	$i=0;
    while ($row = mysql_fetch_assoc($result)) {
		echo  "'\$v".$i."',";	
		$i++;
    }	
		echo ");";
}

echo "<br><br><br>";

	
//****************************************************************	
//****************************************************************	
//****************************************************************	
	
	
$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
	//Loop Create Variables
    while ($row = mysql_fetch_assoc($result)) {
		echo "\$".$row['Field']."=\$fetch['".$row['Field']."'];<br>";
    }	
}



echo "<br><br><br>";

$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
	//Loop of Echo Out
	while ($row = mysql_fetch_assoc($result)) {
		echo "{echo \$".$row['Field'].";}<br>";
    }
}


//update sql ************************************************************
	echo "<br><br>";
	echo "UPDATE $table SET ";
	$result = mysql_query("SHOW COLUMNS FROM $table");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	if (mysql_num_rows($result) > 0) {
		//Loop of Echo Out
		$numrows=@mysql_num_rows($result);
		$i=0;
		while ($row = mysql_fetch_assoc($result)) {
			if($i>0){
				if($numrows==$i-1){
						//echo $row['Field']."='\$".$row['Field']."'";
						echo $row['Field']."='\$v".($i)."'";
				}else{
						//echo $row['Field']."='\$".$row['Field']."',";
						echo $row['Field']."='\$v".($i)."',";
				}				
			}
			$i++;
		}
	}
	echo " WHERE No=''";
	//******************************************************************
	//echo implode(',' , "1,2,4,6");
	
?>
