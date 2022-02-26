    <?php $plus=1;
		if(cookie::get("Paper")=="Y"){ 
			$plus=2;
		}
		?>
 <?php $Oders=ORM::factory("listorderdb")
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
 
 
 <section id="cart">
          <div class="heading">
            <h4><img width="32" height="32" alt="" src="<?=url::base()?>resource/image/cart-bg.png"></h4>
            <a><span id="cart-total"><?=$cout ?> ชิ้น  : ราคา   <?=$prices?> บาท</span></a> </div>
          <div class="content">
       
            <div class="checkout"><a class="button" href="<?=url::base()?>order/cart">ตะกร้าสินค้า</a> &nbsp; <a class="button" href="<?=url::base()?>order/ckout">สั่งซื้อ</a></div>
          
            <div class="mini-cart-info" id="maincart">
              <table>
              	<?php 
        
				$c=1;
				$sumprice=0;
				$sumpiece=0;
				foreach ($Oders as $Oder){
			//	$items=ORM::factory("item")->find($listOder->item_id);			
						?>
			
	
		                <tr>
		                  <td class="image"><a ><img src="<?=url::base()?>model/upload/<?=$Oder->item_pic ?>" width="47px" height="47px" /></a></td>
		                  <td class="name"><a ><?=$Oder->item_name ?></a></td>
		                  <td class="quantity">x&nbsp;<?=$Oder->item_piece ?></td>
		                  <td class="total"><?=($Oder->item_price*$plus)*$Oder->item_piece ?></td>
		                  <td class="remove"></td>
		                </tr>
				<? }?>
                

              </table>
            </div>
            <div class="mini-cart-total">
              <table>
                <tr>
                  <td class="right"><b>ยอดรวม</b></td>
                  <td class="right"><?=$prices ?> บาท</td>
                </tr>
              </table>
            </div>
           
          </div>
        </section>