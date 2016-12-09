<?php

include_once('../models/model_DB.php');
include_once('../models/model_reservation.php');
$hostname = 'localhost';
$username = '';
$password = '';
try
{
$mysql = db::connectTodb($hostname,$username,$password);
db::choicedb($mysql,'test');
db::selectTable($mysql,'reservations');
$result = db::selectData($mysql,'reservations');
foreach($result as $row)
{
    $id = $row['id'];
    $modif = "Modify_".$id;
    $delete = "Delete_".$id;

   if(isset($_POST[$modif]))
   {
        session_start();
        $reservation = new reservation();
        $_SESSION['reservation'] = $reservation;
        $result = db::updateRev($mysql,'reservations',$id);        
        foreach  ($result as $row)
        { $reservation->setID($id);
          $reservation->setDestination($row['destination']);
          $reservation->setNbr_places($row['nombre_de_place']);
          if ($row['assurance']== "OUI")
          {
            $reservation->setCheckbox("checked");
          }
          else
          {
            $reservation->setCheckbox("");
          }
          $reservation->setName(explode(",",$row['names']));
          $reservation->setAge(explode(",",$row['ages']));
          $_SESSION['reservation'] = serialize($reservation);
        } 
        include('index.php');
    }
    //delete a reservation 
    elseif (isset($_POST[$delete]))
    {
        db::removeRev($mysql,'reservations',$id);
        include('../views/bookingslist.php');
    }
  }
  //add a new reservation
    if (!empty($_POST['addReservation']))
    {
        include ('index.php');
    }
    elseif(empty($_POST['addReservation']) && !isset($delete) && !isset($modif))
    {
      include('../views/bookingslist.php');
    }
    elseif(empty($_POST['addReservation']) && !isset($_POST[$delete]) && !isset($_POST[$modif]))
    {
      include('../views/bookingslist.php');
    }
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
