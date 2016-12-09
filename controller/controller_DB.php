<?php

include_once('../models/model_DB.php');
include_once('../models/model_reservation.php');

$hostname = 'localhost';
$username = '';
$password = '';
try
{
    //Connection to DB
    $mysql = db::connectTodb($hostname,$username,$password);
    
    
    //Creation of a DB 'test' if not exists
    db::choicedb($mysql,'test');
    
    
    //Creation of a table 'reservation' if not exists
    db::selectTable($mysql,'reservations');
    
    
    //Selection of all datas in the table
    $result = db::selectData($mysql,'reservations');
    foreach($result as $row)
    {
        $id = $row['id'];
        $modif = "Modify_".$id;
        $delete = "Delete_".$id;
        
        
      //Editing of a booking in the database
       if(isset($_POST[$modif]))
       {
           
            //Starting of a session and addition of a booking in the session.
            session_start();
            $reservation = new reservation();
            $_SESSION['reservation'] = $reservation;
            $result = db::updateRev($mysql,'reservations',$id); 
           
            foreach  ($result as $row)
            { 
              $reservation->setID($id);
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
        
        
        //deleting of a booking of the database 
        elseif (isset($_POST[$delete]))
        {
            db::removeRev($mysql,'reservations',$id);
            include('../views/bookingslist.php');
        }
        
      }
    
    
        //add a new booking
        if (!empty($_POST['addReservation']))
        {
            include ('index.php');
        }
        elseif(empty($_POST['addReservation']) && !isset($delete) && !isset($modif))
        {
          include('../views/bookingslist.php');
        }
    
    
        //Nothing in the database 
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
