<?php
// postback.php

if(isset($_POST["first_name"])){
    //echo $_POST["first_name"];
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';
}else{
    echo '
    <form action="" method="POST">
    <p>First Name<input type="text" name="first_name"></p>
        <p><input type="radio" name="favorite_color" value="red"> Red</p>
        <p><input type="radio" name="favorite_color" value="blue"> Blue</p>
        <p><input type="radio" name="favorite_color" value="yellow"> Yellow</p>
    <input type="submit">
    </form>
    ';
}