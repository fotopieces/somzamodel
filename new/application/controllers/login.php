<?php

class Login_Controller extends Controller {
	
	
	public function ckLogin($user,$pass)
	{
		
		$ck=0;
		//$user=$this->input->post("user");
		//$pass=$this->input->post("pass");
		//echo $user;
		$admins=ORM::factory("admin")
		->where('user', $user)
		->where('pass', $pass)
		->find_all();

		foreach ($admins as $admin){
			$ck=1;
			$id=$admin->id;
			$status=$admin->status;
			$name=$admin->name;
			
			$email=$admin->email;
			$tel=$admin->tel;
			$address=$admin->address;
			$password=$admin->pass;
		}
		if($ck==1){
			 
			//Session::instance()->set("user_id",$id);
			//Session::instance()->set("user",$user);
			//Session::instance()->set("user_status",$status);
			
			cookie::set("user_id",$id,86500);
			cookie::set("user",$user,86500);
			cookie::set("user_status",$status,86500);
			cookie::set("name",$name,86500);
			
			cookie::set("tel",$tel,86500);
			cookie::set("email",$email,86500);
			cookie::set("pass",$password,86500);
			cookie::set("address",$address,86500);

		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
		

		}else{

			//Session::instance()->set_flash("massage","ไม่สามารถเข้าสู่ระบบได้</br>");
			//url::redirect("admincontroller/indexs");
		$content = new View("ajax");
		$content->flag="N";
		$content->render(true);
			
			
			
			//echo "<script>alert('ไม่สามารถเข้าสู่ระบบได้');</script>";
			//echo "<script>history.back();</script>";
		}

	}
	public function ckLogins()
	{
		$ck=0;
		$user=$this->input->post("user");
		$pass=$this->input->post("pass");
		//echo $user;
		$admins=ORM::factory("admin")
		->where('user', $user)
		->where('pass', $pass)
		->find_all();

		foreach ($admins as $admin):
		$ck=1;
		$id=$admin->id;
		$status=$admin->status;
		$name=$admin->name;
		
		$email=$admin->email;
		$tel=$admin->tel;
		$address=$admin->address;
		$password=$admin->pass;


		
		endforeach;
		if($ck==1){
			 
		
			
			cookie::set("user_id",$id,86500);
			cookie::set("user",$user,86500);
			cookie::set("name",$name,86500);
			cookie::set("user_status",$status,86500);
			
			cookie::set("tel",$tel,86500);
			cookie::set("email",$email,86500);
			cookie::set("pass",$password,86500);
			cookie::set("address",$address,86500);
			//echo "<script>alert('ได้ทำการเข้าสู่ระบบแล้ว');</script>";
			$content = new View("web/alert");
			$content->word='ได้ทำการเข้าสู่ระบบแล้ว';
			$content->render(true);
			
			//$this->closefunny();

		}else{

			//Session::instance()->set_flash("massage","ไม่สามารถเข้าสู่ระบบได้</br>");
			//url::redirect("admincontroller/indexs");
			$content = new View("web/alert");
			$content->word='ไม่สามารถเข้าสู่ระบบได้';
			$content->render(true);
			
			
		}

	}
	public function out()
	{

		 
		cookie::set("user_id",null);
		cookie::set("user",null);
		cookie::set("user_status",null);
		cookie::set("name",null);
		
		$content = new View("ajax");
		$content->flag="Y";
		$content->render(true);
	

	}
	


} // End Welcome Controller
?>