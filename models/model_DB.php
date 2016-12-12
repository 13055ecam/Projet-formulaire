<?php

class db
  {
    public static function connectTodb($host,$username,$password)
    {
      return new PDO("mysql:host=$host", $username,$password);
      $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function choicedb($mysql,$DBName)
    {
      $mysql->exec("CREATE DATABASE IF NOT EXISTS $DBName");
      $mysql->exec("use $DBName");
    }

    public static function selectTable($mysql,$table)
    {
      $mysql->exec("CREATE TABLE IF NOT EXISTS $table(
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
      destination varchar(255) NOT NULL, 
      nombre_de_place int(11) NOT NULL, 
      prix int(11) NOT NULL, 
      assurance varchar(255) NOT NULL, 
      names varchar(255) NOT NULL, 
      ages varchar(255) NOT NULL);");
    }

    public static function addReservation($mysql,$table,$names,$destination,$ages,$nombre,$price,$insurance)
    {
      $add = $mysql->prepare("INSERT INTO $table(id,names,destination,ages, 
      nombre_de_place, prix,assurance)
      VALUES (NULL, :noms, :destination, :ages, :nombre, :prix, :assurance)");

      $add->execute((array(
      'noms' =>implode( ",",$names),
      'destination' =>$destination,
      'ages' => implode( ",",$ages),
      'nombre' => $nombre,
      'prix' =>$price,
      'assurance' => $insurance
      )));
    }

    public static function updateReservation($mysql,$table,$names,$destination,$ages,$nombre,$price,$insurance,$line)
    {
      $add = $mysql->prepare("UPDATE $table set 
        names = :noms, 
        destination= :destination,
        ages=:ages, 
        nombre_de_place = :nombre, 
        prix = :prix,
        assurance=:assurance where id = $line");

      $add->execute((array(
      'noms' =>implode( ",",$names),
      'destination' =>$destination,
      'ages' => implode( ",",$ages),
      'nombre' => $nombre,
      'prix' =>$price,
      'assurance' => $insurance
      )));
    }

    public static function selectData($mysql,$table)
    {
      $data = $mysql->query("SELECT id,names,destination,ages,prix,assurance FROM $table");
      return $data;
    }

    public static function removeReservation($mysql,$table,$line)
    {
      $mysql->exec("DELETE FROM $table WHERE id=$line ") or exit(mysql_error());
    }

    public static function selectRow($mysql,$table,$line)
    {
      $data = $mysql->query("SELECT * FROM $table WHERE id=$line");
      return($data);
    }
  }
?>
