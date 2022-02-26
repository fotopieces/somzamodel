<div id="editMainPage" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">เลือกหน้าหลัก</h3>
						</div>
						<div class="modal-body" align="center">
						
					
							<div id="login_nonsave" >
								<table style="width: 100%">
									<tr>
						
										<td align="center"><h6><font color="red"><div id="msgLogin">เลือกตำแหน่งเมนูที่ต้องการโชว์หน้าแรก</div></font> </h6>
										<br>
										<select id="position_id" onchange="changeMainPage(this)">
										<option value=""  selected="selected">กรุณาเลือก</option>
											<?php $pages=ORM::factory("pagedb")->find_all();	
							 					foreach ($pages as $page){
												?>
														<option value="<?=$page->id?>" ><?=$page->name?></option>
											<?php }?>
											
										</select>
										</td>
									</tr>
								</table>
							<input type="hidden" id="editMainPage_id">
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
									<button class="btn btn-warning" id="btneditMainPage"  >เลือก</button>
									
								</div>
							</div>
						</div>
						

						<script type="text/javascript">
							function changeMainPage(data){
									document.getElementById("editMainPage_id").value = data.value;							
							}
						
						$(document).ready(function(){
							$("#btneditMainPage").click(function(){

							var editMainPage_id  =	document.getElementById("editMainPage_id").value ;
						
							if(editMainPage_id!=""){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>page/editMainPage/"+editMainPage_id,
									cache: false,
									data: "",
									success: function(msg){
										window.location.reload();
									}
								});
							}
								
							});
						 });
						</script>
	</div>