<div align="left" style="width: 98%" >
<div align="center"><h2>ตอบ</h2></div>
<a id="board"  href="<?=url::base()?>detail/addans/<?=$objData->id?>"  data-toggle="modal" role="button" class="btn btn btn-success btn btn-warning "  ><i
							class="icon-pencil"></i>&nbsp; <b>ตอบกะทู้</b></a>
							          
							
<a  href="<?=url::base()?>detail/bord" data-toggle="modal" role="button" class="btn  "  ><i
							class="icon-share-alt"></i>&nbsp; <b>กลับ</b></a>
		<div id="myInstance1" >
			<table class="table table-bordered">
				<tr height="40px" bgcolor="#FF6600">
				<?php $board=ORM::factory("board")->find($objData->id);	?>
				<td width="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF" size="3" ><b><?=$board->name?></b></font><br>&nbsp;&nbsp;&nbsp;&nbsp;<font size="2">(โดย: <?=$board->admin->user?>&nbsp;&nbsp;เมื่อ: <?=$board->day?> &nbsp;&nbsp; <?=$board->time?>)</font></td>
		
				</tr>
				<tr>
					<td align="left"> &nbsp;&nbsp;&nbsp;&nbsp;<?=$board->detail ?></td>
				</tr>
				<tr bgcolor="#FFD595">
					<td colspan="2" align="center"><h6></h6></td>
				</tr>
				<?php
				$ansers=ORM::factory("anser")
					  ->where("board_id=",$board->id)	
		              ->find_all();	
				$cc=1;
				foreach ($ansers as $anser){ ?>
				<?php if ($cc%2==0){?>
				<tr style="background-color: #F7F7F7;" height="20px" >
				<?php }else{?>
				<tr>
				<?php }?>
					<td align="left"> 
					<b>&nbsp;&nbsp;&nbsp;&nbsp;
					<?php if ($anser->admin->user==""){?>
					ผู้ใช้ทั่วไป: ตอบ</b>
					<?php }else{?>
					<?=$anser->admin->user?>: ตอบ</b>
					<?php }?>
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$anser->detail?>
					<?php if(commonfn::isAdmin()){?>
					<a href="<?=url::base()?>detail/delans/<?=$anser->id?>/<?=$board->id?>"  data-toggle="modal" role="button" class="btn btn btn-danger btn btn-mini "  ><i
							class="icon-remove"></i>&nbsp; <b>ลบคำตอบ</b></a>
							<?php }?>
					</td>
				</tr>
				<?php $cc++;}?>
				
			</table>
			
			
	    </div>

</div>	
	
	
	
	
	
	
	
	
	
		