     <div align="center" id="inlineeditcat" style="width:250px;display: none;" >
			แก้ไขชื่อหมวดสินค้าใหม่
			<input id="editidNewCatalog" type="hidden" >
			<input id="editnameNewCatalog" type="text" placeholder="แก้ไขชื่อหมวดสินค้าใหม่"   >
			
			<br><br>
			
		
			
				<a class="button" href="javascript:doeditnameNewCatalog()">บันทึก</a>
			<a class="button" href="javascript:window.location.reload()">ยกเลิก</a>
			
			<script type="text/javascript">
				function doeditnameNewCatalog(){
					//alert($('#type').val());
					
						if($('#editnameNewCatalog').val()!=""){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>catalog/editcatalog/"+$('#editidNewCatalog').val()+"/"+$('#editnameNewCatalog').val(),
									cache: false,
									data: "",
									success: function(msg){
										//alert(msg);
										if(msg=="Y"){
											//alert("ได้ทำการบันทึกข้อมูลแล้ว");
											document.getElementById("editnameNewCatalog").value="";
											window.location.reload();
											//document.getElementById("page_msg").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
										}else{
											alert("ไม่สามารถเพิ่มข้อมูลได้");

										}
										
									}
								});
						}
								
					
				}
			</script>				
					
	</div>