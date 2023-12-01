<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM usuarios WHERE id = $id";
        $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
        if (!$conexion) {
            die("Fallo en la conexión: " . mysqli_connect_error()); // Agregado mensaje de error
        }

        $resultado = mysqli_query($conexion, $query); // Corregido "mysqli_connect" a "mysqli_query"
        
        if (!$resultado) {
            die("Fallo en la consulta: " . mysqli_error($conexion));
        }

        $_SESSION['message'] = 'Borrado exitosamente';
        header("location: datos.php");
    }
?>
