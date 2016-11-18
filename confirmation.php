<?php
error_reporting(0);
?>
<html>
      <head>
          <title>Reservation</title>
        <link rel="stylesheet" type="text/css" href='style.css'
      </head>

      <body>
        <center>

          <h1>Confirmation des réservations</h1>
          <form method='post' action="index.php"
          <p>Votre demande a bien été enregistrée.<br>Merci de bien vouloir verser la somme de 
          <?php 
          if (isset($reservation))
              echo $reservation->getPrice()
                ?> euros sur le compte 000-000000-00
              <p> </p>
              <input type='submit' name='Cancel' value="Retour à la page d'accueil"/>
          </form>

        </center>
      </body>
</html>