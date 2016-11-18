<?php

include ('model.php');
session_start();


/* Recuperation of a existing session */
if (isset($_SESSION["reservation"]) && !empty($_SESSION['reservation']))
  {
    $reservation = unserialize($_SESSION['reservation']);
  }
else
  {
    $reservation = new Reservation();
  }

/* Page one */
if(!empty($_POST['send']) && empty($_POST['cancel']))
  {


    /* Press next with no values ​​in the boxes */ 
  if (empty($_POST["destination"]) && empty($_POST["nbr_places"]))
    { 
      $reservation->setDestinationError("Veuillez entrer une destination");
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("page_one.php");
    }

  elseif (!empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
  {

    /* Press next with too much traveler */
    if ($_POST["nbr_places"] > 10 && !is_numeric($_POST["nbr_places"]))
      {
        $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
        $reservation->setDestination($_POST['destination']);
        $reservation->setNbr_places("");
        $reservation->setDestinationError("");


        /* Check whether insurance has been taken */
        if (isset($_POST['insurance']))
          {
            $reservation->setCheckbox('checked');
          }
          else
          {
            $reservation->setCheckbox('');
          }
        include("page_one.php");
      }

    else
      {
        $reservation->setNbr_places($_POST["nbr_places"]);
        $reservation->setDestination($_POST['destination']);
        $reservation->setPlaceError("");
        $reservation->setDestinationError("");

        if (isset($_POST['insurance']))
          {
            $reservation->setCheckbox('checked');
          }
          else
          {
            $reservation->setCheckbox('');
          }
      include("page_two.php");
    }
  }

  /* Destination box is empty */
  elseif (empty($_POST["destination"]) && !empty($_POST["nbr_places"]))
    {
      if ($_POST["nbr_places"] > 10 && !is_numeric($_POST["nbr_places"]))
        {
          $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
          $reservation->setDestinationError("Veuillez entrer une destination");
          $reservation->setNbr_places("");

          if (isset($_POST['insurance']))
          {
            $reservation->setCheckbox('checked');
          }
          else
          {
            $reservation->setCheckbox('');
          }
        include("page_one.php");
        }
      else
      {
        $reservation->setDestinationError("Veuillez entrer une destination");
        $reservation->setNbr_places($_POST["nbr_places"]);

        if (isset($_POST['insurance']))
          {
            $reservation->setCheckbox('checked');
          }
          else
          {
            $reservation->setCheckbox('');
        }
        include("page_one.php");
      }
    }

  else
    {
      if (isset($_POST['insurance']))
      {
      $reservation->setCheckbox('checked');
      }
      else
    {
      $reservation->setCheckbox('');
    }

      $reservation->setDestination($_POST['destination']);
      $reservation->setNbr_places("");
      $reservation->setPlaceError("Veuillez rentrer un nombre supérieur à 0 et inférieur à 10");
      include("page_one.php");
    }
}


/* Back to the first page */ 
if (!empty($_POST["return_to_reservation"])&& !empty($_POST['nbr_places']) && !empty($_POST["destination"]) && !empty($_POST['send']))
  {
    include("page_one.php");
  }


/* Page two */
if (isset($_POST["validation"]) && !empty($_POST["validation"]) && empty($_POST['return_to_reservation']) && empty($_POST['cancel']))
  {


  /*Names box and ages box are empties */
  if (empty($_POST["names"]) && empty($_POST["ages"]) && $_POST["ages"]==[] && $_POST["names"]==[])
  {
    $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
    $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
    $reservation->setAge([]);
    $reservation->setName([]);
    include("page_two.php");
  }

  elseif (!empty($_POST["names"]) && !empty($_POST["ages"]) && $_POST["ages"]!=[] && $_POST["names"]!=[])
  {
    if ($_POST["ages"] < 0)
      {
        $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
        $reservation->setName($_POST['names']);
        $reservation->setAge([]);
        $reservation->setNameError("");
        include("page_two.php");
      }
    else
      {
        $reservation->setAge($_POST["ages"]);
        $reservation->setName($_POST['names']);
        $reservation->setAgeError("");
        $reservation->setNameError("");
        include("page_three.php");
      }
    }

  elseif (empty($_POST["names"]) && !empty($_POST["ages"]) && $_POST["ages"]!=[] && $_POST["names"]==[])
  {
    if ($_POST["ages"] < 0)
      {
        $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
        $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
        $reservation->setName($_POST['names']);
        $reservation->setAge([]);
        include("page_two.php");
      }
    else
      {
        $reservation->setNameError("Veuillez entrer un nom pour chaque personne");
        $reservation->setAge($_POST["ages"]);
        include("page_three.php");
      }
  }
  else
    {
      $reservation->setName($_POST['names']);
      $reservation->setAge([]);
      $reservation->setAgeError("Veuillez entrer un age supérieur à 0");
      include("page_two.php");
    }
  }


/* Back to the second page */
if (isset($_POST["return_to_detail"])) 
  {
  include ("page_two.php");
  }


/* Page Four */ 
if (!empty($_POST["check"]) && empty($_POST["cancel"])&& empty($_POST["return_to_detail"]))
  {
  include("page_four.php");
  }


/* Cancel reservation, destruction the session */
if (!empty($_POST["cancel"]) && isset($_POST["cancel"]))
  {
    session_destroy();
    unset($reservation);
    include("page_one.php");
  }


/* Save session */
if (isset($reservation))
{
  $_SESSION['reservation'] = serialize($reservation);
}


/* Default page */
if(empty($_POST["send"]) && empty($_POST["validation"]) && empty($_POST["check"]) && empty($_POST["cancel"]) && empty ($_POST["return_to_detail"]) )
  {
    include("page_one.php");
  }
?>