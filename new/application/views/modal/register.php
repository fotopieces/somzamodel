<div id="register" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">สมัครสมาชิก</h3>
						</div>
						<div class="modal-body" align="center">
						<table >
							<tr>
								<td><h6>ชื่อ-นามสกุล</h6></td>
								<td>&nbsp;&nbsp;
								<?php if(commonfn::isLogin()){?>
									<input type="text" placeholder="ชื่อ-นามสกุล" id="regist_name_lastname" value="<?=cookie::get("name") ?>">
								<?php }else{?>
									<input type="text" placeholder="ชื่อ-นามสกุล" id="regist_name_lastname">
								<?php }?>
								</td>
							</tr>
							<tr>
								<td><h6>ชื่อเข้าระบบ</h6></td>
								<td>&nbsp;&nbsp;
								
								<?php if(commonfn::isLogin()){?>
									<input type="text" placeholder="ชื่อเข้าระบบ" id="regist_user" value="<?=cookie::get("user") ?>">
								<?php }else{?>
									<input type="text" placeholder="ชื่อเข้าระบบ" id="regist_user">
								<?php }?>
								
								
								</td>
							</tr>
							<tr>
								<td><h6>รหัสผ่าน</h6></td>
								<td>&nbsp;&nbsp;
								
								
								<?php if(commonfn::isLogin()){?>
									<input type="password" placeholder="รหัสผ่าน" id="regist_password" value="<?=cookie::get("pass") ?>">
								<?php }else{?>
									<input type="password" placeholder="รหัสผ่าน" id="regist_password">
								<?php }?>
								
								
								</td>
							</tr>
							<tr>
								<td><h6>ยืนยันรหัสผ่าน</h6></td>
								<td>&nbsp;&nbsp;
								
						
								<?php if(commonfn::isLogin()){?>
									<input type="password" placeholder="ยืนยันรหัสผ่าน" id="regist_confim_password" value="<?=cookie::get("pass") ?>">
								<?php }else{?>
									<input type="password" placeholder="ยืนยันรหัสผ่าน" id="regist_confim_password">
								<?php }?>
								
								</td>
							</tr>
							<tr>
								<td><h6>เบอร์โทร</h6></td>
								<td>&nbsp;&nbsp;

								<?php if(commonfn::isLogin()){?>
									<input type="text" placeholder="เบอร์โทร" id="regist_tel" value="<?=cookie::get("tel") ?>">
								<?php }else{?>
									<input type="text" placeholder="เบอร์โทร" id="regist_tel">
								<?php }?>
								
								</td>
							</tr>
							<tr>
								<td><h6>อีเมล์</h6></td>
								<td>&nbsp;&nbsp;
								
			
								<?php if(commonfn::isLogin()){?>
									<input type="text" placeholder="อีเมล์" id="regist_email" value="<?=cookie::get("email") ?>">
								<?php }else{?>
									<input type="text" placeholder="อีเมล์" id="regist_email">
								<?php }?>
								
								</td>
							</tr>
							<tr>
								<td valign="top"><h6>ที่อยู่</h6></td>
								<td>&nbsp;&nbsp;
								<?php if(commonfn::isLogin()){?>
								<input type="hidden" id="registKey" value="edit">
								<input type="hidden" id="registId" value="<?=cookie::get("user_id") ?>">
									<textarea  id="regist_address"  rows="3" style="width: 300px;height: 100px;" placeholder="ที่อยู่" ><?=cookie::get("address") ?></textarea>
								<?php }else{?>
								<input type="hidden" id="registKey" value="regist">
								<textarea  id="regist_address"  rows="3" style="width: 300px;height: 100px;" placeholder="ที่อยู่" ></textarea>
								<?php }?>
								
								
								</td>
							</tr>
						</table>
							<div><h6><font color="red"><div id="msgregister"></div></font> </h6></div>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal"  onclick="window.location.reload()" aria-hidden="true">ยกเลิก</button>
							<button class="btn btn-warning"    id="register_user">บันทึกข้อมูล</button>
						</div>
	</div>
	
		<script type="text/javascript">
						$(document).ready(function(){
							$("#register_user").click(function(){
								
							if(vadidate()){
								
								var name_lastname = document.getElementById("regist_name_lastname").value;
								var user = document.getElementById("regist_user").value;
								var regist_password = document.getElementById("regist_password").value;
								var regist_tel = document.getElementById("regist_tel").value;
								var regist_email = document.getElementById("regist_email").value;
								var regist_address = document.getElementById("regist_address").value;
								var registKey = document.getElementById("registKey").value;

								if(registKey=="regist"){
											$.ajax({
												type: "GET",
												url: "<?=url_Core::base()?>regist/register/"+name_lastname+"/"+user+"/"+regist_password+"/"+regist_tel+"/"+regist_email+"/"+regist_address,
												cache: false,
												data: "",
												success: function(msg){
													if(msg=="Y"){
														document.getElementById("msgregister").innerHTML="ได้บันทึกข้อมูลสมาชิกของท่านแล้ว";
														document.getElementById("regist_name_lastname").value="";
														document.getElementById("regist_user").value="";
														document.getElementById("regist_password").value="";
														document.getElementById("regist_confim_password").value="";
														document.getElementById("regist_tel").value="";
														document.getElementById("regist_email").value="";
														document.getElementById("regist_address").value="";
														window.location.reload();
													}else{
														document.getElementById("msgregister").innerHTML="ชื่อเข้าระบบของท่านซ้ำกับในระบบ";
													}
													//window.location.reload();
												}
											});
								}else{
									var registId = document.getElementById("registId").value;
									
									$.ajax({
										type: "GET",
										url: "<?=url_Core::base()?>regist/editRegister/"+registId+"/"+name_lastname+"/"+user+"/"+regist_password+"/"+regist_tel+"/"+regist_email+"/"+regist_address,
										cache: false,
										data: "",
										success: function(msg){
											if(msg=="Y"){
												document.getElementById("msgregister").innerHTML="ได้แก้ข้อมูลสมาชิกของท่านแล้ว";
												window.location.reload();
											}else{
												document.getElementById("msgregister").innerHTML="ชื่อเข้าระบบของท่านซ้ำกับในระบบ";
											}
											
										}
									});

								}
								
								
							}
							
							
										
							});
						 });
						 function vadidate(){

								var name_lastname = document.getElementById("regist_name_lastname").value;
								var user = document.getElementById("regist_user").value;
								var regist_password = document.getElementById("regist_password").value;
								var regist_confim_password = document.getElementById("regist_confim_password").value;
								var regist_tel = document.getElementById("regist_tel").value;
								var regist_email = document.getElementById("regist_email").value;
								var regist_address = document.getElementById("regist_address").value;

								if(name_lastname==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกชื่อ-นามสกุล";
									return false;
								}
								if(user==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกชื่อเข้าระบบ";
									return false;
								}
								if(regist_password==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกพาสเวิด";
									return false;
								}
								if(regist_confim_password==""){
									document.getElementById("msgregister").innerHTML="กรุณายืนยันพาสเวิด";
									return false;
								}
								if(regist_tel==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกหมายเลขโทรศัพท์";
									return false;
								}
								if(regist_email==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกอีเมลล์";
									return false;
								}
								if(regist_address==""){
									document.getElementById("msgregister").innerHTML="กรุณากรอกที่อยู่";
									return false;
								}
								if(regist_password!=regist_confim_password){
									document.getElementById("msgregister").innerHTML="กรุณากรอกพาสเวิดยืนยันให้ถูกต้อง";
									return false;
								}
								return true;

						}
	</script>