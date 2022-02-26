<div align="left" style="width: 98%" >
<div align="center"><h2>ตะกร้าสินค้า</h2></div>
		<div align="center"> <font size="2"><b>คุณต้องการกระดาษแบบใด >>>เลือก>>></b></font>
		
		<script>
	function dopaper(type){
		$.ajax({
			type: "GET",
			url: "<?=url_Core::base()?>detail/type/"+type,
			cache: false,
			data: "",
			success: function(msg){
				
				window.location.reload();
			}
		});
		}
	<?php 	$session = Session::instance();?>
		</script>
	
			<select name="paper" onchange="dopaper(this.value)">
			 <option value="N" <?php if($session->get('Paper')=="N"){ ?> selected="selected" <?php } ?> >กระดาษการ์ดธรรมดา</option>
			 <option value="Y" <?php if($session->get('Paper')=="Y"){?> selected="selected" <?php } ?> >กระดาษแบบมัน</option>
			</select><br>
			<font color="red">กระดาษการ์ดธรรมดา แผ่นละ 10 บาท ส่วน กระดาษแบบมัน 20 บาท</font>
		</div>
		
		<?php $plus=1;
		if($session->get('Paper')=="Y"){ 
			$plus=2;
		}
		?>
		<div id="myInstance1" >
			<table class="table table-bordered" >
				<tr height="40px" bgcolor="#0088CC" style="background-color: #FF9900">
				<td width="3%" align="center"><font color="#FFFFFF" > ลำดับ</font></td>
				<td width="3%" align="center"><font color="#FFFFFF" >รูป</font></td>
				<td width="50%" align="center"><font color="#FFFFFF" >ชื่อสินค้า</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >ราคาต่อชิ้น/บาท</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >จำนวน</font></td> 
				<td width="10%" align="center"><font color="#FFFFFF" >รวม</font></td> 
				<td width="40%" align="center"><font color="#FFFFFF" >แก้ไข/ลบ</font></td> 
				</tr>
				<?php 
				$session = Session::instance();
					$listOders=ORM::factory("listorderdb")
		->where("admin_id",$session->get('user_id'))
		->where("status","NEW")
		->find_all();
				$c=1;
				$sumprice=0;
				$sumpiece=0;
				foreach ($listOders as $listOder){
				?>
				<?php if ($c%2==0){?>
				<tr style="background-color: #F7F7F7;">
				<?php }else{?>
				<tr>
				<?php }?>
						<td align="center"><h6><?=$c?></h6></td>
						<td><img src="<?=url::base()?>model/upload/<?=$listOder->item_pic ?>"
							class="img-polaroid" width="25" height="25px" onclick="showImgs('<?=url::base()?>model/upload/<?=$listOder->item_pic ?>')" style="cursor: pointer;"></td>
						<td><h6>&nbsp;&nbsp;  <?=$listOder->item_name ?></h6></td>
						<td align="center"><h6><?=($listOder->item_price*$plus) ?></h6></td>
						<td align="center"><h6><?=$listOder->item_piece ?></h6></td>
						<td align="center"><h6><?=($listOder->item_price*$plus)*$listOder->item_piece ?></h6></td>
						<td align="center">
							<a  onclick="dobuy('<?=$listOder->item_id?>','<?=$listOder->item_price*$plus ?>','<?=$listOder->item_name ?>','model/upload/<?=$listOder->item_pic ?>','<?=$listOder->item_piece?>','edit')" data-toggle="modal" role="button" class="btn btn btn-warning btn btn-mini "  ><i
							class="icon-wrench"></i>&nbsp; <b>แก้ไข</b></a>

							<a  onclick="delcart('<?=$listOder->item_id?>','<?=$listOder->item_price ?>','<?=$listOder->item_name ?>','model/upload/<?=$listOder->item_pic ?>','<?=$listOder->item_piece?>')" data-toggle="modal" role="button" class="btn btn btn-danger btn btn-mini "  ><i
							class="icon-remove-circle"></i>&nbsp; <b>ลบ</b></a>
							
							</td>
				</tr>
				<?php 
				$sumprice = $sumprice+($listOder->item_price*$plus)*$listOder->item_piece;
				$sumpiece = $sumpiece+$listOder->item_piece;
				$c++; }?>
				<?php if($c==1){?>
				<tr>
					<td colspan="7" align="center"><div align="center"><font color="red"> ไม่มีรายการสินค้าในตะกร้า</font></div></td>
				</tr>
				<?php }?>
				<tr style="background-color: #FFD595">
				<td colspan="4" align="center"><h6>รวม</h6></td>
				<td align="center"><h6><?=$sumpiece?></h6></td>
				<td align="center"><h6><?=$sumprice?></h6></td>
				<td align="center"><h6>บาท</h6></td>
						
							
					
				</tr>
			</table>
			<div align="center">
			<a  onclick="dodelallcart()" data-toggle="modal" role="button" class="btn btn btn-danger btn btn-warning"  ><i
							class="icon-remove-circle"></i>&nbsp; <b>ลบสิ้นค้าทั้งหมดออกจากตะกร้าสินค้า</b></a>
							<a  onclick="doconfimcart('<?=$sumprice?>','<?=$sumpiece?>')" data-toggle="modal" role="button" class="btn btn btn-success btn btn-warning "  ><i
							class="icon-shopping-cart"></i>&nbsp; <b>สั่งซื้อสินค้า</b></a>
			</div>
			
	    </div>

</div>	
	
	
	
	
	
	
	
	
	
		