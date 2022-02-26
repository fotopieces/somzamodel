<?php
class Order_model extends ORM{
	protected $sorting = array('id' => 'desc');
 var $has_one= array("admin");

}
?>