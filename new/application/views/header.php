<div class="navbar ">
<script language=JavaScript>
<!--

///////////////////////////////////
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// -->
</script>
<?if($header){?>
<script type="text/javascript" src="<?=url::base()?>myEditer/Editer.js"></script>
          <script type="text/javascript">
				bkLib.onDomLoaded(function() {
					 var myNicEditor = new nicEditor();
					 myNicEditor.setPanel('myNicPanel');
					 myNicEditor.addInstance('myInstance1');
					 
					//nicEditors.allTextAreas()

					});
					function saveHeader(){
						document.getElementById("detailHeader").value=document.getElementById("myInstance1").innerHTML;
						document.getElementById("formHeader").submit();
					}
					
	
		 </script>
		 <?php if(commonfn::isAdmin()){?>
<div id="myNicPanel" style="width: 100%;"></div>
<form id="formHeader" action="<?=url::base()?>header/saveHeader" method="post">
		<input type="hidden" id="idHeader" name="idHeader" value="<?=$dataHeader->id?>">
		<input type="hidden" id="detailHeader" name="detailHeader">
</form>
		<div id="myInstance1" ><?=$dataHeader->detail?></div>
		<?php }else{?>
		<div><?=$dataHeader->detail?></div>
		<?php }?>
<?php }else{?>
	<div ><?=$dataHeader->detail?></div>
<?}?>
		<div class="navbar-inner">
	
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse"data-target=".nav-collapse"> 
				
				<span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a>
			
				
	
 
				<div class="nav-collapse collapse">
					<ul class="nav">
					
						
						
 							<?php $pages=ORM::factory("pagedb")->where("type","header")->find_all();	
							 foreach ($pages as $page){
							 ?><li class="dropdown">
							 	 <?php if(commonfn::isAdmin()){?>
								<a href="#" class="dropdown-toggle"
									data-toggle="dropdown"> 
									<i class="<?=$page->icon?>"></i>&nbsp; <b><?=$page->name?></b></a>
									
									<ul class="dropdown-menu">
										<li>
											<a href="<?=url::base()?>detail/page/<?=$page->id?>"  id="editMenu"  ><i class="icon-wrench"></i>&nbsp;  เข้าหน้าเว็บ</a>
										</li>
										<li>
											<a href="#editMenuName"  id="editMenu" onclick="editsNameJs('<?=$page->id?>','<?=$page->name?>')"  data-toggle="modal"><i class="icon-wrench"></i>&nbsp;  แก้ไขชื่อ</a>
										</li>
<!-- 										<li> -->
<!-- 											<a href="#" ><i class="icon-wrench"></i>&nbsp;  แก้ไขลำดับ</a> -->
<!-- 										</li> -->
										<li>
											<a href="#" onclick="gotoMenu('<?=$page->id?>')" ><i class="icon-wrench"></i>&nbsp;  ย้ายไปเมนู</a>
										</li>
										<li>
											<a href="#deleteMenu" onclick="deleteMenu('<?=$page->id?>')" data-toggle="modal" ><i class="icon-wrench"></i>&nbsp;  ลบเมนู</a>
										</li>
									</ul>
								<?php }else{?>
									<a href="<?=url::base()?>detail/page/<?=$page->id?>" > <i class="<?=$page->icon?>"></i>&nbsp; <b><?=$page->name?></b></a>
								<?php }?></li>
							<?php }?>
						<?php if(!commonfn::isLogin()){?>
<!-- 						<li > -->
<!-- 							<a href="#register"  data-toggle="modal"><i class="icon-user"></i>&nbsp; <b>สมัครสมาชิก</b></a> -->
<!-- 						</li> -->
						<?php }else{?>
						<li >
							<a href="#register"  data-toggle="modal"><i class="icon-user"></i>&nbsp; <b>แก้ไขข้อมูลส่วนตัว</b></a>
						</li>
						<?php }?>
						
						<li>
							<?php if(!commonfn::isLogin()){?>
								<a href="#login" data-toggle="modal"> <i class="icon-off"></i>&nbsp; <b>เข้าสู่ระบบ</b></a>
							<?php }else{?>
								<a href="#logOut" data-toggle="modal"> <i class="icon-off"></i>&nbsp; <b>ออกจากระบบ</b></a>
							<?php }?>
						</li>
					
						
						<li><a href="https://www.facebook.com/PaperModelSOMZA" data-toggle="modal"> <i class="icon-edit"></i>&nbsp; <b>เว็บบอร์ด</b></a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"><i class="icon-align-justify"></i>&nbsp; <b>ตัวอย่างการต่อโมเดล</b><b class="caret"></b> </a>
							<ul class="dropdown-menu">
							<?php if(commonfn::isAdmin()){?>
							 <li><a href="<?=url::base()?>header/editHeader" data-toggle="modal">   <i class="icon-plus"></i>&nbsp;  แก้ไขหัวเว็บ</a></li>
							 <li><a href="#addPage" data-toggle="modal">   <i class="icon-plus"></i>&nbsp;  เพิ่มหน้าใหม่</a></li>
							 <li><a href="#editMainPage" data-toggle="modal">   <i class="icon-plus"></i>&nbsp;  เลือกหน้าหลัก</a></li>
							 <li class="divider"></li>
							 <?php }?>
							 <?php $pages=ORM::factory("pagedb")->where("type","menu")->find_all();	
							 foreach ($pages as $page){
							 ?>
							 <?php if(commonfn::isAdmin()){?>
									<li class="dropdown-submenu">
									<a href="<?=url::base()?>detail/page/<?=$page->id?>">   <i class="<?=$page->icon?>"></i>&nbsp;  <?=$page->name?></a>
									
									<ul class="dropdown-menu">
										<li>
											<a href="#editMenuName"  id="editMenu" onclick="editsNameJs('<?=$page->id?>','<?=$page->name?>')"  data-toggle="modal"><i class="icon-wrench"></i>&nbsp;  แก้ไขชื่อ</a>
										</li>
 										<li> 
 											<a href="#editposition"  data-toggle="modal"  onclick="modalEditPosition('<?=$page->id?>','<?=$page->seq?>','<?=$page->name?>')" ><i class="icon-wrench"></i>&nbsp;  แก้ไขลำดับ</a> 
 										</li> 
										<li>
											<a href="#" onclick="gotoHeader('<?=$page->id?>')" ><i class="icon-wrench"></i>&nbsp;  ย้ายไปหัวเว็บ</a>
										</li>
										<li>
											<a href="#deleteMenu" onclick="deleteMenu('<?=$page->id?>')" data-toggle="modal" ><i class="icon-wrench"></i>&nbsp;  ลบเมนู</a>
										</li>
									</ul>
								   </li>
							   <?php }else{?>
							   	<li class="dropdown"><a href="<?=url::base()?>detail/page/<?=$page->id?>">   <i class="<?=$page->icon?>"></i>&nbsp;  <?=$page->name?></a></li>
							   <?php }?>
							   <?php }?>
							   
							</ul>
						</li>
					</ul>
				
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>

	</div>
	<?php /// modal  include?>
	
	<?php  
	
	include 'modal/login.php';
	include 'modal/register.php';
	include 'modal/addNewPage.php';
	include 'modal/loginOut.php';
	include 'modal/icon.php';
	include 'modal/editMenuName.php';
	include 'modal/deleteMenu.php'; 
	include 'modal/alert.php'; 
	include 'modal/editPositionMenu.php'; 
	include 'modal/editMainPage.php'; 
	include 'modal/addNewCatalog.php'; 
	include 'modal/editCatalog.php'; 
	include 'modal/deleteCatalog.php'; 
	include 'modal/addNewItem.php'; 
	include 'modal/editItem.php'; 
	include 'modal/deleteItem.php'; 
	include 'modal/plzLogin.php'; 
	include 'modal/showImg.php'; 
	include 'modal/buyItem.php'; 
	include 'modal/delCart.php'; 
	include 'modal/delAllCart.php'; 
	include 'modal/confimCart.php'; 
	include 'modal/plzBuy.php'; 
	include 'modal/buy.php'; 
	include 'modal/delOrder.php'; 


	
	?>
	
