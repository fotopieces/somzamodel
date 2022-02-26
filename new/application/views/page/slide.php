  <?php	$details=ORM::factory("pagedb")
        	//->where("id=","43")
        	->find($pageid);
        ?>
         <section class="slider-wrapper">
          <div id="slideshow" class="nivoSlider"> 
             <?php $slides=ORM::factory("slide")->find_all();
             foreach ($slides as $slide){
             ?>
             
          <a class="nivo-imageLink" href="#"><img src="<?=url::base()?>model/upload/<?=$slide->picname ?>" alt="slide-1" /></a> 
       
          <?php }?>
          </div>
        </section>
        <?php if(commonfn::isAdmin()){?>
<form id="fmSlide" action="<?=url::base()?>admin/addslide" method="post" enctype="multipart/form-data">
รูปหัวสไลต์ : <input type="file" id="slidePic" name="slidePic"><br>

<a class="button" href="javascript:addslide()">บันทึก</a>
<br><br>
</form>
<table>
<?php  
$countslide=0;
foreach ($slides as $slide){
  if(($countslide%2)==0){
?>
	<tr>
	
<?php 
}?>
<td valign="top">(<?=$countslide+1?>)<br><a href="<?=url::base()?>admin/delete/<?=$slide->id?>">ลบ</a> </td>
<td width="500px"><img src="<?=url::base()?>model/upload/<?=$slide->picname ?>" width="400px" height="200px"  /></td>
<?php
$countslide++;

}?>
</table>

<script type="text/javascript">
        function addslide(){
            if(document.getElementById("slidePic").value!=""){
            	document.getElementById("fmSlide").submit();
            }
        	
         }
</script>	
        <?php }?>
         	
        <div class="clear"></div>