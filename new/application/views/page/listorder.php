<div align="left" style="width: 98%" >
<div align="center"><h2>รายการสินค้า</h2></div>

		<div id="myInstance1" >
		<table style="width: 100%"  border="0" style="border-color: #CCCCCC">
		<?php 	
					
					$listoders=ORM::factory("ordersdb")->find($objData->id);
				
					?>
							<?php $adminName=ORM::factory("admin")->find($listoders->admin_id);	?>

				<tr  bgcolor="#FFE8C4">
					<td width="20%">ชื่อที่อยู่</td>
					<td colspan="5"><?=$listoders->address?></td>
				</tr>
				<tr  bgcolor="#FFE8C4">
					<td>เบอร์โทร</td>
					<td colspan="5"><?=$listoders->tel?></td>
				</tr>
				<tr  bgcolor="#FFE8C4">
					<td>วันที่ (yyyy-MM-dd)</td>
					<td colspan="5"><?=$listoders->day?></td>
				</tr>
				<tr  bgcolor="#FFE8C4">
					<td>แบบกระดาษ</td>
					<td colspan="5">
					
					<? if($listoders->type==1){
						echo "กระดาษธรรมดา";
					}else{
						echo "กระดาษมัน";
					}
					?>
					
					
					</td>
				</tr>
				</table>
			<table border="0"  style="border-color: #CCCCCC" style="width: 100%">
				<tr height="40px" bgcolor="#FF6600">
				<td width="3%" align="center"><font color="#FFFFFF" > ลำดับ</font></td>
				<td width="3%" align="center"><font color="#FFFFFF" >รูป</font></td>
				<td width="50%" align="center"><font color="#FFFFFF" >ชื่อสินค้า</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >ราคาต่อชิ้น/บาท</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >จำนวน</font></td> 
				<td width="10%" align="center"><font color="#FFFFFF" >รวม</font></td> 
				
				</tr>
				<?php 	$listOders=ORM::factory("listorderdb")
							->where("orderdb_id",$objData->id)
							->find_all();
				$c=1;
				$sumprice=0;
				$sumpiece=0;
				$status="";
				$discout=0;
				$minus=0;
				$minusOut=1;
				foreach ($listOders as $listOder){
					$discout = $discout+(($listOder->item_price*$objData->typePaper)*$listOder->item_piece);
						if($objData->typePaper==1){
							if($discout>=600){
								$minus=3;
								$minusOut=10;
							}
						}else{
							if($discout>=1200){
								$minus=5;
								$minusOut=20;
							}
						}
					
				}
				
				foreach ($listOders as $listOder){
				?>
				<?php if ($c%2==0){?>
				<tr style="background-color: #F7F7F7;">
				<?php }else{?>
				<tr>
				<?php }?>
						<td align="center"><?=$c?></h6></td>
						<td><img src="<?=url::base()?>model/upload/<?=$listOder->item_pic ?>"
							class="img-polaroid" width="25" height="25px" onclick="showImgs('<?=url::base()?>model/upload/<?=$listOder->item_pic ?>')" style="cursor: pointer;"></td>
						<td>&nbsp;&nbsp;  <?=$listOder->item_name ?></h6></td>
						<td align="center"><?=($listOder->item_price*$objData->typePaper)-((($listOder->item_price*$objData->typePaper)/$minusOut)*$minus) ?></h6></td>
						<td align="center"><?=$listOder->item_piece ?></h6></td>
						<td align="center"><?=(($listOder->item_price*$objData->typePaper)-((($listOder->item_price*$objData->typePaper)/$minusOut)*$minus))*$listOder->item_piece ?></h6></td>
						
				</tr>
				<?php 
				
				$status=$listOder->status;
				$sumprice = $sumprice+((($listOder->item_price*$objData->typePaper)-((($listOder->item_price*$objData->typePaper)/$minusOut)*$minus))*$listOder->item_piece);
				$sumpiece = $sumpiece+$listOder->item_piece;
				$c++; }?>
				
				<?php
				$oders=ORM::factory("ordersdb")
				->find($objData->id);
				 
				
				?>
					</tr>
				<tr  style="background-color: #FF9900;">
				<td colspan="4" align="right">รวม&nbsp;&nbsp;&nbsp;&nbsp;</h6></td>
				<td align="center"><?=$sumpiece?> ชิ้น</h6></td>
				<td align="center"><?=$sumprice?> บาท</h6></td>
				
						
						
							
					
				</tr>
				
				<tr style="background-color: #FFE8C4;"  >
				<td colspan="4" align="right">ค่าส่ง&nbsp;&nbsp;&nbsp;&nbsp;</h6></td>
				<td align="center">
				<?if($oders->sendtype==70){
					echo "EMS";
				}else if($oders->sendtype==50){
					echo "ธรรมดา";
				}else{
					echo "นัดรับสินค้า";
				}
				?>
				</h6></td>
				<td align="center"><?=$oders->sendtype?> บาท</h6></td>
				
						
							
					
				</tr>
				<tr  style="background-color: #FF9900;">
				<td colspan="5" align="right">รวมราคา + ค่าส่ง&nbsp;&nbsp;&nbsp;&nbsp;</td>
			
				<td align="center"><?=$sumprice+$oders->sendtype?> บาท</td>
				
						
						
							
					
				</tr>
			</table>
			<br>
			<br>
			<div align="center">
			
			<?php if($status=="WAIT"||$status==""){?>
							<a  href="<?=url::base()?>order/sendorder/<?=$objData->id ?>" data-toggle="modal" role="button" class="btn btn btn-success btn btn-warning "  ><i
							class="icon-gift"></i>&nbsp; <b>ส่งสินค้าให้ลูกค้า</b></a>
							<a  href="<?=url::base()?>detail/order/WAIT" data-toggle="modal" role="button" class="btn  "  ><i
							class="icon-share-alt"></i>&nbsp; <b>กลับ</b></a>
			<?php }else{?>
							<a  href="<?=url::base()?>detail/order/SEND" data-toggle="modal" role="button" class="btn  "  ><i
							class="icon-share-alt"></i>&nbsp; <b>กลับ</b></a>
			<?php }?>
			</div>
			
	    </div>

</div>	
	
	
	
	
	
	
	
	
	
		