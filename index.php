<?php
include ('model.php');
session_start();
#Recuperation of a session
if (isset($_SESSION["reservation"])&& !empty($_SESSION['reservation'])) {
    $reservation = unserialize($_SESSION['reservation']);
  } 
else
  {
    $reservation = new Reservation();
  }
//Page 1 : Entre la destination, le nombre de client et l'assurance puis on va à la page 2. 
if(!empty($_POST['Send']) && empty($_POST['Cancel']) && !empty($_POST["destination"]) && !empty($_POST['nbr_places']))
{
  $reservation->setDestination($_POST['destination']);
  $reservation->setNbr_places($_POST['nbr_places']);
   if (isset($_POST['assurance']))
  {
    $reservation->setCheckbox('checked');
  }
  else
  {
    $reservation->setCheckbox('');
  }
  include("detail.php");
}
//Retour à la première page 

if (!empty($_POST["returntoreservation"])&& !empty($_POST['nbr_places']) && !empty($_POST["destination"]) && !empty($_POST['send']))
  {
    include("reservation.php");
  }
// Entre les noms et les ages pour chaque personne et on va à la troisième page 
if (isset($_POST["validation"]) && !empty($_POST["validation"]) && empty($_POST['returntoreservation']) && empty($_POST['Cancel']))
  {
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  include("resume.php");
  }
if (isset($_POST["returntodetail"])) 
  {
  include ("detail.php");
  }
// Annulation de la réservation, on détruit la session
if (!empty($_POST["Cancel"]) && isset($_POST["Cancel"]))
  {
    session_destroy();
    unset($reservation);
    include("reservation.php");
  }
if (!empty($_POST["check"]) && empty($_POST["Cancel"])&& empty($_POST["returntodetail"]))
  {
  include("confirmation.php");
  }
if (isset($reservation))
{
  $_SESSION['reservation'] = serialize($reservation);
}
if(empty($_POST['nbr_places']) && empty($_POST["destination"]) && empty($_POST['nbr_places']) && empty($_POST["Send"]) && empty($_POST["validation"]) && empty($_POST["check"]) && empty($_POST["Cancel"]) && empty ($_POST["returntodetail"]))
  {
    include("reservation.php");
  }
?>