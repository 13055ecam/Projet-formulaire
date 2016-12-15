<?php

include_once('../models/model_DB.php');
include_once('../models/model_reservation.php');


/* Recuperation of a existing session or creation of a new session if not exists */
if(isset($_SESSION["reservation"]) && !empty($_SESSION['reservation']))
  {
    $reservation = unserialize($_SESSION['reservation']);
  }
else
  {
    $reservation = new Reservation();
  }


/* The first page */
if(!empty($_POST['send']) && empty($_POST['cancel']))
  {

  /* Pressing on next with no values in the boxes */ 
  if (empty($_POST["destination"]) && empty ($_POST["nbr_places"]))
    { 
      $reservation->setDestinationError("Veuillez entrer une destination");
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("../views/page_one.php");
    }

  /* Pressing on next with values in the boxes */ 
  elseif (!empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
  {

    /* Checking if the number of place and the destination respected the conditions */

    /* All is respected */
    if (is_numeric($_POST["nbr_places"]) && $_POST["nbr_places"] < 10 && !is_numeric($_POST["destination"]))
      {
        if (isset($_POST['insurance']))
          {
            $reservation->setCheckbox('checked');
          }
        else
          {
            $reservation->setCheckbox('');
          }

        $reservation->setNbr_places($_POST["nbr_places"]);
        $reservation->setDestination($_POST['destination']);
        $reservation->setDestinationError('');
        $reservation->setPlaceError('');

        include("../views/page_two.php");
      }

    /* Destination isn't correct */
    elseif (is_numeric($_POST["nbr_places"]) && $_POST["nbr_places"] < 10 && is_numeric($_POST["destination"]))
      {
        $reservation->setDestinationError("Veuillez entrer une destination");
        $reservation->setNbr_places($_POST["nbr_places"]);
        $reservation->setDestination("");
        $reservation->setPlaceError('');
        include("../views/page_one.php");
      }
    else
      { 
        $reservation->setDestinationError("Veuillez entrer une destination");
        $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
        include("../views/page_one.php");
      }
  }

  /* Checking if the number of place is correct. Destination is empty */
  elseif (empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
    { 

      /* The number of place is respected */
      if (is_numeric($_POST["nbr_places"]) && $_POST["nbr_places"] < 10)
      {
        $reservation->setPlaceError('');
        $reservation->setNbr_places($_POST["nbr_places"]);
      }

      /* The number of place isn't respected */
      else
      {
        $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      }

      $reservation->setDestinationError("Veuillez entrer une destination");
      $reservation->setDestination("");
      include("../views/page_one.php");
    }

  /* Checking if Destination is respected. The number of place is empty. */
  else
   {

    /* Destination is correct */
    if (!is_numeric($_POST["destination"]))
      {
        $reservation->setdestinationError('');
        $reservation->setDestination($_POST['destination']);
        $reservation->setAge(0);
      }

    /* Destination isn't correct */  
    else
      {
      $reservation->setDestinationError("Veuillez entrer une destination");
      }
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("../views/page_one.php");
    } 
  }


/* Back to the first page */ 
if (!empty($_POST["return_to_reservation"])&& !empty($_POST['nbr_places']) && !empty($_POST["destination"]) && !empty($_POST['send']))
  {
    include("../views/page_one.php");
  }


/* Second page */
if (!empty($_POST["validation"]) && empty($_POST['return_to_reservation']) && empty($_POST['cancel']))
  {

    if (isset($_POST["ages"]) &&  isset($_POST["names"])) 
    {
      $reservation->setName($_POST['names']);
      $reservation->setAge($_POST['ages']);
      $errorName = 0;
      $errorAge = 0;

      foreach ($reservation->getName() as $inputName)
        {
          if ($inputName == ''|| is_numeric($inputName))
            {
              $errorName +=1;
            }
        }

      foreach ($reservation->getAge() as $inputAge)
        {
          if ($inputAge == '' || !is_numeric($inputAge) || $inputAge <=0)
            {
              $errorAge +=1;
            }
        } 

      /* All is respected */
      if ($errorName == 0 && $errorAge ==0)
        {
          $reservation->setName($_POST['names']);
          $reservation->setAge($_POST['ages']);
          $reservation->setAgeError('');
          $reservation->setNameError('');
          include '../views/page_three.php';
        }

      /* Name isn't respected */
      elseif ($errorName !=0  &&  $errorAge ==0)
        {
          $reservation->setNameError('Veuillez entrer un nom pour chaque personne');
          $reservation->setAge($_POST['ages']);
          $reservation->setName([]);
          $reservation->setAgeError('');
          include '../views/page_two.php';
        }

      /* Age isn't respected */
      elseif ($errorName ==0 && $errorAge !=0)
        {
          $reservation->setAgeError('Veuillez entrer un age supérieur à 0');
          $reservation->setName($_POST['names']);
          $reservation->setAge([]);
          $reservation->setNameError('');
          include '../views/page_two.php';
        }

      /* Names boxes and ages boxes are empties */
      else
        {
        $reservation->setNameError('Veuillez entrer un nom pour chaque personne');
        $reservation->setAgeError('Veuillez entrer un age supérieur à 0');
        include '../views/page_two.php';
        }
    }
  } 

/* Back to the second page */
if (isset($_POST["return_to_detail"])) 
  {
  include ("../views/page_two.php");

  }

/* Page Four */
if(!empty($_POST["check"]) && empty($_POST["cancel"])&& empty($_POST["return_to_detail"]))
  {
    $reservation->setID($_POST['id']);

    /*Connexion with the database */
    $mysql = db::connectTodb('localhost','','');

    /*Create a database if not exists */
    db::choicedb($mysql,'test');

    /*Create a table if not exists */
    db::selectTable($mysql,'reservations');

    /* Updating a reservation */
    if ($_POST['id'] != "")
      {
        db::updateReservation(
        $mysql,
        'reservations',
        $reservation->getName(),
        $reservation->getDestination(),
        $reservation->getAge(),
        $reservation->getNbr_places(),
        $reservation->getPrice(),
        $reservation->getInsurance(),
        $reservation->getID());
      }
    
    /* Addition of a reservation in the database */
    else
      {
        db::addReservation(
        $mysql,
        'reservations',
        $reservation->getName(),
        $reservation->getDestination(),
        $reservation->getAge(),
        $reservation->getNbr_places(),
        $reservation->getPrice(),
        $reservation->getInsurance()
        );   
      }

    include("../views/page_four.php");
  }


/* Canceling a reservation and destruction of the session */
if(!empty($_POST["cancel"]) && isset($_POST["cancel"]))
 {
  session_destroy();
  unset($reservation);
  include("../views/page_one.php");
 }


/* Go to Database */
 if(!empty($_POST["back_to_list"]) && isset($_POST["back_to_list"]))
 {
  session_destroy();
  unset($reservation);
  include("../views/bookingslist.php");
 }


/* Save a session */
if (isset($reservation))
{
  $_SESSION['reservation'] = serialize($reservation);
}

/* Default page */
if(empty($_POST["send"]) && empty($_POST["validation"]) && empty($_POST["check"]) && empty($_POST["cancel"]) && 
   empty ($_POST["return_to_detail"]) && empty($_POST['back_to_list']))
  {
    include('../views/page_one.php');
  }

?>
