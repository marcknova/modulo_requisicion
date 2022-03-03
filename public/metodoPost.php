<?php
require "../src/connection/conexion.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$nombre = $data['name'];
$puesto = $data['position'];
$departamento = $data['department'];
$correo = $data['email'];
$extension = $data['extension'];
$celular = $data['phone'];

$consulta = $cnn->prepare("INSERT INTO requisiciones(nombreSolicitante, puesto, departamento, correo, extension, celular)VALUES(:nombreSolicitante, :position, :department, :email, :extension, :phone)");
$consulta->bindParam(':nombreSolicitante', $nombre);
$consulta->bindParam(':phone', $celular);
$consulta->bindParam(':extension', $extension);
$consulta->bindParam(':department', $departamento);
$consulta->bindParam(':email', $correo);
$consulta->bindParam(':position', $puesto);

if ($consulta->execute()) {
    $lastInsertId = $cnn->lastInsertId();
    foreach ($data['arrayGuardar'] as $result) {
        $arr = array($result);
        foreach ($arr as $key) {
            $cantidad = $key['cantidad'];
            $unidad = $key['unidad'];
            $descripcion = $key['description'];

            $consulta2 = $cnn->prepare("INSERT INTO productos(cantidad,unidad,descripcion,id_usuario)VALUES( :cantidad,:unidad,:descripcion,$lastInsertId)");
            $consulta2->bindParam(':cantidad', $cantidad);
            $consulta2->bindParam(':unidad', $unidad);
            $consulta2->bindParam(':descripcion', $descripcion);
            $consulta2->execute();
        }
    }
}
