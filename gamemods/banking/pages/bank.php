<?php
if(!defined('INSIDE')) die('Hacking attempt!');

function Bank()
{
	global $USER, $PLANET, $LNG;
	$PlanetRess = new ResourceUpdate();
	$PlanetRess->CalcResource();
	$PlanetRess->SavePlanetToDB();

	$template	= new template();

	
	$template->show("bank.tpl");
}



?>