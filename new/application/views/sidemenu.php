 <div class="span3 bs-docs-sidebar " align="center">
 
 
 <font size="5">
<img style="width: 243px; height: 50px; " src="http://www.somzamodel.com/upload/images/935639294820131.bmp">
</font>
<a href="#" ><img border="0" src="http://counter.rapidcounter.com/counter/1361924152/imgo"; ALIGN="middle" HSPACE="4" VSPACE="2"></a><script src=http://counter.rapidcounter.com/script/1361924152></script><br>

	<?php 
	$session = Session::instance();
	$plus=1;
	if($session->get('Paper')=="Y"){
		$plus=2;
	}	
	
	
	$listOders=ORM::factory("listorderdb")
		->where("admin_id",$session->get('user_id'))
		->where("status","NEW")
		->find_all();
				$c=1;
				$sumprice=0;
				$sumpiece=0;
				foreach ($listOders as $listOder){
					$sumprice = $sumprice+(($listOder->item_price*$plus)*$listOder->item_piece);
					$sumpiece = $sumpiece+$listOder->item_piece;
				}
			
				?>
							
     <ul class="nav nav-list " style="background-color: #F8F8F8;">
			          <li class="active"><a><b>สินค้าในตระกร้า <?=$sumpiece ?> ชิ้น รวม <?=$sumprice ?> บาท</b></a></li>  
			            <li style="text-align: left;"><a href="<?=url::base()?>detail/cart"><i class="icon-shopping-cart"></i>&nbsp;&nbsp;<b>ดูรายการสินค้าในตะกร้า</b></a></li>
								 <?php if(commonfn::isAdmin()){?>
								<li style="text-align: left;"><a href="<?=url::base()?>detail/order/WAIT">  <i class="icon-check"></i>&nbsp;&nbsp;  <b>รายการที่ลูกค้าได้สั่งซื้อ</b></a></li>
								<li style="text-align: left;"><a href="<?=url::base()?>detail/order/SEND"><i class="icon-envelope"></i>&nbsp;&nbsp;<b>รายการที่จัดส่งให้แล้ว</b></a></li>
								<li style="text-align: left;"><a href="<?=url::base()?>detail/user"><i class="icon-user"></i>&nbsp;&nbsp;<b>รายชื่อสมาชิก</b></a></li>
								<?php } ?>
</ul>
 
 <ul class="nav nav-list " style="background-color: #F8F8F8;">
			          <li class="active"><a><b>รายการสินค้า</b></a></li>  
			            <li style="text-align: left;"><a href="<?=url::base()?>detail/page/61"><i class=" icon-hand-right"></i>&nbsp;&nbsp;<b>รายการสินค้าที่จัดส่งให้ลูกค้าแล้ว</b></a></li>
			            <li style="text-align: left;"><a  href="#" onclick="window.open('http://track.thailandpost.co.th/trackinternet/Default.aspx')"><i class=" icon-hand-right"></i>&nbsp;&nbsp;<b>ตรวจสอบการส่งสินค้า</b></a></li>
			            <li style="text-align: left;"><a href="<?=url::base()?>item/page/107"><i class=" icon-hand-right"></i>&nbsp;&nbsp;<b>สมุด แฮนด์เมด แนวๆ</b></a></li>
</ul>
 <ul class="nav nav-list  " style="background-color: #F8F8F8;">
			          <li class="active"><a><b>รายการสินค้า</b></a></li>
			          <?php if(commonfn::isAdmin()){?>
			          <li><a href="#addNewCatalog" data-toggle="modal"><i class="icon-plus"></i>เพิ่มหมวดสินค้า</a></li>
			          <?php }?>
			        <?      
		            $catalogs=ORM::factory("catalog")->find_all();
		            $countRow=0;
		      		foreach ($catalogs as $catalog){
		 			 ?> 
			          <li style="text-align: left;"><a href="<?=url::base()?>item/page/<?=$catalog->id ?>"><i class=" icon-star-empty"></i>&nbsp;&nbsp;<b><?=$catalog->name ?></b></a></li>
			        <?php }?>
</ul>
</div>


