     <div align="center" id="inlineeditpage" style="width:250px;display: none;" >
			แก้ไขชื่อ
			
			<input id="editMenuName_id" type="hidden" >
			<input id="editMenuName_name" type="text" placeholder="ชื่อหน้าใหม่">
			
			<br><br>
			
	
			
			<a class="button" href="javascript:editPageName()">บันทึก</a>
			<a class="button" href="window.location.reload()">ยกเลิก</a>
			
			<script type="text/javascript">
				function editPageName(){
					$.ajax({
						type: "POST",
						url: "<?=url_Core::base()?>page/editPage/"+$('#editMenuName_id').val()+"/"+$('#editMenuName_name').val(),
						cache: false,
						data: "",
						success: function(msg){
						//	alert(msg);
							if(msg=="Y"){
								//alert("ได้ทำการบันทึกข้อมูลแล้ว");
								
								window.location.reload();
								//document.getElementById("page_msg").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
							}else{
								alert("ไม่สามารถเพิ่มข้อมูลได้");

							}
							
							
						}
					});
				}
				
				function editMenuName(id,name){
					document.getElementById("editMenuName_id").value=id;
					document.getElementById("editMenuName_name").value=name;
				}
				function delMenuName(id){
					if(confirm("ต้องการลบข้อมูลหรือไม่")){  
						$.ajax({
							type: "POST",
							url: "<?=url_Core::base()?>page/deletePage/"+id,
							cache: false,
							data: "",
							success: function(msg){
								window.location="<?=url_Core::base()?>";
							}
						});
					}
				}
				
			</script>				
					
	</div>