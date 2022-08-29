<?PHP
require('./connect.php');
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
WHERE
	id='".$_REQUEST['id']."' ");
//echo $sql;
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
<style type="text/css">
body {
  background: rgb(204,204,204); 
  font-size: 12pt;
    font-family: Tahoma;
    color: black;
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.0cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>


  </head>
  <body>
<p>
<div class="container">
  <!-- Content here -->
<page size="A4">  
<table width="auto" border="0">
<tbody>
    <tr>
    <td colspan="4"><strong>ผู้รายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="4">1) ชื่อผู้รายงาน	<?PHP echo $report_name;?>	ตำแหน่ง	<?PHP echo $report_job;?></td>
  </tr>
  <tr>
    <td colspan="4">2) หน่วยงาน	<?PHP echo $report_office;?>	จังหวัด	<?PHP echo $report_province;?></td>
  </tr>
  <tr>
    <td colspan="4">3) เบอร์โทร	<?PHP echo $report_tel;?>	โทรสาร	<?PHP echo $report_fax;?></td>
  </tr>
  <tr>
    <td colspan="4">4) วันที่รายงาน	<?PHP echo $report_date;?></td>
  </tr>
  <tr>
    <td colspan="4">ก. รายละเอียดของเหตุการณ์</td>
  </tr>
  <tr>
    <td colspan="4">1) สถานที่เกิดเหตุ	<?PHP echo $drowning_location;?> 	 หมู่ที่..	ตำบล	 <?PHP echo $drowning_tambon;?>อำเภอ	<?PHP echo $drowning_amphur;?>           จังหวัด	<?PHP echo $drowning_province;?> 	</td>
  </tr>
  <tr>
    <td colspan="4">2) ลักษณะการเกิดเหตุ</td>
  </tr>
  <tr>
    <td colspan="4">
      £ การจมน้ำตายและจมน้ำจากอุบัติเหตุ (W65-W74)<br>
      £ อุบัติเหตุการขนส่งทางน้ำ (V90-V94)<br>
      £ ผู้ประสบภัยจากอุทกภัย/พายุ/แรงธรรมชาติอื่น ๆ (X36-X38)</td>
  </tr>
  <tr>
    <td colspan="4">3) วันที่เกิดเหตุ (วัน/เดือน/ปี)	   <?PHP echo $drowning_date;?>   	เวลาที่เกิดเหตุ <?PHP echo $drowning_time;?></td>
  </tr>
  <tr>
    <td colspan="4">4) จำนวนคนที่เกิดเหตุในเหตุการณ์เดียวกัน    <?PHP echo $drowning_number;?> 	คน <br>
		เสียชีวิต      <?PHP echo $drowning_number_dead;?> 	คน <br>
		บาดเจ็บ  .....    	คน ไม่บาดเจ็บ	<?PHP echo $drowning_number_alive;?>	คน
</td>
  </tr>
  <tr>
    <td colspan="4">5) บรรยายเหตุการณ์ก่อนเกิดเหตุจนกระทั่งจมน้ำ</td>
  </tr>
  <tr>
    <td colspan="4">- เหตุการณ์เกิดได้อย่างไร เหตุเกิดจากอะไร</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_des;?></td>
  </tr>
  <tr>
    <td colspan="4">- กิจกรรมที่ทำขณะเกิดเหตุ</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_why;?></td>
  </tr>
  <tr>
    <td colspan="4">- หลังเกิดเหตุดำเนินการอย่างไร</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_recue_yes;?>...<?PHP echo $drowning_refer;?>  </td>
  </tr>
  <tr>
    <td colspan="4">6) ประเภทแหล่งน้ำที่เกิดเหตุ	                 <?PHP echo $drowning_type;?> </td>
  </tr>
  <tr>
    <td colspan="4">ระดับความลึก       <?PHP echo $pool_depth;?>  		เมตร	-	เซนติเมตร</td>
  </tr>
  <tr>
    <td colspan="4">*ประเภทแหล่งน้ำที่เกิดเหตุ หมายถึง แหล่งน้ำที่คนจมน้ำ เช่น บ่อน้ำ หนองน้ำ สระน้ำ สระว่ายน้ำ ห้วย ฝาย คลอง บึง แม่น้ำ ทะเล น้ำตก อุโมงค์ ถ้ำ เขื่อน ท่อ อ่างน้ำ อ่างเก็บน้ำ ถังน้ำ โอ่ง กะละมัง สระว่ายน้ำพลาสติก (ของเล่น) คูน้ำ กระติกน้ำ สวนน้ำ</td>
  </tr>
  <tr>
    <td colspan="4">7) การจัดการแหล่งน้ำเสี่ยง</td>
  </tr>
  <tr>
    <td colspan="2"><u>ก่อนเกิดเหตุ</u></td>
    <td colspan="2"><u>หลังเกิดเหตุ</u></td>
  </tr>
  <tr>
    <td colspan="2">ไม่มี       </td>
    <td colspan="2">ไม่มี       </td>
  </tr>
  <tr>
    <td colspan="2">มี โปรดระบุ (ตอบได้มากกว่า 1 ข้อ)</td>
    <td colspan="2">มี โปรดระบุ (ตอบได้มากกว่า 1 ข้อ)</td>
  </tr>
  <tr>
    <td colspan="2">รั้ว         </td>
    <td colspan="2">รั้ว         </td>
    </tr>
  <tr>
    <td colspan="2">ป้ายคำเตือน</td>
    <td colspan="2">ป้ายคำเตือน</td>
    </tr>
  <tr>
    <td colspan="2">ห่วงชูชีพ</td>
    <td colspan="2">ห่วงชูชีพ</td>
    </tr>
  <tr>
    <td colspan="2">ไม้         </td>
    <td colspan="2">ไม้         </td>
    </tr>
  <tr>
    <td colspan="2">แกลลอนพลาสติก</td>
    <td colspan="2">แกลลอนพลาสติก</td>
    </tr>
  <tr>
    <td colspan="2">ขวดน้ำพลาสติก</td>
    <td colspan="2">ขวดน้ำพลาสติก</td>
    </tr>
  <tr>
    <td colspan="2">เชือก</td>
    <td colspan="2">เชือก</td>
    </tr>
  <tr>
    <td colspan="2">อื่น ๆ ระบุ <?PHP echo $drowning_safty_des;?></td>
    <td colspan="2">อื่น ๆ ระบุ <?PHP echo $defend_drowning_des;?></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</tbody>  
</table>        
</page>
<br><br>
<page size="A4">
<table width="auto" border="0">
<tbody>
  <tr>
    <td colspan="4">ข. รายละเอียดของผู้บาดเจ็บและเสียชีวิต</td>
  </tr>
  <tr>
    <td colspan="4">1) ชื่อ-นามสกุล	<?PHP echo $fname;?>…<?PHP echo $lname;?>	เลขประจำตัวประชาชน/เลขหนังสือเดินทาง   	<?PHP echo $cid;?>  		สัญชาติ	 <?PHP echo $national;?>                                     	</td>
  </tr>
  <tr>
    <td colspan="4">2) ที่อยู่	<?PHP echo $no_addr;?>  	หมู่ที่  <?PHP echo $moo_addr;?>	ตำบล	<?PHP echo $tambon_addr;?>	อำเภอ   <?PHP echo $amphur_addr;?>	จังหวัด   <?PHP echo $province_addr;?></td>
  </tr>
  <tr>
    <td colspan="2">3) เพศ</td>
    <td colspan="2">ชาย หญิง</td>
  </tr>
  <tr>
    <td colspan="2">4) อายุ	<?PHP echo $age;?>	ปี  <?PHP echo $ageMonth;?> เดือน</td>
    <td colspan="2">เสียชีวิต   £ ไม่เสียชีวิต</td>
  </tr>
  <tr>
    <td colspan="2">5) ความสามารถในการว่ายน้ำ</td>
    <td colspan="2">5.1) <br>
      £ ว่ายน้ำเป็น<br>
      £ ว่ายน้ำไม่เป็น<br>
      £ ไม่ทราบ/ไม่แน่ใจ</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">5.2) <br>
      £ มีทักษะการเอาชีวิตรอดในน้ำ* <br>
      £  ไม่มีทักษะการเอาชีวิตรอดในน้ำ* <br>
      £ ไม่ทราบ/ไม่แน่ใจ</td>
  </tr>
  <tr>
    <td colspan="4">มีทักษะการเอาชีวิตรอดในน้ำ หมายถึง 1) สามารถลอยตัวเปล่า (ไม่ใช้อุปกรณ์ช่วย) อยู่ในน้ำได้นานมากกว่า 3 นาที 2) เคลื่อนที่ไปในน้ำได้ไกล 25 เมตร</td>
  </tr>
  <tr>
    <td colspan="2">6) ขณะเกิดเหตุ  (ณ จุดเกิดเหตุ) คนที่จมน้ำอยู่กับใคร</td>
    <td colspan="2">£ อยู่คนเดียว      £ เพื่อน</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">£ ผู้ปกครอง/ผู้ดูแลเด็ก  โดยขณะนั้นผู้ปกครองทำกิจกรรม ดังนี้</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><p>ทำงานบ้าน<br>
      นอนหลับ<br>
      ประกอบอาชีพ <br>
      โทรศัพท์<br>
      อื่น ๆ โปรดระบุ</td>
  </tr>
  <tr>
    <td colspan="2">7) กิจกรรมก่อนเกิดเหตุ  (ตอบได้มากกว่า 1 ข้อ)</td>
    <td colspan="2">£ พลัดตกลื่น<br>
      £ เล่นน้ำ<br>
      £ ประกอบอาชีพ     <br>
      £ เรือล่ม<br>
      £ อื่น ๆ ระบุ	<?PHP echo $drowning_why;?> </td>
  </tr>
  <tr>
    <td colspan="2">8) ก่อนเกิดเหตุ  (ในช่วงปกติ) ใครเป็นผู้ดูแล (ตอบได้มากกว่า 1 ข้อ) </td>
    <td colspan="2">£ พ่อ-แม่ <br>
      £ ปู่-ย่า/ตา-ยาย <br>
      £ อื่น ๆ ระบุ</td>
  </tr>
  <tr>
    <td colspan="4">9) ระยะทางโดยประมาณระหว่างบ้านถึงที่เกิดเหตุ		กิโลเมตร	  <?PHP echo $drowning_length;?> 	  เมตร</td>
  </tr>
  <tr>
    <td colspan="4">£ เกิดเหตุภายในบ้าน</td>
  </tr>
  <tr>
    <td colspan="2">10) การใช้อุปกรณ์ช่วยลอยน้ำขณะเกิดเหตุ</td>
    <td colspan="2">£ ไม่มี  £ มี ระบุ </td>
  </tr>  
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><p>ห่วงยาง/ห่วงชูชีพ<br>
      ขวดน้ำ/แกลลอนพลาสติก<br>
      วัสดุธรรมชาติ </p></td>
  </tr>
  <tr>
    <td colspan="3">11) การสวมเสื้อชูชีพ/เสื้อพยุงตัว ขณะเกิดเหตุ </td>
    <td colspan="1">£ มี     £ ไม่มี</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</tbody>>  
</table>        
</page>
<br>
<page size="A4">
<table width="auto" border="0">
<tbody>
  <tr>
    <td colspan="4">12) ปัจจัยเสี่ยง/พฤติกรรมเสี่ยงต่อการเกิดเหตุ (ตอบได้มากกว่า 1 ข้อ)</td>
  </tr>
  <tr>
    <td>£ ขาดการดูแล</td>
    <td>£ ขาดความรู้เรื่องแหล่งน้ำเสี่ยง</td>
    <td>£ วิถีชีวิต (ซักล้าง, ตกปลา/เก็บหอย/เก็บผัก) </td>
    <td>£ การใช้ยารักษาโรค</td>
  </tr>
  <tr>
    <td>£ มีโรคประจำตัว</td>
    <td>£ ทุพพลภาพ</td>
    <td>£ สภาพภูมิอากาศ</td>
    <td>£ กระแสน้ำที่รุนแรง  </td>
  </tr>
  <tr>
    <td>£ พฤติกรรมคนขับเรือ</td>
    <td>£ เรือไม่ปลอดภัย (เช่นการบรรทุกน้ำหนักเกิน) </td>
    <td>£ แหล่งน้ำไม่ปลอดภัย (เช่น ขาดการสร้างรั้ว,  พื้นผิวลื่น)</td>
    <td>£ ขาดระบบแจ้งเตือนภัยล่วงหน้า</td>
  </tr>
  <tr>
    <td> £ อื่น ๆ ระบุ<u>                  </u></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">13) หลังเกิดเหตุจมน้ำ </td>
    <td colspan="2">£ เสียชีวิต ณ ที่เกิดเหตุ  <br>
      £ เสียชีวิตขณะนำส่ง ร.พ. <br>
      £ เสียชีวิต ณ ห้องฉุกเฉิน <br>
      £ เสียชีวิตหลังรับไว้รักษา</td>
  </tr>
  <tr>
    <td colspan="4" align="center">			วันที่ไปรักษาวันแรก		</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> ผู้ป่วยนอก (OPD)<br>
 ผู้ป่วยใน (IPD)<br>
 การส่งต่อ (refer) ระบุ
	</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">£  ไม่เสียชีวิตและไม่ได้เข้ารับการรักษาในโรงพยาบาล</td>
  </tr>
  <tr>
    <td colspan="2">14) คนจมน้ำได้รับการช่วยเหลือขึ้นมาจากน้ำโดยใคร  (ตอบได้มากกว่า 1 ข้อ) </td>
    <td colspan="2">£ ผู้อยู่ในเหตุการณ์ £ ผู้ช่วยเหลือที่ไม่ได้อยู่ในเหตุการณ์</td>
  </tr>
  <tr>
    <td colspan="4">15) ผู้ช่วยเหลือ  (ตามข้อ 14) ช่วยขึ้นมาจากน้ำด้วยวิธีใด  (ตอบได้มากกว่า 1 ข้อ)</td>
  </tr>
  <tr>
    <td colspan="2">£ ตะโกนเรียกคนมาช่วย</td>
    <td colspan="2">£  ช่วยด้วยการกระโดดลงไปช่วย</td>
  </tr>
  <tr>
    <td colspan="4"> ช่วยด้วยการหาอุปกรณ์โยนให้จับ (ระบุอุปกรณ์) ระบุ	<?PHP echo $drowning_helper_drop_des;?> 	</td>
  </tr>
  <tr>
    <td colspan="4"> ช่วยด้วยการหาอุปกรณ์ยื่นให้จับ (ระบุอุปกรณ์) ระบุ	<?PHP echo $drowning_helper_drop_des;?> 	</td>
  </tr>
  <tr>
    <td colspan="4"> นำศพขึ้นมาจากน้ำ เนื่องจากเสียชีวิตแล้ว</td>
  </tr>
  <tr>
    <td colspan="4"> อื่น ๆ ระบุ					</td>
  </tr>
  <tr>
    <td colspan="4">ระยะเวลาตั้งแต่มีคนจมน้ำจนกระทั่งมีผู้มาช่วยเหลือใช้ระยะเวลา		ชั่วโมง		นาที</td>
  </tr>
  <tr>
    <td colspan="4">16) ภายหลังจากช่วยเหลือขึ้นมาจากน้ำ  ได้รับการปฐมพยาบาลอย่างไร</td>
  </tr>
  <tr>
    <td colspan="2">£ ไม่ได้ทำการปฐมพยาบาล  เนื่องจาก </td>
    <td colspan="2"><p> ปฐมพยาบาลไม่เป็น/ไม่รู้วิธี           ผู้ป่วยเสียชีวิต </p></td>
  </tr>
  <tr>
    <td colspan="2">£ ทำการปฐมพยาบาล โดย </td>
    <td colspan="2"> ญาติ/ผู้พบเห็นเหตุการณ์              หน่วยกู้ชีพ (ALS, BLS,FR)</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> มูลนิธิ/กู้ชีพที่ไม่ได้ขึ้นทะเบียน</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> อื่น ๆ ระบุ  <?PHP echo $drowning_rescue_yes_des;?></td>
  </tr>
  <tr>
    <td colspan="4">วิธีปฐมพยาบาล (ตอบได้มากกว่า 1 ข้อ)  เป่าปาก  อุ้มพาดบ่า  กดหน้าอก  กระแทกท้อง  อื่น ๆ ระบุ		</td>
  </tr>
  <tr>
    <td colspan="2"><p>17) การนำส่งสถานบริการสาธารณสุขหลังจากได้รับการปฐมพยาบาล</p></td>
    <td colspan="2"> ไม่ได้นำส่งสถานบริการสาธารณสุข<br>
 นำส่งสถานบริการสาธารณสุข โดย </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> หน่วยบริการการแพทย์ฉุกเฉิน  เจ้าหน้านที่มูลนิธิ  ตำรวจ  ญาติ ผู้เห็นเหตุการณ์  อื่น ๆ ระบุ	</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</tbody>
  <tfoot>
    <tr>
      <td colspan="4">ชื่อผู้รายงาน	<?PHP echo $report_name;?>	วันที่รายงาน	<?PHP echo $report_date;?></td>
    </tr>
  </tfoot>   
</table>        
</page>












<br><br><br>
<!--
  <table width="100%" border="1">
  <tr>
    <td colspan="4"><strong>ผู้รายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="4">1) ชื่อผู้รายงาน	<?PHP echo $report_name;?>	ตำแหน่ง	<?PHP echo $report_job;?></td>
  </tr>
  <tr>
    <td colspan="4">2) หน่วยงาน	<?PHP echo $report_office;?>	จังหวัด	<?PHP echo $report_province;?></td>
  </tr>
  <tr>
    <td colspan="4">3) เบอร์โทร	<?PHP echo $report_tel;?>	โทรสาร	<?PHP echo $report_fax;?></td>
  </tr>
  <tr>
    <td colspan="4">4) วันที่รายงาน	<?PHP echo $report_date;?></td>
  </tr>
  <tr>
    <td colspan="4">ก. รายละเอียดของเหตุการณ์</td>
  </tr>
  <tr>
    <td colspan="4">1) สถานที่เกิดเหตุ	<?PHP echo $drowning_location;?> 	 หมู่ที่..	ตำบล	 <?PHP echo $drowning_tambon;?>อำเภอ	<?PHP echo $drowning_amphur;?>           จังหวัด	<?PHP echo $drowning_province;?> 	</td>
  </tr>
  <tr>
    <td colspan="4">2) ลักษณะการเกิดเหตุ</td>
  </tr>
  <tr>
    <td colspan="4">
      £ การจมน้ำตายและจมน้ำจากอุบัติเหตุ (W65-W74)<br>
      £ อุบัติเหตุการขนส่งทางน้ำ (V90-V94)<br>
      £ ผู้ประสบภัยจากอุทกภัย/พายุ/แรงธรรมชาติอื่น ๆ (X36-X38)</p></td>
  </tr>
  <tr>
    <td colspan="4">3) วันที่เกิดเหตุ (วัน/เดือน/ปี)	   <?PHP echo $drowning_date;?>   	เวลาที่เกิดเหตุ <?PHP echo $drowning_time;?></td>
  </tr>
  <tr>
    <td colspan="4">4) จำนวนคนที่เกิดเหตุในเหตุการณ์เดียวกัน    <?PHP echo $drowning_number;?> 	คน <br>
		เสียชีวิต      <?PHP echo $drowning_number_dead;?> 	คน <br>
		บาดเจ็บ  .....    	คน ไม่บาดเจ็บ	<?PHP echo $drowning_number_alive;?>	คน
</td>
  </tr>
  <tr>
    <td colspan="4">5) บรรยายเหตุการณ์ก่อนเกิดเหตุจนกระทั่งจมน้ำ</td>
  </tr>
  <tr>
    <td colspan="4">- เหตุการณ์เกิดได้อย่างไร เหตุเกิดจากอะไร</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_des;?></td>
  </tr>
  <tr>
    <td colspan="4">- กิจกรรมที่ทำขณะเกิดเหตุ</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_why;?></td>
  </tr>
  <tr>
    <td colspan="4">- หลังเกิดเหตุดำเนินการอย่างไร</td>
  </tr>
  <tr>
    <td colspan="4"><?PHP echo $drowning_recue_yes;?>...<?PHP echo $drowning_refer;?>  </td>
  </tr>
  <tr>
    <td colspan="4">6) ประเภทแหล่งน้ำที่เกิดเหตุ	                 <?PHP echo $drowning_type;?> </td>
  </tr>
  <tr>
    <td colspan="4">ระดับความลึก       <?PHP echo $pool_depth;?>  		เมตร	-	เซนติเมตร</td>
  </tr>
  <tr>
    <td colspan="4">*ประเภทแหล่งน้ำที่เกิดเหตุ หมายถึง แหล่งน้ำที่คนจมน้ำ เช่น บ่อน้ำ หนองน้ำ สระน้ำ สระว่ายน้ำ ห้วย ฝาย คลอง บึง แม่น้ำ ทะเล น้ำตก อุโมงค์ ถ้ำ เขื่อน ท่อ อ่างน้ำ อ่างเก็บน้ำ ถังน้ำ โอ่ง กะละมัง สระว่ายน้ำพลาสติก (ของเล่น) คูน้ำ กระติกน้ำ สวนน้ำ</td>
  </tr>
  <tr>
    <td colspan="4">7) การจัดการแหล่งน้ำเสี่ยง</td>
  </tr>
  <tr>
    <td colspan="2"><u>ก่อนเกิดเหตุ</u></td>
    <td colspan="2"><u>หลังเกิดเหตุ</u></td>
  </tr>
  <tr>
    <td colspan="2">ไม่มี       </td>
    <td colspan="2">ไม่มี       </td>
  </tr>
  <tr>
    <td colspan="2">มี โปรดระบุ (ตอบได้มากกว่า 1 ข้อ)</td>
    <td colspan="2">มี โปรดระบุ (ตอบได้มากกว่า 1 ข้อ)</td>
  </tr>
  <tr>
    <td colspan="2">รั้ว         </td>
    <td colspan="2">รั้ว         </td>
    </tr>
  <tr>
    <td colspan="2">ป้ายคำเตือน</td>
    <td colspan="2">ป้ายคำเตือน</td>
    </tr>
  <tr>
    <td colspan="2">ห่วงชูชีพ</td>
    <td colspan="2">ห่วงชูชีพ</td>
    </tr>
  <tr>
    <td colspan="2">ไม้         </td>
    <td colspan="2">ไม้         </td>
    </tr>
  <tr>
    <td colspan="2">แกลลอนพลาสติก</td>
    <td colspan="2">แกลลอนพลาสติก</td>
    </tr>
  <tr>
    <td colspan="2">ขวดน้ำพลาสติก</td>
    <td colspan="2">ขวดน้ำพลาสติก</td>
    </tr>
  <tr>
    <td colspan="2">เชือก</td>
    <td colspan="2">เชือก</td>
    </tr>
  <tr>
    <td colspan="2">อื่น ๆ ระบุ <?PHP echo $drowning_safty_des;?></td>
    <td colspan="2">อื่น ๆ ระบุ <?PHP echo $defend_drowning_des;?></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">ข. รายละเอียดของผู้บาดเจ็บและเสียชีวิต</td>
  </tr>
  <tr>
    <td colspan="4">1) ชื่อ-นามสกุล	<?PHP echo $fname;?>…<?PHP echo $lname;?>	เลขประจำตัวประชาชน/เลขหนังสือเดินทาง   	<?PHP echo $cid;?>  		สัญชาติ	 <?PHP echo $national;?>                                     	</td>
  </tr>
  <tr>
    <td colspan="4">2) ที่อยู่	<?PHP echo $no_addr;?>  	หมู่ที่  <?PHP echo $moo_addr;?>	ตำบล	<?PHP echo $tambon_addr;?>	อำเภอ   <?PHP echo $amphur_addr;?>	จังหวัด   <?PHP echo $province_addr;?></td>
  </tr>
  <tr>
    <td colspan="2">3) เพศ</td>
    <td colspan="2">ชาย<br>
      หญิง</td>
  </tr>
  <tr>
    <td colspan="4">4) อายุ	<?PHP echo $age;?>	ปี  <?PHP echo $ageMonth;?> เดือน</td>
  </tr>
  <tr>
    <td colspan="4">เสียชีวิต   £ ไม่เสียชีวิต</td>
  </tr>
  <tr>
    <td colspan="2">5) ความสามารถในการว่ายน้ำ</td>
    <td colspan="2">5.1) <br>
      £ ว่ายน้ำเป็น<br>
      £ ว่ายน้ำไม่เป็น<br>
      £ ไม่ทราบ/ไม่แน่ใจ</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">5.2) <br>
      £ มีทักษะการเอาชีวิตรอดในน้ำ* <br>
      £  ไม่มีทักษะการเอาชีวิตรอดในน้ำ* <br>
      £ ไม่ทราบ/ไม่แน่ใจ</td>
  </tr>
  <tr>
    <td colspan="4">มีทักษะการเอาชีวิตรอดในน้ำ หมายถึง 1) สามารถลอยตัวเปล่า (ไม่ใช้อุปกรณ์ช่วย) อยู่ในน้ำได้นานมากกว่า 3 นาที 2) เคลื่อนที่ไปในน้ำได้ไกล 25 เมตร</td>
  </tr>
  <tr>
    <td colspan="2">6) ขณะเกิดเหตุ  (ณ จุดเกิดเหตุ) คนที่จมน้ำอยู่กับใคร</td>
    <td colspan="2">£ อยู่คนเดียว      £ เพื่อน</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">£ ผู้ปกครอง/ผู้ดูแลเด็ก  โดยขณะนั้นผู้ปกครองทำกิจกรรม ดังนี้</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><p>ทำงานบ้าน<br>
      นอนหลับ<br>
      ประกอบอาชีพ <br>
      โทรศัพท์<br>
      อื่น ๆ โปรดระบุ<u>                                    </u><u> </u></p></td>
  </tr>
  <tr>
    <td colspan="2">7) กิจกรรมก่อนเกิดเหตุ  (ตอบได้มากกว่า 1 ข้อ)</td>
    <td colspan="2">£ พลัดตกลื่น<br>
      £ เล่นน้ำ<br>
      £ ประกอบอาชีพ     <br>
      £ เรือล่ม<br>
      £ อื่น ๆ ระบุ	<?PHP echo $drowning_why;?> </td>
  </tr>
  <tr>
    <td colspan="2">8) ก่อนเกิดเหตุ  (ในช่วงปกติ) ใครเป็นผู้ดูแล (ตอบได้มากกว่า 1 ข้อ) </td>
    <td colspan="2">£ พ่อ-แม่ <br>
      £ ปู่-ย่า/ตา-ยาย <br>
      £ อื่น ๆ ระบุ<u>                            </u></td>
  </tr>
  <tr>
    <td colspan="4">9) ระยะทางโดยประมาณระหว่างบ้านถึงที่เกิดเหตุ		กิโลเมตร	  <?PHP echo $drowning_length;?> 	  เมตร</td>
  </tr>
  <tr>
    <td colspan="4">£ เกิดเหตุภายในบ้าน</td>
  </tr>
  <tr>
    <td colspan="2">10) การใช้อุปกรณ์ช่วยลอยน้ำขณะเกิดเหตุ</td>
    <td colspan="2">£ ไม่มี  £ มี ระบุ </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><p>ห่วงยาง/ห่วงชูชีพ<br>
      ขวดน้ำ/แกลลอนพลาสติก<br>
      วัสดุธรรมชาติ </p></td>
  </tr>
  <tr>
    <td colspan="2">11) การสวมเสื้อชูชีพ/เสื้อพยุงตัว ขณะเกิดเหตุ </td>
    <td colspan="2">£ มี     £ ไม่มี</td>
  </tr>
  <tr>
    <td colspan="4"><p>12) ปัจจัยเสี่ยง/พฤติกรรมเสี่ยงต่อการเกิดเหตุ (ตอบได้มากกว่า 1 ข้อ)</p></td>
  </tr>
  <tr>
    <td>£ ขาดการดูแล</td>
    <td>£ ขาดความรู้เรื่องแหล่งน้ำเสี่ยง</td>
    <td>£ วิถีชีวิต (ซักล้าง, ตกปลา/เก็บหอย/เก็บผัก) </td>
    <td>£ การใช้ยารักษาโรค</td>
  </tr>
  <tr>
    <td>£ มีโรคประจำตัว</td>
    <td>£ ทุพพลภาพ</td>
    <td>£ สภาพภูมิอากาศ</td>
    <td>£ กระแสน้ำที่รุนแรง  </td>
  </tr>
  <tr>
    <td>£ พฤติกรรมคนขับเรือ</td>
    <td>£ เรือไม่ปลอดภัย (เช่นการบรรทุกน้ำหนักเกิน) </td>
    <td>£ แหล่งน้ำไม่ปลอดภัย (เช่น ขาดการสร้างรั้ว,  พื้นผิวลื่น)</td>
    <td>£ ขาดระบบแจ้งเตือนภัยล่วงหน้า</td>
  </tr>
  <tr>
    <td> £ อื่น ๆ ระบุ<u>                  </u></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">13) หลังเกิดเหตุจมน้ำ </td>
    <td colspan="2">£ เสียชีวิต ณ ที่เกิดเหตุ  <br>
      £ เสียชีวิตขณะนำส่ง ร.พ. <br>
      £ เสียชีวิต ณ ห้องฉุกเฉิน <br>
      £ เสียชีวิตหลังรับไว้รักษา</td>
  </tr>
  <tr>
    <td colspan="4" align="center">			วันที่ไปรักษาวันแรก		</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> ผู้ป่วยนอก (OPD)<br>
 ผู้ป่วยใน (IPD)<br>
 การส่งต่อ (refer) ระบุ
	</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">£  ไม่เสียชีวิตและไม่ได้เข้ารับการรักษาในโรงพยาบาล</td>
  </tr>
  <tr>
    <td colspan="2">14) คนจมน้ำได้รับการช่วยเหลือขึ้นมาจากน้ำโดยใคร  (ตอบได้มากกว่า 1 ข้อ) </td>
    <td colspan="2">£ ผู้อยู่ในเหตุการณ์ £ ผู้ช่วยเหลือที่ไม่ได้อยู่ในเหตุการณ์</td>
  </tr>
  <tr>
    <td colspan="4"><p>15) ผู้ช่วยเหลือ  (ตามข้อ 14) ช่วยขึ้นมาจากน้ำด้วยวิธีใด  (ตอบได้มากกว่า 1 ข้อ)</p></td>
  </tr>
  <tr>
    <td colspan="2">£ ตะโกนเรียกคนมาช่วย</td>
    <td colspan="2">£  ช่วยด้วยการกระโดดลงไปช่วย</td>
  </tr>
  <tr>
    <td colspan="4"> ช่วยด้วยการหาอุปกรณ์โยนให้จับ (ระบุอุปกรณ์) ระบุ	<?PHP echo $drowning_helper_drop_des;?> 	</td>
  </tr>
  <tr>
    <td colspan="4"> ช่วยด้วยการหาอุปกรณ์ยื่นให้จับ (ระบุอุปกรณ์) ระบุ	<?PHP echo $drowning_helper_drop_des;?> 	</td>
  </tr>
  <tr>
    <td colspan="4"> นำศพขึ้นมาจากน้ำ เนื่องจากเสียชีวิตแล้ว</td>
  </tr>
  <tr>
    <td colspan="4"> อื่น ๆ ระบุ					</td>
  </tr>
  <tr>
    <td colspan="4">ระยะเวลาตั้งแต่มีคนจมน้ำจนกระทั่งมีผู้มาช่วยเหลือใช้ระยะเวลา		ชั่วโมง		นาที</td>
  </tr>
  <tr>
    <td colspan="4"><p>16) ภายหลังจากช่วยเหลือขึ้นมาจากน้ำ  ได้รับการปฐมพยาบาลอย่างไร</p></td>
  </tr>
  <tr>
    <td colspan="2">£ ไม่ได้ทำการปฐมพยาบาล  เนื่องจาก </td>
    <td colspan="2"><p> ปฐมพยาบาลไม่เป็น/ไม่รู้วิธี           ผู้ป่วยเสียชีวิต </p></td>
  </tr>
  <tr>
    <td colspan="2">£ ทำการปฐมพยาบาล โดย </td>
    <td colspan="2"> ญาติ/ผู้พบเห็นเหตุการณ์              หน่วยกู้ชีพ (ALS, BLS,FR)</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> มูลนิธิ/กู้ชีพที่ไม่ได้ขึ้นทะเบียน</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> อื่น ๆ ระบุ  <?PHP echo $drowning_rescue_yes_des;?></td>
  </tr>
  <tr>
    <td colspan="4">วิธีปฐมพยาบาล (ตอบได้มากกว่า 1 ข้อ)  เป่าปาก  อุ้มพาดบ่า  กดหน้าอก  กระแทกท้อง  อื่น ๆ ระบุ		</td>
  </tr>
  <tr>
    <td colspan="2"><p>17) การนำส่งสถานบริการสาธารณสุขหลังจากได้รับการปฐมพยาบาล</p></td>
    <td colspan="2"> ไม่ได้นำส่งสถานบริการสาธารณสุข<br>
 นำส่งสถานบริการสาธารณสุข โดย </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"> หน่วยบริการการแพทย์ฉุกเฉิน  เจ้าหน้านที่มูลนิธิ  ตำรวจ  ญาติ ผู้เห็นเหตุการณ์  อื่น ๆ ระบุ	</td>
  </tr>
  <tr>
    <td colspan="4">ชื่อผู้รายงาน	<?PHP echo $report_name;?>	วันที่รายงาน	<?PHP echo $report_date;?>  	</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>

-->


  <!-- Content here -->
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <?PHP echo "<script>window.print();</script>"; ?>

</html>