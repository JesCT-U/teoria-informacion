<?php
    $mensaje = "Ingrese texto o suba un archivo";
    $matriz = [];

    if($_POST){
        if (empty($_FILES)) {
            $archivo = $_FILES['archivo']['tmp_name'];
            $file = fopen($archivo, "r");
            while(!feof($file)) {
                $mensaje = $mensaje.fgets($file);
            }
            fclose($file);
            echo "hola mundo";
        }else{
            $mensaje = $_REQUEST['mensaje'];
        }

        $array = str_split($mensaje, 1);

        for ($i=0; $i < count($array); $i++) {
            $c = 0;
            $b = true;
            for ($j=0; $j < count($array); $j++) { 
                if($array[$i] == $array[$j]){
                    $c = $c+1;
                }
            }

            foreach ($matriz as $key) {
                if ($key["caracter"] == $array[$i]) {
                    $b=false;
                }
            }

            if ($b) {
                array_push($matriz, ["caracter" => $array[$i], "cantidad" => $c]);
            }
        }
        sort($matriz);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria de la informacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Teoria de la información</h1>
        <div class="mb-3">
            <span class="badge bg-primary">Jesus Capriel - 201908009</span>
            <span class="badge bg-secondary">Gelder Tubac - 201808036</span>
            <span class="badge bg-success">William Hernadez - 201808039</span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="index.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="archivo" value = "Examinar">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Ingrese o cargue texto</label>
                        <textarea name="mensaje" id="mensaje" class="form-control" cols="30" rows="10"><?php print($mensaje) ?></textarea>
                    </div>
                    <div class="d-grid">
                        <input type="submit" name="Enviar" class="btn btn-success" value="Procesar">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
            <table class="table table-success table-striped table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>Caracter</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matriz as $caracter) { ?>
                        <tr>
                            <td> <?php print($caracter["caracter"]) ?> </td>
                            <td> <?php print($caracter["cantidad"]) ?> </td>
                        </tr>
                    <?php } ?>
                    <tr class="table-primary">
                        <td>Total</td>
                        <td><?php print(count($array)) ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>