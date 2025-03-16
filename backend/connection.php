<?php
function connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "tecnotec";

    $connect = new mysqli($host, $user, $pass, $bd);

    if ($connect->connect_error) {
        die("Error de conexión: " . $connect->connect_error);
    }

    return $connect;
}
?>
