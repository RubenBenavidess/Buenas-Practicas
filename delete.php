<?php
include "db.php";

//Verificamos que se hayan posteado los usuarios
if (isset($_POST['user-ids'])) {

    //Obtenemos los usuarios
    $userIds = $_POST['user-ids'];

    //Creamos la consulta que dice que selecciona todas las filas y sus campos cuyos ids sean los que hemos conseguido
    //de POST, ademas se transforman en un array que ademas hace que los valores se transformen a enteros, esto para
    //evitar problemas en los tipos de datos. Finalmente, el implode lo que hace es separar por comas los valores
    //de este array para que nuestro Operador IN funcione correctamente.
    $sql = "SELECT * FROM usuarios WHERE id IN (" . implode(',', array_map('intval', $userIds)) . ")";
    $result = $connec->query($sql);

    if ($result->num_rows > 0) {
        //Agarra todas las filas y las convierte en arrays asociativos.
        $users = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Usuarios no encontrados";
        exit;
    }
} else {
    echo "IDs de usuarios no especificados";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/createStyles.css">
    <title>Eliminar Usuarios</title>
</head>
<body>
    
    <form method="post" style="background-color: #731d1d;" id="form-delete" action="validateDeletions.php">
        <h2>Confirmación de Eliminación</h2>

        <?php foreach ($users as $user): ?>

            <div class="field-container">
                <span>ID: </span>
                <input readonly style="color: gray;" name="user-id[]" value="<?php echo $user['id']; ?>">
            </div>
            
            <div class="field-container">
                <span>Nombre: </span>
                <input readonly style="color: gray;" type="text" name="user-name[]" value="<?php echo $user['nombre']; ?>" 
                pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{4,30}?" title="Sólo letras y espacios." required>
            </div>

            <div class="field-container">
                <span>Email: </span>
                <input readonly style="color: gray;" type="email" name="email[]" value="<?php echo $user['email']; ?>" 
                pattern="[A-Za-z0-9._]+@[a-z]+.[a-z]{2,3}" title="Sólo correos válidos." required>
            </div>

            <div class="field-container">
                <span>Teléfono: </span>
                <input readonly style="color: gray;" type="text" name="phone[]" value="<?php echo $user['telefono']; ?>" 
                pattern="[\d]{10}" required>
            </div>

            <hr style="margin-bottom: 20px;">

        <?php endforeach; ?>

        <div id="button-container">
            <button type="submit" name="delete" id="button-delete">ELIMINAR</button>
        </div>
        
    </form>

    <script src="JS/editScript.js"> </script>

</body>
</html>
