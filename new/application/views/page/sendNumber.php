<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>ร้านโมเดลกระดาษ:Somzamodel  โมเดลกระดาษ   การต่อโมเดลกระดาษ  การสร้างโมเดลกระดาษ  ร้านโมเดลกระดาษ  ประโยชน์การต่อโมเดล  โมเดลกระดาษโดเรมอน  โมเดลกระดาษที่สร้างสรรค  โมเดลคาทไรเดอร์  ขายส่งโมเดล   โมเดลแผ่นละ10บาท  paper model model กระดาษ somzamodel ร้านโมเดล กระดาษศูนย์รวมโมเดลกระดาษ มีหลายแบบให้คุณได้เลือกสรรค์ภายในร้านมีโมเดล กระดาษต่อจริงให้เห็น เพื่อให้สามารถเลือกชมได้ง่ายเห็นภาพได้ จริงสามารถ ต่อได้จริงทุกตัว มีทั้งแบบซื้อเป็นแผ่นแล้วนำ ไปต่อเองหรือแบบต่อสำเร็จสำหรับท่านที่ต้องการให้เป็น ของขวัญของ ฝากแด่คนที่คุณรัก ราคาแผ่นละ 10 บาท แล้ว แต่แบบกรณีต้องการนำไปขายต่อ ขอให้ติดต่อที่ร้านเพื่อชี้แจงรายละเอียด สิทธิพิเศษต่าง ๆ ด้วยตัวท่านเองสำหรับโรงเรียนหรือ ห้างร้าน บริษัท ที่ต้องการนำโมเดลกระดาษไปใช้ทำ กิจกรรมร่วมกับเด็ก ๆ ทางร้านของเราร่วมสนับสนุนพร้อมมอบสิทธิพิเศษให้สำหรับท่านเช่นกันสอบถามรายละเอียดเพิ่มเติมได้</title>
<link href="<?=url::base()?>resource/image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="ร้านโมเดลกระดาษ โมเดลแผ่นละ10บาท  paper model model กระดาษ somzamodel ร้านโมเดล กระดาษศูนย์รวมโมเดลกระดาษ มีหลายแบบให้คุณได้เลือกสรรค์ภายในร้านมีโมเดล กระดาษต่อจริงให้เห็น เพื่อให้สามารถเลือกชมได้ง่ายเห็นภาพได้ จริงสามารถ ต่อได้จริงทุกตัว มีทั้งแบบซื้อเป็นแผ่นแล้วนำ ไปต่อเองหรือแบบต่อสำเร็จสำหรับท่านที่ต้องการให้เป็น ของขวัญของ ฝากแด่คนที่คุณรัก ราคาแผ่นละ 10 บาท แล้ว แต่แบบกรณีต้องการนำไปขายต่อ ขอให้ติดต่อที่ร้านเพื่อชี้แจงรายละเอียด สิทธิพิเศษต่าง ๆ ด้วยตัวท่านเองสำหรับโรงเรียนหรือ ห้างร้าน บริษัท ที่ต้องการนำโมเดลกระดาษไปใช้ทำ กิจกรรมร่วมกับเด็ก ๆ ทางร้านของเราร่วมสนับสนุนพร้อมมอบสิทธิพิเศษให้สำหรับท่านเช่นกันสอบถามรายละเอียดเพิ่มเติมได้">
<meta name="author" content="">
</head>
<body>

<?php if(commonfn::isAdmin()){?>
<form action="<?=url::base()?>welcome/saveSend" method="post">
เพิ่ม<input type="text" name="sendName"  style="width: 700px" /><input type="submit" value="บันทึก">
</form>
<?php }?>

<table>
<?php 	$lists=ORM::factory("icondb")->find_all();
   foreach ($lists as $list){
?>
	<tr>
		<td width="2px">-</td>
		<td><?=$list->name ?></td>
		<?php if(commonfn::isAdmin()){?>
		<td><a href="<?=url::base()?>welcome/delSend/<?=$list->id ?>">ลบ</a></td>
		<?php }?>
	</tr>
	<?php }?>
</table>

</body>
</html>

