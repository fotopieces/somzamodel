<div id="deleteItem" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">ลบข้อมูล</h3>
						</div>
						<div class="modal-body" align="center">
						
					
							<div id="login_nonsave_" >
								<table style="width: 100%">
									<tr>
									  
										<td align="center"><h6><font color="red"><div id="msgLogin">คุณต้องการลบสินค้า หรือไม่</div></font> </h6></td>
									</tr>
								</table>
							<form action="<?=url::base()?>item/del" enctype="multipart/form-data"  method="post"  id="fmDeleteItem" >
									<input type="hidden" id="catalog_id_item_delete"  name="catalog_id_item_delete">
									<input type="hidden" id="id_item_delete" name="id_item_delete">
							</form>
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ไม่ลบ</button>
									<button class="btn btn-warning" id="delete_item_Btn"  > ลบ</button>
									
								</div>
							</div>
						</div>

						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#delete_item_Btn").click(function(){
								document.getElementById("fmDeleteItem").submit();
							});
						 });
						</script>
	</div>