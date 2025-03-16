<?php
header("Access-Control-Allow-Origin: *"); // Permitir peticiones desde cualquier origen
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");

include 'connection.php';

$conexion = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde Angular
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data["nombre"], $data["apellidos"], $data["correo"], $data["contrasena"],$data["fechaNacimiento"],$data["telefono"])) {
        $nombre = $data["nombre"];
        $apellidos = $data["apellidos"];
        $correo = $data["correo"];
        $contrasena = $data["contrasena"];
        $fechaNacimiento = $data["fechaNacimiento"];
        $telefono = $data["telefono"];
        
        $query = "INSERT INTO registro (nombre, apellidos, correo, contrasena, fechaNacimiento, telefono) VALUES ('$nombre', '$apellidos', '$correo', '$contrasena', '$fechaNacimiento', '$telefono')";
        
        if ($conexion->query($query)) {
            echo json_encode(["mensaje" => "Usuario registrado"]);
        } else {
            echo json_encode(["error" => "Error al registrar"]);
        }
    } else {
        echo json_encode(["error" => "Faltan datos"]);
    }
} else {
    echo json_encode(["error" => "Método no permitido"]);
}
?>
