<?php

class Reservation
{
  private $destination;
  private $nbr_places;
  private $names;
  private $ages;
  private $assurance;
  private $personnes;
  private $checkbox;

  public function __construct($destination ="", $nbr_places="", $names='', $ages='')
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
    if ($this->checkbox == 'checked')
    {
      return 'OUI';
    }
    else
    {
      return 'NON';
    }
  }
  /*
  public function setAssurance($newassurance)
  {
    $this->assurance = $newassurance;
  }
  */

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
  public function getPersonne()
  {
    $this->personnes;
  }
  public function setPersonne($newpersonne)
  {
    array_push($this->personnes = $newpersonne);
  }
   public function getCheckbox()
  {
    return $this->checkbox;
  }
  public function setCheckbox($newvaleur)
  {
    if ($newvaleur == 'checked')
    {
      $this->checkbox = 'checked';
    }
    else
    {
      $this->checkbox = '';
    }
  }
}
?>