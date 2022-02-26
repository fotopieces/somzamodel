<?php
class Board_model extends ORM{
 var $has_one= array("admin");
 protected $sorting = array('id' => 'desc');
	//var $has_many= array("admin");
	//var $belongs_to=array("admin");
}
?>