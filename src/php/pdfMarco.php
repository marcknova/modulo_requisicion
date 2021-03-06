<?php
ob_start();

require_once "../connection/conexion.php";

if (isset($_GET['id_usuario'])) {
  $id = $_GET['id_usuario'];
  $result = $cnn->prepare("SELECT * FROM requisiciones WHERE id_usuario = ?");
  $result->execute(array($id));

  $result2 = $cnn->prepare("SELECT * FROM productos WHERE id_usuario = ? AND estatus = 'Aceptado'");
  $result2->execute(array($id));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REQUISICION</title>
</head>

<body>
  <style>
    .img {
      padding-left: 0%;
      width: 130px;
      height: 60px;
    }

    .generador {
      height: 13px;
    }

    body {
      margin: 0;
      padding: 0px;
      font-size: inherit;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    h1 {
      font-size: inherit;
    }

    .border1 {
      border: 1px solid #000000;
      border-collapse: collapse;
    }

    .border2 {
      border-right: 1px solid #000000;
    }

    .container {
      padding: 0.25rem;
    }

    .center {
      text-align: center;
    }

    .left {
      display: flex;
    }

    .w1 {
      width: 22%;
    }

    .w2 {
      width: 235px;
    }

    .none {
      border: none;
    }

    .padding {
      padding: 5px;
    }

    .inline {
      display: inline;
    }

    .inlineBlock {
      display: inline-block;
    }

    .m1 {
      margin-top: 14px;
      margin-left: 15px;
    }

    .m2 {
      margin-top: 15px;

    }

    input {
      height: 10px;
      margin-bottom: -1px;
      border: none;
      border-bottom: 1px solid #000000;
    }

    .w100 {
      width: 100%;
    }

    .floatRight {
      float: right;
    }

    /* Aquí empieza la segunda tabla en adelante :D */
    .tabla {
      width: 100%;
      border-collapse: collapse;
    }

    .tabla th {
      padding: 5px 15px;
      border: 1px solid black;
      text-align: center;
      font-size: 16px;
    }

    .tabla .th {
      padding: 5px 15px;
      border: 1px solid black;
      text-align: center;
      font-size: 16px;
    }

    .tabla td {
      padding: 1px 5px;
      border: 1px solid black;
      /* text-align: center; */
      font-size: 12px;
    }

    .tabla th {
      background-color: #424949;
      color: #ffffff;
    }

    .tabla .th {
      background-color: #424949;
      color: #ffffff;
    }

    .tabla tbody tr:nth-child(even) {
      background-color: #f5f5f5;
    }

    .tabla .detalles {
      padding: 20px 15px;
      border: 1px solid black;
      text-align: center;
      font-size: 12px;
    }

    .names {
      padding: 0 1rem;
      width: 100%;
      max-width: 850px;
      margin-left: auto;
      margin-right: auto;
    }

    .names label {
      margin-right: 5px;
      font-size: .8rem;
    }

    .names input {
      font-size: .8rem;
      height: 20px;
      width: 300px;
      padding: .2rem;
      border: 0px;
      /* border: 2px solid black;
      border-radius: 5px; */
    }

    .names .soli {
      display: flex;
      flex-direction: column;
      margin-top: 1px;
      text-align: center;
    }

    .botones {
      display: flex;
      justify-content: center;
    }

    .botones .save {
      margin: 10px;
      padding: 10px;
      background-color: #28B463;
      font-size: large;
    }

    .botones .cancel {
      margin: 10px;
      padding: 10px;
      background-color: #CB4335;
      font-size: large;
    }

    textarea {
      border: 1px solid #EEEEEE;
      box-shadow: 1px 1px 0 #DDDDDD;
      display: block;
      font-family: 'Marck Script', cursive;
      font-size: 22px;
      line-height: 50px;
      margin: 2% auto;
      padding: 11px 20px 0 70px;
      resize: none;
      height: 390px;
      width: 530px;

      background-image: -moz-linear-gradient(top, transparent, transparent 49px, #E7EFF8 0px), -moz-radial-gradient(4% 50%, circle closest-corner, #f5f5f5, #f5f5f5 39%, transparent 0%), -moz-radial-gradient(3.9% 46%, circle closest-corner, #CCCCCC, #CCCCCC 43.5%, transparent 0%);
      background-image: -webkit-linear-gradient(top, transparent, transparent 49px, #E7EFF8 0), -webkit-radial-gradient(4% 50%, circle closest-corner, #f5f5f5, #f5f5f5 39%, transparent 0%), -webkit-radial-gradient(3.9% 46%, circle closest-corner, #cccccc, #cccccc 43.5%, transparent 0%);

      -webkit-background-size: 100% 50px;
      background-size: 100% 50px;
    }
  </style>

  <?php foreach ($result as $row) { ?>
    <header style="margin-bottom: 8px;">
      <div class="container">
        <div class="inlineBlock">
          <img class="img" src="../../public/img/logo.png" alt="">
        </div>
        <div class="inlineBlock floatRight">
          <div class="m1" style="font-size: 13px;">
            <label>Fecha de Solicitud:</label>
            <input type="text" value=<?php echo $row["fecha"] ?>>
          </div>
          <div class="m2" style="font-size: 13px;">
            <label>NUMERO DE FOLIO:</label>
            <input type="text">
          </div>
        </div>
      </div>
    </header>

    <main>
      <!-- Tabla 1 -->
      <table class="tabla">
        <thead>
          <!-- Columnas de la tabla -->
          <tr style="height: 50px;">
            <th style="font-size: 12px; margin: 25px 0 25px 0; padding: 1rem;" colspan="4">FORMATO DE REQUISICION</th>
          </tr>
        </thead>
        <tbody>
          <!-- Filas de la tabla -->

          <tr>
            <td width="28%">NOMBRE DEL SOLICITANTE:</td>
            <td width="75%" colspan="3"><?php echo $row["nombreSolicitante"] ?></td>
          </tr>

          <tr>
            <td width="25%">PUESTO:</td>
            <td width="75%" colspan="3"><?php echo $row["puesto"] ?></td>
          </tr>

          <tr>
            <td width="25%">DEPARTAMENTO:</td>
            <td width="75%" colspan="3"><?php echo $row["departamento"] ?></td>
          </tr>

          <tr>
            <td width="25%">CORREO ELECTRONICO:</td>
            <td width="75%" colspan="3"><?php echo $row["correo"] ?></td>
          </tr>

          <tr>
            <td width="50%">EXTENSION:</td>
            <td width="50%"><?php echo $row["extension"] ?></td>
            <td width="32%">CELULAR:</td>
            <td width="68%"><?php echo $row["celular"] ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </main><br>

    <main>
      <!-- Tabla 2 -->
      <table class="tabla">
        <thead>
          <!-- Columnas de la tabla -->
          <tr>
            <th style="font-size: 12px; padding: 1;" width="10%">Cantidad</th>
            <th style="font-size: 12px; padding: 1;" width="10%">Unidad</th>
            <th style="font-size: 12px; padding: 1;" width="80%">Descripcion</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <!-- Filas de la tabla -->
          <?php
          $array;
          $i = 0;
          foreach ($result2 as $key) {
          ?>
            <tr>
              <td style="text-align: center;"><?php echo $key["cantidad"] ?> </td>
              <td style="text-align: center;"><?php echo $key["unidad"] ?> </td>
              <td style="text-align: center;"><?php echo $key["descripcion"] ?> </td>
            </tr>
          <?php
            $array[$i] = array($key["cantidad"], $key["unidad"], $key["descripcion"]);
            $i++;
          } ?>
          <?php
          if (count($array) < 15) {
            $value = count($array);
            for ($i = $value; $i < 15; $i++) {
              $contador[$i] = '   
                  <tr>
                  <td class="generador"></td>
                  <td class="generador"></td>
                  <td class="generador"></td>
                </tr>';
              echo $contador[$i]++;
            }
          }
          ?>

          <!-- <tr>
            <td class="th" colspan="3"><b>Mampara</b></td>
          </tr> -->

          <!-- <tr>
            <td class="detalles" colspan="3">C</td>
          </tr> -->
        </tbody>
      </table>
      <h1 style="font-size: 14px; margin-top: -1.5px;">*Anotar especificaciones completas de Herramienta y/o Equipo.</h1>
    </main>

    <main>
      <!-- Tabla 3 -->
      <table class="tabla">
        <thead>
          <!-- Columnas de la tabla -->
          <tr>
            <th style="font-size: 14px; padding: 1; text-align: left;">JUSTIFICACION DE LOS INSUMOS O SERVICIOS SOLICITADOS (INCLUIR NOMBRE DEL EVENTO)</th>
          </tr>
        </thead>
        <tbody>
          <!-- Filas de la tabla -->
          <tr>
            <textarea name="" id="" cols="30" rows="10">
            JavaScript is a high-level, often just-in-time compiled language that conforms to the ECMAScript standard.[14] It has dynamic typing, prototype-based object-orientation, and first-class functions. It is multi-paradigm, supporting event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM).

The ECMAScript standard does not include any input/output (I/O), such as networking, storage, or graphics facilities. In practice, the web browser or other runtime system provides JavaScript APIs for I/O.

JavaScript engines were originally used only in web browsers, but are now core components of some servers and a variety of applications. The most popular runtime system for this usage is Node.js.

Although Java and JavaScript are similar in name, syntax, and respective standard libraries, the two languages are distinct and differ greatly in design.
            </textarea>

          </tr>
        </tbody>
      </table>
    </main> <br>

    <div class="names">
      <div class="inlineBlock">
        <label>C.</label>
        <input type="text" name="nom_sol" required>
        <label class="soli">SOLICITANTE</label>
      </div>
      <div class="inlineBlock floatRight">
        <label>C.</label>
        <input type="text" name="nom_aut" required>
        <label class="soli">AUTORIZO</label>
      </div>
    </div>



</body>

</html>

<?php

$html = ob_get_clean();
require_once "../libreria/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);

$dompdf->setPaper('letter', 'portrait');

$dompdf->loadHTML(utf8_decode($html));

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>