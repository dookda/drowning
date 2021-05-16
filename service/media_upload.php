<?php

include("connect.php");
$title = $_POST["title"];
$cid = time();
$filename = "uploads/attach/attach_".$cid."_".$_FILES["filUpload"]["name"];
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"./../".$filename))
{
	$sql = "INSERT INTO news(title,attach,d_update)VALUES('$title', '$filename', now())";
  print($sql);
	mysqli_query($objCon,$sql);
  header("location:./../_report_media.html");
  mysqli_close($objCon);
}

?>