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
    include 'controller_reservation.php';
}

?>
