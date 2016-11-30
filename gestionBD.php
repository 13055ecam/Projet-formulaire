<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"/>
            <center>
                <H1>Liste des réservations</H1>
            </center>
            <div id = "bouton">
                    <input type="submit" name ="addReservation" value= "Ajouter réservation"/>
            </div>
            <div id = 'little_form'>
            </div>
         </form>
    </body>
</html>