<?php

$cnn = new PDO("mysql:host=localhost;dbname=requisicion_mobiliario", 'root', '');


$nombre = $_POST['name'];
// $fecha = $_POST['date'];
$celular = $_POST['phone'];
$extension = $_POST['extension'];
$departamento = $_POST['department'];
$correo = $_POST['email'];
$puesto = $_POST['position'];

$consulta = $cnn->prepare("INSERT INTO requisiciones(nombreSolicitante,puesto,departamento,correo,extension,celular)VALUES(:name,:phone,:extension,:department,:email,:position)");

$consulta->bindParam(':name', $nombre);
$consulta->bindParam(":phone", $celular);
$consulta->bindParam(":extension", $extension);
$consulta->bindParam(":department", $departamento);
$consulta->bindParam(":email", $correo);
$consulta->bindParam(":position", $puesto);

$consulta->execute();
