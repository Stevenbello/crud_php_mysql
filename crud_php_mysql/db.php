<!-- conexion a base de datos mysql -->
<?php
session_start();    // iniciar sesion para guardar un dato

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

// condicion para saber si existe la conexion con la base de datos
if(isset($conn)){
    echo 'DB is connect';   // checar conexion en: localhost/php_crud_mysql/db.php
}

?>