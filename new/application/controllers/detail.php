<?php

class Detail_Controller extends Controller {


	public function page($id)
	{
	
		$details=ORM::factory("pagedb")
		
		->where("id=",$id)
		->find_all();
	foreach ($details as $datas){

		$content = new View("index");
		$data = new stdClass();
		$data->page="page";
		$data->detail=$datas->detail;
		$data->id=$datas->id;
		$data->icon=$datas->icon;
		$content = new View("index");
		
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas = new stdClass();
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
	
		$content->catalogsId="";
		$content->data=$data;
		$content->dataHeader=$hdatas;
		$content->objData="";
		$content->page="index";
		$content->pageid=$datas->id;
		$content->render(true);
	}	

	}
	public function cart(){
		$data->page="cart";
		$content = new View("home");
		$content->data=$data;
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		
		$content->dataHeader=$hdatas;
		$content->objData="";
		$content->render(true);
	}
	public function user(){
		if(commonfn::isAdmin()){
		
		$data->page="user";
		$content = new View("home");
		$content->data=$data;
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		
		$content->dataHeader=$hdatas;
		$content->objData="";
		$content->render(true);
		}else{
			url::redirect();
		}
	}
	public function bord(){
	
		$data->page="bord";
		$content = new View("home");
		$content->data=$data;
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		
		$content->dataHeader=$hdatas;
		$content->objData="";
		$content->render(true);
	
	}
	public function delboard($id){
			if(commonfn::isAdmin()){
				$boards=ORM::factory("board")->find($id);
		    	
		    	  $ansers=ORM::factory("anser")
		    		->where("board_id=",$id)
		    		->find_all();
		    		
		    		 foreach ($ansers as $anser):
		    		 $ans=ORM::factory("anser")->find($anser->id);
		    		 $ans->delete();
		    		 //echo "sdfsdf";
		    		 endforeach;
		    		
		       $boards->delete();
       
			}
			url::redirect("detail/bord");
	}
	public function delans($id,$board_id){
		if(commonfn::isAdmin()){
    		 $ans=ORM::factory("anser")->find($id);
    		 $ans->delete();
		}
			url::redirect("detail/ans/".$board_id);
	}
	public function addans($id)
	{
		$content = new View("addansboard");
		$content->id=$id;
		$content->render(true);
	
	}
	
	public function ans($id){
		$data->page="ans";
		$content = new View("home");
		$content->data=$data;
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		$objData->id=$id;
		$content->dataHeader=$hdatas;
		$content->objData=$objData;
		$content->render(true);
	}
	public function order($status){
		if(commonfn::isAdmin()){
		$data =	new stdClass();
		$data->page="order";
		$content = new View("index");
		$content->data=$data;
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas = new stdClass();
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		$objData = new stdClass();
		$objData->status=$status;
		$content->dataHeader=$hdatas;
		$content->objData=$objData;
		$content->page='order';
		$content->pageid="";
		$content->status=$status;
		$content->catalogsId="";

		$content->render(true);
		}else{
			url::redirect("");
		}
	}
	public function listorder($id){
		$data = new stdClass();
		$data->page="listOrder";
		$content = new View("index");
		$content->data=$data;
		$order=ORM::factory("ordersdb")->find($id);
		
		$dataheader=ORM::factory("headerdb")
		->find("1");
		$hdatas = new stdClass();
		$hdatas->detail=$dataheader->detail;
		$hdatas->id=$dataheader->id;
		$hdatas->page="";
		$objData = new stdClass();
		$objData->id=$id;
		$objData->typePaper=$order->type;
		$content->dataHeader=$hdatas;
		$content->objData=$objData;
		
		
		$content->page='listorder';
		$content->pageid="";
		//$content->status=$status;
		$content->catalogsId="";
		
		$content->render(true);
	}

	
	public function pageexShow($id)
	{
	
		$detail=ORM::factory("detail")
		->where("id!=",1)
		->where("id!=",2)
		->where("id!=",6)
		->where("id!=",7)
		->where("id!=",5)
		->where("id!=",15)
		->find_all();
		
		$details=ORM::factory("detail")
		->where("id=",$id)
		->find_all();

		$page="web/detailPageEx";
		$objData->detailData=$details;
		$objData->exdata=$detail;
		$objData->id=$id;
		$content = new View("web/index");
		$content->page=$page;
		$content->objData=$objData;
		$content->render(true);
		

	}
	public function adddetail(){
		if(commonfn::isAdmin()){
			$content = new View("web/adddetail");
			$content->render(true);
		}
	}
	public function edit(){
		if(commonfn::isAdmin()){
			$detail=ORM::factory("detail")->find($this->input->post("id"));
			$detail->name=$this->input->post("name");
			$detail->save();
			 

			$this->closefunny();
		}

	}
	public function delete($id){
		if(commonfn::isAdmin()){
			$detail=ORM::factory("detail")->find($id);
			$detail->delete();
		// url::redirect();
		}
		echo "<script>history.back();</script>";
	}
	public function add(){
		if(commonfn::isAdmin()){
			$detatl=new Detail_Model();
			$detatl->name=$this->input->post("name");
			if($this->input->post("name")!=""){
				$detatl->save();
			}
			 
			$this->closefunny();
		}

	}
	public function editdetail($id){
		if(commonfn::isAdmin()){
			$content = new View("model/editdetail");
			$content->details=ORM::factory("detail")->find($id);
		 $content->render(true);
		}
	}
	public function type($type){
		
		cookie::set("Paper",$type);
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
	}
	 
	public function closefunny(){

		$content = new View("web/closefunny");
		$content->render(true);


	}
	public function saveedit(){
		$data=$this->input->post("detail");
		//$icon=$this->input->post("icn");
		$id=$this->input->post("id");

		$dataok=$data;
		if(commonfn::isAdmin()){
			$detail=ORM::factory("pagedb")->find($id);
			$detail->detail=$dataok;
			//$detail->icon=$icon;
			$detail->save();
		}
		if($id==43){
			url::redirect();
		}else{
			url::redirect("/detail/page/".$id);
		}
		

	}
	 

} // End Welcome Controller
?>