<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

if (file_exists("datos.txt")) {
    $jsonClients = file_get_contents("datos.txt");

    
    $aClients = json_decode($jsonClients, true);
} else {
    $aClients = array();
}

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if ($_POST) {
    $dni = trim($_REQUEST["txtDni"]);
    $nombre = trim($_REQUEST["txtNombre"]);
    $telefono = trim($_REQUEST["txtTelefono"]);
    $correo = trim($_REQUEST["txtCorreo"]);
    $imagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$imagen");
    }

   if ($id != "") {
        
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $imagen = $aClients[$id]["imagen"];
        } else {
            unlink("imagenes/". $aClients[$id]["imagen"]);
        } 

        $aClients[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen


           
        );
    } else {
      
        $aClients[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    }
    $jsonClients = json_encode($aClients);

    
    file_put_contents("datos.txt", $jsonClients);
    header("Location: index.php");
}

if($id != "" && isset($_REQUEST["do"]) && $_REQUEST["do"] == "eliminar"){
    unset($aClients[$id]);
    $jsonClients = json_encode($aClients);
    file_put_contents("datos.txt", $jsonClients);
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body id="fondo">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 text-center">
                <h1 class= "words">Registro</h1>
            </div>
        </div>
        <div class="row">
        <div class="col-6">
                <table class="table table-dark table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        
                    </tr>

                    <?php foreach ($aClients as $cliente): ?>
                    <tr>
                        <td><img src="imagenes/<?= $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                        <td><?= $cliente["dni"]; ?></td>
                        <td><?= $cliente["nombre"]; ?></td>
                        <td><?= $cliente["correo"]; ?></td>
                        
                    </tr>
                    <?php endforeach;?>
                </table>
              
            </div>
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data" class=".bg-info">
                    <div class="row">
                            <div class="col-12 form-group ">
                            <label for="txtDni" class="words">DNI: </label>
                            <input type="text" id="txtDni" name="txtDni" class="form-control" required value="<?= isset($aClients[$id]["dni"]) ? $aClientes[$id]["dni"] : ""; ?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtNombre" class="words">Nombre: </label>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="<?= isset($aClients[$id]["nombre"]) ? $aClientes[$id]["nombre"] : ""; ?>">

                        </div>
                        <div class="col-12 form-group">
                            <label for="txtTelefono" class="words">Teléfono:</label>
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" value="<?= isset($aClients[$id]["telefono"]) ? $aClientes[$id]["telefono"] : ""; ?>">

                        </div>
                        <div class="col-12 form-group">
                            <label for="txtCorreo" class="words">Correo: </label>
                            <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" required value="<?= isset($aClients[$id]["correo"]) ? $aClientes[$id]["correo"] : ""; ?>">

                        </div>
                        <div class="col-12 form-group">
                            <label for="txtCorreo" class="words">Archivo adjunto:</label>
                            <input type="file" id="archivo" name="archivo" class="form-control-file" accept=".jpg, .jpeg, .png">
                            <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn btn-warning">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>
