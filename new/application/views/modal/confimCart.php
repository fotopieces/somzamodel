<div id="confimCart" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 700px;height: 500px;">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">ยืนยันการสั่งซื้อ</h3>
						</div>
						<div class="modal-body" align="center" >
						
								<table style="width: 100%;height: 100%">
									<tr>
										<td align="center" colspan="2"><h5><div id="sumorder"></div></h5>
										<br>
										</td>
										
									</tr>
									<tr>
										<td align="right" width="40%" valign="top"><h6>เลือกรูปแบบการจัดส่ง</h6></td>
										<td align="left"><input type="hidden" id="sumprice_concart">
										<select id="typeSend" onchange="doTypeSend()">
										<option value="0">ไปรับเอง ไม่คิดค่าบริการ(โทรนัดกันอีกที)</option>
										<option value="50">ส่งแบบธรรมดา 50 บาท</option>
										<option value="70" selected="selected">ส่งแบบEMS 70 บาท</option>
										</select>
										</td>
									</tr>
									<tr>
										<td align="center" colspan="2">
										
										<font color="red"> <h5><div id="sumorderOn"></div></h5></font>
										
										<input type="hidden" id="orpiceon">
										</td>
									</tr>
									<tr>
										<td align="center" valign="top" colspan="2"><h6>	<font color="red"> กรุณากรอกชื่อ ที่อยู่ เบอร์โทรศัพท์  เพื่อใช้ในการติดต่อและส่งสินค้า<br> ให้ชัดเจนและถูกต้อง</font></h6></td>
										
									</tr>
									<tr>
										<td align="right" valign="top"><h6>ชื่อและที่อยู่ในการจัดส่ง</h6></td>
										<td align="left">
										<textarea rows="" cols="" id="adds"></textarea>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top"><h6>เบอร์ติดต่อ</h6></td>
										<td align="left">
										<input type="text" id="tels">
										</td>
									</tr>
								</table>
							<font color="red"> <div id="msgcart" align="center"></div></font>
									
							<div class="modal-body">
							<button class="btn btn-warning" id="btnconfimCart" ><i class="icon-shopping-cart"></i> ตกลง</button>
							<button class="btn "  onclick="window.location.reload()"  data-dismiss="modal" aria-hidden="true"  > ยกเลิก</button>
									

									
								</div>
							
						</div>		
						
	</div>
	
		<script type="text/javascript">
		function doTypeSend(){
			var sum = parseInt(document.getElementById("sumprice_concart").value)+parseInt(document.getElementById("typeSend").value);
			document.getElementById("sumorderOn").innerHTML="รวมราคา + ค่าจัดส่ง "+sum+" บาท";
			document.getElementById("orpiceon").value=sum;
			}
		function vadidateCart(){
			var adds  =	document.getElementById("adds").value ;
			var tels  =	document.getElementById("tels").value ;
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
		
						$(document).ready(function(){
									$("#btnconfimCart").click(function(){
							
										var adds  =	document.getElementById("adds").value ;
										var tels  =	document.getElementById("tels").value ;
										var typeSend  =	document.getElementById("typeSend").value ;
							
			
												if(vadidateCart()){
												
													$.post("<?=url_Core::base()?>order/saveorder", {
														adds: adds,
														typeSend: typeSend,
														tels: tels},
														
														function(result){
															$('#confimCart').modal('hide');
															$('#buy').modal('show');
															});
												}

									 });
						 });
						</script>