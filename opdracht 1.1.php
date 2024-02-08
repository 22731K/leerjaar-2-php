<?php

class huis{
 public $floor;
 public $rooms;
 public $width;
 public $height;
 public $depth;
 public $price;

 function __construct($floor,$rooms,$width,$height,$depth,$price){
  $this->floor = $floor;
  $this->rooms = $rooms;
  $this->volume = $width * $height * $depth;
  $this->price = $price * $this->volume;
 }

 function __destruct() {
    echo "Dit huis heeft  {$this->floor} verdiepingen,{$this->rooms}kamers en heeft een volume van {$this->volume}m3 <br> De prijs van het huis is:{$this->price}."; 
    echo "<br>";
  }
}
$huis1 = new huis("2","4","10","10","10","350");
$huis2 = new huis("3","5","5","7","6","250");
$huis3 = new huis("4","6","3","5","6","150");

 
 
?>