     <div align="center" id="inlineedititem" style="width:250px;display: none;" >
			<div id="page_nonsave_item" >
					
						  <form action="<?=url::base()?>item/saveedititem" enctype="multipart/form-data"  id="fmEditItem" method="post">
						  	<input type="hidden" name="catalog_id_item_edit" id="catalog_id_item_edit">
						  	<input id="edit_item_id" name="edit_item_id"  type="hidden" >
							ชื่อสินค้า
							<input id="edit_itemName" name="edit_itemName"  type="text" placeholder="ชื่อสินค้า">
							ราคาสินค้า
							<input id="edit_itemPrice" name="edit_itemPrice"  type="text" placeholder="ราคาสินค้า">&nbsp;&nbsp;บาท<br>
							ระดับความยาก
									<select name="edit_statusItem" id="edit_statusItem">
						                    <option  value="1">1 ดาว</option>
						                    <option  value="2">2 ดาว</option>
						                    <option  value="3">3 ดาว</option>
						                    <option  value="4">4 ดาว</option>
						                    <option  value="5">5 ดาว</option>
                  					</select><br>
							รูปสินค้า
							 <input type="file" name="edit_picItem"  id="edit_picItem" placeholder="รูปสินค้า" />
									
							</form>
								<div align="center"><h6><font color="red"><div id="msgitem"></div></font> </h6></div>
							<div class="modal-footer">
								<br>
								
								  <a class="button" onclick="dobtnAddNewItem()">บันทึก</a>
								  <a class="button" onclick="docancel()">ยกเลิก</a>
								
							</div>
						</div>
		<script type="text/javascript">
						function docancel(){
							
							document.getElementById("edit_itemName").value="";
							document.getElementById("edit_itemPrice").value="";
							document.getElementById("edit_picItem").value="";

							window.location.reload()
							}
							function dobtnAddNewItem(){
							
								if(vadidateItem()){
									document.getElementById("fmEditItem").submit();
								}

							
							}
					
						 function vadidateItem(){
							 if(document.getElementById("edit_itemName").value==""){
								alert("กรุณากรอกชื่อสินค้า");
									return false;
								}
							 if(document.getElementById("edit_itemPrice").value==""){
								 alert("กรุณากรอกราคาสินค้า");
								// document.getElementById("msgitem").innerHTML="กรุณากรอกราคาสินค้า";
									return false;
								}
							
								return true;
						}
						</script>			
					
	</div>