<?php

require_once "../src/connection/conexion.php";

$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

if (isset($_POST['actualizar'])) {

  $nombre = $_POST['name'];
  // $fecha = $_POST['date'];
  $celular = $_POST['phone'];
  $extension = $_POST['extension'];
  $departamento = $_POST['department'];
  $correo = $_POST['email'];
  $puesto = $_POST['position'];

  $consulta = "UPDATE requisiciones SET 
    `nombreSolicitante`= :name, 
    `puesto` = :position, 
    `departamento` = :department, 
    `extension` = :extension, 
    `correo` = :email, 
    `celular` = :phone 
     WHERE `id` = $id";
  $sql = $cnn->prepare($consulta);
  $sql->bindParam(':name', $nombre, PDO::PARAM_STR, 25);
  $sql->bindParam(':position', $puesto, PDO::PARAM_STR, 25);
  $sql->bindParam(':department', $departamento, PDO::PARAM_STR, 25);
  $sql->bindParam(':extension', $extension, PDO::PARAM_STR, 25);
  $sql->bindParam(':email', $correo, PDO::PARAM_STR);
  $sql->bindParam(':phone', $celular, PDO::PARAM_INT);

  $sql->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="./css/edit.css">
  <title>Document</title>
</head>

<body>
  <header class="bg-green-600">
    <div class="h-20 p-3 max-w-lg">
      <img class="h-full ml-5" src="../public/img/logo.png" alt="">
    </div>
  </header>
  <div class="text-center p-3 text-4xl my-10 font-bold">
    <h1>Modificar Requisicion</h1>
  </div>
  <div class="my-10 mx-24 shadow-md">
    <div class="w-full">
      <div class="my-8">
        <form class="p-3 method=" POST">
          <div class="containerData">
            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-left">
              <div class="mb-12">
                <label for="" class="font-medium text-base text-black block mb-3">
                  Nombre del Solicitante
                </label>
                <input type="text" placeholder="Nombre del Solicitante" class="
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
                <input type="text" placeholder="Celular" class="
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
                <input type="text" placeholder="Extension" class="
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
                <input type="text" placeholder="Departamento" class="
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
                <input type="text" placeholder="Correo Electronico" class="
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
            <div class="w-full md:w-1/2 lg:w-1/2 px-4 float-left">
              <div class="mb-12">
                <label for="" class="font-medium text-base text-black block mb-3">
                  Puesto
                </label>
                <input type="text" placeholder="Puesto" class="
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
          </div>
          <div class="flex w-full my-6">
            <div class="mx-10">
              <button class="border-1 border-lime-500 w-24 h-10 font-semibold hover:bg-lime-500 hover:border-none hover:text-white" name="actualizar" type="submit">Modificar</button>
            </div>
            <div class="mx-10">
              <a href="./auxiliar.php">Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<!-- border-1 border-blue-500 w-24 h-10 text-center font-semibold hover:bg-blue-500 hover:border-none p-[6px] hover:text-white cursor-pointer -->

</html>