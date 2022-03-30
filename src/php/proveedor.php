<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../css/auxiliar.css">
    <link rel="stylesheet" href="../css/paginate.css">
    <script src="../js/paginate.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../connection/conexion.php";
    ?>
    <header class="bg-black">
        <div class="h-20 p-3 max-w-lg">
            <img class="h-full ml-5" src="../../public/img/logo.png" alt="">
        </div>
    </header>
    <section>
        <div class="w-full text-center mt-14">
            <h1 class="text-4xl font-bold">Requisiciones Solicitadas</h1>
        </div>
        <div class="min-w-full my-16 flex justify-center divide-gray-200">
            <div class="w-2/3 rounded-lg border-b border-gray-200">
                <table viewBox="0 0 5 5" class="min-w-full divide-y divide-gray-200 myForm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Correo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Departamento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ver</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <?php foreach ($cnn->query("SELECT * FROM requisiciones ORDER BY id_usuario DESC") as $row) { ?>
                        <tr class="shadow my-0.9">
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["id_usuario"] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["nombreSolicitante"] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["correo"] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["departamento"] ?></td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                <a href="./pdfMarco.php?id_usuario=<?php echo $row["id_usuario"] ?>">
                                    <i class="far fa-file-pdf">
                                    </i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="./edit.php?id_usuario=<?php echo $row["id_usuario"] ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>
</body>
<script src="../js/tablePaginate.js"></script>

</html>