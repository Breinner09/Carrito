<?php
session_start();

include("conn.php");

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$_SESSION['usuario'] = $usuario;

$consulta = "SELECT * FROM usuario WHERE user = '$usuario' and pass = '$pass'";
$resultado = mysqli_query($conn, $consulta);


if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    header("Location: index.php");
} else {
    include("index.html"); ?>
    <h3 class="bad">ERROR EN LA AUTENTIFICACIÓN</h3>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conn);
?>