<?php

//Conectamos a nuestra base, en este caso, base practica

$host = "localhost";
$user = "root";
$password = "";
$dbname = "basepractica";

//Creamos la conexión
$connec = new mysqli($host, $user, $password, $dbname);

//Verificamos la conexión
if ($connec->connect_error) {
    die("Conexión fallida: " . $connec->connect_error);
}

//Creamos la tabla, a la par de verificar que no se encuentre creada ya.
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL
)";

//Verificamos si fue posible o no
if (!$connec->query($sql) === TRUE) {
    echo "Error al crear la tabla: " . $connec->error;
}

?>
