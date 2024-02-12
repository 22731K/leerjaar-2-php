<?php
class kamer{
    private $lengte;
    private $breedte;
    private $hoogte;
  
    public function __construct($lengte,$breedte,$hoogte){

        $this->lengte= $lengte;
        $this->breedte=$breedte;
        $this->hoogte=$hoogte;
    }

    public function berekenGrootte() {
        return $this->lengte * $this->breedte * $this->hoogte;
    }
    public function toonAfmetingen() {
        echo "Inhoud Kamers:<br> Lengte: " . $this->lengte . "m Breedte: " . $this->breedte . "m Hoogte: " . $this->hoogte . "m";
    }
}
class Huis{

    private $kamers=[];
    public function voegKamerToe($kamer) {
        $this->kamers[] = $kamer;
    }


    public function totaleGrootte(){

        $totaleGroote=0;
        foreach($this->kamers as $kamer){

         $totaleGroote += $kamer -> berekenGrootte();

        }
        return $totaleGroote;
    }


    public function prijs(){
             
        $totaleGroote = $this->totaleGrootte();
        $prijs=$totaleGroote * 100;
        return $prijs;

    } 
    
}

$kamer1= new kamer(5.2, 5.1, 5.5);
$kamer2= new kamer(4.8, 4.6, 4.9);
$kamer3= new kamer(5.9, 2.5, 3.1);
$kamer1->toonAfmetingen();
$kamer2->toonAfmetingen();
$kamer3->toonAfmetingen();

$huis= new Huis();
$huis -> voegKamerToe($kamer1);
$huis -> voegKamerToe($kamer2);
$huis -> voegKamerToe($kamer3); 


echo"<br>Volume Totaal= ". $huis->totaleGrootte()."";
echo"<br>Het prijs van het huis is ". $huis->prijs()."";

 ?>