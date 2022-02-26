<div id="addNewItem" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">เพิ่มสินค้าใหม่</h3>
						</div>
						<div class="modal-body" align="center">
						
							
						</div>
						<div id="page_save_item" style="display: none;">
						
							<table style="width: 100%">
								<tr>
									<td align="center"><h6><font color="red"><div id="page_msg_item">ได้ทำการบันทึกข้อมูลแล้ว</div></font> </h6></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ปิด</button>
							</div>
						</div>
						<div id="page_nonsave_item" >
					
						  <form action="<?=url::base()?>item/additem" enctype="multipart/form-data"  id="fmItem" method="post">
						  	<input type="hidden" name="catalog_id_item" id="catalog_id_item">
							<table style="width: 100%">
								<tr>
									<td align="right" width="30%" ><h6>ชื่อสินค้า</h6></td>
									<td>&nbsp;&nbsp;<input id="itemName" name="itemName"  type="text" placeholder="ชื่อสินค้า"></td>
								</tr>
								<tr>
									<td align="right" width="30%" ><h6>ราคาสินค้า</h6></td>
									<td>&nbsp;&nbsp;
									<input id="itemPrice" name="itemPrice"  type="text" placeholder="ราคาสินค้า">&nbsp;&nbsp;บาท
									</td>
								</tr>
								<tr>
									<td align="right" width="30%" ><h6>ระดับความยาก</h6></td>
									<td>&nbsp;&nbsp;
									<select name="statusItem" id="statusItem">
						                    <option  value="1">1 ดาว</option>
						                    <option  value="2">2 ดาว</option>
						                    <option  value="3">3 ดาว</option>
						                    <option  value="4">4 ดาว</option>
						                    <option  value="5">5 ดาว</option>
                  					</select>
									</td>
								</tr>
								<tr>
									<td align="right" width="30%" ><h6>รูปสินค้า</h6></td>
									<td>&nbsp;&nbsp;
									
									 <input type="file" name="picItem"  id="picItem" placeholder="รูปสินค้า" />
									
									</td>
								</tr>
							</table>
							</form>
								<div align="center"><h6><font color="red"><div id="msgitem"></div></font> </h6></div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" onclick="docancel()" aria-hidden="true">ยกเลิก</button>
								<button class="btn btn-warning" id="btnAddNewItem" >บันทึก</button>
							</div>
						</div>
						
						<script type="text/javascript">
						function docancel(){
							
							document.getElementById("itemName").value="";
							document.getElementById("itemPrice").value="";
							document.getElementById("picItem").value="";

							window.location.reload()
							}
						$(document).ready(function(){
							$("#btnAddNewItem").click(function(){
								if(vadidateItem()){
										document.getElementById("fmItem").submit();
									}
										
							});
						 });
						 function vadidateItem(){
							 if($('#itemName').val()==""){
								 document.getElementById("msgitem").innerHTML="กรุณากรอกชื่อสินค้า";
									return false;
								}
							 if($('#itemPrice').val()==""){
								 document.getElementById("msgitem").innerHTML="กรุณากรอกราคาสินค้า";
									return false;
								}
							 if($('#picItem').val()==""){
								 document.getElementById("msgitem").innerHTML="กรุณาเลือกรูปสินค้า";
									return false;
								}
								return true;
						}
						</script>
	</div>