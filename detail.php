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
        <form method ="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <center> 
        <H1> Détail Reservation </H1>
        </center>
        <?php 
                for($i = 0; $i < $reservation->getNbr_places(); $i++) {
                        echo '
                        <span class="error">-'.$reservation->getNameError().'</span>
                        <br><br>
                        <span class="error">-'.$reservation->getAgeError().'</span>
                        <br><br>
                        Nom : 
                        <input type= "text" name="names" value= "'.$reservation->getName()[$i].'">
                        <br><br>
                        Age :
                        <input type= "text" name="ages" value= "'.$reservation->getAge()[$i].'" />
                        <br><br>';
                       }
            ?>
  				        <input type="submit" name ="validation" value= "Etape suivante" />
                  <input type="submit" name ="returntoreservation" value= "Retour à la page précédente" />
  				        <input type="submit" name ="Cancel" value= "Annuler la réservation" />
  			</form>
  </body>
</html>

