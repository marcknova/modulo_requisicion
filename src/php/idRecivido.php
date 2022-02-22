<?php
ob_start();

require_once "../connection/conexion.php";

$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$result = $cnn->prepare("SELECT * FROM requisiciones WHERE id = ?");
$result->execute(array($id));
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
    body {
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
      margin-top: 2px;
    }

    .m2 {
      margin-bottom: 15px;
    }

    .w100 {
      width: 100%;
    }

    .floatRight {
      float: right;
    }
  </style>
  <?php
  foreach ($result as $row) { ?>

    <header>
      <div class="container">
        <div class="inlineBlock">
          <img src="../../public/img/logo.png" alt="">
        </div>
        <div class="inlineBlock floatRight">
          <div class="">
            <h1>Fecha de Solicitud:</h1>
          </div>
          <div class="m2">
            <h1>NUMERO DE FOLIO</h1>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="border1 center">
          <h1>FORMATO DE REQUISICION</h1>
        </div>
        <div class="tables">
          <div class="border1">
            <div class="padding border2 w1">NOMBRE DEL SOLICITANTE:</div>
            <div></div>
          </div>
          <div class="border1">
            <div class="padding border2 w1">PUESTO:</div>
            <div></div>
          </div>
          <div class="border1">
            <div class="padding border2 w1">DEPARTAMENTO:</div>
            <div></div>
          </div>
          <div class="border1">
            <div class="padding border2 w1">CORREO ELECTRONICO:</div>
            <div></div>
          </div>
          <div class="border1">
            <div class="inlineBlock w2 border2"><span class="padding">EXTENSION:</span></div>
            <div class="inline padding w2">C</div>
            <div class="inlineBlock padding w2 m1">CELULAR:</div>
            <div class="inline w2">C</div>
          </div>
        </div>
      </div>
    </main>

  <?php } ?>
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

$dompdf->setPaper('A3', 'portrait');

$dompdf->loadHTML(utf8_decode($html));

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>