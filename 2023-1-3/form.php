<?php
// form.php

if(isset($_POST["first_name"])){
    //echo $_POST["first_name"];
    //echo '<pre>';
    //var_dump($_POST);
    //echo '<pre>';

    $fav = implode(', ',$_POST["favorite_toppings"]);
    echo "<p>Your name is {$_POST["first_name"]}</p>";
    echo "<p>Your favorite color is {$_POST["favorite_color"]}</p>";
    echo "<p>Your favorite toppings: $fav</p>";

}else{
    echo '
    <form action="" method="POST">
    <p>First Name<input type="text" name="first_name"></p>
    <fieldset>
        <legend>Favorite Color</legend>
        <p><input type="radio" name="favorite_color" value="red"> Red</p>
        <p><input type="radio" name="favorite_color" value="blue"> Blue</p>
        <p><input type="radio" name="favorite_color" value="yellow"> Yellow</p>
        </fieldset>
    <fieldset>
        <legend>Favorite Toppings</legend>
        <p><input type="checkbox" name="favorite_toppings[]" value="sausage"> Sausage</p>      
        <p><input type="checkbox" name="favorite_toppings[]" value="cheese"> Cheese</p>      
        <p><input type="checkbox" name="favorite_toppings[]" value="sauce"> Sauce</p>      
    </fieldset>
    <input type="submit">
    </form>
    ';

}