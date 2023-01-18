<?php

//classes.php

// constructor
$myCar = new Car('Volkswagon', 'Golf', 20000, 'Silver');

// create an instance
// echo $myCar->mileage

echo '<pre>';
var_dump($myCar);
echo '<pre>';


class Car {

 public $make = '';
 public $model = '';
 public $mileage = 0;
 public $color = '';

 public function __construct($make, $model, $mileage, $color) {
   $this->make = $make;
   $this->model = $model;
   $this->mileage = $mileage;
   $this->color = $color;
 }

}