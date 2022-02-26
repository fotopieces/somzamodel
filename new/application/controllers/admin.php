<?php
class Admin_Controller extends Controller {
	public function page($id)
	{
		$content = new View("index");
		$content->page=$id;
		$content->pageid="";
		$content->catalogsId="";
		$content->render(true);
	}
	public function addslide()
	{
		
			$name=$_FILES["slidePic"]["name"];
			//echo $name;
			list($name1,$name2)=explode(".",$name);
			//echo $name2;
			//echo rand(10,100000);
			$pic=rand(10,100000)."slide".rand(10,100000).".".$name2;
			echo $pic;
			$file=upload::save("slidePic",$pic);
	
			$item=new Slide_Model();
			$item->picname=$pic;
			
			$item->save();
			url::redirect("admin/page/slide");
	}
	public function delete($id)
	{

			$item=ORM::factory("slide")->find($id);
			$pic = DOCROOT."model/upload/".$item->picname;
			unlink($pic);
			$item->delete();

			url::redirect("admin/page/slide");
	}
}