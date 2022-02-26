    
         <script type="text/javascript">
			function doQty(id){
				//if(document.getElementById("qty").value!=1){
			
				//	if(id==1){
				//		document.getElementById("qty").value=parseInt(document.getElementById("qty").value)-1;
				//	}
				//	if(id==0){
				//		document.getElementById("qty").value=parseInt(document.getElementById("qty").value)+1;
				//	}
				//}else{
				//	if(id==0){
				//		document.getElementById("qty").value=parseInt(document.getElementById("qty").value)+1;
				//	}
				//}
			}
			function doedititems(cat,id,name,price,status){
				//alert(document.getElementById("catalog_id_item_edit").value);
				document.getElementById("catalog_id_item_edit").value=cat;
				document.getElementById("edit_item_id").value=id;
				document.getElementById("edit_itemName").value=name;
				document.getElementById("edit_itemPrice").value=price;
				document.getElementById("edit_statusItem").value=status;
			}
        </script>
     <div class="clear"></div>
        <div class="breadcrumb"> หมวดสินค้า </div>
      
        <h1><?=$catalogsName?></h1>
        
        	<div align="center"> <font size="2"><b>คุณต้องการกระดาษแบบใด >>>เลือก>>></b></font>
		
		<script>
	function dopaper(type,id){
		$.ajax({
			type: "GET",
			url: "<?=url_Core::base()?>detail/type/"+type,
			cache: false,
			data: "",
			success: function(msg){
				window.location="<?=url::base()?>item/p/"+id;
			}
		
		});
		//window.location.reload();
		}
		</script>
		<br>
		
	<input type="radio"  onclick="dopaper('N','<?=$catalogsId?>')" <?php if(cookie::get("Paper")=="N"||cookie::get("Paper")==""){ ?> checked="checked" <?php }else{ ?><?php }?>>กระดาษการ์ดแบบธรรมดา
	<input type="radio"  onclick="dopaper('Y',<?=$catalogsId?>)" <?php if(cookie::get("Paper")=="Y"){ ?> checked="checked" <?php }else{ ?> <?php }?>>กระดาษแบบมัน
			<br>
			<font color="red">กระดาษการ์ดธรรมดา แผ่นละ 10 บาท ส่วน กระดาษแบบมัน 20 บาท</font>
				
		</div>
        <?php $plus=1;
		if(cookie::get("Paper")=="Y"){ 
			$plus=2;
		}
		?>
        <?php if(commonfn::isAdmin()) {?>
       

							
        	<a class="button fancybox" href="#inlineeditcat"  onclick="doeditNameCatalog('<?=$catalogsId?>','<?=$catalogsName ?>')" >แก้ไขหมวดสินค้า </a>
        	<a class="button fancybox" href="#inlineadditem"  onclick="doaddcatid('<?=$catalogsId?>')" >เพิ่มสินค้า</a>
			<a class="button" href="javascript:dodelcat()">ลบหมวดสินค้า</a>
        
        <?php }?>
        <div class="product-filter">
          <div class="display"><b>Display:</b></div>
        </div>
        <script type="text/javascript">
        function doeditNameCatalog(id,name){

        	document.getElementById("editidNewCatalog").value = id;
        	document.getElementById("editnameNewCatalog").value = name;
        }
			function addname(name,id){
				document.getElementById("itemName").innerHTML=name;
				document.getElementById("buyItemId").value=id;
			}
			function doaddcatid(id){
				document.getElementById("catalog_id_item").value=id;
			}
			function dodelcat(){
				if(confirm("ต้องการลบข้อมูลหรือไม่")){  
					window.location='<?=url_Core::base()?>catalog/delete/<?=$catalogsId?>';
				}
			}
			function dodelitem(id){
				if(confirm("ต้องการลบข้อมูลหรือไม่")){  
					window.location='<?=url::base()?>item/del/'+id;
				}
			}
        </script>	
        <div class="product-grid">
        <? foreach ($items as $item){ ?>
          <div style="width: 173px">
            <div class="image"><a class="fancybox-effects-a" href="<?=url::base()?>model/upload/<?=$item->pic ?>" ><img src="<?=url::base()?>model/upload/<?=$item->pic ?>" title="<?=$item->name ?>" alt="<?=$item->name ?>" width="150px" height="150px" /></a></div>
            <div class="name"><?=$item->name ?></div>
			<div class="price"> <span class="price-new"><?=$item->price*$plus ?> บาท</span> <br /></div>
              <div class="cart">
             <a class="fancybox" href="#inlinebuyitem" title="เลือกซื้อสินค้า"> <input type="button" value="เลือกลงตะกร้า" class="button" onclick="addname('<?=$item->name ?>',<?=$item->id?>)" /></a>
            </div>
            <div class="rating">ระดับความยาก<br>
                <?php if($item->status=="1"){?>
          	 	 	<img src="<?=url::base()?>resource/image/stars-1.png"  />   
          	     <?php }else if($item->status=="2"){ ?>
          		 	<img src="<?=url::base()?>resource/image/stars-2.png"  />
          	     <?php }else if($item->status=="3"){ ?>
          	  		<img src="<?=url::base()?>resource/image/stars-3.png"  />
          	      <?php }else if($item->status=="4"){ ?>
          	   		<img src="<?=url::base()?>resource/image/stars-4.png"  />
          	     <?php }else if($item->status=="5"){ ?>
          	        <img src="<?=url::base()?>resource/image/stars-5.png"  />
          	     <?php }?>
            </div>
            <?php if(commonfn::isAdmin()) {?>
	            <div class="name">
			           
			            
			            	<a class="button fancybox" onclick="doedititems('<?=$catalogsId?>','<?=$item->id ?>','<?=$item->name ?>','<?=$item->price ?>','<?=$item->status ?>')"  href="#inlineedititem">แก้ไข</a>
							<a class="button" href="javascript:dodelitem('<?=$item->id ?>')">ลบ</a>
	            </div>
            <?php }?>
          </div>
          <?php }?>
        </div>