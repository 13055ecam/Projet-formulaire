<?php
	session_start();
	define('CFG_FORM_ACTION', basename(__FILE__)); // Cela permet de changer le nom du script d'index
$forms = array( // Voici la liste des formulaires, pratique pour mettre en place le menu de navigation
    1 => 'reservation',
    2 => 'detail',
    3 => 'resume',
    4 => "annulation",
    );
if(empty($_GET['stage']) or !is_numeric($_GET['stage']))
{
    define('CFG_STAGE_ID', 0);
}
else
{
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('CFG_STAGE_ID', intval($_GET['stage']));
}
	switch(CFG_STAGE_ID){
		case 0:
			require('reservation.php');
		break;
		case 1:
			require('detail.php');
			$_SESSION['destination'] = $_POST['destination'];
    	$_SESSION['place'] = $_POST['place'];
		$_SESSION['assurance'] = $_POST['assurance'];
    		break;
		case 2:
			require('resume.php');
			$_SESSION['nom'] = $_POST['nom'];
    		$_SESSION['age'] = $_POST['age'];
			break;
		case 3:
			require('annulation.php');
		break;
		}
  ?>