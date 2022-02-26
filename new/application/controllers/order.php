<?php 

class Order_Controller extends Controller {
	
	public function maincart(){
		$content = new View("page/maincart");

		$content->render(true);
	}
	public function cart(){

		$content = new View("index");
		$content->page="cart";
		$content->pageid="";
		$content->catalogsId="";
		$content->render(true);
		
	
	}
	public function ckout(){

		$content = new View("index");
		$content->page="ckout";
		$content->pageid="";
		$content->catalogsId="";
		$content->render(true);
		
	
	}


	public function addcart($buyItemId,$piece){
	
		
		if(cookie::get("Paper")=="Y"){
			//$buyItemPrice=$buyItemPrice/2;
		}
		
		$user = commonfn::getUserId() ;
		if(commonfn::isnull($user)){
			$user=rand(10,10000).date('Y-m-d').date('h-s');
			cookie::set("user_id",$user,86500);
			//$user = commonfn::getUserId();
		}else{
			$user = commonfn::getUserId();
		}
		
		$items=ORM::factory("item")->find($buyItemId);
		$buyItemPic=$items->pic;
		$buyItemName=$items->name;
		$buyItemPrice=$items->price;
		
		$listOders=ORM::factory("listorderdb")
		->where("admin_id",$user)
		->where("item_id",$buyItemId)
		->where("status","NEW")
		->find_all();
			$haveData = false;
			$listOrderId="";
		foreach ($listOders as $listOder){
			$haveData=true;
			$listOrderId=$listOder->id;
			$pieceOld=$listOder->item_piece;
		}
		if($haveData){
			$listOdersEdit=ORM::factory("listorderdb")->find($listOrderId);
			$listOdersEdit->item_id=$buyItemId;
			$listOdersEdit->item_name=$buyItemName;
			$listOdersEdit->item_price=$buyItemPrice;
			$listOdersEdit->item_pic=$buyItemPic;
			$listOdersEdit->item_piece=$pieceOld+$piece;
			$listOdersEdit->status="NEW";
			$listOdersEdit->save();
			
		}else{
			$order=new Listorderdb_model();
			$order->item_id=$buyItemId;
			$order->item_name=$buyItemName;
			$order->item_price=$buyItemPrice;
			$order->item_pic=$buyItemPic;
			$order->item_piece=$piece;
			$order->admin_id=$user;
			$order->status="NEW";
			$order->save();
		}
	
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		
	}
	public function editcart($buyItemId,$piece){
	
		
		if(cookie::get("Paper")=="Y"){
			//$buyItemPrice=$buyItemPrice/2;
		}
		
		$user = commonfn::getUserId() ;
		if(commonfn::isnull($user)){
			cookie::set("user_id",rand(10,10000).date('Y-m-d').date('h-s'),86500);
			$user = commonfn::getUserId();
		}
		
		$items=ORM::factory("item")->find($buyItemId);
		$buyItemPic=$items->pic;
		$buyItemName=$items->name;
		$buyItemPrice=$items->price;
		
		$listOders=ORM::factory("listorderdb")
		->where("admin_id",commonfn::getUserId())
		->where("item_id",$buyItemId)
		->where("status","NEW")
		->find_all();
			$haveData = false;
			$listOrderId="";
		foreach ($listOders as $listOder){
			$haveData=true;
			$listOrderId=$listOder->id;
			$pieceOld=$listOder->item_piece;
		}
		if($haveData){
			$listOdersEdit=ORM::factory("listorderdb")->find($listOrderId);
			$listOdersEdit->item_id=$buyItemId;
			$listOdersEdit->item_name=$buyItemName;
			$listOdersEdit->item_price=$buyItemPrice;
			$listOdersEdit->item_pic=$buyItemPic;
			$listOdersEdit->item_piece=$piece;
			$listOdersEdit->status="NEW";
			$listOdersEdit->save();
			
		}else{
			$order=new Listorderdb_model();
			$order->item_id=$buyItemId;
			$order->item_name=$buyItemName;
			$order->item_price=$buyItemPrice;
			$order->item_pic=$buyItemPic;
			$order->item_piece=$piece;
			$order->admin_id=commonfn::getUserId();
			$order->status="NEW";
			$order->save();
		}
	
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		
	}
	public function delcart($itemId){
		
		$listOders=ORM::factory("listorderdb")
		->where("admin_id",commonfn::getUserId())
		->where("item_id",$itemId)
		->where("status","NEW")
		->find_all();
		foreach ($listOders as $listOder){
			$listOderdel=ORM::factory("listorderdb")->find($listOder->id);
			$listOderdel->delete();
		}
	
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		
	}
	public function delorder($id){
		
		$oders=ORM::factory("ordersdb")->find($id);
		
		$listOders=ORM::factory("listorderdb")
		->where("orderdb_id",$oders->id)
		->find_all();
		foreach ($listOders as $listOder){
			$listOderdel=ORM::factory("listorderdb")->find($listOder->id);
			$listOderdel->delete();
		}
		$oders->delete();
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		
	}
	public function delallcart(){
		
		$listOders=ORM::factory("listorderdb")
		->where("admin_id",commonfn::getUserId())
		->where("status","NEW")
		->find_all();
		foreach ($listOders as $listOder){
			$listOderdel=ORM::factory("listorderdb")->find($listOder->id);
			$listOderdel->delete();
		}
	
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		
	}
	public function saveorder(){
		
		
		$order=new Ordersdb_Model();

		$order->admin_id=commonfn::getUserId();
		$order->address=$this->input->post("name").$this->input->post("adds");
		$order->tel=$this->input->post("tels");
		$order->status="WAIT";
		$order->admin_id=commonfn::getUserId();
		$order->day=date("Y-m-d");
		$order->sendtype=$this->input->post("typeSend");
		$type=1;
		if(cookie::get("Paper")=="Y"){
			$type=2;
		}
		$order->type=$type;
	    $order->save();
		
		$listOders=ORM::factory("listorderdb")
		->where("admin_id",commonfn::getUserId())
		->where("status","NEW")
		->find_all();
		foreach ($listOders as $listOder){
			$listOderdel=ORM::factory("listorderdb")->find($listOder->id);
			$listOderdel->status="WAIT";
			$listOderdel->orderdb_id=$order->id;
			$listOderdel->save();
		}
		
	
		$content = new View("ajax");
		$content->flag=$this->input->post("adds");
		$content->render(true);
		
	}
	public function sendorder($id){
	
	
		$order=ORM::factory("ordersdb")->find($id);

		$order->status="SEND";

		$order->save();
	
		$listOders=ORM::factory("listorderdb")
		->where("orderdb_id",$id)
		->find_all();
		foreach ($listOders as $listOder){
			$listOderdel=ORM::factory("listorderdb")->find($listOder->id);
			$listOderdel->status="SEND";
			$listOderdel->save();
		}

		url::redirect("detail/order/WAIT");
	
	}
	

} 