<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method ="post" action="index.php"/>
            <center>
                <H1>Liste des réservations</H1>
            </center>
            <div id = "bouton">
            <input type="submit" name ="addReservation" value= "Ajouter réservation"/>
            <?php 
            $colcount = $result->columnCount();

            // Get coluumn headers
            echo ('<center><table><tr>');
            for ($i = 0; $i < $colcount; $i++){
                $meta = $result->getColumnMeta($i)["name"];
                echo('<th>' . $meta . '</th>');
            }
            echo('<th>' . 'Editer' . '</th>');
            echo('<th>' . 'Supprimer' . '</th>');
            echo('</tr>');


            // Get row data
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo('<tr>');
                for ($i = 0; $i < $colcount; $i++){
                    $meta = $result->getColumnMeta($i)["name"];
                    echo('<td>' . $row[$meta] . '</td>');
                }
                echo('<td>' . '<a href=index.php?editer='.$row['id'].'>Editer</a>' . '</td>');
                echo('<td>' . '<a href=BD.php?supprimer='.$row['id'].'>Supprimer</a>' . '</td>');
            }
            echo ('</table></center>');
             ?>
         </form>
    </body>
</html>