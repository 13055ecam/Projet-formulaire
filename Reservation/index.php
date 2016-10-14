<?php
    session_start();
    
    //page 1
    
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


