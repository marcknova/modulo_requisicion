<?php
try {

    $cnn = new PDO("mysql:host=localhost;dbname=requisicion_mobiliario", 'root','');

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
