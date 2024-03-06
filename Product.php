<?php

abstract class Product {
    protected $naam;
    protected $inkoopprijs;
    protected $btw;
    protected $omschrijving;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving) {
        $this->naam = $naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getInkoopprijs() {
        return $this->inkoopprijs;
    }

    public function getBtw() {
        return $this->btw;
    }

    abstract public function productInformatie();
}

class Music extends Product {
    private $artiest;
    private $nummers;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function productInformatie() {
        return "Artiest: " . $this->artiest . ", Nummers: " . implode(", ", $this->nummers);
    }
}

class Film extends Product {
    private $kwaliteit;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function productInformatie() {
        return "Kwaliteit: " . $this->kwaliteit;
    }
}

class Game extends Product { 
    private $genre;
    private $eisen;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $genre, $eisen) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->eisen = $eisen;
    }

    public function productInformatie() {
        return "Genre: " . $this->genre . ", Extra info: " . $this->eisen; 
    }
}

class ProductList {
    private $products = [];

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function displayTable() {
        echo "<table border='1'>";
        echo "<tr><th>Naam van product</th><th>Categorie</th><th>Verkoopprijs</th><th>Informatie over het product</th></tr>";
        foreach ($this->products as $product) {
            echo "<tr>";
            echo "<td>" . get_class($product) . "</td>";
            echo "<td>{$product->getNaam()}</td>";
            echo "<td>" . $this->calculateVerkoopprijs($product) . "</td>";
            echo "<td>" . $product->productInformatie() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    private function calculateVerkoopprijs($product) {
        $verkoopprijs = $product->getInkoopprijs() * (1 + $product->getBtw() / 100);
        $verkoopprijs += $verkoopprijs * 0.3;
        return $verkoopprijs;
    }
}

$productList = new ProductList();

$music1 = new Music("Test1", 10, 9, "", "Artist 1", ["Number 1", "Number 2"]);
$music2 = new Music("Test1", 20, 9, "", "Artist 1", ["Number 1", "Number 2"]);
$film1 = new Film("Starwars 1", 15, 9, "A great movie", "DVD");
$film2 = new Film("Starwars 2", 12, 9, "A great movie", "Blu");
$game1 = new Game("Call of Duty 1", 20, 9, "Call of Duty 1", "FPS", "8gb geheugen 970 GTX"); 
$game2 = new Game("Call of Duty 2", 30, 9, "Call of Duty 1", "FPS", "16gb geheugen 2070 RTX"); 

$productList->addProduct($music1);
$productList->addProduct($music2);
$productList->addProduct($film1);
$productList->addProduct($film2);
$productList->addProduct($game1); 
$productList->addProduct($game2); 


$productList->displayTable();
?>