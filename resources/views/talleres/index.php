<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="http://localhost/ACM4A/public/asd">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Vista de Talleres index</h1>



        <div class="col-xs-12">
            <table class="table table-stripped">

                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Profesor ID</td>
                    <td>Horario</td>
                    <td>Cantidad de horas</td>
                    <td>Fecha inicio</td>
                </tr>

                <?php

                foreach($talleres as $taller):

                    ?>
                    <tr>
                        <td><?= $taller->id ?></td>
                        <td><?= $taller->nombre ?></td>
                        <td><?= $taller->profesor_id ?></td>
                        <td><?= $taller->horario ?></td>
                        <td><?= $taller->cantidad_horas ?></td>
                        <td><?= $taller->fecha_inicio ?></td>
                    </tr>
                    <?php
                endforeach;
                ?>

            </table>
        </div>
    </div>
</div>



<a href="<?php echo url("detalle") ?>">Detalle</a>
</body>
</html>