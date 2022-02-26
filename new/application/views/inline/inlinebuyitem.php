
	<div align="center" id="inlinebuyitem" style="width:250px;display: none;" >
<!-- 	<a href="javascript:jQuery.fancybox.close();">Close iframe parent</a> -->
		<h3>ท่านต้องการซื้อ  </h3>
		<input type="hidden" id="buyItemId" value="">
		<div id="itemName" ></div>
		<br>
		<p>
			จำนวน  &nbsp;&nbsp;   <a class="qtyBtn mines" href="javascript:doQty(1);"><font size="5"><strong>-</strong></font>  </a>
                  <input id="qty" type="text" class="w30" name="quantity" size="2" value="1" onkeydown="return acceptOnlyDigit(event,this)" />
                  <a class="qtyBtn plus" href="javascript:doQty(0);"><font size="4"><strong>+</strong></font> </a>&nbsp;&nbsp; ชิ้น
                  <br>
                  <br>
                  <input type="button" value="หยิบลงตะกร้า" class="button" onclick="doaddcart()"/></a>
		</p>
	</div>
	<script>
	function doaddcart(){
		var buyItemId  =	document.getElementById("buyItemId").value ;
	
		if(document.getElementById("qty").value!=""){
			$.ajax({
				type: "POST",
				url: "<?=url_Core::base()?>order/addcart/"+buyItemId+"/"+document.getElementById("qty").value,
				cache: false,
				data: "",
				success: function(msg){
					$.ajax({
						type: "POST",
						url: "<?=url_Core::base()?>order/maincart",
						cache: false,
						data: "",
						success: function(msg){
							
							document.getElementById("qty").value=1;
							document.getElementById("mcart").innerHTML=msg;
							jQuery.fancybox.close();
						}
					});
				}
			});
		}
	}
	</script>