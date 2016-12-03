<?php
include('model2.php');
$hostname = 'localhost';
$username = '';
$password = '';
try
{
$mysql = db::connectTodb($hostname,$username,$password);
db::choicedb($mysql,'test');
db::selectTable($mysql,'reservations');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$result = db::selectData($mysql,'reservations');

//addreservation
if (isset($_POST['addReservation']))
{
    include ('controleur.php');
}
elseif(isset($_GET['supprimer']))
{
    $id_a_supprimer = intval($_GET['supprimer']);
    db::removeRev($mysql,'reservations',$id_a_supprimer);
}
include('liste_reservation.php');
   
if (isset($_GET['editer']))
{   
    $id_a_modifier = intval(19);
    $pd = db::updateRev($mysql,'reservations',$id_a_modifier);
}
    /*
    $requete = "UPDATE `reservations` SET destinations = :newdestination, nombre_de_place = :newplace, prix = :newprix, assurance = :newassurance, names :newname, ages= :newage WHERE id = $ligne";a
    //$reservation->getName(),
    //$reservation->getDestination(),
    //$reservation->getAge(),
    //$reservation->getNbr_places(),
    //$reservation->getPrice(),
    //$reservation->getInsurance()
*/
 $result->closeCursor();
?>