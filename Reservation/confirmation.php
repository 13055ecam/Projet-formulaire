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
             $prixplace = 0;
             $prixassurance = 0;
            if (isset($reservation)) 
            {
              if ($reservation->getAge() <= 12)
              {
                $prixplace = $prixplace + 10;
              }
              else
                $prixplace = $prixplace + 15;

              if ($reservation->getAssurance() == "OUI"){
                $prixassurance = 20;
              }
              else
                $prixassurance = 0;
            }
              echo ($prixassurance + $prixplace);
                ?> euros sur le compte 000-000000-00
              <p> </p>
              <input type='submit' name='Cancel' value="Retour à la page d'accueil"/>
          </form>

        </center>
      </body>
</html>