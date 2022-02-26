     <div align="center" id="inlineaddcat" style="width:250px;display: none;" >
			ชื่อหมวดสินค้าใหม่
			<input id="addnameNewCatalog" type="text" placeholder="ชื่อหมวดสินค้าใหม่"   >
			
			<br><br>
			
		
			
				<a class="button" href="javascript:doaddnameNewCatalog()">บันทึก</a>
			<a class="button" href="javascript:window.location.reload()">ยกเลิก</a>
			
			<script type="text/javascript">
				function doaddnameNewCatalog(){
					//alert($('#type').val());
					
						if($('#addnameNewCatalog').val()!=""){
								$.ajax({
									type: "POST",
									url: "<?=url_Core::base()?>catalog/addcatalog/"+$('#addnameNewCatalog').val(),
									cache: false,
									data: "",
									success: function(msg){
										//alert(msg);
										if(msg=="Y"){
											//alert("ได้ทำการบันทึกข้อมูลแล้ว");
											document.getElementById("addnameNewCatalog").value="";
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