<div id="editposition" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">แก้ไขตำแหน่ง</h3>
						</div>
						<div class="modal-body" align="center">
						
					
							<div id="login_nonsave" >
								<table style="width: 100%">
									<tr>
									<input type="hidden" id="deleteMenu_id" >
										<td align="center"><h6><font color="red"><div id="msgLogin">เลือกตำแหน่งเมนูที่ต้องการไปแทน</div></font> </h6>
										<input type="hidden" id="position_id"  value="">
										<input type="hidden" id="position_seq"  value="">
										<input type="hidden" id="new_position_id"  value="">
										<input type="hidden" id="new_position_seq"  value="">
										<b><div id="position_name"></div></b>
										<br>
										<select id="position_id" onchange="changePosition(this)">
										<option value=""  selected="selected">กรุณาเลือก</option>
											<?php $pages=ORM::factory("pagedb")->find_all();	
							 					foreach ($pages as $page){
												?>
														<option value="<?=$page->id?>|<?=$page->seq?>" ><?=$page->name?></option>
											<?php }?>
											
										</select>
										</td>
									</tr>
								</table>
							
									
								
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
									<button class="btn btn-warning" id="btnPositionBtn"  >ย้ายตำแหน่ง</button>
									
								</div>
							</div>
						</div>
						

						<script type="text/javascript">
							function changePosition(data){
								if(data!=""){
									var values = data.value.preg_split("|");
									document.getElementById("new_position_id").value = values[0];
									document.getElementById("new_position_seq").value = values[1];
								}
							}
						
						$(document).ready(function(){
							$("#btnPositionBtn").click(function(){

							var new_position_id  =	document.getElementById("new_position_id").value ;
							var new_position_seq  =	document.getElementById("new_position_seq").value ;
							var position_id  =	document.getElementById("position_id").value ;
							var position_seq  =	document.getElementById("position_seq").value ;
							if(new_position_id!=""){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>page/positionPage/"+position_id+"/"+position_seq+"/"+new_position_id+"/"+new_position_seq,
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