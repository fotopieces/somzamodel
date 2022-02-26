<div id="iconModal" class="modal hide fade " tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header btn-warning " >
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">×</button>
							<h3 id="myModalLabel">เลือกไอคอน</h3>
						</div>
						<div class="modal-body" align="center">
						
						<table >
							<tr>
							<?php 
							$icons=ORM::factory("icondb")->find_all();	
							$count_icon=0;
							foreach ($icons as $icon){
							$iconName=preg_split("/\-/", $icon->name);
							?>
									
									<td><input id="icon" name="icon" type="radio" value="<?=$icon->name ?>"> </td>
									<td>&nbsp;<i class="<?=$icon->name ?>"></i>&nbsp;<?=$iconName[1] ?>&nbsp;</td>
						    <?php  
						    $count_icon++;
							    if(($count_icon%3)==0){
							    	echo "</tr><tr>";
							    }
							   
							}?>
							</tr>
						</table>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">ยกเลิก</button>
							<button onclick="doicon()" class="btn btn-warning">เลือก</button>
						</div>
						<script>
							function doicon(){
								var radioButtons = document.getElementsByName("icon");
								var data = "";
								for (var x = 0; x < radioButtons.length; x ++) {
									        if (radioButtons[x].checked) {
									           data=radioButtons[x].value;
									        }
									      }
								if(data==""){
									alert("กรุณาเลือกไอคอน");
								}else{
									document.getElementById("icn").value=data;
									$("#iconModal").modal("hide");
								}
								
									
								
							}
						</script>
	</div>