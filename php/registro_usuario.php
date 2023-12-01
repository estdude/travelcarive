<?php 
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

$name = $_POST['name'];
$email = $_POST['email'];
$destino = $_POST['destino'];
$query = "INSERT INTO `usuarios` (`name`, `email`, `destination`) VALUES ('$name', '$email', '$destino')";

// Corrección: "msqli_query" debe ser "mysqli_query", y la variable $conexion se debe usar en lugar de $conxion.
$ejecutar = mysqli_query($conexion, $query);
header("location: ../index.php");
    /*
    //include `conexion_be.php`;
    $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
    /*
    if($conexion){
        echo "conctado exito";
    }else{
        echo "ERROR";
    }
    ------

    $name = $_POST['name'];
    $email = $_POST['email'];
    $destino = $_POST['destino'];
    $query = "INSERT INTO `usuarios`(`name`, `email`, `destination`) VALUES ('$name','$email','$destino')";
    $ejecutar = mysqli_query($conexion, $query);
    //*/
?>