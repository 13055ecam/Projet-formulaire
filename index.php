
<?php
session_start();

if (!empty($_GET["name"]))
{
    include $_GET["name"].'.php';
}
else
{
  include 'controleur.php';
}


?>