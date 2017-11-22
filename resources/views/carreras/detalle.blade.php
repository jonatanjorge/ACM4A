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
            <h1>Vista de detalle de carreras </h1>



            <div class="col-xs-12">
                <table class="table table-stripped">

                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Alias</td>
                        <td>Coordinador</td>
                    </tr>





                        <tr>
                            <td>{{ $carrera->id }}</td>
                            <td>{{ $carrera->nombre }}</td>
                            <td>{{ $carrera->alias }}</td>
                            <td>{{ $carrera->coord->full_name }}</td>
                        </tr>


                </table>
            </div>
        </div>
    </div>



    <a href="<?php echo url("detalle") ?>">Detalle</a>
</body>
</html>