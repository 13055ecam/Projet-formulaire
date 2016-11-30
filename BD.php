<?php
$hostname = 'localhost';
$database = 'test';
$username = '';
$password = '';
try
{
$bdd = new PDO("mysql:host=$hostname;dbname=$database",$username,$password); 
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$bdd->exec("CREATE TABLE IF NOT EXISTS `reservations`(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    destination varchar(255) NOT NULL,
    nombre_de_place int(11) NOT NULL,
    prix int(11) NOT NULL,
    assurance varchar(255)  NOT NULL,
    names varchar(255) NOT NULL,
    ages varchar(255) NOT NULL),
    PRIMARY KEY (`names_id`));");


$req = $bdd->prepare('INSERT INTO reservations (id,noms, destination,ages, nombre_de_place, prix,assurance) VALUES (NULL, :noms, :destination, :ages, :nombre, :prix, :assurance)');

    $req->execute(array(
    'noms' =>implode( ",",$reservation->getName()),
    'destination' =>$reservation->getDestination(),
    'ages' => implode( ",",$reservation->getAge()),
    'nombre' => $reservation->getNbr_places(),
    'prix' =>$reservation->getPrice(),
    'assurance' => $reservation->getInsurance()
    ));
/*
$req = $bdd->prepare('UPDATE reservation SET noms = :nvnoms, destination= :nvdestination, ages = :nvages, nombre_de_place = :nvNbr_place, prix = nvprix, assurance = nvassurance WHERE nom = :nom_reservation');

$req->execute(array(
    'noms' => $nvnoms,
    'destination' => $nvdestination,
    'ages' => $nvages,
    'nombre_de_place'=>$nvNbr_place
    'prix' => $nvprix
    'assurance' => $nvassurance
    ));

//$req = $bdd->prepare('DELETE FROM reservations' )
*/
?>