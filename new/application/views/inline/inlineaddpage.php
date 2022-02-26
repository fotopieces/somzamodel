     <div align="center" id="inlineaddpage" style="width:250px;display: none;" >
			ชื่อหน้าใหม่
			<input id="addnameNewpage" type="text" placeholder="ชื่อหน้าใหม่"><br><br>
			<select name="type" id="type">
				<option value="header">หัวเว็บ</option>
				<option value="menu">ตัวอย่างการต่อโมเดล</option>
			</select>
			<br><br>
			
			
			<a class="button" href="javascript:addNewPage()">บันทึก</a>
			<a class="button" href="javascript:window.location.reload()">ยกเลิก</a>
			
			
		
			<script type="text/javascript">
				function addNewPage(){
					//alert($('#type').val());
					$.ajax({
						type: "POST",
						url: "<?=url_Core::base()?>page/addNewPage/"+$('#addnameNewpage').val()+"/"+$('#type').val(),
						cache: false,
						data: "",
						success: function(msg){
							//alert(msg);
							if(msg=="Y"){
								//alert("ได้ทำการบันทึกข้อมูลแล้ว");
								document.getElementById("addnameNewpage").value="";
								window.location.reload();
								//document.getElementById("page_msg").innerHTML="ได้ทำการบันทึกข้อมูลแล้ว";
							}else{
								alert("ไม่สามารถเพิ่มข้อมูลได้");

							}
							
							
						}
					});
				}
			</script>				
					
	</div>