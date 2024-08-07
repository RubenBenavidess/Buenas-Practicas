<?php

include "db.php";

if (isset($_POST['create'])) {
    if (
        strlen($_POST['user-name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['phone']) >= 1
    ) {
        /* Obtener y limpiar datos */
        $name = trim($_POST['user-name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);

        /* Crear la consulta SQL */
        $creation = "INSERT INTO usuarios (nombre, email, telefono)
        VALUES ('$name', '$email', '$phone')";

        /* Ejecutar consulta */
        $result = mysqli_query($connec, $creation);
        
        /* Comprobar si la consulta fue exitosa o no */

        if ($result) {
            echo "<h3>Creacion Exitosa</h3>";
        }else{
            echo "<h3>Ha ocurrido un error</h3>";
        }
    } else {
        echo "<h3>Llena todos los campos</h3>";
    }
}

?>
