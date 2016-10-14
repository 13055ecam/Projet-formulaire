<?php
    session_start();
    if (isset($_POST['destination'])) 
    {
    	$_SESSION['destination'] = $_POST['destination'];
    }
    if (isset($_POST['place']))
    {
    	$_SESSION['place'] = $_POST['place'];
    }
	if (isset($_POST['assurance']))
	{
		$_SESSION['assurance'] = $_POST['assurance'];
	}
if (isset($_POST['next']))
	{
		include("cible.php");
		$_SESSION['next'] = $_POST['next'];
	}
else
	{
		include("reservation.php");
	}	
?>


