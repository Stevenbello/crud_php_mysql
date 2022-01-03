<?php 
include("db.php");  // importar base de datos

// validar datos    |   si existe a traves metodo post un metodo 'save task', imprime saving
if(isset($_POST['save_task'])){
    // echo 'saving';

    // recibir name de html a traves de metodo POST  |  title y description
    $title = $_POST['title'];
    $description = $_POST['description'];
    // echo a $title y a $description

    // insertar dentro de la tabla mysql tarea el titulo y la descripcion
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);  // consulta
    
    if(!$result){
        die("query failed");    // terminar aplicacion
    }

    else {
        // almacenar dentro sesion un mensaje y color del mensaje
        $_SESSION['message'] = 'Task saved successfully';
        $_SESSION['message_type'] = 'success';      //colores: success  |   danger


        // echo 'saved';
        header("Location: index.php");  // redireccionar usuario a index.php
    }
}

?>