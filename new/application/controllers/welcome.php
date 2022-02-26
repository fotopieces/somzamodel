<?php 

class Welcome_Controller extends Controller {


	public function index(){
		
		
		
		$content = new View("index");
		$content->page="index";
		$content->pageid=43;
		$content->catalogsId="";
		$content->render(true);
		
	}
	public function sendPage(){
		
		
		
		$content = new View("page/sendNumber");
		$content->render(true);
		
	}
	public function saveSend(){

		$sendName=$this->input->post("sendName");
		
		$icondb=new Icondb_Model();
		$icondb->name=$sendName;

		$icondb->save();
		
		$content = new View("page/sendNumber");
		$content->render(true);
		
	}
	public function delSend($id){

		$icondb=ORM::factory("icondb")->find($id);
		
		$icondb->delete();
		
		$content = new View("page/sendNumber");
		$content->render(true);
		
	}
	

} 