<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{box-sizing:border-box;}

            body{font-family:sans-serif;}

            h1{text-align:center;}

            table{width: 500px;margin-left:auto;margin-right:auto;text-align:center;border-collapse:collapse;}

            th{color:white;background-color:#252727;}

            th,td{border:2px solid rgb(218, 208, 208);padding:10px;}

            .content{width: 500px;margin-left:auto;margin-right:auto;}
        </style>     
    </head>
    <body>
        <div class="content">  
                <h1>Reporte de productos</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $producto): ?>
                            <tr>
                                <td><?= $producto->nombre; ?></td>
                                <td><?= $producto->cantidad ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </body>
</html>
