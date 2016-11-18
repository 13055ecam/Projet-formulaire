
<html>
      <head>
          <title>Reservation</title>
        <link rel="stylesheet" type="text/css" href="style.css">
      </head>

      <body>
          <center>
          <h1>VALIDATION DES RESERVATIONS</h1>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
                <tr>
                  <td>Destination</td>
                  <td><?php echo $reservation->getDestination(); ?></td>
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
                  <td> <?php if(!empty($reservation)) echo $reservation->getAssurance(); ?></td>
                </tr>
                </form>
              </table>
              <p> </p>
              <input type="submit" name="check" value="Confirmer"/>
              <input type="submit" name= "returntodetail" value = "Retour à la page précédente"/>
              <input type="submit" name ="Cancel" value= "Annuler la réservation " />
              </center>
      </body>
</html>