<?php
if(!defined('INSIDE')) die('Hacking attempt!');
		function auszahlen()
{
    global $LNG, $ProdGrid, $resource, $reslist, $CONF, $db, $ExtraDM, $USER, $PLANET;
	$PlanetRess = new ResourceUpdate();
	$PlanetRess->CalcResource();
	$PlanetRess->SavePlanetToDB();

	$template	= new template();

	
			$mode      = $_POST['mode'];
		$deu				= $PLANET['bankd'];
		$met				= $PLANET['bankm'];
		$kry				= $PLANET['bankc'];
		if ($mode == 'wyplac') {
				
                $metal 				= request_outofint('metal'); 
		$kryst				= request_outofint('kryst');
		$deuta				= request_outofint('deuta');
		if(request_outofint('metal') < '0'){
		Message('oszustwo', 'gvbv');
		}
		elseif($kryst < '0'){
		Message('oszustwo', 'gvbv');
		}
		elseif($deuta < '0'){
		Message('oszustwo', 'gvbv');
		}
		elseif($metal == '0' && $kryst == '0' && $deuta == '0'){
		Message('Nic nie wyp&#322;acasz?', 'Pomy&#347;l troche');
		}
		elseif($metal > $met){
		Message('Soviel Metall hast du nicht in der Bank');
		}
		elseif($kryst > $kry){
		Message('Soviel Kristall hast du nicht in der Bank');
		}

		elseif($deuta > $deu){
		Message('Soviel Deuterium hast du nicht in der Bank');
		}
		else{
		$db->query("UPDATE ".PLANETS." SET `metal` = `metal` + '". $metal ."', `crystal` = `crystal` + '". $kryst ."', `deuterium` = `deuterium` + '". $deuta ."' WHERE `id` = '". $PLANET['id'] ."'");
		$db->query("UPDATE ".PLANETS." SET `bankm` = `bankm` - '". $metal ."', `bankc` = `bankc` - '". $kryst ."', `bankd` = `bankd` - '". $deuta ."' WHERE `id` = '". $PLANET['id'] ."'");
		Message ( 'Metal: <font color=lime>'. $metal .'</font> metal, <font color=lime>'. $kryst .'</font> Kristall<font color=lime> '. $deuta.'</font> deuterium', 'game.php?page=bank' );
		}
		}
		// zeigt uns, wie viel wir in der Bank haben
			$template->assign_vars(array(	
		'deu'	=> $PLANET['bankd'],
		'met'	=> $PLANET['bankm'],
		'cry'	=> $PLANET['bankc'],
			));

	
	$template->show("bankminus.tpl");
}


?>