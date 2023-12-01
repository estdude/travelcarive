<!-- Registration Start -->

<style>
table, th, td {
    border:1px solid black;
}
.cuestionario{
    border:1px solid black;
}
</style>

<h1 class="text-white m-0">Sign Up Now</h1>

<!-- inputs -->
<form action="registro_usuario.php" method="POST">
<div class="cuestionario" style="width:20%">

<input type="text" class="form-control p-4" placeholder="Your name" required="required" name="name"/>

<input type="email" class="form-control p-4" placeholder="Your email" required="required" name="email"/>

<select class="custom-select px-4" style="height: 47px;" name="destino">
<option selected>Select a destination</option>
<option value="1">centro</option>
<option value="2">playas</option>
<option value="3">islas</option>
</select>
<button class="btn btn-primary btn-block py-3" type="submit">Sign Up Now</button>
</div>
</form>
<!-- Registration End -->


<?php
// Realiza la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$query = "SELECT * FROM usuarios";
$result_tasks = mysqli_query($conexion, $query);

if (!$result_tasks) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Comienza a mostrar la tabla
echo "<table style='width:100%'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th>Destino</th>";
echo "<th colspan='2'>opciones</th>";
echo "</tr>";

// Muestra los datos de la base de datos
while ($row = mysqli_fetch_array($result_tasks)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['destination'] . "</td>";
    echo "<td><a href='editar_usuarios.php?id=" . $row['id'] . "'>Editar</a></td>"; 
    echo "<td><a href='delete.php?id=" . $row['id'] . "'>borrar</a></td>"; 
    echo "</tr>";
}

echo "</table>";

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
