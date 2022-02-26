<div>
  <div align="center">
    <table width="700" >
      <tr bgcolor="#FF6600" height="40px">
        <td width="63" ><div align="center"><font color="#FFFFFF" face="Tahoma"><strong>ลำดับ</strong></font></div></td>
        <td width="176" ><div align="center"><font color="#FFFFFF"  face="Tahoma"><strong>รายชื่อสมาชิก</strong></font></div></td>
        <td width="117" ><div align="center"><font color="#FFFFFF"  face="Tahoma"><strong>เบอร์โทร</strong></font></div></td>
        <td width="89" ><div align="center"><font color="#FFFFFF"  face="Tahoma"><strong>email</strong></font></div></td>
        <td width="231" ><div align="center"><font color="#FFFFFF"  face="Tahoma"><strong>ที่อยู่</strong></font></div></td>
      </tr>
    
       <?php $i=1;
       $admins=ORM::factory("admin")
       ->find_all();
				 foreach ($admins as $admin){
				 	$bg="#DDDDDD";
				 	if($i%2==0){
				 		$bg="#BBBBBB";
				 	}
				 	?>
				 <tr bgcolor="<?=$bg ?>">
					<td ><div align="center">
					  <?=$i ?>
					</div></td>
	                <td ><?=$admin->name?></td>
	                <td ><div align="center">
	                  <?=$admin->tel?>
	                </div></td>
	                <td ><?=$admin->email?></td>
	                <td ><?=$admin->address?></td>
                </tr>
                  <?php $i++; } ?> 
    </table>
  </div>
</div> 