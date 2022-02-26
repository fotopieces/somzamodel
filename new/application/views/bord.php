<div align="left" style="width: 98%" >
<div align="center"><h2>เว็บบอร์ด</h2></div>
<a href="<?=url::base()?>board/add"  id="board"   data-toggle="modal" role="button" class="btn btn btn-success btn btn-warning "  ><i
							class="icon-pencil"></i>&nbsp; <b>ตั้งหัวข้อใหม่</b></a>
		<div id="myInstance1" >
			<table class="table table-bordered">
				<tr height="40px" bgcolor="#FF6600">
				<td width="3%" align="center"><font color="#FFFFFF" > ลำดับ</font></td>
				<td width="97%" align="center"><font color="#FFFFFF" >หัวข้อ</font></td>
		
				</tr>
				<?php $boards=ORM::factory("board")->find_all();
				$c=1;
					foreach ($boards as $board){
				?>
				<?php if ($c%2==0){?>
				<tr style="background-color: #F7F7F7;" height="20px" >
				<?php }else{?>
				<tr>
				<?php }?>
				
				<td width="3%" align="center"> <?=$c ?></td>
				<td width="97%" align="left" ><font size="2"> &nbsp;&nbsp; <a href="<?=url::base()?>detail/ans/<?=$board->id?>"><b><?=$board->name?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font><font size="1">(โดย: <?=$board->admin->user?>&nbsp;&nbsp;เมื่อ: <?=$board->day?> &nbsp;&nbsp; <?=$board->time?>)</font>
				 <?php if(commonfn::isAdmin()){?>
				 <a href="<?=url::base()?>detail/delboard/<?=$board->id?>"  data-toggle="modal" role="button" class="btn btn btn-danger btn btn-mini "  ><i
							class="icon-remove"></i>&nbsp; <b>ลบกะทู้</b></a>
              <?php }?>
				
				</td>
				
				</tr>
			<?php  $c++;}?>
				<tr bgcolor="#FFD595">
					<td colspan="2" align="center"><h6></h6></td>
				</tr>
			</table>
			
			
	    </div>

</div>	
	
	
	
	
	
	
	
	
	
		