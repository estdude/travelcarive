<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $conexion = mysqli_connect("localhost", "root", "", "login_register_db");

    if ($conexion === false) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("No se encontró el usuario con ID: $id");
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        .cuestionario {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <!-- Registration Start -->
    <h1 class="text-white m-0">Editar Usuario</h1>

    <!-- inputs -->
    <form action="#" method="POST">
        <div class="cuestionario" style="width:20%">

            <input type="text" class="form-control p-4" placeholder="Your name" required="required" name="name" value="<?php echo $row['name']; ?>" />

            <input type="email" class="form-control p-4" placeholder="Your email" required="required" name="email" value="<?php echo $row['email']; ?>" />

            <select class="custom-select px-4" style="height: 47px;" name="destino">
                <option selected>Select a destination</option>
                <option value="1" <?php echo ($row['destination'] == 2) ? 'selected' : ''; ?>>centro</option>
                <option value="2" <?php echo ($row['destination'] == 2) ? 'selected' : ''; ?>>playas</option>
                <option value="3" <?php echo ($row['destination'] == 3) ? 'selected' : ''; ?>>islas</option>
            </select>
            <button class="btn btn-primary btn-block py-3" type="submit" name="editar">Guardar Cambios</button>
        </div>
    </form>
    <a href="datos.php">
    <button>datos</button>
    </a>
    <!-- Registration End -->

    <?php
    if (isset($_POST['editar'])) {
        // Procesar la edición aquí
        $nuevoNombre = $_POST['name'];
        $nuevoEmail = $_POST['email'];
        $nuevoDestino = $_POST['destino'];

        // Realizar la actualización en la base de datos
        $updateQuery = "UPDATE usuarios SET name='$nuevoNombre', email='$nuevoEmail', destination=$nuevoDestino WHERE id=$id";
        $conexion = mysqli_connect("localhost", "root", "", "login_register_db");

        if ($conexion === false) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $updateResult = mysqli_query($conexion, $updateQuery);

        if ($updateResult) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    }
    ?>
</body>
</html>
