<?php


class ShowRewardPage extends AbstractPage
{
    public static $requireModule = 0;
    
    function __construct()
    {
        parent::__construct();
    }
    
    function show()
    {
       global  $USER, $PLANET, $LNG, $LANG,$CONF,$UNI;
        
		$this->tplObj->loadscript('countdown.js');
        $timp      = $USER['onlinetime'] + 30 * 60;
        if(!empty($_GET['i'])) {
            
            
			$vote_id = (int) $_GET['i'];
            $cautare = $GLOBALS['DATABASE']->query("SELECT *FROM `uni1_votesystem` where `id` = '".$vote_id."';");
            
            if (mysqli_num_rows($cautare) == 0) {
				$this->printMessage("Don't try anything , wont work!", true, array('game.php?page=reward', 2));
                die();
            }
            $cautare = mysqli_fetch_assoc($cautare);
            $find_votes = $GLOBALS['DATABASE']->getFirstRow("SELECT *FROM `uni1_votesystem` where  `id` = ".$vote_id." ;");

            $find_vote = $GLOBALS['DATABASE']->query("SELECT *FROM `uni1_votesystem_log` where `user_id` = '".$USER['id']."' AND `vote_system_id` = '".$vote_id."' ;");
            if (mysqli_num_rows($find_vote) > 0) {
                $find = mysqli_fetch_assoc($find_vote);
                if (TIMESTAMP < ($find['time'] + $find_votes['time']  * 60 * 60)) {
					$this->printMessage("You already voted in the past 12h!", true, array('game.php?page=reward', 2));
                    die();
                } else {
					
                    header("Location: " . $cautare['link']);
                }
            } else {
				// $USER['bonus_point'] += $cautare['prize'];
                
                header("Location: " . $cautare['link']);
            }
        
        $find_vote3 = $GLOBALS['DATABASE']->query("SELECT *FROM `uni1_votefirst` where `id` = '".$USER['id']."' AND `vid` = '".$vote_id."' ;");
            if (mysqli_num_rows($find_vote3) > 0) {
                $find3 = mysqli_fetch_assoc($find_vote3);
                if (TIMESTAMP > ($find3['timestamp'] + 100)) {
					$GLOBALS['DATABASE']->query("DELETE FROM `uni1_votefirst` where `id` = '".$USER['id']."' AND vid = '".$vote_id."' ;");
                }
                }
        $GLOBALS['DATABASE']->query("INSERT INTO `uni1_votefirst` VALUES (".$USER['id'].",".$vote_id.", ".TIMESTAMP.") ;");
        }
        $captcha = 0;
        if (!empty($USER['time_online']) && ($timp < TIMESTAMP)) {
            //au trecut cele 30 minute si a mai dat
            $x       = "<input type='submit' value='Collect'>";
            $y       = "<font color='lime'>00:00</font>";
            $captcha = 1;
        } elseif (empty($USER['time_online'])) {
            $x       = "<input type='submit' value='Collect'>";
            $y       = "<font color='lime'>00:00</font>";
            $captcha = 1;
        } else {
            $secunde = ($USER['time_online'] + 30 * 60) - TIMESTAMP;
            $y       = "<font color='red'><span class=countdown secs=" . $secunde . "></span></font>";
            $x       = "<input type='submit' value='Collect' disabled>";
        }
        
        $find_vote = $GLOBALS['DATABASE']->query("SELECT *FROM `uni1_votesystem` ");
        $votes     = array();
        while ($vote = mysqli_fetch_assoc($find_vote)) {
            $find = $GLOBALS['DATABASE']->query("SELECT *FROM `uni1_votesystem_log` where `user_id` = " . $USER['id'] . " AND `vote_system_id` = " . $vote['id'] . " ;");
            $votes[$vote['id']]        = array();
            $votes[$vote['id']]['pic'] = $vote['image'];
            $find_votes = $GLOBALS['DATABASE']->getFirstRow("SELECT *FROM `uni1_votesystem` where  `id` = ".$vote['id']." ;");

            if (mysqli_num_rows($find) > 0) {

                $find = mysqli_fetch_assoc($find);
                if (TIMESTAMP < ($find['time'] + $find_votes['time'] * 60 * 60)) {

                    $secunde                    = $find['time'] + $find_votes['time'] * 60 * 60 - TIMESTAMP;
                    $votes[$vote['id']]['link'] = '<font color=\'red\'><span class=countdown2 secs='.$secunde.'></span></font>';
                } else {
                    $votes[$vote['id']]['link'] = '<font color=lime><a href=game.php?page=reward&i='.$vote['id'].' target="_blank">VOTE</a></font>';
                }
            } else {
                $votes[$vote['id']]['link'] = '<font color=lime><a href=game.php?page=reward&i='.$vote['id'].' target="_parent">VOTE</a></font>';
            }
        }
        
        $this->tplObj->assign_vars(array(
            'x' => $x,
            'y' => $y,
            'captcha' => $captcha,
            'voturile' => $votes,
            'reward'	=> 1,
        ));
        
       $this->display('page.reward.default.tpl');
        
    }
}
?>