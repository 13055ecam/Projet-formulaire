<?php

class Reservation
{
  private $destination;
  private $nbr_places;
  private $names;
  private $ages;

  public function __construct($destination =" ", $nbr_places=0, $names='', $ages=0)
  {
    $this->destination = $destination;
    $this->nbr_places = $nbr_places;
    $this->names = $names;
    $this->ages = $ages;
  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function setDestination($newdestination)
  {
    $this->destination = $newdestination;
  }

  public function getAssurance()
  {
    return $this->assurance;
  }

  public function setAssurance($newassurance)
  {
    $this->assurance = $newassurance;
  }

  public function getNbr_places()
  {
    return $this->nbr_places;
  }

   public function setNbr_places($newplaces)
  {
    $this->nbr_places = $newplaces;
  }

  
  public function getName()
  {
    return $this->names;
  }

  public function setName($newname)
  {
    $this->names = $newname;
  }

   public function getAge()
  {
    return $this->ages;
  }

  public function setAge($newage)
  {
    $this->ages = $newage;
  }
}
?>