 
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
        if (!$conexion) {
            die("Fallo en la conexión: " . mysqli_connect_error());
        }

        $result = mysqli_query($conexion, $query);

        if (!$result) {
            die("Fallo en la consulta: " . mysqli_error($conexion));
        }

        if (mysqli_num_rows($result) == 1) {
            echo("Puede editar, $id");
        } else {
            echo("No se encontró el usuario con ID: $id");
        }


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo "<table style='width:100%'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Email</th>";
            echo "<th>Destino</th>";
            echo "<th>opciones</th>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['destination'] . "</td>";
            echo "<td><a href='editar_usuarios.php?id=" . $row['id'] . "'>Editar</a></td>"; // Enlace para editar
            echo "</tr>";
            echo "</table>";
        } else {
            echo("No se encontró el usuario con ID: $id");
        }
        mysqli_close($conexion);
    }
?>
