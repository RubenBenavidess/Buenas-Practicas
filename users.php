<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Document</title>
</head>
<body>
    <h1>Buenas Prácticas para el Desarrollo Web Seguro</h1>

    <h2>Usuarios</h2>

    <div id="crud-container">
        <div id="left-button-container">
            <div class="button-container">
                <button id="button-create" onclick="goCreateWindow()">Crear</button>
            </div>
        </div>

        <div id="right-button-container">
            <div class="button-container" id="button-edit-container">
                <button id="button-edit" onclick="validateSelections('edit.php')">Editar</button>
            </div>

            <div class="button-container">
                <button id="button-delete" onclick="deleteSelections('delete.php')">Eliminar</button>
            </div>
        </div>
    </div>

    <div id="navigation-container">

    <form id="search-form" style="height: 100%; width: 100%;" method="post" action="">          
        <div class="search-bar">
                <div class="icon-container">
                    <button name="search" id="button-search" 
                    class="search-button" onclick="showUser('search.php')"><span class="material-icons"
                        data-width="15px"
                        data-height="15px">
                        search </span></button>
                </div>

                <div class="text-area">
                    <textarea name="search-text" id="search-text"
                            rows="1" aria-autocomplete="both"
                            role="combobox"></textarea>
                </div>
            
        </div>
    </form>

    </div>

    <div id="table-container">
        <form id="edit-form" method="post" action="">
            <table id="table-users">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th id="select-header">Seleccione (Editar/Eliminar)</th>
                </tr>

                <?php
                include "db.php";

                //Seleccionamos los usuarios existentes
                $sql = "SELECT * FROM usuarios";
                $result = $connec->query($sql);

                //Verificamos que hayan
                if ($result->num_rows > 0) {
                    
                    //Los imprimimos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td><input type='checkbox' name='user-ids[]' value='" . $row['id'] . "'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay usuarios registrados.</td></tr>";
                }
                ?>
            </table>
        </form>
    </div>

<script src="JS/main.js"></script>

</body>
</html>
