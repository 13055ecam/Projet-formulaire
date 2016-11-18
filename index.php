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

#si on appuit sur send

if(!empty($_POST['Send']) && empty($_POST['Cancel']))
{
  #si rien en place et rien en destination et on valide
  if (empty($_POST["destination"]) && empty($_POST["nbr_places"]))
    { 
      $reservation->setDestinationError("Veuillez entrer une destination");
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("reservation.php");
    }
    //retour en arrière
  elseif (!empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
  {
    if ($_POST["nbr_places"] > 10)
      {
        $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
        $reservation->setDestination($_POST['destination']);
        $reservation->setNbr_places("");
        $reservation->setDestinationError("");
        include("reservation.php");
      }
    else
      {
        $reservation->setNbr_places($_POST["nbr_places"]);
        $reservation->setDestination($_POST['destination']);
        $reservation->setPlaceError("");
        $reservation->setDestinationError("");
        include("detail.php");
      }
  }
  elseif (empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
    {
      if ($_POST["nbr_places"] > 10)
        {
          $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
          $reservation->setDestinationError("Veuillez entrer une destination");
          $reservation->setNbr_places("");
          include("reservation.php");
        }
      else
      {
        $reservation->setDestinationError("Veuillez entrer une destination");
        $reservation->setNbr_places($_POST["nbr_places"]);
        include("reservation.php");
      }
    }
  else
    {
      $reservation->setDestination($_POST['destination']);
      $reservation->setNbr_places("");
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("reservation.php");
    }
  }
//Retour à la première page 
if (!empty($_POST["returntoreservation"])&& !empty($_POST['nbr_places']) && !empty($_POST["destination"]) && !empty($_POST['send']))
  {
    include("reservation.php");
  }
// Entre les noms et les ages pour chaque personne et on va à la troisième page 
if (isset($_POST["validation"]) && !empty($_POST["validation"]) && empty($_POST['returntoreservation']) && empty($_POST['Cancel']))
  {
  if (empty($_POST["names"]) && empty($_POST["ages"]))
  {
    $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
    $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
    $reservation->setAge("");
    $reservation->setName("");
    include("detail.php");
  }
  elseif (!empty($_POST["names"]) && !empty($_POST["ages"]))
  {
    if ($_POST["ages"] < 0)
      {
        $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
        $reservation->setName($_POST['names']);
        $reservation->setAge("");
        $reservation->setNameError("");
        include("detail.php");
      }
    else
      {
        $reservation->setAge($_POST["ages"]);
        $reservation->setName($_POST['names']);
        $reservation->setAgeError("");
        $reservation->setNameError("");
        include("resume.php");
      }
    }

  elseif (empty($_POST["name"]) && !empty($_POST["ages"]))
  {
    if ($_POST["ages"] < 0)
      {
        $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
        $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
        $reservation->setName($_POST['names']);
        $reservation->setAge("");
        include("detail.php");
      }
    else
      {
        $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
        $reservation->setAge($_POST["ages"]);
        include("resume.php");
      }
  }
  else
    {
      $reservation->setName($_POST['names']);
      $reservation->setAge("");
      $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
      include("detail.php");
    }
  }
//retour à la page détail
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
// aller à la dernière page 
if (!empty($_POST["check"]) && empty($_POST["Cancel"])&& empty($_POST["returntodetail"]))
  {
  include("confirmation.php");
  }
//enrigistrer variable 
if (isset($reservation))
{
  $_SESSION['reservation'] = serialize($reservation);
}
//page par défaut 
if(empty($_POST["Send"]) && empty($_POST["validation"]) && empty($_POST["check"]) && empty($_POST["Cancel"]) && empty ($_POST["returntodetail"]))
  {
    include("reservation.php");
  }
?>