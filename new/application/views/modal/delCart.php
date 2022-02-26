<div id="delCart" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						
						<div class="modal-body" align="center">
						
					
							<div id="login_plzLogin" >
								<table style="width: 100%">
									<tr>
										<td align="center"><h6><font color="red">
										<input type="hidden" id="cartItemId" >
										<input type="hidden" id="cartstatus" >
										<img src=""  id="cartPic" class="img-polaroid"  height="170px" >
											<h4><div id="cart_name"></div></h4>
										
										 ท่านต้องการ ลบรายการสิ้นค้านี้ออกจากตะกร้าสินค้า
										<br>
										</font> </h6></td>
									</tr>
								</table>
							
									
								
								<div class="modal-body">
									<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true"  onclick="dodelcart()"><i class="icon-remove-sign"></i> ตกลง</button>
									<button class="btn " data-dismiss="modal" aria-hidden="true"  > ยกเลิก</button>

									
								</div>
							</div>
						</div>		
						
	</div>
	<script>
		function dodelcart(){
		
			$.ajax({
				type: "POST",
				url: "<?=url_Core::base()?>order/delcart/"+$('#cartItemId').val()+"/"+$('#cartstatus').val(),
				cache: false,
				data: "",
				success: function(msg){
					window.location.reload();
				}
			});

			}
	</script>