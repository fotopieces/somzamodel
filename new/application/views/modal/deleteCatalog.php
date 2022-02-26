<div id="deleteCatalog" class="modal hide fade" tabindex="-1"
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
									<input type="hidden" id="delete_Catalog_id" >
										<td align="center"><h6><font color="red"><div id="msgLogin">คุณต้องการลบหมวดสินค้า หรือไม่ (หากลบหมวดสินค้า จะทำให้สินค้าทั้งหมดหายไป)</div></font> </h6></td>
									</tr>
								</table>
							
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ไม่ลบ</button>
									<button class="btn btn-warning" id="delete_CatalogBtn"  > ลบ</button>
									
								</div>
							</div>
						</div>

						
						<script type="text/javascript">
						$(document).ready(function(){
							$("#delete_CatalogBtn").click(function(){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>catalog/delete/"+$('#delete_Catalog_id').val(),
									cache: false,
									data: "",
									success: function(msg){
										window.location='<?=url::base()?>';
									}
								});
								
							});
						 });
						</script>
	</div>