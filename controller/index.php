<?php

if(!isset($_SESSION['reservation']))
{
    session_start();
}  

if (!empty($_GET["name"]))
{
    include ($_GET["name"].'.php');
}
else
{
<<<<<<< HEAD
  include 'controller_reservation.php';
=======
  include 'controleur_reservation.php';
>>>>>>> ef6e8feaf94e0b755e412be0294f8dd22e39dfc8
}

?>
