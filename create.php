<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/createStyles.css">
    <title>Crear Usuario</title>
</head>
<body>
    
    <form method="post" id="form-create" action="validateCreation.php">
        <h2>Nuevo Usuario</h2>

        <div class="field-container">
            <span>Nombre: </span>
            <input type="text" name="user-name" id="user-name" placeholder="Nombre de Usuario" 
            pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{4,30}?" title="Sólo letras y espacios." required>
        </div>

        <div class="field-container">
            <span>Email: </span>
            <input type="email" name="email" id="email" placeholder="Email" 
            pattern="[A-Za-z0-9._]+@[a-z]+.[a-z]{2,3}" title="Sólo correos válidos." required>
        </div>

        <div class="field-container">
            <span>Teléfono: </span>
            <input type="text" name="phone" id="phone" placeholder="Teléfono" 
            pattern="[\d]{10}" required>
        </div>

        <div id="button-container">
            <button type="submit" name="create" id="button-create">Crear Usuario</button>
        </div>
        
    </form>

    <script src="JS/createScript.js"> </script>

</body>
</html>