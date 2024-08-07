<?php
include "db.php";


// Verificamos que se haya posteado la información
if (isset($_POST['delete'])) {
    
    // Verificar que 'user-id' esté definido en $_POST
    if (isset($_POST['user-id'])) {
        $userIds = $_POST['user-id'];
        $names = $_POST['user-name'];
        $emails = $_POST['email'];
        $phones = $_POST['phone'];

        //Loopeamos para todos los usuarios seleccionados
        for ($i = 0; $i < count($userIds); $i++) {
            $id = intval($userIds[$i]);
            $name = trim($names[$i]);
            $email = trim($emails[$i]);
            $phone = trim($phones[$i]);

            $update = "DELETE from usuarios WHERE id=$id";
            $result = mysqli_query($connec, $update);
        }

        if ($result) {
            echo "<h3>Se ha eliminado el usuario (Recarge el index.php para visualizar los cambios) </h3>";
        } else {
            echo "<h3>Ha ocurrido un error</h3>";
        }
    } else {
        echo "<h3>No se han enviado datos para actualizar</h3>";
    }
} else {
    echo "<h3>Formulario no enviado correctamente</h3>";
}
?>
