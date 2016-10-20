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
      $destinationErr = "destination is required";
    }else{
    $destination = test_input($_POST["destination"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$destination)) {
      $destinationErr = "Only letters and white space allowed"; 
  }
}
  if (empty($_POST["place"]))
    {
$placeErr = "a number place is required";
    }else{
    $place = test_input($_POST["place"]);
    if (!preg_match("/^[1-10]*$/",$place)) {
      $placeErr = "Only numbers 1-10"; 
  }
}
  if (empty($_POST["assurance"]))
    {
    $assuranceErr = "yes or no";
  }else{
  {$assurance = test_input($_POST['assurance']);}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <H1> Reservation </H1>
        <p> Le prix de la place est de 10 € jusqu'à 12 ans et ensuite de 15 ans.</p>
        <p> Le prix d'assurance annulation est de 20 ans quels que soit le nombre de voyageurs. </p>
          <form method ="post" action="<?php echo CFG_FORM_ACTION; ?>?stage=<?php echo CFG_STAGE_ID+1; ?>">
          Destination : 
        <input type="text" name="destination" value="<?php echo $destination;?>"/>
                <br><br>
        Nombre de places : 
        <input type="text" name="place"  value="<?php echo $place;?>" />
                <br><br>
            Assurance annulation:
  <input type="checkbox" name="assurance" <?php if (isset($assurance) && $assurance=="oui") echo "oui";?> value="oui">oui
        <br><br>
        <input type="submit" name ="Next" value= "suivant"/>
        <input type="submit" name ="Cancel" value= "Annuler"
        </form>
    </body>
</html>

