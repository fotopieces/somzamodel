<div id="editCatalog" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">แก้ไขหมวดสินค้าใหม่</h3>
						</div>
						<div class="modal-body" align="center">
						
							
						</div>
						<div id="page_save_editCatalog" style="display: none;">
							<table style="width: 100%">
								<tr>
									<td align="center"><h6><font color="red"><div id="page_msg_editCatalog">ได้ทำการบันทึกข้อมูลแล้ว</div></font> </h6></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ปิด</button>
							</div>
						</div>
						<div id="page_nonsave_editCatalog" >
							<table style="width: 100%">
								<tr>
									<td align="right" width="30%" ><h6>ชื่อหมวดสินค้า</h6></td>
									<td>&nbsp;&nbsp;
									<input id="addeditCatalog_id" type="hidden" placeholder="ชื่อหมวดสินค้าใหม่">
									<input id="addeditCatalog" type="text" placeholder="ชื่อหมวดสินค้าใหม่">
									</td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ยกเลิก</button>
								<button class="btn btn-warning" id="btneditCatalog" >บันทึก</button>
							</div>
						</div>
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#btneditCatalog").click(function(){
								if($('#addeditCatalog').val()!=""){
										$.ajax({
											type: "POST",
											url: "<?=url_Core::base()?>catalog/editcatalog/"+$('#addeditCatalog_id').val()+"/"+$('#addeditCatalog').val(),
											cache: false,
											data: "",
											success: function(msg){
												//alert(msg);
												if(msg=="Y"){
													document.getElementById("page_msg_editCatalog").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
												}else{
													document.getElementById("page_msg_editCatalog").innerHTML="ไม่สามารถเพิ่มข้อมูลได้";
												}
												document.getElementById("page_nonsave_editCatalog").style.display="none";
												document.getElementById("page_save_editCatalog").style.display="";
												document.getElementById("addeditCatalog").value="";
												
											}
										});
								}
										
							});
						 });
						</script>
	</div>