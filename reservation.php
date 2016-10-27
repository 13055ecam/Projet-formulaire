<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<?php
$destinationErr = $placeErr = $assuranceErr = "";
    $destination = $place = $assurance = $next= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["destination"]))
    {
      $destinationErr = "Veuillez entrer une destination";
    }else{
    $destination = test_input($_POST["destination"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$destination)) {
      $destinationErr = "Seulement des lettres, pas de chiffres"; 
  }
}
  if (empty($_POST["nbr_places"]))
    {
$placeErr = "Veuillez entrer un nombre de places";
    }else{
    $place = test_input($_POST["nbr_places"]);
    if (!preg_match("/^[1-10]*$/",$place)) {
      $placeErr = "Veuillez entrer un nombre supérieur à 0 et inférieur à 10"; 
  }
}
}
?>
        <div class = "intro">
        <H1> Reservation </H1>
        <p> Le prix de la place est de 10 € jusqu'à 12 ans et ensuite de 15 ans.</p>
        <p> Le prix d'assurance annulation est de 20 ans quels que soit le nombre de voyageurs. </p>
                <p><span class="error">* Champs obligatoires.</span></p>
                </div>

        <form method ="post" action="index.php">
        <span class="error">* <?php echo $destinationErr;?></span><br><br>
        Destination : 
        <input type="text" name="destination" value="<?php if (isset($destination))echo $destination;?>"/>
                <br><br>
        <span class="error">* <?php echo $placeErr;?></span><br><br>
        Nombre de places : 
        <input type="text" name="nbr_places"  value="<?php if (isset($nbr_places))echo $nbr_places;?>" />
                <br><br>
            Assurance annulation:
  <input type="checkbox" name="assurance" <?php if (isset($assurance) && $assurance=="oui") echo "oui";?> value="oui">oui
        <br><br>
        <input type="submit" name ="send" value= "Etape suivante"/>
        <input type="submit" name ="Cancel" value= "Annuler la réservation"/>
        </form>
    </body>
</html>

