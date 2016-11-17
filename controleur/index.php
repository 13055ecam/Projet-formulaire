<?php
session_start();
include ('model.php');
#Recuperation of a session
if (isset($_SESSION["reservation"])) {
    $reservation = unserialize($_SESSION['Reservation']);
  } 
else {
    $reservation = new Reservation();
}
//Page 1
if( empty($_POST['assurance']) && isset($_POST['nbr_places']) && isset($_POST["destination"]))
{
  $reservation->setDestination($_POST['destination']);
  $reservation->setNbr_places($_POST['nbr_places']);
  if (isset($_POST['assurance'])=="")
  {
	$reservation ->setAssurance("NON");
  }
  else{
  $reservation ->setAssurance("OUI");
  }
  include ("detail.php");
}


if (!empty($_POST["returntoreservation"])){
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/reservation.php");
}
if (isset($_POST["returntodetail"])){
  include ("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/detail.php");
}
if (!empty($_POST["validation"])){
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/resume.php");
}
if (!empty($_POST["Cancel"])){
  session_destroy();
  session_start();
  $reservation = new Reservation();
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/reservation.php");
  }
if (isset($_POST["check"])){
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/confirmation.php");
}

if(empty($_POST['assurance']) && empty($_POST['nbr_places']) && empty($_POST["destination"])){
   $reservation->setDestination('');
    $reservation->setNbr_places('');
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/reservation.php");
}
 /*
if (isset($_POST["send"]) && isset($_POST["nbr_places"])=="" &&  isset($_POST["destination"])==""){
    $destinationErr = "Veuillez entrer une destination";  
    $placeErr = "Veuillez entrer un nombre de places";
  include("/Applications/XAMPP/xamppfiles/htdocs/EXO3/view/reservation.php");
  }
 */
?>