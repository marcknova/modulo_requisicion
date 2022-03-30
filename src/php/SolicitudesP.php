<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
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
    <main>
        <div class="text-center">
            <h1 class="text-4xl font-semibold my-10">Solicitudes realizadas</h1>
        </div>
        <section>
            <div class="min-w-full my-16 flex justify-center divide-gray-200">
                <div class="w-9/12 rounded-lg border-b border-gray-200">
                    <table viewBox="0 0 5 5" class="min-w-full divide-y divide-gray-200 myForm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Correo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Departamento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Estado</th>
                            </tr>
                            <?php foreach ($cnn->query("SELECT * FROM requisiciones ORDER BY id_usuario DESC") as $row) { ?>
                                <tr class="shadow my-0.9">
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["id_usuario"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["nombreSolicitante"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["correo"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["departamento"] ?></td>
                                    <?php
                                    if ($row['estado'] == null) { ?>
                                        <td class="px-6 py-4 whitespace-nowrap">Pendiente</td>
                                    <?php } else { ?>
                                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["estado"] ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>
            <div>
                <a href="../../public/index.html" class="p-1 mt-4 ml-44">
                    <button type="button" class="text-red-500 rounded-xl font-semibold text-lg border-1 border-red-500 hover:bg-red-500 hover:text-white hover:border-none w-28 h-10">back</button>
                </a>
            </div>
        </section>
    </main>
</body>

</html>