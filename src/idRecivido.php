<?php
    ob_start();

        require_once "../src/connection/conexion.php";
    
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUISICION</title>
    <link rel="stylesheet" href="./app.css">
    <!-- jQuery library -->
    <script src="./js/jquery.js"></script>
    <!-- jsPDF library -->
    <script src="./libreria/jsPDF-master/dist/jspdf.umd.min.js"></script>
    <script src="./js/main.js"></script>
</head>
<body>
    <style>

      html {
        margin: 0;
      }

      body {
        font-size: inherit;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        /* margin: 2.5rem 4rem 2.5rem 4rem; */
        margin: 45mm 8mm 2mm 8mm;
      }

      h1 {
        font-size: inherit;
      }

      p {
        margin: 0;
      }

      .flex {
        display: flex;
      }

      .border1 {
        border: 1px solid #000000;
      }

      .container {
        padding: 0.25rem;
      }

      .subContainer {
        margin-top: 2.5rem;
        margin-bottom: 1.25rem;
      }

      .contentFF {
        width: 12rem;
        text-align: right;
      }

      .contentData {
        width: 15rem;
        height: auto;
        margin-left: 0.25rem;
        border-bottom: 1px solid #000000;
      }

      .marginB3 {
        margin-bottom: 0.75rem;
      }

      .mx24 {
        margin: 0 6rem 0 6rem;
      }

      .w50 {
        width: 50%;
      }

      table {
        width: 100%;
        border-spacing: 0 !important;
        border-collapse: collapse !important;
      }

      .tituloTabla {
        --tw-bg-opacity: 1;
        background-color: rgb(100 116 139 / var(--tw-bg-opacity));
        height: 4rem;
      }

      .wColumna {
        width: 14rem;
      }

    </style>
    <?php
        foreach($result as $row) { ?>
    <header>
        <div class="">
            <div class="flex"> 
                <div class="w50">   
                    <div>
                        <h1 class="titulo">logo</h1>
                    </div>
                </div>
                <div class="w50">
                    <div class="flex marginB3">
                        <div class="contentFF">
                            <h1>Fecha de Solicitud:</h1>
                        </div>
                        <div class="contentData">
                            <p>12/08/2158</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="contentFF">
                            <h1>NUMERO DE FOLIO:</h1>
                        </div>
                        <div class="contentData">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main> 
            <section>
                <div>
                    <table>
                        <tr class="tituloTabla">
                            <th colspan="4" class="border1">FORMATO DE REQUISICION</th>
                        </tr>
                        <tr>
                            <td class="wColumna border1">NOMBRE DEL SOLICITANTE:</td>
                            <td colspan="4" class="border1"><?php echo $row["nombreSolicitante"] ?></td>
                        </tr>
                        <tr>
                             <td class="border1">PUESTO:</td>
                            <td colspan="4" class="border1"><?php echo $row["puesto"] ?></td>
                        </tr>
                        <tr>
                             <td class="border1">DEPARTAMENTO:</td>
                             <td colspan="4"class="border1"><?php echo $row["departamento"] ?></td>
                        </tr>
                        <tr>
                             <td class="border1">CORRERO ELECTRONICO:</td>
                             <td colspan="4"class="border1"><?php echo $row["correo"] ?></td>
                        </tr>
                        <tr>
                             <td class="border1">EXTENSION:</td>
                             <td class="border1"><?php echo $row["extension"] ?></td>
                             <td class="border1">CELULAR:</td>
                             <td class="border1"><?php echo $row["celular"] ?></td>
                        </tr>
                    </table>
                </div>
            </section>
    </main> 
    <?php } ?>
</body>
</html>
<?php

    $html=ob_get_clean();
    require_once "../src/libreria/dompdf/autoload.inc.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $options->setIsHtml5ParserEnabled(true);
    $dompdf->setOptions($options);
   
    $dompdf->setPaper('A3', 'portrait');

    $dompdf-> loadHTML(utf8_decode($html));
    
    $dompdf->render();

    $dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>
