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

                if(isset($_POST['search'])){
                    
                    if(isset($_POST['search-text'])) {
                        
                        $userToSearch = trim($_POST['search-text']);

                        $query = "SELECT * FROM usuarios WHERE nombre = '${userToSearch}'";

                        $result = mysqli_query($connec, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['telefono'] . "</td>";
                                echo "<td><input type='checkbox' name='user-ids[]' value='" . $row['id'] . "'></td>";
                                echo "</tr>";
                            }
                        } else if(mysqli_num_rows($result) == 0){
                            echo "<tr><td colspan='5'>No hay ese usuario.</td></tr>";
                        }else{
                            echo "<tr><td colspan='5'>Ha ocurrido un error.</td></tr>";
                        }

                    }else{
                        echo "<h3>No se han enviado datos para actualizar</h3>";
                    }

                }else {
                    echo "<h3>Formulario no enviado correctamente</h3>";
                }
                
                ?>

            </table>
        </form>

        <div id="home-container">

            <div class="icon-container">
                <button name="search" id="button-search" 
                class="search-button" onclick="goHome()"><span class="material-icons"
                    data-width="15px"
                    data-height="15px">
                    home </span></button>
            </div>

        </div>

    </div>

<script src="JS/main.js"></script>

</body>
</html>

