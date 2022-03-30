<?php
require "../src/connection/conexion.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$nombre = $data['name'];
$fecha = $data['date'];
$puesto = $data['position'];
$departamento = $data['department'];
$correo = $data['email'];
$extension = $data['extension'];
$celular = $data['phone'];
$manpara = $data['manpara'];
$descripciongeneral = $data['describe'];

if ($manpara != null) {

    $consulta = $cnn->prepare("INSERT INTO requisiciones(fecha, nombreSolicitante, puesto, departamento, correo, extension, celular, manpara, detalles)VALUES(:fecha, :nombreSolicitante, :position, :department, :email, :extension, :phone, :manpara,:describe)");
    $consulta->bindParam(':fecha', $fecha);
    $consulta->bindParam(':nombreSolicitante', $nombre);
    $consulta->bindParam(':phone', $celular);
    $consulta->bindParam(':extension', $extension);
    $consulta->bindParam(':department', $departamento);
    $consulta->bindParam(':email', $correo);
    $consulta->bindParam(':position', $puesto);
    $consulta->bindParam(':manpara', $manpara);
    $consulta->bindParam(':describe', $descripciongeneral);
} else {
    $consulta = $cnn->prepare("INSERT INTO requisiciones(fecha, nombreSolicitante, puesto, departamento, correo, extension, celular,detalles)VALUES(:fecha, :nombreSolicitante, :position, :department, :email, :extension, :phone, :describe)");
    $consulta->bindParam(':fecha', $fecha);
    $consulta->bindParam(':nombreSolicitante', $nombre);
    $consulta->bindParam(':phone', $celular);
    $consulta->bindParam(':extension', $extension);
    $consulta->bindParam(':department', $departamento);
    $consulta->bindParam(':email', $correo);
    $consulta->bindParam(':position', $puesto);
    $consulta->bindParam(':describe', $descripciongeneral);
}


if ($consulta->execute()) {
    $lastInsertId = $cnn->lastInsertId();
    $contador = 0;
    foreach ($data['arrayGuardar'] as $result) {
        $arr = array($result);
        foreach ($arr as $key => $val) {
            $cantidad = $val['cantidad'];
            $unidad = $val['unidad'];
            $descripcion = $val['description'];
            $id_producto = $contador++;
            $consulta2 = $cnn->prepare("INSERT INTO productos(cantidad,unidad,descripcion,id_usuario,id_producto)VALUES( :cantidad, :unidad, :descripcion, $lastInsertId, $id_producto)");
            $consulta2->bindParam(':cantidad', $cantidad);
            $consulta2->bindParam(':unidad', $unidad);
            $consulta2->bindParam(':descripcion', $descripcion);
            $consulta2->execute();
        }
    }
}
