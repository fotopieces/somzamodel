 <?php $catalogs=ORM::factory("catalog")->where("id",$objData->catalog_id)->find_all();
 $catalogName="";
 $catalogId="";
		foreach ($catalogs as $catalog){
			$catalogName=$catalog->name;
			$catalogId=$catalog->id;
		}?>
		<div align="center"><h2><?=$catalogName ?>sdf</h2></div>
			<?php if(commonfn::isAdmin()){?>
		
		<a href="#editCatalog" onclick="doeditCatalog('<?=$catalogId?>','<?=$catalogName ?>')" data-toggle="modal" role="button" class="btn btn btn-warning btn btn-mini "  ><i
							class="icon-pencil"></i>&nbsp; <b>แก้ไขหมวดสินค้า</b></a>		
		<a href="#deleteCatalog" onclick="deleteCatalog('<?=$catalogId?>')" data-toggle="modal" role="button" class="btn btn btn-danger btn btn-mini "  ><i
							class="icon-remove"></i>&nbsp; <b>ลบหมวดสินค้า</b></a>		
		<br><br>
		<?php }?>
		<h6>
		<div align="center">ระดับความยาก</div>
				 ง่ายมาก : <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" />     
				 &nbsp; &nbsp; ง่าย : <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" />
				&nbsp; &nbsp;ปานกลาง : <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" />
				&nbsp; &nbsp;ยาก : <img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" />
				&nbsp; &nbsp;ยากมาก : <img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><br>
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
	<?php 	$session = Session::instance(); ?>
		</script>
	
			<select name="paper" onchange="dopaper(this.value)">
			 <option value="N" <?php if($session->get('Paper')=="N"){ ?> selected="selected" <?php } ?> >กระดาษการ์ดธรรมดา</option>
			 <option value="Y" <?php if($session->get('Paper')=="Y"){?> selected="selected" <?php } ?> >กระดาษแบบมัน</option>
			</select><br>
			<font color="red">กระดาษการ์ดธรรมดา แผ่นละ 10 บาท ส่วน กระดาษแบบมัน 20 บาท</font>
		</div>
		</h6>
<?php if(commonfn::isAdmin()){?>


	<a href="#addNewItem" onclick="addnewItem('<?=$catalogId?>')" data-toggle="modal" role="button" class="btn btn btn-success  btn btn-mini "  ><i
							class="icon-plus-sign"></i>&nbsp; <b>เพิ่มสินค้า</b></a>		
<br><br>
<?php }?>


		 <?php 
 	$items=$objData->items;
 	$c=1;
 	foreach($items as $item){
 		
 ?>
 	<?php $plus=1;
		if($session->get('Paper')=="Y"){ 
			$plus=2;
		}
		?>

<div class="span2 navbar-inner" style="width: 200px;" align="center" >
<h5><?=$item->name ?><br></h5> <font size="2">ราคา 

			<?=(($item->price*$plus))?> 



บาท</font>
					
					<h6>
					
							 <b>ระดับความยาก</b> <br> 
          	     <?php if($item->status=="1"){?>
          	  <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" />     
          	     <?php }else if($item->status=="2"){ ?>
          	  <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" />
          	     <?php }else if($item->status=="3"){ ?>
          	  <img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" />
          	     <?php }else if($item->status=="4"){ ?>
          	  <img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt="" width="15" height="15" border="0" />
          	     <?php }else if($item->status=="5"){ ?>
          	   <img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" /><img src="<?=url::base()?>/model/images/icon_star.gif" alt=""  width="15" height="15" border="0" />
          	     <?php }?>
          	     
					</h6>	
					<p>
						<img src="<?=url::base()?>model/upload/<?=$item->pic ?>"
							class="img-polaroid" width="180px" height="180px" onclick="showImgs('<?=url::base()?>model/upload/<?=$item->pic ?>')" style="cursor: pointer;">
					</p>
					<p>
						<?php if(commonfn::isAdmin()){?>
						
						
						<a href="#editItem" onclick="editItemjs('<?=$catalogId ?>','<?=$item->id?>','<?=$item->name ?>','<?=$item->price ?>','<?=$item->status ?>')" data-toggle="modal" role="button" class="btn btn btn-info  btn btn-mini "  ><i
							class="icon-pencil"></i>&nbsp; <b>แก้ไข</b></a>		
							
						<a href="#deleteItem" onclick="deleteItemjs('<?=$catalogId ?>','<?=$item->id?>')" data-toggle="modal" role="button" class="btn btn btn-danger  btn btn-mini "  ><i
							class="icon-remove"></i>&nbsp; <b>ลบสินค้า</b></a>		
							<br>
							<br>
						
						<?php }?>
						<button class="btn btn-mini btn btn-warning " type="button" onclick="dobuy('<?=$item->id?>','<?=$item->price*$plus ?>','<?=$item->name ?>','model/upload/<?=$item->pic ?>','1','add')"><i class="icon-shopping-cart"></i>&nbsp;หยิบใส่ตะกร้า</button>
</p>
</div>

					

<?php $c++; }?>	


	
	
	
	
		