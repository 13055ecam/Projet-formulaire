
<?php
session_start();

if (!empty($_GET["controleur"]))
{
  echo 'index_'.$_GET["controleur"].'.php';
    include 'index_'.$_GET["controleur"].'.php';
}
else
{
  include 'controleur.php';
}
?>