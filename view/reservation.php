
<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <H1> Reservation </H1>
        <p> Le prix de la place est de 10 € jusqu'à 12 ans et ensuite de 15 ans.</p>
        <p> Le prix d'assurance annulation est de 20 euros quels que soit le nombre de voyageurs. </p>
        <p><span class="error">* Champs obligatoires.</span></p>
        <form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php /* if ($destinationErr != "")
        {
          echo "<span class='error'>* ".$destinationErr."<span>";
        }*/
        ?>
        <br><br>
        Destination : 
        <input type="text" name="destination" value="<?php if(isset($reservation)) echo $reservation->getDestination();?>"/>
        <br><br>
        <?php /*if ($placeErr != "")
        {
          echo "<span class='error'>* ".$placeErr."<span>";
        }
        */
        ?>
        <br><br>
        Nombre de places : 
        <input type="text" name="nbr_places"  value="<?php if(isset($reservation)) echo $reservation->getNbr_places();?>" />
                <br><br>
            Assurance annulation:
  <input type="checkbox" name="assurance" value="<?php if ($reservation->getAssurance() =='oui') echo "Checked";?>"
        <br><br>
        <input type="submit" name ="send" value= "Etape suivante"/>
        <input type="submit" name ="Cancel" value= "Annuler la réservation"/>
        </form>
    </body>
</html>