<?php
class Board_Controller extends Controller {
	
	public function main()
	{
		
		$objData->boards=ORM::factory("board")->find_all();	
       
        
       
        
        $page="web/board";
       
        $content = new View("web/index");
        $content->page=$page;
        $content->objData=$objData;
        
        $content->render(true);
        
		
	}
	public function ansboard($id)
	{
		
		$objData->boards=ORM::factory("board")->find($id);	
		 $objData->ansers=ORM::factory("anser")
					  ->where("board_id=",$id)	
		              ->find_all();	
   
        
        
        
        
      
        
        
        
        
        $page="web/ansboard";
        
        $content = new View("web/index");
        $content->page=$page;
        $content->objData=$objData;
        
        $content->render(true);
		
	}
	public function add()
	{
		$content = new View("addboard");	
		$content->render(true);
		
	}
	public function addans($id)
	{
		$content = new View("web/addansboard");	
		$content->id=$id;
		$content->render(true);
		
	}
	public function saveadd()
	{
		
	   $board=new Board_Model();
        
        if($this->input->post("name")!=""&&$this->input->post("detail")!="<SPAN id=data style=\"FONT-SIZE: 13px\"></SPAN>"){
        $board->name=$this->input->post("name");	
        $board->detail=$this->input->post("detail");	
        $board->admin_id=cookie::get("user_id");	
        $board->day=date("Y-m-d");	
        $board->time=date("H:m:s");
        $board->save();	
        $this->closefunny();
        }else{
        echo "<script>alert('ยังไม่ได้กรอกหัวข้อกระทู้และเนื้อหา')</script>";
        }
      
	     $this->closefunny(); 
	}
	public function delboard($id)
	{
		
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
			url::redirect("board/main");
	}
	public function delans($id,$board_id)
	{
		if(commonfn::isAdmin()){
	
    		 $ans=ORM::factory("anser")->find($id);
    		 $ans->delete();
    		
    		
      
		}
		
			url::redirect("board/ansboard/".$board_id);
	}
	public function saveansadd()
	{
	
	   $ans=new Anser_Model();
        
        $ans->detail=$this->input->post("detail");	
        $ans->admin_id=cookie::get("user_id");	
        $ans->day=date("Y-m-d");	
        $ans->time=date("H:m:s");
        $ans->board_id=$this->input->post("board_id");
        $ans->save();	
       $this->closefunny();
  
	}
	 public function closefunny(){
	
		$content = new View("closefunny");
		$content->render(true);
		
	   
    }  
}