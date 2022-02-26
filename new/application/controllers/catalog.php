<?php

class Catalog_Controller extends Controller {
 public function catalog(){
 	if(commonfn::isAdmin()){
        $content = new View("web/addcatalog");
		$content->render(true);
 	}
    }
 public function edit($id){
 	if(commonfn::isAdmin()){
         $content = new View("web/editCatalog");
         $content->catalogs=ORM::factory("catalog")->find($id);
		 $content->render(true);
 	}
    }
    public function addcatalog($name){
    	if(commonfn::isAdmin()){
        $catalog=new Catalog_Model();
        $catalog->name=$name;
        $catalog->save();	
        $content = new View("ajax");
        $content->flag="Y";
        $content->render(true);

    	}	
	   
    } 
    public function editcatalog($id,$name){
    	if(commonfn::isAdmin()){
        $catalog=ORM::factory("catalog")->find($id);
        $catalog->name=$name;
        $catalog->save();	
        $content = new View("ajax");
        $content->flag="Y";
        $content->render(true);
		
    	}
	   
    } 
    public function closefunny(){
	
		$content = new View("web/closefunny");
		$content->render(true);
		
	   
    }  
    public function delete($id){
    	if(commonfn::isAdmin()){
    	$catalog=ORM::factory("catalog")->find($id);
    	
    	 $content->items=ORM::factory("item")
	          ->where("catalog_id=",$id)
	          ->find_all();
    	
    $items=ORM::factory("item")
    		->where("catalog_id=",$id)
    		->find_all();
    
     foreach ($items as $item):
		         //echo  $item->id;
		        $ite=ORM::factory("item")->find($item->id);
		        $pic = DOCROOT."web/upload/".$ite->pic;
                unlink($pic);
		        $ite->delete();
	 endforeach;
	 $catalog->delete();
	 $content = new View("ajax");
	 $content->flag="Y";
	 $content->render(true);
    	}
    	
		
         
		url::redirect();
		//echo "<script>history.back();</script>";
    } 
	
} // End Welcome Controller
?>