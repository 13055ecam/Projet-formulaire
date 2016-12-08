<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" href="../views/style.css" />
    </head>
    <body>
        <form method ="post" action= "index.php"/>
          <center> 
            <H1> Détail Reservation </H1>
          </center>
          <span class="error">*<?php if(isset($reservation)) echo $reservation->getNameError()?></span>
          </br>
          <span class="error">*<?php if(isset($reservation)) echo $reservation->getAgeError()?></span>
          </br>
          <div id = 'littleform2'>
            <?php
              for($i = 0; $i < $reservation->getNbr_places(); $i++) 
                {
                  echo '
                        <label>Nom : </label> 
                        <input type= "text" name="names[]" value= "'.$reservation->getName()[$i].'"/>
                        </br>
                        <label>Age :</label>
                        <input type= "text" name="ages[]" value= "'.$reservation->getAge()[$i].'" />
                        <br><br>';
                }
            ?>
          </div>
          </br>
          <center>
            <div id = "bouton">
        			<input type="submit" name ="validation" value= "Etape suivante" />
              <input type="submit" name ="return_to_reservation" value= "Retour à la page précédente" />
        			<input type="submit" name ="cancel" value= "Annuler la réservation" />
            </div>
          </center>
  	</form>
  </body>
</html>