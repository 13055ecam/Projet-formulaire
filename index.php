<?php
session_start();
//Include class definition
include 'model.php';
//Look opened reservation 
if (isset($reservation))
{
  $reservation;
}
//Instanciation of a new object
else
{
  $reservation = new Reservation();
  $_SESSION['reservation'] = $reservation;
}
//Page 1
// on teste si nos variables sont définies
if(isset($_POST["send"]))
{
  $reservation->setDestination($_POST['destination']);
  $reservation->setNbr_places($_POST['nbr_places']);
  $reservation ->setAssurance($_POST['assurance']);
  $nbr_places = $reservation->getNbr_places();
  $destination = $reservation->getDestination();
  $assurance = $reservation->getAssurance();
  $_SESSION['destination'] = $destination;
  $_SESSION['assurance'] = $assurance;
  $_SESSION['nbr_places'] = $nbr_places;
  include ('detail.php');
}
if (isset($_POST["Cancel"])){
  session_destroy();
  session_start();
  include("reservation.php");
}
if (isset($_POST["validation"])){
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  $names = $reservation->getName();
  $ages = $reservation->getAge();
  $_SESSION['names'] = $names;
  $_SESSION['ages'] = $ages;
  $destination=$_SESSION['destination'];
  $assurance=$_SESSION['assurance'];
  $nbr_places=$_SESSION['nbr_places'];
  include("resume.php");
}
if (isset($_POST["returntodetail"])){
  $names = $_SESSION['names'];
  $ages = $_SESSION['ages'];
  $nbr_places=$_SESSION['nbr_places'];
  include ("detail.php");
}
if (isset($_POST["check"])){
  $nbr_places=$_SESSION['nbr_places'];
  include("confirmation.php");
}
if (isset($_POST["return"])){
  $destination=$_SESSION['destination'];
  $assurance=$_SESSION['assurance'];
  $nbr_places=$_SESSION['nbr_places'];
  include("reservation.php");
}
if (!isset($_POST["return"])&&!isset($_POST["check"])&&!isset($_POST["returntodetail"])&&!isset($_POST["validation"])&&!isset($_POST["Cancel"])&&!isset($_POST["send"])){
  include("reservation.php");
}
?>