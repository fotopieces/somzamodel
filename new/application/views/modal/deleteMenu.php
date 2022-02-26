<div id="deleteMenu" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">ลบข้อมูล</h3>
						</div>
						<div class="modal-body" align="center">
						
					
							<div id="login_nonsave" >
								<table style="width: 100%">
									<tr>
									<input type="hidden" id="deleteMenu_id" >
										<td align="center"><h6><font color="red"><div id="msgLogin">คุณต้องการลบเมนู หรือไม่</div></font> </h6></td>
									</tr>
								</table>
							
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ไม่ลบ</button>
									<button class="btn btn-warning" id="deleteMenuBtn"  onclick="window.location.reload()"> ลบ</button>
									
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#deleteMenuBtn").click(function(){

								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>page/deletePage/"+$('#deleteMenu_id').val(),
									cache: false,
									data: "",
									success: function(msg){

									}
								});
								
							});
						 });
						</script>
	</div>