<div id="login" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">เข้าระบบ</h3>
						</div>
						<div class="modal-body" align="center">
						
						<div id="login_save" style="display: none;">
							<table style="width: 100%">
								<tr>
									<td align="center"><h6><font color="red"><div id="msgLogin">ได้ทำการเข้าสู่ระบบแล้ว</div></font> </h6></td>
								</tr>
							</table>
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()" aria-hidden="true">ปิด</button>
							</div>
						</div>
							<div id="login_nonsave" >
								<table >
									<tr>
										<td><h6>ชื่อเข้าระบบ</h6></td>
										<td>&nbsp;&nbsp;<input type="text"  id="user" placeholder="ชื่อเข้าระบบ"></td>
									</tr>
									<tr>
										<td><h6>รหัสผ่าน</h6></td>
										<td>&nbsp;&nbsp;<input type="password" id="pass" placeholder="รหัสผ่าน"></td>
									</tr>
									
								</table>
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
									<button class="btn btn-success" id="regis" data-dismiss="modal"  aria-hidden="true" onclick="regismodal()">สมัครสมาชิก</button>
									<button class="btn btn-warning" id="logins">เข้าสู่ระบบ</button>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#logins").click(function(){
							
										$.ajax({
											type: "GET",
											url: "<?=url_Core::base()?>login/ckLogin/"+$('#user').val()+"/"+$('#pass').val(),
											cache: false,
											data: "",
											success: function(msg){
												//alert(msg);
												if(msg=="N"){
													document.getElementById("msgLogin").innerHTML ="ขออภัยไม่สามารถเข้าสู่ระบบได้";
												}
												document.getElementById("user").value="";
												document.getElementById("pass").value="";
												document.getElementById("login_save").style.display="";
												document.getElementById("login_nonsave").style.display="none";
											}
										});
							});
						 });
						</script>
	</div>