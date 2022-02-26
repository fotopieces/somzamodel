<?php

class Regist_Controller extends Controller {
	public function index()
	{
	    
		
		$page="web/regist";
		$objData->users="";
		$content = new View("web/index");
		$content->page=$page;
		$content->objData=$objData;
		
		$content->render(true);
		
	}
	public function register($name,$user,$pass,$tel,$email,$address)
	{
	$admins=ORM::factory("admin")
    		->where("user",$user)
    		->where('pass', $pass)
    		->find_all();
    		$i=0;
    		 foreach ($admins as $am):
    		 $i=1;
    		 endforeach;
    		 if($i==1){
    		 
    		 	$content = new View("ajax");
				$content->flag="d";
				$content->render(true);
    		 	 // url::redirect("regist");
    		 }else{
	
	  $admin=new Admin_Model();
	  $admin->user=$user;
	  $admin->pass=$pass;
	  $admin->name=$name;
	  $admin->tel=$tel;
	  $admin->email=$email;
	  $admin->address=$address;
	  $admin->status="0";
	  $admin->save();
	  
	  $content = new View("ajax");
	  $content->flag="Y";
	  $content->render(true);
	  
	  
		}
	}
	public function editRegister($id,$name,$user,$pass,$tel,$email,$address)
	{
	$admins=ORM::factory("admin")
    		->where("user",$user)
    		->where('pass', $pass)
    		->find_all();
    		$i=0;
    		 foreach ($admins as $am):
    		 $i=1;
    		 endforeach;
    		 if($i>1){
    		 
    		 	$content = new View("ajax");
				$content->flag="d";
				$content->render(true);
    		 	 // url::redirect("regist");
    		 }else{
	
      $admin=ORM::factory("admin")->find($id);
	  $admin->user=$user;
	  $admin->pass=$pass;
	  $admin->name=$name;
	  $admin->tel=$tel;
	  $admin->email=$email;
	  $admin->address=$address;
	  $admin->save();
	  

	  cookie::set("user",$user,86500);
	  cookie::set("name",$name,86500);
	  cookie::set("tel",$tel,86500);
	  cookie::set("email",$email,86500);
	  cookie::set("pass",$pass,86500);
	  cookie::set("address",$address,86500);
	  
	  $content = new View("ajax");
	  $content->flag="Y";
	  $content->render(true);
	  
	  
		}
	}
	
	
} // End Welcome Controller
?>