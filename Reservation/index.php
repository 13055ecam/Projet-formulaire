<?php
<<<<<<< HEAD
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
=======
    session_start();
    
    //page 1
    
    if (isset($_POST['destination'])) 
    {
    	$_SESSION['destination'] = $_POST['destination'];
    }
    if (isset($_POST['place']))
    {
>>>>>>> 1d7acb4ecc54407c1cf31c0715d2f4a8ce1e61c1
    	$_SESSION['place'] = $_POST['place'];
		$_SESSION['assurance'] = $_POST['assurance'];
<<<<<<< HEAD
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
=======
	}
	
//page 2

if (isset($_POST['nom'])) { $_SESSION['nom'] = $_POST['nom'];}
if (isset($_POST['nom'])) { $_SESSION['age'] = $_POST['age'];}
if (isset($_POST['nom1'])) { $_SESSION['nom1'] = $_POST['nom1'];}
if (isset($_POST['nom1'])) { $_SESSION['age1'] = $_POST['age1'];}

if (isset($_POST['Next']))
	{
		include("detail.php");
		$_SESSION['Next'] = $_POST['Next'];
	}
else
	{
		include("reservation.php");
	}	
?>


>>>>>>> 1d7acb4ecc54407c1cf31c0715d2f4a8ce1e61c1
