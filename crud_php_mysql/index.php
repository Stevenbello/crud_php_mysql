<?php include("db.php") ?>
<!-- importar base de datos -->

<?php include("includes/header.php") ?>
<!-- importar html:5 hasta <body> -->

<!-- <h1>hello world</h1> -->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- validacion con php | datos de la sesion-->
            <?php if (isset($_SESSION['message'])) { ?>
                <!-- alerta bootstrap -->
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <!-- imprimir texto a mostrar -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>    <!-- limpiar los datos que anteriores en sesion -->


            <div class="card card-body">
                <!-- enviar datos a save_task por el metodo post -->
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <!-- autofocus al input para que parpadee la linea -->
                        <input type="text" name="title" class="form-control" placeholder="task title" autofocus>
                    </div>
                    <div class="form-group">
                        <!-- text area permite ingresar mas texto -->
                        <textarea name="description" rows="2" class="form-control" placeholder="task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save-task" value="save task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>titlte</th>
                        <th>description</th>
                        <th>created at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";   // consulta
                    $result_tasks = mysqli_query($conn, $query);    // devolver las tareas almacenadas

                    // recorrer cada tarea
                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td> <?php echo $row['title']; ?></td>   <!-- celda que imprime el valor del titulo -->
                            <td> <?php echo $row['description']; ?></td>   <!-- celda que imprime el valor de la descripcion -->
                            <td> <?php echo $row['created_at']; ?></td>   <!-- celda que imprime el valor de create at -->
                            <td>
                                <a href="edit_task.php?id= <?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id= <?php echo $row['id']; ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt "></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- importar html:5 hasta </html> -->
<?php include("includes/footer.php") ?>