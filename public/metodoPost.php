<?php

require '../src/connection/conexion.php';

$input = file_get_contents('php://input');
$decode = json_encode($input);

echo ($decode);

// $nombre = $decode['name'];
// $puesto = $decode['position'];
// $departamento = $decode['department'];
// $correo = $decode['email'];
// $extension = $decode['extension'];
// $celular = $decode['phone'];

// $consulta = $cnn->prepare("INSERT INTO requisiciones(nombreSolicitante,puesto,departamento,correo,extension,celular)VALUES('$nombre', '$puesto', '$departamento', '$correo', '$extension', '$celular')");

// $consulta->bindParam(':name', $nombre, PDO::PARAM_STR);
// $consulta->bindParam(":phone", $celular, PDO::PARAM_STR);
// $consulta->bindParam(":extension", $extension, PDO::PARAM_STR);
// $consulta->bindParam(":department", $departamento, PDO::PARAM_STR);
// $consulta->bindParam(":email", $correo, PDO::PARAM_STR);
// $consulta->bindParam(":position", $puesto, PDO::PARAM_STR);
// // $consulta->bindParam(":date", $fecha, PDO::PARAM_STR);

// $consulta->execute();

// require '../src/connection/conexion.php';

// // $fecha = $_POST['date'];
// $nombre = $_POST['name'];
// $puesto = $_POST['position'];
// $departamento = $_POST['department'];
// $correo = $_POST['email'];
// $extension = $_POST['extension'];
// $celular = $_POST['phone'];

// $consulta = $cnn->prepare("INSERT INTO requisiciones(nombreSolicitante,puesto,departamento,correo,extension,celular)VALUES('$nombre', '$puesto', '$departamento', '$correo', '$extension', '$celular')");

// $consulta->bindParam(':name', $nombre, PDO::PARAM_STR);
// $consulta->bindParam(":phone", $celular, PDO::PARAM_STR);
// $consulta->bindParam(":extension", $extension, PDO::PARAM_STR);
// $consulta->bindParam(":department", $departamento, PDO::PARAM_STR);
// $consulta->bindParam(":email", $correo, PDO::PARAM_STR);
// $consulta->bindParam(":position", $puesto, PDO::PARAM_STR);
// // $consulta->bindParam(":date", $fecha, PDO::PARAM_STR);

// $consulta->execute();
