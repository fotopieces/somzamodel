<div id="delallcart" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						
						<div class="modal-body" align="center">
						
					
							<div id="login_plzLogin" >
								<table style="width: 100%">
									<tr>
										<td align="center"><h6><font color="red">
										<input type="hidden" id="cartItemId" >
									
										
										 ท่านต้องการ ลบรายการสิ้นค้าทั้งหมดออกจากตะกร้าสินค้า
										<br>
										</font> </h6></td>
									</tr>
								</table>
							
									
								
								<div class="modal-body">
									<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true"  onclick="delall_cart()"><i class="icon-remove-sign"></i> ตกลง</button>
									<button class="btn " data-dismiss="modal" aria-hidden="true"  > ยกเลิก</button>

									
								</div>
							</div>
						</div>		
						
	</div>
	<script>
		function delall_cart(){
		
			$.ajax({
				type: "POST",
				url: "<?=url_Core::base()?>order/delallcart",
				cache: false,
				data: "",
				success: function(msg){
					window.location.reload();
				}
			});

			}
	</script>