<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shapes Drawing</title>
</head>
<body>

<svg width="300" height="400"> 
<?php
class Square {
    private $length;
    private $color;

    public function __construct($length, $color) {
        $this->length = $length;
        $this->color = $color;
    }

    public function draw($x, $y) {
        echo "<rect x='" . $x . "' y='" . $y . "' width='" . $this->length . "' height='" . $this->length . "' fill='" . $this->color . "' />";
    }
}

class Circle {
    private $radius;
    private $color;

    public function __construct($radius, $color) {
        $this->radius = $radius;
        $this->color = $color;}

    public function draw($x, $y) {
        echo "<circle cx='" . $x . "' cy='" . $y . "' r='" . $this->radius . "' fill='" . $this->color . "' />";
    }
} 
class Rectangle {
    private $width;
    private $height;
    private $color;

    public function __construct($width, $height, $color) {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    public function draw($x, $y) {
        echo "<rect x='" . $x . "' y='" . $y . "' width='" . $this->width . "' height='" . $this->height . "' fill='" . $this->color . "' />";
    }
}

class Triangle {
    private $sideLength;
    private $color;

    public function __construct($sideLength, $color) {
        $this->sideLength = $sideLength;
        $this->color = $color;
    }

    public function draw($x, $y) {
        $halfSide = $this->sideLength / 2;
        $points = ($x + $halfSide) . "," . ($y - $halfSide) . " " .
                  ($x + $this->sideLength) . "," . ($y + $halfSide) . " " . 
                  $x . "," . ($y + $halfSide); 
        echo "<polygon points='" . $points . "' fill='" . $this->color . "' />";
    }
}

$square1 = new Square(50, 'blue'); 
$square2 = new Square(50, 'yellow');
$square3 = new Square(50, 'black');

$square1->draw(0, 0);
$square2->draw(50, 0);
$square3->draw(100, 0);


$circle1 = new Circle(25, 'red');
$circle2 = new Circle(25, 'green');
$circle3 = new Circle(25, 'orange');

$circle1->draw(25, 100);
$circle2->draw(75, 100);
$circle3->draw(125, 100);

$rectangle1 = new Rectangle(60, 30, 'green');
$rectangle2 = new Rectangle(60, 30, 'yellow');

$rectangle3 = new Rectangle(60, 30, 'red');

$rectangle1->draw(0,200);
$rectangle2->draw(60, 200);
$rectangle3->draw(120, 200);



$triangle1 = new Triangle(50, 'purple');
$triangle2 = new Triangle(50, 'cyan');
$triangle3 = new Triangle(50, 'magenta');

$triangle1->draw(0, 200);
$triangle2->draw(75, 200);
$triangle3->draw(150, 200);
?>
</svg>

</body>
</html>
