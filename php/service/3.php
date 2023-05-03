<?PHP
session_start();
if ($_SESSION["level"]<>'superadmin' || time()-$_SESSION["login_time_stamp"] >1800)
			{
				require('logout.php');
			} else {
				require('./connect.php');
	}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_event.xls");
// header('Content-type: application/csv'); //*** CSV ***//

$sql = mysqli_query($objCon,
"SELECT
	*, 
	cchangwat.changwatname AS pv, 
	campur.ampurname AS ap, 
	ctambon.tambonname AS tb, 
	cchangwat2.changwatname AS pv2, 
	campur2.ampurname AS ap2, 
	ctambon2.tambonname AS tb2, 
	gis_changwat.changwatname AS rpv
FROM
	report_dead
	INNER JOIN
	cchangwat
	ON 
		report_dead.province_addr = cchangwat.changwatcode
	INNER JOIN
	campur
	ON 
		report_dead.amphur_addr = campur.ampurcodefull
	INNER JOIN
	ctambon
	ON 
		report_dead.tambon_addr = ctambon.tamboncodefull
	INNER JOIN
	cchangwat2
	ON 
		report_dead.drowning_province = cchangwat2.changwatcode
	INNER JOIN
	campur2
	ON 
		report_dead.drowning_amphur = campur2.ampurcodefull
	INNER JOIN
	ctambon2
	ON 
		report_dead.drowning_tambon = ctambon2.tamboncodefull
	INNER JOIN
	gis_changwat
	ON 
		report_dead.report_province = gis_changwat.changwatcode
");
//echo $sql;
	/*
while($fetch=mysqli_fetch_array($sql)){
$id=$fetch['id'];
$cid=$fetch['cid'];
$icd_code=$fetch['icd_code'];
$drowning_date=$fetch['drowning_date'];
$drowning_time=$fetch['drowning_time'];
$dead_date=$fetch['dead_date'];
$pname=$fetch['pname'];
$fname=$fetch['fname'];
$lname=$fetch['lname'];
$sex=$fetch['sex'];
$home_addr=$fetch['home_addr'];
$no_addr=$fetch['no_addr'];
$moo_addr=$fetch['moo_addr'];
$province_addr=$fetch['pv'];
$amphur_addr=$fetch['ap'];
$tambon_addr=$fetch['tb'];
$age=$fetch['age'];
$ageMonth=$fetch['ageMonth'];
$national=$fetch['national'];
$can_swim=$fetch['can_swim'];
$drowning_type=$fetch['drowning_type'];
$pool_depth=$fetch['pool_depth'];
$location_lat=$fetch['location_lat'];
$location_lon=$fetch['location_lon'];
$picture=$fetch['picture'];
$tmp_picture=$fetch['tmp_picture'];
$drowning_location=$fetch['drowning_location'];
$drowning_province=$fetch['pv2'];
$drowning_amphur=$fetch['ap2'];
$drowning_tambon=$fetch['tb2'];
$drowning_safty=$fetch['drowning_safty'];
$drowning_safty_des=$fetch['drowning_safty_des'];
$before_with=$fetch['before_with'];
$drowning_with=$fetch['drowning_with'];
$drowning_number=$fetch['drowning_number'];
$drowning_number_dead=$fetch['drowning_number_dead'];
$drowning_number_alive=$fetch['drowning_number_alive'];
$drowning_why=$fetch['drowning_why'];
$drowning_why_des=$fetch['drowning_why_des'];
$drowning_risk_alcohol=$fetch['drowning_risk_alcohol'];
$drowning_risk_addicted=$fetch['drowning_risk_addicted'];
$drowning_risk_drug=$fetch['drowning_risk_drug'];
$drowning_risk_disability=$fetch['drowning_risk_disability'];
$drowning_risk_none=$fetch['drowning_risk_none'];
$drowning_risk_disease=$fetch['drowning_risk_disease'];
$drowning_risk_disease_des=$fetch['drowning_risk_disease_des'];
$drowning_risk_other=$fetch['drowning_risk_other'];
$drowning_risk_other_des=$fetch['drowning_risk_other_des'];
$drowning_length=$fetch['drowning_length'];
$drowning_accessory=$fetch['drowning_accessory'];
$drowning_accessory_yes=$fetch['drowning_accessory_yes'];
$drowning_accessory_yes_des=$fetch['drowning_accessory_yes_des'];
$drowning_after_dead=$fetch['drowning_after_dead'];
$drowning_helper=$fetch['drowning_helper'];
$drowning_helper_drop_des=$fetch['drowning_helper_drop_des'];
$drowning_rescue_water=$fetch['drowning_rescue_water'];
$drowning_recue_no_des=$fetch['drowning_recue_no_des'];
$drowning_recue_yes=$fetch['drowning_recue_yes'];
$drowning_rescue_yes_des=$fetch['drowning_rescue_yes_des'];
$drowning_refer=$fetch['drowning_refer'];
$drowning_refer_hosp=$fetch['drowning_refer_hosp'];
$drowning_des=$fetch['drowning_des'];
$defend_drowning=$fetch['defend_drowning'];
$defend_drowning_des=$fetch['defend_drowning_des'];
$report_name=$fetch['report_name'];
$report_job=$fetch['report_job'];
$report_office=$fetch['report_office'];
$report_province=$fetch['rpv'];
$report_tel=$fetch['report_tel'];
$report_fax=$fetch['report_fax'];
$report_date=$fetch['report_date'];
$d_update=$fetch['d_update'];
$with_paper_id=$fetch['with_paper_id'];
$created_at=$fetch['created_at'];
$created_by=$fetch['created_by'];
$updated_at=$fetch['updated_at'];
$updated_by=$fetch['updated_by'];
$s_year=$fetch['s_year'];
$gid=$fetch['gid'];
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1">
<tr>
<th> <div align="center">ที่</div></th> 
<th> <div align="center">เลขประจำตัวประชาชน</div></th>
<th> <div align="center">รหัสกลุ่มโรค</div></th>
<th> <div align="center">วันที่เกิดเหตุ</div></th>
<th> <div align="center">เวลาที่พบ</div></th>
<th> <div align="center">วันที่เสียชีวิต</div></th>
<th> <div align="center">คำนำหน้า</div></th>
<th> <div align="center">ชื่อ</div></th>
<th> <div align="center">นามสกุล</div></th>
<th> <div align="center">เพศ</div></th>
<th> <div align="center">ที่พักอาศัยคนจมน้ำ</div></th>
<th> <div align="center">บ้านเลขที่</div></th>
<th> <div align="center">หมู่ที่</div></th>
<th> <div align="center">จังหวัด</div></th>
<th> <div align="center">อำเภอ </div></th>
<th> <div align="center">ตำบล</div></th>
<th> <div align="center">อายุ (ปี)</div></th>
<th> <div align="center">อายุ (เดือน)</div></th>
<th> <div align="center">สัญชาติ</div></th>
<th> <div align="center">ความสามารถในการว่ายน้ำ</div></th>
<th> <div align="center">ประเภทแหล่งน้ำ</div></th>
<th> <div align="center">ระดับความลึก</div></th>
<th> <div align="center">ละติจูด</div></th>
<th> <div align="center">ลองติจูด</div></th>
<th> <div align="center">รูปภาพ</div></th>
<th> <div align="center">tmp_picture</div></th>
<th> <div align="center">สถานที่ตั้งจุดเกิดเหตุ</div></th>
<th> <div align="center">จังหวัด_เกิดเหตุ</div></th>
<th> <div align="center">อำเภอ_เกิดเหตุ</div></th>
<th> <div align="center">ตำบล_เกิดเหตุ></th>
<th> <div align="center">การจัดการความปลอดภัยในแหล่งน้ำ</div></th>
<th> <div align="center">ระบุลักษณะการจัดการ</div></th>
<th> <div align="center">ผู้ดูแล_ก่อนเกิดเหตุ</div></th>
<th> <div align="center">คนที่จมน้ำอยู่กับใคร_เกิดเหตุ</div></th>
<th> <div align="center">จำนวน</div></th>
<th> <div align="center">เสียชีวิต</div></th>
<th> <div align="center">จมน้ำแต่ไม่เสียชีวิต</div></th>
<th> <div align="center">เหตุจูงใจการเกิดเหตุ</div></th>
<th> <div align="center">อื่นๆ</div></th>
<th> <div align="center">เมาสุรา</div></th>
<th> <div align="center">ยาเสพติด</div></th>
<th> <div align="center">ใช้ยา</div></th>
<th> <div align="center">ทุพพลภาพ</div></th>
<th> <div align="center">ไม่มี</div></th>
<th> <div align="center">มีโรคประจำตัว</div></th>
<th> <div align="center">มีโรคประจำตัว_ระบุ</div></th>
<th> <div align="center">อื่นๆ</div></th>
<th> <div align="center">ระบุ</div></th>
<th> <div align="center">ระยะทางจากบ้าน (เมตร)</div></th>
<th> <div align="center">การใช้อุปกรณ์ช่วยลอยน้ำขณะเกิดเหตุ</div></th>
<th> <div align="center">การใช้อุปกรณ์ช่วยลอยน้ำขณะเกิดเหตุ</div></th>
<th> <div align="center">อุปกรณ์ที่ใช้_ระบุ</div></th>
<th> <div align="center">หลังเกิดเหตุ</div></th>
<th> <div align="center">ช่วยเหลือคนจมน้ำขึ้นมาจากน้ำด้วยวิธีการใด</div></th>
<th> <div align="center">ระบุอุปกรณ์โยนให้จับ</div></th>
<th> <div align="center">ภายหลังจากนำคนจมน้ำขึ้นมาจากน้ำ</div></th>
<th> <div align="center">ไม่ได้ปฐมพยาบาล_เพราะ</div></th>
<th> <div align="center">ทำการปฐมพยาบาล_โดย</div></th>
<th> <div align="center">ผู้ปฐมพยาบาล</div></th>
<th> <div align="center">ภายหลังการปฐมพยาบาลได้นำส่งสถานบริการสาธารณสุข</div></th>
<th> <div align="center">ระบุสถานบริการสาธารณสุข</div></th>
<th> <div align="center">บรรยายเหตุการณ์ก่อนเกิดเหตุจนกระทั่งจมน้ำ</div></th>
<th> <div align="center">มีการจัดแหล่งน้ำที่เกิดเหตุเพื่อป้องกันการจมน้ำ</div></th>
<th> <div align="center">ถ้ามี_ระบุ</div></th>
<th> <div align="center">ชื่อ-สกุลผู้รายงาน</div></th>
<th> <div align="center">ตำแหน่ง</div></th>
<th> <div align="center">หน่วยงาน</div></th>
<th> <div align="center">จังหวัด</div></th>
<th> <div align="center">โทรศัพท์</div></th>
<th> <div align="center">โทรสาร</div></th>
<th> <div align="center">วันที่รายงาน</div></th>
<th> <div align="center">วันที่_update</div></th>
<th> <div align="center">with_paper_id</div></th>
<th> <div align="center">created_at</div></th>
<th> <div align="center">created_by</div></th>
<th> <div align="center">updated_at</div></th>
<th> <div align="center">updated_by</div></th>
<th> <div align="center">ปีที่เกิดเหตุ</div></th>
<th> <div align="center">หมายเลข</div></th>
</tr>
<?PHP
	while($objResult = mysqli_fetch_array($sql))
	{
?>
	<tr>
<td><div align="center"><?PHP echo $objResult["id"];?></div></td>
<td><div align="center"><?PHP echo $objResult["cid"];?></div></td>
<td><div align="center"><?PHP echo $objResult["icd_code"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_date"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_time"];?></div></td>
<td><div align="center"><?PHP echo $objResult["dead_date"];?></div></td>
<td><div align="center"><?PHP echo $objResult["pname"];?></div></td>
<td><div align="center"><?PHP echo $objResult["fname"];?></div></td>
<td><div align="center"><?PHP echo $objResult["lname"];?></div></td>
<td><div align="center"><?PHP echo $objResult["sex"];?></div></td>
<td><div align="center"><?PHP echo $objResult["home_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["no_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["moo_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["province_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["amphur_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["tambon_addr"];?></div></td>
<td><div align="center"><?PHP echo $objResult["age"];?></div></td>
<td><div align="center"><?PHP echo $objResult["ageMonth"];?></div></td>
<td><div align="center"><?PHP echo $objResult["national"];?></div></td>
<td><div align="center"><?PHP echo $objResult["can_swim"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_type"];?></div></td>
<td><div align="center"><?PHP echo $objResult["pool_depth"];?></div></td>
<td><div align="center"><?PHP echo $objResult["location_lat"];?></div></td>
<td><div align="center"><?PHP echo $objResult["location_lon"];?></div></td>
<td><div align="center"><?PHP echo $objResult["picture"];?></div></td>
<td><div align="center"><?PHP echo $objResult["tmp_picture"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_location"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_province"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_amphur"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_tambon"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_safty"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_safty_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["before_with"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_with"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_number"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_number_dead"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_number_alive"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_why"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_why_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_alcohol"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_addicted"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_drug"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_disability"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_none"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_disease"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_disease_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_other"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_risk_other_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_length"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_accessory"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_accessory_yes"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_accessory_yes_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_after_dead"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_helper"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_helper_drop_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_rescue_water"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_recue_no_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_recue_yes"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_rescue_yes_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_refer"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_refer_hosp"];?></div></td>
<td><div align="center"><?PHP echo $objResult["drowning_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["defend_drowning"];?></div></td>
<td><div align="center"><?PHP echo $objResult["defend_drowning_des"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_name"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_job"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_office"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_province"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_tel"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_fax"];?></div></td>
<td><div align="center"><?PHP echo $objResult["report_date"];?></div></td>
<td><div align="center"><?PHP echo $objResult["d_update"];?></div></td>
<td><div align="center"><?PHP echo $objResult["with_paper_id"];?></div></td>
<td><div align="center"><?PHP echo $objResult["created_at"];?></div></td>
<td><div align="center"><?PHP echo $objResult["created_by"];?></div></td>
<td><div align="center"><?PHP echo $objResult["updated_at"];?></div></td>
<td><div align="center"><?PHP echo $objResult["updated_by"];?></div></td>
<td><div align="center"><?PHP echo $objResult["s_year"];?></div></td>
<td><div align="center"><?PHP echo $objResult["gid"];?></div></td>
    </tr>
<?PHP
}
?>
</table>

<?PHP
	mysqli_close($objCon);
?>

</body>
</html>