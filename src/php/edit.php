<?php
require_once "../connection/conexion.php";

if (isset($_GET['id_usuario'])) {
  $id = $_GET['id_usuario'];
  $result = $cnn->prepare("SELECT * FROM requisiciones WHERE id_usuario = ?");
  $result->execute(array($id));

  $result2 = $cnn->prepare("SELECT * FROM productos WHERE id_usuario = ?");
  $result2->execute(array($id));

  if (isset($_POST['actualizar'])) {
    $estado = $_POST['estatus'];

    $consulta = $cnn->prepare("UPDATE productos SET estatus = :estatus WHERE id_producto = :id AND id_usuario = $id");
    foreach ($estado as $key => $val) {
      $estatus = $val;
      $lastId = $key;
      $consulta->bindParam(':estatus', $estatus);
      $consulta->bindParam(':id', $lastId, PDO::PARAM_INT);
      $consulta->execute();
    }
  }
} else {
  echo 'Problemas con el recibo del ID';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/style.css">
  <link rel="stylesheet" href="../css/edit.css">
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
        <form class="p-3" method="POST" id="form">
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
                    " name="nombreSolicitante" disabled="disabled">
                </div>
              </div>
              <div class=" w-full md:w-1/2 lg:w-1/2 px-4 float-right">
                <div class="mb-12">
                  <label for="" class="font-medium text-base text-black block mb-3">
                    Fecha de Solicitud
                  </label>
                  <input type="text" placeholder=<?php echo $row["fecha"] ?> class="
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
                    text-black
                    disabled:bg-[#F5F7FD] disabled:cursor-default
                    " disabled="disabled">
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
                    " name="celular" disabled="disabled">
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
                    " name="extension" disabled="disabled">
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
                    " name="departamento" disabled="disabled">
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
                    disabled:bg-[#F5F7FD] disabled:cursor-default" name="correo" autocomplete="off" disabled="disabled">
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
                    " name="puesto" disabled="disabled">
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
                      <!-- <?php
                            if ($key['estatus'] == null) { ?>
                        <select class="outline-none text-center" name="estatus[]" id="estatus">
                          <option value="">--Please choose an option--</option>
                          <option value="Aceptado">Aceptado</option>
                          <option value="Rechazado">Rechazado</option>
                        </select>
                      <?php } else { ?>
                        <select class="outline-none text-center" name="estatus[]" id="estatus">
                          <option value=""><?php echo $key["estatus"] ?></option>
                          <option value="Aceptado">Aceptado</option>
                          <option value="Rechazado">Rechazado</option>
                        </select>
                      <?php } ?> -->
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <div class="flex w-full my-6">
            <div class="mx-10">
              <button class="border-1 border-green-500 w-24 h-10 font-semibold hover:bg-green-500 hover:border-none hover:text-white" name="actualizar" type="submit">Modificar</button>
            </div>
            <div class="mx-12 marginT">
              <a class="link" href="./proveedor.php">Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<?php
?>