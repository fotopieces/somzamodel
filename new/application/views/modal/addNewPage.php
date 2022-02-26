<div id="addPage" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">เพิ่มหน้าใหม่</h3>
						</div>
						<div class="modal-body" align="center">
						
							
						</div>
						<div id="page_save" style="display: none;">
							<table style="width: 100%">
								<tr>
									<td align="center"><h6><font color="red"><div id="page_msg">ได้ทำการบันทึกข้อมูลแล้ว</div></font> </h6></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ปิด</button>
							</div>
						</div>
						<div id="page_nonsave" >
							<table style="width: 100%">
								<tr>
									<td align="right" width="30%" ><h6>ชื่อหน้าใหม่</h6></td>
									<td>&nbsp;&nbsp;<input id="addnameNewpage" type="text" placeholder="ชื่อหน้าใหม่"></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ยกเลิก</button>
								<button class="btn btn-warning" id="btnAddNewPage" >บันทึก</button>
							</div>
						</div>
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#btnAddNewPage").click(function(){
										$.ajax({
											type: "POST",
											url: "<?=url_Core::base()?>page/addNewPage/"+$('#addnameNewpage').val(),
											cache: false,
											data: "",
											success: function(msg){
												//alert(msg);
												if(msg=="Y"){
													document.getElementById("page_msg").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
												}else{
													document.getElementById("page_msg").innerHTML="ไม่สามารถเพิ่มข้อมูลได้";
												}
												document.getElementById("page_nonsave").style.display="none";
												document.getElementById("page_save").style.display="";
												document.getElementById("addnameNewpage").value="";
												
											}
										});
							});
						 });
						</script>
	</div>