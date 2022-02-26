<?php
class Header_Controller extends Controller {
	public function editHeader(){
	
		$dataheader=ORM::factory("headerdb")
		->find("1");
	
	
		$content = new View("home");
		$data->page="header";
		$datas->detail=$dataheader->detail;
		$datas->id=$dataheader->id;
		$datas->page="header";
		$content = new View("home");
		
		$content->dataHeader=$datas;
		$content->data=$data;
		$content->objData="";
		
		$content->render(true);
	}
	public function saveHeader(){
	
	
		$data=$this->input->post("detailHeader");
		$id=$this->input->post("idHeader");
		
		$dataok=$data;
		if(commonfn::isAdmin()){
			$detail=ORM::factory("headerdb")->find($id);
			$detail->detail=$dataok;
			$detail->save();
		}
		
		url::redirect("/header/editHeader");
	}
}