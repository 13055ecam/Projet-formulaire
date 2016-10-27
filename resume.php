<?php
error_reporting(0);
?>
<html>
      <head>
          <title>Reservation</title>
        <link rel="stylesheet" type="text/css" href="style.css">
      </head>

      <body>
        <center>

          <h1>VALIDATION DES RESERVATIONS</h1>

          <form method='post' action='index.php'>
            <table>
                <tr>
                  <td>Destination</td>
                  <td><?php echo $destination; ?></td>
                </tr>
                <tr>
                  <td>Nombre de places</td>
                  <td><?php echo $nbr_places ?></td>
                </tr>

                <?php
                for ($i = 0; $i <$nbr_places; $i++)
                {
                  echo'
                  <tr>
                         <td>Nom</td>
                         <td> '.$names[$i].' </td>
                       </tr>
                       <tr>
                         <td>Age</td>
                         <td> '.$ages[$i].'</td>
                       </tr>';
                }
                ?>
                <tr>
                  <td>Assurance annulation</td>
                  <td> <?php echo $assurance ?></td>
                </tr>
              </table>
            <div>
              <input type="submit" name="check"
              value="Confirmer"/>
              <input type="submit" name= "returntodetail "value="Retour à la page précédente"/>
              <input type='submit' name='Cancel' value='Annuler la reservation'/>
            </div>
          </form>
        </center>
      </body>
</html>