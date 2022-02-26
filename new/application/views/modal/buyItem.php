<div id="buyItem" class="modal hide fade" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 700px;height: 500px;">
						
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">ท่านต้องการซื้อ</h3>
						</div>
						<div class="modal-body" align="center" >
						
								<table style="width: 100%;height: 100%">
									<tr>
										<td align="center">

											<img src=""  id="show_buy" class="img-polaroid"  height="170px" >
											
											<input type="hidden" id="buyItemId" >
											<input type="hidden" id="buyItemName" >
											<input type="hidden" id="buyItemPrice" >
											<input type="hidden" id="buyItemPic" >
											<input type="hidden" id="statusItem" >
											<input type="hidden" id="ev" >
									
											
											<h4><div id="buy_name"></div></h4>
											<h6><div id="buy_price"></div></h6>
											<h6>จำนวน</h6>
											        <div class="input-prepend input-append">
																		    <div class="btn-group">
																		    <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="dominus()">
																		  			 <i class="icon-minus"></i> 
																		    </button>
																		    </div>
																		    <input class="span2"  placeholder="ตัวเลข" id="piece" type="text"   style="width:50px;text-align:right;" value="1"  onkeydown="return acceptOnlyDigit(event,this)" /> 
																		    <div class="btn-group">
																		    <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="doplus()">
																		 			 <i class="icon-plus"></i>
																		    </button>
																		
																		    </div>
													</div>
												<h6>ชิ้น</h6>	
													<script type="text/javascript">
													
														function doplus(){
															document.getElementById("piece").value=parseInt(document.getElementById("piece").value)+1;

															}
														function dominus(){
															if(parseInt(document.getElementById("piece").value)!=1){
																document.getElementById("piece").value=parseInt(document.getElementById("piece").value)-1;
																}
														}
														

													</script>
													
											<div></div>

									</td>
									</tr>
								</table>
							
									
							<div class="modal-body">
							<button onclick="" class="btn btn-warning" data-dismiss="modal" aria-hidden="true"  id="btnBuyItem" ><i class="icon-shopping-cart"></i> ตกลง</button>
							<button class="btn " data-dismiss="modal" aria-hidden="true"  > ยกเลิก</button>
									

									
								</div>
							
						</div>		
						
	</div>
	
		<script type="text/javascript">
		
						
						$(document).ready(function(){
							$("#btnBuyItem").click(function(){

							
							var buyItemId  =	document.getElementById("buyItemId").value ;
							var buyItemName  =	document.getElementById("buyItemName").value ;
							var buyItemPrice  =	document.getElementById("buyItemPrice").value ;
							var buyItemPic  =	document.getElementById("buyItemPic").value ;
							var piece  =	document.getElementById("piece").value ;
							var statusItem  =	document.getElementById("statusItem").value ;
							if(statusItem==""){
								statusItem=1;
								}
							var ev  =	document.getElementById("ev").value ;
							//alert("<?=url_Core::base()?>order/addcart/"+buyItemId+"/"+buyItemName+"/"+buyItemPrice+"/"+piece+"/"+statusItem+"/"+ev)
					
							
							if(piece!=""){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>order/addcart/"+buyItemId+"/"+buyItemName+"/"+buyItemPrice+"/"+piece+"/"+statusItem+"/"+ev,
									cache: false,
									data: "",
									success: function(msg){
										//alert("dfg")
										window.location.reload();
									}
								});
							}
								
							});
						 });
						</script>