   <?php $plus=1;
		if(cookie::get("Paper")=="Y"){ 
			$plus=2;
		}
		$Oders=ORM::factory("listorderdb")
		->where("admin_id",commonfn::getUserId())
		->where("status","NEW")
		->find_all();
		$cout=0;
		$prices=0;
		foreach ($Oders as $Oder){
			$cout=$cout+$Oder->item_piece;
			$prices=$prices+(($Oder->item_price*$plus)*$Oder->item_piece);
		}
		?>
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"></div>
        <!--Breadcrumb Part End-->
        <h1>ตะกร้าสินค้า </h1>
        
        
        
        <form enctype="multipart/form-data" method="post" action="#">
          <div class="cart-info">
            <table>
              <thead>
                <tr>
                  <td width="5px">ลำดับ</td>
                  <td class="image">รูป</td>
                  <td class="name" width="400px">ชื่อสินค้า</td>
           
                  <td class="quantity">จำนวน</td>
                  <td class="price">ราคาต่อชิ้น</td>
                  <td class="total">ราคารวม</td>
                </tr>
              </thead>
              <tbody>
              
                  	<?php 
        
				$c=1;
				$sumprice=0;
				$sumpiece=0;
				$orderdb_id=0;
				foreach ($Oders as $Oder){
					$orderdb_id=$Oder->orderdb_id;
			//	$items=ORM::factory("item")->find($listOder->item_id);			
						?>
                <tr>
                  <td ><?=$c ?></td>
                  <td class="image"><a href=""><img src="<?=url::base()?>model/upload/<?=$Oder->item_pic ?>" width="45px" height="45px" /></a></td>
                  <td class="name"><a href=""><?=$Oder->item_name ?></a></td>
         
                  <td class="quantity"><?=$Oder->item_piece ?>
                    &nbsp;
                    <a class="button fancybox" onclick="doedititemcart('<?=$Oder->item_id ?>','<?=$Oder->item_name ?>','<?=$Oder->item_piece ?>')" href="#inlinebuyedititem">แก้ไข</a></a>&nbsp;
          
                     <a class="button" href="javascript:dodelcart(<?=$Oder->item_id ?>)">ลบ</a>
                    <script type="text/javascript">
                    function doedititemcart(id,name,p){
                    	
        				document.getElementById("itemName_ed").innerHTML=name;
        				document.getElementById("buyItemId_ed").value=id;
        				document.getElementById("qty_ed").value=p;
        				
        			}
					function dodelcart(id){
						if(confirm("ต้องการลบหรือไม่")){  
							
							$.ajax({
								type: "POST",
								url: "<?=url_Core::base()?>order/delcart/"+id,
								cache: false,
								data: "",
								success: function(msg){
									window.location.reload();
								}
							});
						}
					}
					function dodelall(id){
						if(confirm("ต้องการลบหรือไม่")){  
							
							$.ajax({
								type: "POST",
								url: "<?=url_Core::base()?>order/delorder/"+id,
								cache: false,
								data: "",
								success: function(msg){
									window.location.reload();
								}
							});
						}
					}
                    </script>
                  
                    </td>
                  <td class="price"><?=$Oder->item_price*$plus ?> บาท</td>
                  <td class="total"><?=($Oder->item_price*$plus)*$Oder->item_piece ?> บาท</td>
                </tr>
             <?php }?>
              
              </tbody>
            </table>
          </div>
        </form>
      
     
        <div class="cart-total">
          <table id="total">
            <tbody>
            
              <tr>
                <td class="right"><b>จำนวน:</b></td>
                <td class="right"><?=$cout ?> ชิ้น</td>
              </tr>
              <tr>
                <td class="right"><b>รวม:</b></td>
                <td class="right"><?=$prices ?> บาท</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="buttons">
          <div class="right"><a class="button" href="<?=url::base()?>order/ckout">สั่งซื้อสินค้า</a></div>
          <div class="center">
          <a class="button" href="javascript:window.history.back()">เลือกสินค้าต่อ</a>
          <a class="button" href="javascript:dodelall('<?=$orderdb_id?>')">ลบสินค้าทั้งหมดในตะกร้า</a>
          
          </div>
        </div>
      