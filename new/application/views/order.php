<div align="left" style="width: 98%" >
<div align="center"><h2>
<?php  if($objData->status=="WAIT"){?>
สินค้าที่ยังไม่ได้ส่งให้ลูกค้า
<?php }else{?>
สินค้าที่ส่งให้ลูกค้าแล้ว
<?php }?>



</h2></div>

		<div id="myInstance1" >
			<table class="table table-bordered">
				<tr height="40px" bgcolor="#FF6600">
				<td width="3%" align="center"><font color="#FFFFFF" > ลำดับ</font></td>
			
				<td width="50%" align="center"><font color="#FFFFFF" >ชื่อลูกค้า</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >วันที่</font></td>
				<td width="10%" align="center"><font color="#FFFFFF" >รายละเอียด</font></td> 
				<td width="10%" align="center"><font color="#FFFFFF" >ลบ</font></td> 

				</tr>
				<?php 	$listOders=ORM::factory("ordersdb")
				->where("status",$objData->status)
				->find_all();
			$c=1;
				foreach ($listOders as $listOder){
				?>
				<?php if ($c%2==0){?>
				<tr style="background-color: #F7F7F7;">
				<?php }else{?>
				<tr>
				<?php }?>
				<td width="3%" align="center"><h6> <?=$c ?></h6></td>
				<td width="50%" align="left"><h6> <?=$listOder->address ?></h6></td>
				<td width="10%" align="center"><h6> <?=$listOder->day ?></h6></td>
				<td width="10%" align="center"><h6><a  href="<?=url::base()?>detail/listorder/<?=$listOder->id ?>" data-toggle="modal" role="button" class="btn btn btn-success btn btn-mini "  ><i
							class="icon-search"></i>&nbsp; <b>ดูรายละเอียด</b></a></h6></td> 
				<td width="10%" align="center"><h6> 
				<a  onclick="dodelorder('<?=$listOder->id?>')" data-toggle="modal" role="button" class="btn btn btn-danger btn btn-mini "  ><i
							class="icon-remove-circle"></i>&nbsp; <b>ลบ</b></a>
							</h6></td> 
				</tr>
				<?php $c++; }?>
				<tr bgcolor="#FF9900">
				<td colspan="5" align="center"><h6></h6></td>
				</tr>
			</table>
		
			
	    </div>

</div>	
	
	
	
	
	
	
	
	
	
		