  <?php	$details=ORM::factory("pagedb")
        	//->where("id=","43")
        	->find($pageid);
        ?>
         

     
        <?php if(commonfn::isAdmin()&&$details->id!=61){?>
        	<a href="javascript:savePage()"><img src="<?=url::base()?>model/images/save.png" width="30px" height="30px" title="บันทึก" /></a>
        		
     <form name="formPage" id="formPage" action="<?=url::base()?>detail/saveedit" method="post">
         <div id="myNicPanel" style="width: 100%;"></div>
			<div id="myInstance1" >
				<?=$details->detail ?>
			</div>
		<input type="hidden" name="detail" id="detail" value="" />
		<input type="hidden" name="id" id="id" value="<?=$details->id ?>" />
	</form>
	<script type="text/javascript">
	function savePage(){
		document.getElementById("detail").value=document.getElementById("myInstance1").innerHTML;
		document.getElementById("formPage").submit();
		//document.getElementById("formPage").submit();
	}
	</script>
		
        <?php }else{?>
        <?php if($details->id==61){?>
        <iframe src="<?=url::base()?>welcome/sendpage" width="98%" height="700px"></iframe>
        <?}else{?>
         	<?=$details->detail ?>
        <?php }?>
        <?php }?>
        <div class="clear"></div>