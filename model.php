<?php

class Reservation
{
  private $destination;
  private $nbr_places;
  private $names;
  private $ages;
  private $checkbox;
  private $destinationError;
  private $placeError;
  private $ageError;
  private $nameError;

  public function __construct($nbr_places= "",$destination="")
  {
    $this->destination = $destination;
    $this->nbr_places = $nbr_places;
    $this->names = [];
    $this->ages = [];
    $this->destinationError = "";
    $this->placeError = "";
    $this->nameError = "";
    $this->ageError = "";
    $this->checkbox = "";
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDestination($newdestination)
  {
    $this->destination = $newdestination;
  }

  public function getDestinationError()
    {
      return $this->destinationError;
    }
  public function setDestinationError($destinationError)
    {
      $this->destinationError = $destinationError;
    }

  public function getNbr_places()
  {
    return $this->nbr_places;
  }

  public function setNbr_places($newplaces)
  {
    $this->nbr_places = $newplaces;
  }

  public function getPlaceError()
    {
      return $this->placeError;
    }
  public function setPlaceError($placeError)
    {
      $this->placeError = $placeError;
    }

  public function getInsurance()
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

  public function getName()
  { 
    //Add '' when the input is empty
    while (count($this->names) < $this->nbr_places)
    {
      array_push($this->names, "");
    }
    return $this->names;
  }
  public function setName($newname)
  {
    $this->names = $newname;
  }
  public function getNameError()
    {
      return $this->nameError;
    }
  public function setNameError($nameError)
    {
      $this->nameError = $nameError;
    }
   public function getAge()
  {
    //Add '' when the input is empty, < 1, or not a number
    while (count($this->ages) < $this->nbr_places)
    {
      array_push($this->ages, "");
    }
    return $this->ages;
  }
  public function setAge($newage)
  {
    $this->ages = $newage;
  }
  public function getAgeError()
    {
      return $this->ageError;
    }
  public function setAgeError($ageError)
    {
      $this->ageError = $ageError;
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
  public function getPrice()
  {
    $reservationPrice = 0;
    foreach ($this->ages as $ages)
    {
      if ($ages <= 12)
        {
          $reservationPrice += 10;
        }
      else
      {
        $reservationPrice += 15;       
      }
    }
    //return $reservationPrice;
    if ( $this->checkbox == "checked")
      {
        return $reservationPrice + 20;
      }
        return $reservationPrice + 0;  
  }
}
?>