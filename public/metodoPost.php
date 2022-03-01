<?php
require '../src/connection/conexion.php';

$nombre = $_POST['name'];
$puesto = $_POST['position'];
$departamento = $_POST['department'];
$correo = $_POST['email'];
$extension = $_POST['extension'];
$celular = $_POST['phone'];
// // $fecha = $_POST['date'];
try {
    $consulta = $cnn->prepare("INSERT INTO requisiciones(nombreSolicitante,puesto,departamento,correo,extension,celular)VALUES(:name, :position, :department, :email, :extension, :phone)");

    $consulta->bindParam(":name", $nombre);
    $consulta->bindParam(":phone", $celular);
    $consulta->bindParam(":extension", $extension);
    $consulta->bindParam(":department", $departamento);
    $consulta->bindParam(":email", $correo);
    $consulta->bindParam(":position", $puesto);

    $consulta->execute();

    $lastInsertId = $cnn->lastInsertId();
    echo 'ultimo ID insertado' . $lastInsertId;
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
try {
    $json = file_get_contents('php://input');

    $data = json_decode($json, true);
    foreach ($data as $key) {
        $cantidad = $key['cantidad'];
        $unidad = $key['unidad'];
        $descripcion = $key['description'];

        $consulta2 = $cnn->prepare("INSERT INTO productos(cantidad,unidad,descripcion,id_usuario)VALUES(:cantidad,:unidad,:descripcion, $lastInsertId)");
        $consulta2->bindParam(":cantidad", $cantidad);
        $consulta2->bindParam(":unidad", $unidad);
        $consulta2->bindParam(":descripcion", $descripcion);

        $consulta2->execute();
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "proyecto";
// try {
//  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  $sql = "INSERT INTO usuario (usuario, tipo, nombre, app, apm, contrasena)
//  VALUES ('c11', '3', 'luis', 'felipe', 'dabila', '123')";   
//  $conn->exec($sql);
//  $lastInsertId = $conn->lastInsertId();
//  echo 'ultimo usuario insertado ' . $lastInsertId;
// }
// catch(PDOException $e)
// {
//  echo $sql . "<br>" . $e->getMessage();
//  $conn = null;
//  echo '<br>';
// try {
//  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  $sql = "INSERT INTO cliente (idu,rfc,empresa,telefono,domicilio,contacto)
//  VALUES ($lastInsertId,'abc000101a2c','torito','1234567890','andador 3 #3 colonia pedrgal','mail@mail.com')";   
//  $conn->exec($sql);
//  $last_id2 = $conn->lastInsertId();
//  echo'y el ultimo cliente fue'.$last_id2;
// }
// catch(PDOException $e)
// {
// echo $sql . "<br>" . $e->getMessage();
// }
// $conn = null;
// }
