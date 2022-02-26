<?php 

class item_Controller extends Controller {


	public function p($id){
		
	
		$items=ORM::factory("item")
		->where("catalog_id",$id)
		->find_all();
		$catalogs=ORM::factory("catalog")->find($id);
		
		$content = new View("index");
		$content->page="item";
		$content->catalogsName=$catalogs->name;
		$content->catalogsId=$catalogs->id;
		$content->items=$items;
		$content->render(true);
		
	}
	public function page($id){
	
		$items=ORM::factory("item")
		->where("catalog_id",$id)
		//->order_by("catalog_id" , "ASC")
		->find_all();
	
		$objData->items=$items;
		$objData->catalog_id=$id;
		$content = new View("home");
		//////////$dataheader////////
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
	
		$content->dataHeader=$hdatas;
		////////////////////////////////////
	
		$data->page="item";
	
		$content->data=$data;
		$content->objData=$objData;
	
		$content->render(true);
	}
	public function pages($id,$type){
	
		//cookie::set("Paper",$type);
		cookie::set("Paper",$type);
		url::redirect("item/page/".$id);
		//$content->render(true);
	}
	public function newitem($id)
	{
		$content = new View("web/newitem");
		$content->id=$id;
		$content->render(true);
	
	}
	public function edititem($id)
	{
		$content = new View("web/edititem");
		$content->item=ORM::factory("item")->find($id);;
		$content->render(true);
	
	}
	public function saveedititem()
	{
		$item=ORM::factory("item")->find($this->input->post("edit_item_id"));
		$item->name=$this->input->post("edit_itemName");
		$item->price=$this->input->post("edit_itemPrice");
		$item->status=$this->input->post("edit_statusItem");
		if($_FILES["edit_picItem"]["name"]!=""){
			$name=$_FILES["edit_picItem"]["name"];
			//echo $name;
			list($name1,$name2)=explode(".",$name);
			//echo $name2;
			//echo rand(10,100000);
			$pic=rand(10,100000)."model".rand(10,100000).".".$name2;
			echo $pic;
			$file=upload::save("edit_picItem",$pic."");
			$item->pic=$pic;
		}
		$item->save();
	
	
		url::redirect("item/p/".$this->input->post("catalog_id_item_edit"));
	
	
	
	
	}
	public function del($id)
	{
	
		// 		echo $this->input->post("id_item_delete");
		// 		echo $this->input->post("catalog_id_item_delete");
		$item=ORM::factory("item")->find($id);
		$cat=$item->catalog_id;
		$pic = DOCROOT."model/upload/".$item->pic;
		unlink($pic);
		$item->delete();
	
		url::redirect("item/p/".$cat);
	
	}
	public function additem()
	{
	
	
		$name=$_FILES["picItem"]["name"];
		//echo $name;
		list($name1,$name2)=explode(".",$name);
		//echo $name2;
		//echo rand(10,100000);
		$pic=rand(10,100000)."model".rand(10,100000).".".$name2;
		echo $pic;
		$file=upload::save("picItem",$pic);
	
		$item=new Item_Model();
		$item->name=$this->input->post("itemName");
		$item->price=$this->input->post("itemPrice");
		$item->status=$this->input->post("statusItem");
		$item->pic=$pic;
		$item->catalog_id=$this->input->post("catalog_id_item");
	
		$item->save();
			
		url::redirect("item/p/".$this->input->post("catalog_id_item"));
	
	
	
	}
	public function closefunny(){
	
		$content = new View("web/closefunny");
		$content->render(true);
	
	
	}
	

} 