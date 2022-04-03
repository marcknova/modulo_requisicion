<?php
require_once "../connection/conexion.php";

if (isset($_GET['id_usuario'])) {
  $id = $_GET['id_usuario'];
  $result = $cnn->prepare("SELECT * FROM requisiciones WHERE id_usuario = ?");
  $result->execute(array($id));

  $result3 = $cnn->prepare("SELECT * FROM requisiciones WHERE id_usuario = ?");
  $result3->execute(array($id));

  $result2 = $cnn->prepare("SELECT * FROM productos WHERE id_usuario = ?");
  $result2->execute(array($id));

  if (isset($_POST['actualizar'])) {
    $estado = $_POST['estatus'];
    $estadoFinal = $_POST['estadoFinal'];

    $consulta = $cnn->prepare("UPDATE productos SET estatus = :estatus WHERE id_producto = :id AND id_usuario = $id");
    $consulta2 = $cnn->prepare("UPDATE requisiciones SET estado = :estado WHERE id_usuario = $id");
    foreach ($estado as $key => $val) {
      $estatus = $val;
      $lastId = $key;
      $consulta->bindParam(':estatus', $estatus);
      $consulta->bindParam(':id', $lastId, PDO::PARAM_INT);
      $consulta->execute();
    }

    $consulta2->bindParam(':estado', $estadoFinal);
    $consulta2->execute();
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
    <div class="h-20 max-w-lg p-3">
      <img class="h-full ml-5" src="../../public/img/logo.png" alt="">
    </div>
  </header>
  <div class="p-3 my-10 text-4xl font-bold text-center">
    <h1>Modificar Requisicion</h1>
  </div>
  <div class="mx-24 my-10 shadow-md">
    <div class="w-full">
      <div class="my-8">
        <form class="p-3" method="POST" id="form">
          <div class="containerData h-[515px]">
            <?php foreach ($result as $row) { ?>
              <div class="float-left w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-right w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-right w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-right w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-right w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-right w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
              <div class="float-left w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                  <label for="" class="block mb-3 text-base font-medium text-black">
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
          </div>
          <div class="containerDescription">
            <div class="p-1 my-5 text-left">
              <h1 class="font-semibold">Descripcion</h1>
            </div>
            <div class="w-full text-center">
              <textarea name="" id="" cols="100" rows="10" class="outline-none input3" disabled><?php echo $row["detalles"] ?></textarea>
            </div>
          <?php } ?>
          </div>
          <div class="my-10 containerProductos">
            <div class="mx-16">
              <table class="w-full">
                <tr class="h-10 p-1 border-b border-gray-200 shadow-sm">
                  <th>Cantidad</th>
                  <th>Unidad</th>
                  <th>Descripcion</th>
                  <th>Aceptado/Rechazado</th>
                </tr>
                <?php foreach ($result2 as $key) { ?>
                  <tr class="h-10 p-2 text-center divide-y divide-gray-200">
                    <td><?php echo $key["cantidad"] ?> </td>
                    <td><?php echo $key["unidad"] ?> </td>
                    <td><?php echo $key["descripcion"] ?> </td>
                    <td>
                      <?php
                      if ($key['estatus'] == null) { ?>
                        <select class="text-center outline-none" name="estatus[]" id="estatus">
                          <option value="">--Please choose an option--</option>
                          <option value="Aceptado">Aceptado</option>
                          <option value="Rechazado">Rechazado</option>
                        </select>
                      <?php } else { ?>
                        <select class="text-center outline-none" name="estatus[]" id="estatus">
                          <option value=""><?php echo $key["estatus"] ?></option>
                          <option value="Aceptado">Aceptado</option>
                          <option value="Rechazado">Rechazado</option>
                        </select>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <div class="p-1 mx-10 my-5 containerEstado">
            <div>
              <p class="my-5 font-semibold">*Despues de haber confirmado cada uno de los productos y que los datos que proporciono el solicitante estan correctos solo queda aceptar o rechazar la requisicion para que esta pueda ser procesada.</p>
            </div>
            <div>
              <span>Estado de la requisicion:</span>
              <?php foreach ($result3 as $row2) { ?>
                <?php if ($row2['estado'] == null) { ?>
                  <select class="text-center outline-none" name="estadoFinal" id="estadoFinal">
                    <option value="">--Please choose an option--</option>
                    <option value="Aceptada">Aceptada</option>
                    <option value="Rechazada">Rechazada</option>
                  </select>
                <?php } else { ?>
                  <select class="text-center outline-none" name="estadoFinal" id="estadoFinal">
                    <option value=""><?php echo $row2["estado"] ?></option>
                    <option value="Aceptada">Aceptada</option>
                    <option value="Rechazada">Rechazada</option>
                  </select>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="flex w-full my-6">
            <div class="mx-10">
              <button class="w-24 h-10 font-semibold border-green-500 border-1 hover:bg-green-500 hover:border-none hover:text-white" name="actualizar" id="actualizarData" type="submit">Modificar</button>
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