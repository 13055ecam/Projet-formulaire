<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="../views/style.css">
    </head>
    <body>
        <form method ="POST" action="controller_DB.php"/>
            <center>
                <H1>Liste des réservations</H1>
            </center>
            <div id = "bouton">
                <input type="submit" name ="addReservation" value= "Ajouter réservation"/>
            </div>
                <?php 
                    $mysql = db::connectTodb('localhost','','');
                    db::choicedb($mysql,'test');
                    db::selectTable($mysql,'reservations');
                    $result = db::selectData($mysql,'reservations');
                    $colcount = $result->columnCount();
                    // Get coluumn headers
                    echo ('<center><table><tr>');
                    for ($i = 0; $i < $colcount; $i++)
                    {
                        $meta = $result->getColumnMeta($i)["name"];
                        echo('<th>' . $meta . '</th>');
                    }
                    echo('<th>' . 'Editer' . '</th>');
                    echo('<th>' . 'Supprimer' . '</th>');
                    echo('</tr>');
                    // Get row data
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo('<tr>');
                        for ($i = 0; $i < $colcount; $i++)
                        {
                            $meta = $result->getColumnMeta($i)["name"];
                            echo('<td>' . $row[$meta] . '</td>');
                        }
                        echo "
                        <td><input type='submit' name='Modify_".$row['id']."' value='Modifier'/></td>
                        <td><input type='submit' name='Delete_".$row['id']."' value='Supprimer'/></td>";
                    }
                    echo ('</tr></table></center>');
                ?>
        </form>
    </body>
</html>
