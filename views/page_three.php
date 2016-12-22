<!DOCTYPE html>
<html>
  <head>
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="../views/style.css">
  </head> 
  <body>
    <form method="post" action="index.php"/>
      <input type="hidden" name="id" value="<?php if(isset($reservation)) echo $reservation->getID();?>"/>
      <br/>
      <center>
        <h1>VALIDATION DES RESERVATIONS</h1>
        <table>
          <tr>
            <td>Destination</td>
            <td><?php if (isset($reservation)) echo $reservation->getDestination();?></td>
          </tr>
          <tr>
            <td>Nombre de places</td>
            <td><?php echo $reservation->getNbr_places();?></td>
          </tr>

          <?php

            for ($i = 0; $i < $reservation->getNbr_places(); $i++)
              {
                echo'
                  <tr>
                    <td>Nom</td>
                    <td> '.$reservation->getName()[$i].' </td>
                  </tr>
                  <tr>
                    <td>Age</td>
                    <td> '.$reservation->getAge()[$i].'</td>
                  </tr>';  
              }

          ?>

          <tr>
            <td>Assurance annulation</td>
            <td> <?php if(!empty($reservation)) echo $reservation->getInsurance(); ?></td>
          </tr>
        </table>
        </br>
        <div id = "bouton">
          <input type="submit" name="check" value="Confirmer"/>
          <input type="submit" name="return_to_detail" value="Retour à la page précédente"/>
          <input type="submit" name ="cancel" value="Annuler la réservation " />
        </div>
      </center>
    </form>
  </body>
</html>
