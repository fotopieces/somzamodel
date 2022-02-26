<?php 

class Page_Controller extends Controller {


	public function detail($id){
		$data->page="page";
		$content = new View("home");
		$content->data=$data;
		$content->objData="";
		$content->render(true);
	}
	public function cart(){
		$data->page="cart";
		$content = new View("home");
		$content->data=$data;
		$content->dataHeader="cart";
		$content->objData="";
		$content->render(true);
	}
	public function addNewPage($name,$type){
		$page=new Pagedb_Model();
		$pages=new Pagedb_Model();
		
		$page->name=$name;
		$page->icon="icon-file";
		$page->status="Y";
		$page->detail="Plz ... editData";
		$page->type=$type;
		$pages=$page->save();
		
		$pagedb=ORM::factory("pagedb")->find($pages->id);
		$pagedb->seq=$pages->id;
		$pagedb->save();
		
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
	}
	public function editPage($id,$name){
		
				$pagedb=ORM::factory("pagedb")->find($id);
				$pagedb->name=$name;
				$pagedb->save();
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
	public function gotoHeader($id){
		
				$pagedb=ORM::factory("pagedb")->find($id);
				$pagedb->type="header";
				$pagedb->save();
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
	public function gotoMenu($id){
		
				$pagedb=ORM::factory("pagedb")->find($id);
				$pagedb->type="menu";
				$pagedb->save();
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
	public function editMainPage($data){
		
				$pagedb=ORM::factory("mainpagedb")->find(1);
				$pagedb->data=$data;
				$pagedb->save();
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
	public function deletePage($id){
		
				$pagedb=ORM::factory("pagedb")->find($id);
				$pagedb->delete();
				
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
	public function positionPage($position_id,$position_seq,$new_position_id,$new_position_seq){
		
				$pagedb=ORM::factory("pagedb")->find($position_id);
				$pagedb->seq="wait";
				$pagedb->save();
				
				$newPosition=ORM::factory("pagedb")->find($new_position_id);
				$newPosition->seq=$position_seq;
				$newPosition->save();
				
				$newPositions=ORM::factory("pagedb")->find($position_id);
				$newPositions->seq=$new_position_seq;
				$newPositions->save();
				
				$content = new View("ajax");
				$content->flag="Y";
				$content->render(true);
			
	}
} 

