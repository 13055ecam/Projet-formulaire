<html>
      <head>
        <title>Reservation</title>
        <link rel="stylesheet" type="text/css" href='style.css'>
      </head>
      <body>
        <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"/>
          <center>
            <h1>Confirmation des réservations</h1>
          </center>
            <p>Votre demande a bien été enregistrée.</p>
            <p>Merci de bien vouloir verser la somme de
            <?php 
              if (isset($reservation))
                {
                  echo $reservation->getPrice()." euros sur le compte 000-000000-00";
                }
            ?>
            </p>
            </br>
            <center>
              <div id = "bouton">
                <input type='submit' name='cancel' value="Retour à la page d'accueil"/>
              </div>
            </center>
        </form>
      </body>
</html>