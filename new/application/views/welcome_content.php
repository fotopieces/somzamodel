<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>

</head>

<body >
<?php $pages=ORM::factory("mainpagedb")->find_all();	
							 foreach ($pages as $page){
							 ?>
<?php url::redirect("/detail/page/".$page->data);?>
<?php }?>
</body>
</html>
