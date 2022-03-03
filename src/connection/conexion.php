<?php
try {

    $cnn = new PDO("mysql:host=localhost;dbname=requisicion_mobiliario", 'root','');
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}
