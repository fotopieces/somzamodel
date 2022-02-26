     <div align="center" id="inlineadditem" style="width:250px;display: none;" >
			<div id="page_nonsave_item" >
					
						  <form action="<?=url::base()?>item/additem" enctype="multipart/form-data"  id="fmItem" method="post">
						  	<input type="hidden" name="catalog_id_item" id="catalog_id_item">
							ชื่อสินค้า
							<input id="itemName" name="itemName"  type="text" placeholder="ชื่อสินค้า">
							ราคาสินค้า
							<input id="itemPrice" name="itemPrice"  type="text" placeholder="ราคาสินค้า">&nbsp;&nbsp;บาท<br>
							ระดับความยาก
									<select name="statusItem" id="statusItem">
						                    <option  value="1">1 ดาว</option>
						                    <option  value="2">2 ดาว</option>
						                    <option  value="3">3 ดาว</option>
						                    <option  value="4">4 ดาว</option>
						                    <option  value="5">5 ดาว</option>
                  					</select><br>
							รูปสินค้า
							 <input type="file" name="picItem"  id="picItem" placeholder="รูปสินค้า" />
									
							</form>
								<div align="center"><h6><font color="red"><div id="msgitem"></div></font> </h6></div>
							<div class="modal-footer">
							<br>
							
								
											<a class="button" href="javascript:dobtnAddNewItem()">บันทึก</a>
											<a class="button" href="javascript:docancel()">ยกเลิก</a>
							</div>
						</div>
		<script type="text/javascript">
						function docancel(){
							
							document.getElementById("itemName").value="";
							document.getElementById("itemPrice").value="";
							document.getElementById("picItem").value="";

							window.location.reload()
							}
							function dobtnAddNewItem(){
							
								if(vadidateItem()){
									document.getElementById("fmItem").submit();
								}

							
							}
					
						 function vadidateItem(){
							 if(document.getElementById("itemName").value==""){
								alert("กรุณากรอกชื่อสินค้า");
									return false;
								}
							 if(document.getElementById("itemPrice").value==""){
								 alert("กรุณากรอกราคาสินค้า");
								// document.getElementById("msgitem").innerHTML="กรุณากรอกราคาสินค้า";
									return false;
								}
							 if(document.getElementById("picItem").value==""){
								 alert("กรุณาเลือกรูปสินค้า");
								// document.getElementById("msgitem").innerHTML="กรุณาเลือกรูปสินค้า";
									return false;
								}
								return true;
						}
						</script>			
					
	</div>