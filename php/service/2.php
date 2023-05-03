<?PHP
session_start();
if ($_SESSION["level"]='' || time()-$_SESSION["login_time_stamp"] >1800)
			{
				require('logout.php');
			} else {
				require('./connect.php');
	}
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

    <title>print</title>
<style type="text/css">
.A4 {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  padding: 10px 25px;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
  overflow-y: none; 
  box-sizing: border-box;
  font-size: 12pt;
}

@media print {
  .page-break {
    display: block;
    page-break-before: always;
  }
  size: A4 portrait;
}

@media print {
  body {
    margin: 0;
    padding: 0;
  }
  .A4 {
    box-shadow: none;
    margin: 0;
    width: auto;
    height: auto;
  }
  .noprint {
    display: none;
  }
  .enable-print {
    display: block;
  }
}

</style>

  </head>
  <body>
<p>
<div class="container">
  <!-- Content here -->
<div class="A4">
<table width="100%" border="0">
<tbody>

  <tr>
    <td colspan="4"><h5>ก. รายละเอียดของเหตุการณ์</h5></td>
  </tr>
  <tr>
    <td colspan="4">  เลขประจำตัวประชาชน/เลขหนังสือเดินทาง <u><?PHP echo $cid;?></u></td>
  </tr>
  <tr>
    <td colspan="4"> ลักษณะการเกิดเหตุ <u><?PHP echo $icd_code;?></u></td>
  </tr>
   <tr>
    <td colspan="4">1) วันที่เกิดเหตุ (วัน/เดือน/ปี)	<u><?PHP echo $drowning_date;?></u> เวลาที่พบ        <u><?PHP echo $drowning_time;?></u> น. วันที่เสียชีวิต <u><?PHP echo $dead_date;?></u> </td>
  </tr>
  <tr>
    <td colspan="4">2) ชื่อ-นามสกุล	<u><?PHP echo $fname."  ";?><?PHP echo $lname;?></td>
  </tr>
  <tr>
    <td colspan="4">3) เพศ <u><?PHP echo $sex;?></u></td>
  </tr>
  <tr>
    <td colspan="4">4) ที่อยู่	<u><?PHP echo $no_addr;?></u>  	หมู่ที่  <u><?PHP echo $moo_addr;?></u>	ตำบล	<u><?PHP echo $tambon_addr;?></u>	อำเภอ   <u><?PHP echo $amphur_addr;?>	</u> จังหวัด  <u><?PHP echo $province_addr;?></u></td>
  </tr>
  <tr>
    <td colspan="4">5) อายุ	<u><?PHP echo $age;?></u>	ปี  <u><?PHP echo $ageMonth;?></u> เดือน</td>
  </tr>
  <tr>
    <td colspan="4">6) สัญชาติ	 <u><?PHP echo $national;?></u> </td>
  </tr>
  <tr>
    <td colspan="2" valign="top">7) ความสามารถในการว่ายน้ำ</td>
    <td colspan="2"> <u><?PHP echo $can_swim;?></u> </td>
  </tr>
  <tr>
    <td colspan="4"><font color="#FF0000" size="-1">(มีทักษะการเอาชีวิตรอดในน้ำ หมายถึง 1) สามารถลอยตัวเปล่า (ไม่ใช้อุปกรณ์ช่วย) อยู่ในน้ำได้นานมากกว่า 3 นาที 2) เคลื่อนที่ไปในน้ำได้ไกล 25 เมตร)</font></td>
  </tr>
    <tr>
    <td colspan="4">8) ประเภทแหล่งน้ำที่เกิดเหตุ	<u><?PHP echo $drowning_type;?></u> </td>
  </tr>
  <tr>
    <td colspan="4">ระดับความลึก <u><?PHP echo $pool_depth;?></u>	เมตร</td>
  </tr>
  <tr>
    <td colspan="2">ละติจูด <u><?PHP echo $location_lat;?></u></td>
    <td colspan="2">ลองติจูด <u><?PHP echo $location_lon;?></u></td>
  </tr>
  <tr>
    <td colspan="4">ภาพถ่ายแหล่งน้ำ</td>
  </tr>
  <tr>
    <td colspan="4"><img src="<?PHP echo '../'.$picture;?>" width='200' border='0' /></td>
  </tr>
  <tr>
    <td colspan="4">สถานที่เกิดเหตุ	<u><?PHP echo $drowning_location;?></u> </td>
  </tr>
  <tr>
    <td colspan="4">หมู่ที่..	ตำบล	 <u><?PHP echo $drowning_tambon;?></u> อำเภอ <u><?PHP echo $drowning_amphur;?></u> จังหวัด	<u><?PHP echo $drowning_province;?></u></td>
  </tr>  
    <tr>
    <td colspan="2">การจัดการความปลอดภัยในแหล่งน้ำ</td>
    </tr>
    <tr>
    <td colspan="2">
      <label>
      <input type="checkbox" name="" value="ไม่มี" id="" <?php if($drowning_safty=='ไม่มี') { echo 'checked="checked"';}?>> ไม่มี</label><br>
      <label>
      <input type="checkbox" name="" value="มี" id="" <?php if($drowning_safty=='มี') { echo 'checked="checked"';}?>> มี</label> ระบุ <u><?PHP echo $drowning_safty_des;?></u>
      </td>
  </tr>
  <tr>
    <td colspan="4"><font color="#FF0000" size="-1">(การจัดการสิ่งแวดล้อม/อุปกรณ์ เช่น รั้ว ป้ายคำเตือน ห่วงชูชีพอไม้ แกลลอนพลาสติก ขวดพลาสติก เชือก)</font></td>
  </tr>
   <tr>
    <td colspan="4">9) ก่อนเกิดเหตุ(ในช่วงปกติ) ใครเป็นผู้ดูแล<u><?PHP echo $before_with;?></u></td>
  </tr>
     <tr>
    <td colspan="4"> 10) ขณะเกิดเหตุ(ณ จุดเกิดเหตุ)คนที่จมน้ำอยู่กับใคร  <u><?PHP echo $drowning_with;?></u></td>
  </tr>
  <tr>
    <td colspan="4">11) จำนวนคนที่เกิดเหตุในเหตุการณ์เดียวกัน <u><?PHP echo $drowning_number;?></u> คน | เสียชีวิต <u><?PHP echo $drowning_number_dead;?></u> คน  | ไม่เสียชีวิต <u><?PHP echo $drowning_number_alive;?></u>	คน
</td>
  </tr>
       <tr>
    <td colspan="4">12) กิจกรรมก่อนเกิดเหตุ <u><?PHP echo $drowning_why;?></u></td>
  </tr>
  <tr>
    <td colspan="4"> อื่น ๆ ระบุ<u><?PHP echo $drowning_why_des;?></u></td>
  </tr>
   <tr>
    <td colspan="4"><p>13) พฤติกรรมเสี่ยงต่อการเกิดเหตุ (ตอบได้มากกว่า 1 ข้อ)</p></td>
  </tr>   
  <tr>
    <td>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="เมาสุรา" id="CheckboxGroup1_0" <?php if($drowning_risk_alcohol=='เมาสุรา') { echo 'checked="checked"';}?>> เมาสุรา</label><br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="ยาเสพติด" id="CheckboxGroup1_1" <?php if($drowning_risk_addicted=='ยาเสพติด') { echo 'checked="checked"';}?>> ยาเสพติด</label><br>
    <label>
        <input type="checkbox" name="CheckboxGroup1" value="ใช้ยา" id="CheckboxGroup1_2" <?php if($drowning_risk_drug=='ใช้ยา') { echo 'checked="checked"';}?>> การใช้ยารักษาโรค</label><br>    
    </td>
    <td>
    <label>
        <input type="checkbox" name="CheckboxGroup1" value="ทุพพลภาพ" id="CheckboxGroup1_3" <?php if($drowning_risk_disability=='ทุพพลภาพ') { echo 'checked="checked"';}?>> ทุพพลภาพ</label><br>
    <label>
        <input type="checkbox" name="CheckboxGroup1" value="ไม่มี" id="CheckboxGroup1_4" <?php if($drowning_risk_none=='ไม่มี') { echo 'checked="checked"';}?>> ไม่มี</label><br> <br>   
    </td>
  </tr>
  <tr>
    <td colspan="4">
    <label>
        <input type="checkbox" name="CheckboxGroup1" value="มีโรคประจำตัว" id="CheckboxGroup1_5" <?php if($drowning_risk_disease_des<>'') { echo 'checked="checked"';}?>> มีโรคประจำตัว ระบุ <u><?PHP echo $drowning_risk_disease_des;?></u></label>
    </td>
  </tr>
  <tr>
    <td colspan="4">
	<label>
        <input type="checkbox" name="CheckboxGroup1" value="มีโรคประจำตัว" id="CheckboxGroup1_5" <?php if($drowning_risk_other=='อื่นๆ') { echo 'checked="checked"';}?>> อื่น ๆ ระบุ <u><?PHP echo $drowning_risk_other_des;?></u></label>
	</td>
  </tr>
  <tr>
    <td colspan="4">14) ระยะทางโดยประมาณระหว่างบ้านถึงที่เกิดเหตุ	<u><?PHP echo $drowning_length;?></u> เมตร</td>
  </tr>
  <tr>
    <td colspan="4"><font color="#FF0000" size="-1">(ไม่ต้องระบุ หากสถานที่เกิดเหตุอยู่ภายในบ้าน)</font></td>
  </tr>
 <tr>
    <td colspan="2">15) การใช้อุปกรณ์ช่วยลอยน้ำขณะเกิดเหตุ <u><?PHP echo $drowning_accessory;?></u></td>
  </tr>  
  <tr>
    <td> ถ้ามีโปรดระบุมี <u><?PHP echo $drowning_accessory_yes_des;?></u></td>
  </tr> 
  <tr>
   <tr>
    <td colspan="2" valign="top">16) หลังเกิดเหตุจมน้ำ </td>
    <td colspan="2">
      	<u><?PHP echo $drowning_after_dead;?></u></td>
  </tr>
  <tr>
    <td colspan="4">17) ผู้อยู่ในเหตุการณ์ ช่วยเหลือคนจมน้ำขึ้นมาจากน้ำด้วยวิธีใด</td>
  </tr>
  <tr>
    <td colspan="4"><u><?PHP echo $drowning_helper;?></u> </td>
  </tr>
  <tr>
    <td colspan="4">ช่วยด้วยการหาอุปกรณ์ยื่นให้จับ (ระบุอุปกรณ์) <u><?PHP echo $drowning_helper_drop_des;?></u> 	</td>
  </tr>
  <tr>
    <td colspan="4">18) ภายหลังจากช่วยเหลือขึ้นมาจากน้ำ  ได้รับการปฐมพยาบาลอย่างไร <u><?PHP echo $drowning_rescue_water;?></u></td>
  </tr>
  <tr>
    <td colspan="4">
    <label>
      <input type="checkbox" name="" value="" id="" <?php if($drowning_rescue_water<>'') { echo 'checked="checked"';}?>></label>ไม่ได้ทำการปฐมพยาบาล เนื่องจาก <u><?PHP echo $drowning_recue_no_des;?></u><br>
    </td>
  </tr>
  <tr>
    <td colspan="4">
    <label>
      <input type="checkbox" name="" value="" id="" <?php if($drowning_recue_yes<>'') { echo 'checked="checked"';}?>></label>ทำการปฐมพยาบาล โดย <u><?PHP echo $drowning_recue_yes;?></u> </td>
  </tr>
  <tr>
    <td colspan="4">ผู้ปฐมพยาบาล <u><?PHP echo $drowning_rescue_yes_des;?></u> </td>
  </tr>
   <tr>
    <td colspan="4">19) การนำส่งสถานบริการสาธารณสุขหลังจากได้รับการปฐมพยาบาล</td>
  </tr>
   <tr>
    <td colspan="4"><u><?PHP echo $drowning_refer;?></u> ที่ <u><?PHP echo $drowning_refer_hosp;?></u></td>
  </tr>  
  <tr>
    <td colspan="4">20) บรรยายเหตุการณ์ก่อนเกิดเหตุจนกระทั่งจมน้ำ <font color="#FF0000" size="-1">(เหตุการณ์เกิดอย่างไร จากอะไร คนที่จมน้ำทำอะไร บาดเจ็บ/เสียชีวิตอย่างไร ทำอะไรหลังจากนั้น)</font></td>
  </tr>
  <tr>
    <td colspan="4"><u><?PHP echo $drowning_des;?></u></td>
  </tr>
  <tr>
    <td colspan="4">21) หลังเกิดเหตุการณ์ มีการจัดแหล่งน้ำที่เกิดเหตุเพื่อป้องกันการจมน้ำ<u><?PHP echo $defend_drowning;?></u></td>
  </tr>   
  <tr> 
    <td> ถ้ามีโปรดระบุ <u><?PHP echo $defend_drowning_des;?></u></td>
  </tr> 
  <tr>
    <td colspan="4"><font color="#FF0000" size="-1">การจัดการแหล่งน้ำที่เกิดเหตุ เช่น สร้างรั้ว ติดป้ายคำเตือน มีอุปกรณ์เพื่อความปลอดภัยบริเวณแหล่งน้ำ(ห่วงชูชีพ ไม้ แกลลอนพลาสติก ขวดน้ำพลาสติก เชือก)</font></td>
  </tr>
  <tr>
    <td colspan="4"></td>
  </tr>
  <tr>
    <td colspan="4"><h5><strong>ข. ผู้รายงาน</strong></h5></td>
  </tr>
  <tr>
    <td colspan="4"><h5><strong>ผู้รายงาน</strong></h5></td>
  </tr>
  <tr>
    <td colspan="4">1) ชื่อผู้รายงาน	<u><?PHP echo $report_name;?></u>	ตำแหน่ง	<u><?PHP echo $report_job;?></u></td>
  </tr>
  <tr>
    <td colspan="4">2) หน่วยงาน	<u><?PHP echo $report_office;?></u>	จังหวัด	<u><?PHP echo $report_province;?></u></td>
  </tr>
  <tr>
    <td colspan="4">3) เบอร์โทร	<u><?PHP echo $report_tel;?></u>	โทรสาร	<u><?PHP echo $report_fax;?></u></td>
  </tr>
  <tr>
    <td colspan="4">4) วันที่รายงาน	<u><?PHP echo $report_date;?></u></td>
  </tr>  
<tbody>
</table>
</div>


  <!-- Content here -->
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh51eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
var max_pages = 100;
var page_count = 0;

function snipMe() {
  page_count++;
  if (page_count > max_pages) {
    return;
  }
  var long = $(this)[0].scrollHeight - Math.ceil($(this).innerHeight());
  var children = $(this).children().toArray();
  var removed = [];
  while (long > 0 && children.length > 0) {
    var child = children.pop();
    $(child).detach();
    removed.unshift(child);
    long = $(this)[0].scrollHeight - Math.ceil($(this).innerHeight());
  }
  if (removed.length > 0) {
    var a4 = $('<div class="A4"></div>');
    a4.append(removed);
    $(this).after(a4);
    snipMe.call(a4[0]);
  }
}

$(document).ready(function() {
  $('.A4').each(function() {
    snipMe.call(this);
  });
});
 
  </script>
  <?PHP echo "<script>window.print();</script>"; ?>

</html>