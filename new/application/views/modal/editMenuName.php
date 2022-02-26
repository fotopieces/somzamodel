<div id="editMenuName" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">แก้ไขชื่อเมนู</h3>
						</div>
						<div class="modal-body" align="center">
						
							
						</div>
						<div id="page_save_editName" style="display: none;">
							<table style="width: 100%">
								<tr>
									<td align="center"><h6><font color="red"><div id="page_msg_editName">ได้ทำการบันทึกข้อมูลแล้ว</div></font> </h6></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ปิด</button>
							</div>
						</div>
						<div id="page_nonsave_editName" >
							<table style="width: 100%">
								<tr>
									<td align="right" width="30%" ><h6>ชื่อหน้าใหม่</h6></td>
									<td>&nbsp;&nbsp;<input id="editMenuName_id" type="hidden" ></td>
									<td>&nbsp;&nbsp;<input id="editMenuName_name" type="text" placeholder="ชื่อหน้าใหม่"></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ยกเลิก</button>
								<button class="btn btn-warning" id="btnEditPageName" >บันทึก</button>
							</div>
						</div>
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#btnEditPageName").click(function(){
										$.ajax({
											type: "POST",
											url: "<?=url_Core::base()?>page/editPage/"+$('#editMenuName_id').val()+"/"+$('#editMenuName_name').val(),
											cache: false,
											data: "",
											success: function(msg){
											//	alert(msg);
												if(msg=="Y"){
													document.getElementById("page_msg_editName").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
												}else{
													document.getElementById("page_msg_editName").innerHTML="ไม่สามารถเพิ่มข้อมูลได้";
												}
												document.getElementById("page_nonsave_editName").style.display="none";
												document.getElementById("page_save_editName").style.display="";
												
											}
										});
							});
						 });
						</script>
	</div>