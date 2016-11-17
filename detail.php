<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" href="style.css" />

    </head>
    <body>
    <?php
    $nomErr = $ageErr = $age1Err= $nom1Err = "";
    $nom = $nom1 = $age = $age1= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["names"]))
    {
      $nomErr = "Veuillez entrer un nom pour chaque personne";
    }else{
    $nom = test_input($_POST["nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$destination)) {
      $nomErr = "Lettres obligatoires, pas de chiffres"; 
  }
}
  if (empty($_POST["ages"]))
    {
$ageErr = "Veuillez entrer un age";
    }else{
    $age = test_input($_POST["age"]);
    if (!preg_match("/^[1-10]*$/",$age)) {
      $ageErr = "Veuillez entrer un age supérieur à 0"; 
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>      
        <div class = "intro">
        <p>
        <H1> Détail Reservation </H1>
        </div>
        <form method ="post" action= index.php>
        <?php
                for($i = 0; $i < $nbr_places; $i++) {
                        echo '
                        <p>
                        <span class="error">* '.$nomErr.'</span><br><br>
                        Nom : 
                        <input type= "text" name="names[]" value= "'.$names[$i].'"><br><br>
                        <span class="error">* '.$ageErr.'</span>
                        <br><br>
                        Age :
                        <input type= "text" name="ages[]" value= "'.$ages[$i].'" /><br><br>
                        </p>';
                       }
            ?>
                  <br/><br/>
  				        <input type="submit" name ="validation" value= "Etape suivante" />
                  <input type="submit" name ="return" value= "Retour à la page précédente" />
  				        <input type="submit" name ="Cancel" value= "Annuler" />
  			</form>
    </p>
  </body>
</html>

