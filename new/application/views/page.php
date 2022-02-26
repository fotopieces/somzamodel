
<span style="height: 62px; width: 600px;">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="https://www.facebook.com/PaperModelSOMZA" data-width="800" data-height="250" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
</span>

<div align="left" style="width: 98%" >
<?php if(commonfn::isAdmin()){?>

		<a href="#iconModal" data-toggle="modal" role="button" class="btn btn btn-success btn btn-mini "  ><i
							class="icon-search"></i>&nbsp; <b>เลือกไอคอน</b></a>			
		<div>	
		<script type="text/javascript" src="<?=url::base()?>myEditer/Editer.js"></script>
          <script type="text/javascript">
				bkLib.onDomLoaded(function() {
					 var myNicEditor = new nicEditor();
					 myNicEditor.setPanel('myNicPanel');
					 myNicEditor.addInstance('myInstance1');
					 
					//nicEditors.allTextAreas()

					});
					function savePage(){
						document.getElementById("detail").value=document.getElementById("myInstance1").innerHTML;
						document.getElementById("formPage").submit();
						//document.getElementById("formPage").submit();
					}
		 </script>
 		<form name="formPage" id="formPage" action="<?=url::base()?>detail/saveedit" method="post">
 		 <div id="myNicPanel" style="width: 100%;"></div>
		<div id="myInstance1" style="border:1px solid gray;">
		<?=$data->detail ?>
		</div>
		 	<input type="hidden" name="id" id="id" value="<?=$data->id ?>" />
		 	<input type="hidden" name="icn" id="icn" value="<?=$data->icon ?>" />
		 	<input type="hidden" name="detail" id="detail" value="" />
		</form>
		<div align="center">
			<a onclick="savePage()" role="button" class="btn btn btn-warning btn btn-mini"><i class="icon-wrench"></i>&nbsp; <b>บันทึกข้อมูล</b></a>
		</div>
	</div>
<?php }else{?>
 	 <div id="myNicPanel" style="width: 100%;"></div>
		<div id="myInstance1" >
		<?=$data->detail ?>
	 </div>
<?php }?>		
</div>	
	
	
	
	
	
	
	
	
	
		