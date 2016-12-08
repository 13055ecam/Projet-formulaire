<?php
include_once('../models/model_BD.php');
include_once('../models/model_reservation.php');

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
  include 'controleur.php';
}
?>