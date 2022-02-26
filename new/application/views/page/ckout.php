    <?php $plus=1;
		if(cookie::get("Paper")=="Y"){ 
			$plus=2;
		}
		?>
<?php $Oders=ORM::factory("listorderdb")
->where("admin_id",commonfn::getUserId())
->where("status","NEW")
->find_all();
 $cout=0;
 $prices=0;
 foreach ($Oders as $Oder){
 	$cout=$cout+$Oder->item_piece;
 	$prices=$prices+(($Oder->item_price*$plus)*$Oder->item_piece);
 }
 
 ?>
<table style="width: 100%;height: 100%">
									<tr>
										<td align="center" colspan="2"><h2><div id="sumorder">ท่านได้เลือกซื้อสินค้า  <?=$cout?> ชิ้น รวม <?=$prices?> บาท</div></h2>
										<br>
										</td>
										
									</tr>
									<tr>
										<td align="right" width="40%" valign="top">เลือกรูปแบบการจัดส่ง</td>
										<td align="left"><input type="hidden" id="sumprice_concart" value="<?=$prices?>">
										<select id="typeSend" onchange="doTypeSend()">
<!-- 										<option value="0">ไปรับเอง ไม่คิดค่าบริการ(โทรนัดกันอีกที)</option> -->
										<option value="50">ส่งแบบธรรมดา 50 บาท</option>
										<option value="70" selected="selected">ส่งแบบEMS 70 บาท</option>
										</select>
										</td>
									</tr>
									<tr>
										<td align="center" colspan="2">
										
										<font color="red"> <h2><div id="sumorderOn"></div></h2></font>
										
										<input type="hidden" id="orpiceon" value="<?=$prices?>">
										</td>
									</tr>
									<tr>
										<td align="center" valign="top" colspan="2"><h2>	<font color="red"> กรุณากรอกชื่อ ที่อยู่ เบอร์โทรศัพท์  เพื่อใช้ในการติดต่อและส่งสินค้า<br> ให้ชัดเจนและถูกต้อง</font></h2></td>
										
									</tr>
									<tr>
										<td align="right" valign="top">ชื่อ</td>
										<td align="left">
										
										<input type="text" id="namesend">
										</td>
									</tr>
									<tr>
										<td align="right" valign="top">ที่อยู่ในการจัดส่ง</td>
										<td align="left">
										<textarea rows="" cols="" id="adds"></textarea>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top">เบอร์ติดต่อ</td>
										<td align="left">
										<input type="text" id="telsend">
										</td>
									</tr>
									<tr>
										<td align="right" valign="top"></td>
										<td align="left">
								
										
										<a class="button" href="javascript:dobtnconfimCart()">ตกลง</a>
										<a class="button" href="<?=url::base()?>order/cart">ยกเลิก</a>
										<font color="red"><div id="msgcart"></div></font>
										</td>
									</tr>
								</table>
							
		<script type="text/javascript">
		function dobtnconfimCart(){

			var name  =	document.getElementById("namesend").value ;
			var adds  =	document.getElementById("adds").value ;
			var tels  =	document.getElementById("telsend").value ;
			var typeSend  =	document.getElementById("typeSend").value ;


					if(vadidateCart()){
					
						$.post("<?=url_Core::base()?>order/saveorder", {
							name: name,
							adds: adds,
							typeSend: typeSend,
							tels: tels},
							
							function(result){
								$.get("http://somzamodel.com/fcm/fcm_request.php");
								alert("ท่านได้ทำการสั่งซื้อสินค้าแล้ว ท่านร้านจะโทรไป เพื่อยืนยันการทำรายการ ขอบคุณค่ะ");
								window.location='<?=url::base()?>';
								});
					}
					
			}
		function doTypeSend(){
			var sum = parseInt(document.getElementById("sumprice_concart").value)+parseInt(document.getElementById("typeSend").value);
			document.getElementById("sumorderOn").innerHTML="รวมราคา + ค่าจัดส่ง "+sum+" บาท";
			document.getElementById("orpiceon").value=sum;
			}
		function vadidateCart(){
			var name  =	document.getElementById("namesend").value ;
			var adds  =	document.getElementById("adds").value ;
			var tels  =	document.getElementById("telsend").value ;
			if(name==""){
				document.getElementById("msgcart").innerHTML="กรุณากรอกชื่อ";
				return false;
				}
			if(adds==""){
				document.getElementById("msgcart").innerHTML="กรุณากรอกชื่อและที่อยู่";
				return false;
				}
			if(tels==""){
				document.getElementById("msgcart").innerHTML="กรุณากรอกเบอร์โทร";
				return false;
				}
			return true;
			}
		</script>