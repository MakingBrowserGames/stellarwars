<?php
class ShowDonatePage extends AbstractPage
{	
	public static $requireModule = 0;
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function show(){
	global $USER, $PLANET, $LNG, $UNI, $CONF,$resource,$pricelist;
	$this->tplObj->loadscript("donation.js");
	
	$this->tplObj->assign_vars(
	array(
	'user_id' => $USER['id'],
	)
	);
	$this->display("page.donate.default.tpl");
	}
}
?>