<div id="editItem" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">แก้ไขสินค้า</h3>
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
					
						  <form action="<?=url::base()?>item/saveedititem" enctype="multipart/form-data"  method="post" id="fmEditItem" >
						  	<input type="hidden" name="catalog_id_item_edit" id="catalog_id_item_edit">
						  	<input type="hidden" name="edit_item_id" id="edit_item_id">
							<table style="width: 100%">
								<tr>
									<td align="right" width="30%" ><h6>ชื่อสินค้า</h6></td>
									<td>&nbsp;&nbsp;<input id="edit_itemName" name="edit_itemName"  type="text" placeholder="ชื่อสินค้า"></td>
								</tr>
								<tr>
									<td align="right" width="30%" ><h6>ราคาสินค้า</h6></td>
									<td>&nbsp;&nbsp;
									<input id="edit_itemPrice" name="edit_itemPrice"  type="text" placeholder="ราคาสินค้า">&nbsp;&nbsp; บาท
									</td>
								</tr>
								<tr>
									<td align="right" width="30%" ><h6>ระดับความยาก</h6></td>
									<td>&nbsp;&nbsp;
									<select name="edit_statusItem" id="edit_statusItem">
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
									
									 <input type="file" name="edit_picItem"  id="edit_picItem" placeholder="รูปสินค้า" />
									
									</td>
								</tr>
							</table>
							</form>
								<div align="center"><h6><font color="red"><div id="msgitemedit"></div></font> </h6></div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" onclick="docancelitem()" aria-hidden="true">ยกเลิก</button>
								<button class="btn btn-warning" id="btnEdititem" >แก้ไข</button>
							</div>
						</div>
						
						<script type="text/javascript">
						function docancelitem(){
							document.getElementById("edit_picItem").value="";
							window.location.reload()
							}
						$(document).ready(function(){
							$("#btnEdititem").click(function(){
								if(vadidateItemEdit()){
										document.getElementById("fmEditItem").submit();
									}
										
							});
						 });
						 function vadidateItemEdit(){
							 if($('#edit_itemName').val()==""){
								 document.getElementById("msgitem").innerHTML="กรุณากรอกชื่อสินค้า";
									return false;
								}
							 if($('#edit_itemPrice').val()==""){
								 document.getElementById("msgitem").innerHTML="กรุณากรอกราคาสินค้า";
									return false;
								}
							
								return true;
						}
						</script>
	</div>