<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="../views/style.css">
    </head>
    <body>
        <form method="post" action="index.php"/>
            <center>
                <H1>RESERVATION</H1>
            </center>
           <span class='error'>*<?php if(isset($reservation)) echo $reservation->getDestinationError();?></span>
            <br/>
            <span class='error'>*<?php if(isset($reservation)) echo $reservation->getPlaceError();?></span>
            <br/>
            <p> Le prix de la place est de 10 € jusqu'à 12 ans et ensuite de 15 euros.</p>
            <p> Le prix d'assurance annulation est de 20 euros quels que soit le nombre de voyageurs.</p>
            <div id='little_form'>
                <label>Destination : </label>
                <input type="text" name="destination" value="<?php if(isset($reservation)) echo $reservation->getDestination();?>"/>
                <br/>
                <label>Nombre de places : </label>
                <input type="text" name="nbr_places"  value="<?php if(isset($reservation)) echo $reservation->getNbr_places();?>"/>
                <br/>
                <label>Assurance annulation</label>
                <input type="checkbox" name="insurance" value="<?php if(isset($reservation)) echo $reservation->getCheckbox();?>"/>
            </div>
            </br>
            <center>
                <div id = "bouton">
                    <input type="submit" name="send" value="Etape suivante"/>
                    <input type="submit" name="cancel" value="Annuler la réservation"/>
                </div>
            </center>
         </form>
    </body>
</html>
