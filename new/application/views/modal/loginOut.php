<div id="logOut" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">ออกจากระบบ</h3>
						</div>
						<div class="modal-body" align="center">
						
					
							<div id="login_nonsave" >
								<table style="width: 100%">
									<tr>
										<td align="center"><h6><font color="red"><div id="msgLogin">คุณต้องการออกจากระบบหรือไม่</div></font> </h6></td>
									</tr>
								</table>
							
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
									<button class="btn btn-warning" id="logOutBtn">ออกจากระบบ</button>
									
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#logOutBtn").click(function(){
							
										$.ajax({
											type: "GET",
											url: "<?=url_Core::base()?>login/out",
											cache: false,
											data: "",
											success: function(msg){
												//alert(msg);
												window.location.reload();
											}
										});
							});
						 });
						</script>
	</div>