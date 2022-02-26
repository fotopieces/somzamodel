<?php
class commonfn{
	
	
	public static function getUserId(){
		$name=cookie::get("user_id");
		return $name;
	}
	public static function getNameUser(){
		$name=cookie::get("name");
		return $name;
	}
	public static function isAdmin(){
		$user_status=cookie::get("user_status");
		if(commonfn::notnull($user_status)){
			if($user_status==1){
				return true;
			}else{
				return false;
			}
		}
		return false;
	}
	public static function isLogin(){
		$user_status=cookie::get("user_status");
		if(commonfn::notnull($user_status)){
				return true;
		}
		return false;
	}
	public static function isnull($data){
		
		if($data==""){
			return true;
		}else if($data==null){
			return true;
		}else{
			return false;
		}
	}
	public static function notnull($data){
		if($data!=""){
			return true;
		}else if($data!=null){
			return true;
		}else{
			return false;
		}
		
	}
	public static function statusType($Y_or_N){
		if($Y_or_N=="Y"){
			 messages::getMessages("comonfn_use");
		}else {
			 messages::getMessages("comonfn_notuse");
		}
		
	}
	public static function price($data){
	
	$price=explode("|", $data);
	$prie=ORM::factory("priceunit_db")
	->find($price[1]);
		if(Session::instance()->get("lang")=="th"){
			return $price[0]."&nbsp;&nbsp;".$prie->name_th;
		}else{
			return $price[0]."&nbsp;&nbsp;".$prie->name_en;
		}
	}
	public static function size($data){
	
	$price=explode("|", $data);
	$prie=ORM::factory("sizeunit_db")
	->find($price[1]);
		if(Session::instance()->get("lang")=="th"){
			return $price[0]."&nbsp;&nbsp;".$prie->name_th;
		}else{
			return $price[0]."&nbsp;&nbsp;".$prie->name_en;
		}
	}
	public static function langth(){
	
	
		if(Session::instance()->get("lang")=="th"){
			return true;
		}else{
			return false;
		}
	}
	public static function addcount($id){
	
		$datas=new Count_db_Model();
		$datas->main=$id;
		$datas->day=date("Y-m-d");
		$datas->save();
	}
	public static function count($id){
	
		$count=ORM::factory("count_db")
		->where('main', $id)
		//->where('day', date("Y-m-d"))
		->count_all();
		return $count;
	}
	public static function countcomment($id){
	
		$count=ORM::factory("gustbook_db")
		->where('itemid', $id)
		//->where('day', date("Y-m-d"))
		->count_all();
		return $count;
	}
	public static function counttoday($id){
		
		
		$count=ORM::factory("count_db")
		->where('main', $id)
		->where('day', date("Y-m-d"))
		->count_all();
		
		return $count;
	}
	public static function substring($data){
		
		$string=substr($data,0,135);
// 		$string=str_word_count($data,0);
//        $data="";
// 	 for ($i=1;$i<300;$i++){
// 	 	if(commonfn::notnull($string[i])){
// 	 	$data=$data.$string[i];
// 	 	}
// 	 }
			return $string."....";
		
	}
	public static function subdetail($data){
		
		$string=substr($data,0,301);
		//$string=str_word_count($data,0);
	
			return $string."....";
		
	}
	public static function part(){
		
		if(Session::instance()->get("lang")=="th"){
			return 'th';
		}else{
			return 'en';
		}
		
	}
	public static function code($id){
		$code="";
		if($id>=10){
			$code="000".$id;
		}else if($id>=100){
			$code="00".$id;
		}else if($id>=1000){
			$code=$id;
		}else if($id<10){
			$code="0000".$id;
		}
		return $code;
	}

}
?>