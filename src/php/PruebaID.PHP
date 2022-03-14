<?php
require('../connection/conexion.php');

// $consulta = $cnn->query("SELECT * FROM requisiciones req INNER JOIN productos pro ON req.id_usuario = pro.id_usuario WHERE req.id_usuario = 1");
// $consulta->execute();

foreach ($cnn->query("SELECT * FROM requisiciones req JOIN productos pro ON req.id_usuario = pro.id_usuario WHERE req.id_usuario = 2") as $row) {
    var_dump($row);
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html> -->