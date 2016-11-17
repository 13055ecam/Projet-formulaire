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
        <p>
        <H1> Détail Reservation </H1>
        <form method ="post" action= "index.php">
        <?php 
                for($i = 0; $i < $reservation->getNbr_places(); $i++) {
                        echo '
                        <p>
                        <span class="error">* '.$nomErr.'</span><br><br>
                        Nom : 
                        <input type= "text" name="names" value= "'.$reservation->getName()[$i].'"><br><br>
                        <span class="error">* '.$ageErr.'</span>
                        <br><br>
                        Age :
                        <input type= "text" name="ages" value= "'.$reservation->getAge()[$i].'" /><br><br>
                        </p>';
                       }
            ?>
                  <br/><br/>
  				        <input type="submit" name ="validation" value= "Etape suivante" />
                  <input type="submit" name ="returntoreservation" value= "Retour à la page précédente" />
  				        <input type="submit" name ="Cancel" value= "Annuler" />
  			</form>
    </p>
  </body>
</html>

