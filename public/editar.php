<?php
require_once "../src/connection/conexion.php";

$id = $_GET['id_usuario'];

$result = $cnn->prepare("SELECT * FROM requisiciones WHERE id_usuario = ?");
$result->execute(array($id));
if (isset($_POST['actualizar'])) {

    $nombre = $_POST['name'];
    // $fecha = $_POST['date'];
    $celular = $_POST['phone'];
    $extension = $_POST['extension'];
    $departamento = $_POST['department'];
    $correo = $_POST['email'];
    $puesto = $_POST['position'];

    $consulta = "UPDATE requisiciones SET 
      `nombreSolicitante`= :nombreSolicitante, 
      `puesto` = :position, 
      `departamento` = :department, 
      `extension` = :extension, 
      `correo` = :email, 
      `celular` = :phone 
       WHERE `id_usuario` = $id_usuario";

    $sql = $cnn->prepare($consulta);
    $sql->bindParam(':nombreSolicitante', $nombre, PDO::PARAM_STR, 25);
    $sql->bindParam(':position', $puesto, PDO::PARAM_STR, 25);
    $sql->bindParam(':department', $departamento, PDO::PARAM_STR, 25);
    $sql->bindParam(':extension', $extension, PDO::PARAM_STR, 25);
    $sql->bindParam(':email', $correo, PDO::PARAM_STR, 25);
    $sql->bindParam(':phone', $celular, PDO::PARAM_STR, 25);
    $sql->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="bg-black">
        <div class="h-20 p-3 max-w-lg">
            <img class="h-full ml-5" src="../../public/img/logo.png" alt="">
        </div>
    </header>
    <div class="text-center p-3 text-4xl my-10 font-bold">
        <h1>Modificar Requisicion</h1>
    </div>
    <div class="my-10 mx-24 shadow-md">
        <div class="w-full">
            <div class="my-8">
                <form class="p-3 method=" POST">
                    <div class="containerData h-[515px]">
                        <?php foreach ($result as $row) { ?>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-left">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Nombre del Solicitante
                                    </label>
                                    <input type="text" value=<?php echo $row["nombreSolicitante"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Fecha de Solicitud
                                    </label>
                                    <input type="text" placeholder="Fecha de Solicitud" class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Celular
                                    </label>
                                    <input type="text" value=<?php echo $row["celular"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Extension
                                    </label>
                                    <input type="text" value=<?php echo $row["extension"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Departamento
                                    </label>
                                    <input type="text" value=<?php echo $row["departamento"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Correo Electronico
                                    </label>
                                    <input type="text" value=<?php echo $row["correo"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-left">
                                <div class="mb-12">
                                    <label for="" class="font-medium text-base text-black block mb-3">
                                        Puesto
                                    </label>
                                    <input type="text" value=<?php echo $row["puesto"] ?> class="
                    w-full
                    border-[1.5px] border-form-stroke
                    rounded-lg
                    py-3
                    px-5
                    font-medium
                    text-body-color
                    placeholder-body-color
                    focus:border-primary
                    active:border-primary
                    transition
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    ">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="containerProductos my-10">
                        <div class="mx-16">
                            <table class="w-full">
                                <tr class="p-1 shadow-sm h-10 border-b border-gray-200">
                                    <th>Cantidad</th>
                                    <th>Unidad</th>
                                    <th>Descripcion</th>
                                    <th>Aceptado/Rechazado</th>
                                </tr>
                                <?php foreach ($result2 as $key) { ?>
                                    <tr class="text-center h-10 p-2 divide-y divide-gray-200">
                                        <td><?php echo $key["cantidad"] ?> </td>
                                        <td><?php echo $key["unidad"] ?> </td>
                                        <td><?php echo $key["descripcion"] ?> </td>
                                        <td>
                                            <!-- <select class="outline-none text-center" name="estatus[]" id="estatus">
                        <option value="">--Please choose an option--</option>
                        <option value="aceptado">Aceptado</option>
                        <option value="rechazado">Rechazado</option>
                      </select> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="flex w-full my-6">
                        <div class="mx-10">
                            <button class="border-1 border-lime-500 w-24 h-10 font-semibold hover:bg-lime-500 hover:border-none hover:text-white" name="actualizar" type="submit">Modificar</button>
                        </div>
                        <div class="mx-12 marginT">
                            <a class="link" href="./auxiliar.php">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>