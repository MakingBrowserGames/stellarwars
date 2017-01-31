<?php
if(!defined('INSIDE')) die('Hacking attempt!');
		function einzahlen()
{
    global $LNG, $ProdGrid, $resource, $reslist, $CONF, $db, $ExtraDM, $USER, $PLANET;
	$PlanetRess = new ResourceUpdate();
	$PlanetRess->CalcResource();
	$PlanetRess->SavePlanetToDB();
	$template	= new template();


	





// Wieviele Zinsen sollen user bekommen?
$prozentsatz = 0;
$dunklematerie = 150;


$zinsen = 100 + $prozentsatz;    /// set here your banking rate  + $prozentsatz or  - $prozentsatz

		$mode      = request_var('mode', '');
		$parse = $lang;
		$deu				= $PLANET['deuterium'];
		$met				= $PLANET['metal'];
		$kry				= $PLANET['crystal'];
		if ($mode == 'wplac') {
		
		$metal 				= request_outofint('metal'); 
		$kryst				= request_outofint('kryst');
		$deuta				= request_outofint('deuta');
		if($metal < '0'){
		Message('oszustwo', 'gvbv');
		}
		elseif($kryst < '0'){
		Message('cheating attemt', 'gvbv');
		}
		elseif($deuta < '0'){
		Message('cheating attemt', 'gvbv');
		}
		elseif($metal == '0' && $kryst == '0' && $deuta == '0'){
		Message('Bitte zahlen Sie mehr als 0?');
		}
		elseif($metal > $PLANET['metal']){
		Message('Du hast nicht so viel Metal!');
		}
		elseif($kryst > $PLANET['crystal']){
		Message('Soviel Kristall hast du nicht!');
		}
		elseif($deuta > $PLANET['deuterium']){
		Message('Soviel Deuterium hast du nicht!');
		}
		elseif($dunklematerie > $USER['darkmatter']){
		Message('Du hast nicht genug Dunkle Materie');
		}
		
		else{
		$db->query("UPDATE ".PLANETS." SET `metal` = `metal` - '". $metal ."', `crystal` = `crystal` - '". $kryst ."', `deuterium` = `deuterium` - '". $deuta ."' WHERE `id` = '". $PLANET['id'] ."'");
		$metal_dazu   = $metal * $zinsen / 100;
		$cristal_dazu = $kryst * $zinsen / 100;
		$deut_dazu    = $deuta * $zinsen / 100;
		$db->query("UPDATE ".PLANETS." SET `bankm` = `bankm` + '". $metal_dazu ."', `bankc` = `bankc` + '". $cristal_dazu ."', `bankd` = `bankd` + '". $deut_dazu ."' WHERE `id` = '". $PLANET['id'] ."'");
		$db->query("UPDATE ".USERS." SET `darkmatter` = `darkmatter` - '". $dunklematerie ."' WHERE `id` = '". $USER['id'] ."'");
		Message ( 'Metall: <font color=lime>'. $metal_dazu .'</font> Kristall:  <font color=lime>'. $cristal_dazu .'</font> Deuterium:<font color=lime> '. $deut_dazu.'</font> ', 'game.php?page=bank' );
		}
		}
			$template->assign_vars(array(	
		'steuer'	=> $prozentsatz,
		'dm'	    => $dunklematerie,
			));

	$template->show("bankplus.tpl");
}
 



?>