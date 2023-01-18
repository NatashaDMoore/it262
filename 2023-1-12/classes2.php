<?php

//classes2.php

// create an array with 
$cars[] = new Car('Volkswagon', 'Golf', 20000, 'black');
$cars[] = new Car('Honda', 'Fit', 10000, 'blue');
$cars[] = new Car('Toyota', 'Prius', 30000, 'silver');

// create a variable to store our mileage data in order to find the average
$totalMi = 0;

// create a foreach loop that will cycle thru each item in the array

foreach($cars as $myCar) {
    echo "<pre>My car is a $myCar->color $myCar->make $myCar->model that has $myCar->mileage miles on the odometer</pre>";

    // += takes whatever is already stored in the variable and adds to it
    // this will give us a running total as it goes thru the foreach loop
    $totalMi += $myCar->mileage; 
}

// here we do our math
// count function will count the number of items in the loop
$carCount = count($cars);
$average = $totalMi/$carCount;
$average = number_format($average, 2);

echo "<p>I have $carCount cars and the average mileage is $average miles.</p>";

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