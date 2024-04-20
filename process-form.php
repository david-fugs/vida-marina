<?php
require 'Conexion.php';
//si existe POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // para que los campos no esten vacios
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['link'])) {
       
        $name = $_POST['name'];
        $description = $_POST['description'];
        $link = $_POST['link'];

        $sql = 'INSERT INTO posts (name, description, link) VALUES ("' . $name . '","' . $description . '","' . $link . '")';

        mysqli_query($conn, $sql);
      
        // Verificar si la inserción fue exitosa
        if (mysqli_affected_rows($conn) > 0) {
            header("Location: index.php");
            exit;
        } else {
            // Mostrar un pop-up con un mensaje de error
            echo '<script>alert("Error al insertar el registro");</script>';
        }
    } else {
        // Si los campos están vacíos, mostrar un pop-up con un mensaje de error
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
} else {
    // Si el formulario no se ha enviado, redirige a la página de origen
    header("Location: index.php");
    exit;
}
?>