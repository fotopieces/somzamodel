
<script type="text/javascript">
function doQty_ed(id){
	if(document.getElementById("qty_ed").value!=1){

		if(id==1){
			document.getElementById("qty_ed").value=parseInt(document.getElementById("qty_ed").value)-1;
		}
		if(id==0){
			document.getElementById("qty_ed").value=parseInt(document.getElementById("qty_ed").value)+1;
		}
	}else{
		if(id==0){
			document.getElementById("qty_ed").value=parseInt(document.getElementById("qty_ed").value)+1;
		}
	}
}
</script>
	<div align="center" id=inlinebuyedititem style="width:250px;display: none;" >
<!-- 	<a href="javascript:jQuery.fancybox.close();">Close iframe parent</a> -->
		<h3>ท่านต้องแก้ไข </h3>
		<input type="hidden" id="buyItemId_ed" value="">
		<div id="itemName_ed" ></div>
		<br>
		<p>
			จำนวน  &nbsp;&nbsp;   <a class="qtyBtn mines" href="javascript:doQty_ed(1);"><font size="5"><strong>-</strong></font>  </a>
                  <input id="qty_ed" type="text" class="w30" name="quantity" size="2" value="1" onkeydown="return acceptOnlyDigit(event,this)" />
                  <a class="qtyBtn plus" href="javascript:doQty_ed(0);"><font size="4"><strong>+</strong></font> </a>&nbsp;&nbsp; ชิ้น
                  <br>
                  <br>
                  <input type="button" value="แก้ไขจำนวนสินค้า" class="button" onclick="doeditcart()"/></a>
                  
		</p>
	</div>
	<script>
	function doeditcart(){
		var buyItemId_ed  =	document.getElementById("buyItemId_ed").value ;
	
		if(document.getElementById("qty").value!=""){
			$.ajax({
				type: "POST",
				url: "<?=url_Core::base()?>order/editcart/"+buyItemId_ed+"/"+document.getElementById("qty_ed").value,
				cache: false,
				data: "",
				success: function(msg){
					$.ajax({
						type: "POST",
						url: "<?=url_Core::base()?>order/maincart",
						cache: false,
						data: "",
						success: function(msg){
							
							//document.getElementById("qty_ed").value=1;
							//document.getElementById("mcart").innerHTML=msg;
							jQuery.fancybox.close();
							window.location.reload();
						}
					});
				}
			});
		}
	}
	</script>