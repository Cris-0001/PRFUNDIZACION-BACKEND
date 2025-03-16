<?php

$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "tecnotec";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se enviaron los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $calificacion = $_POST['calificacion'] ?? '';
    $comentario = $_POST['comentario'] ?? '';

    // Validar que los datos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($calificacion) && !empty($comentario)) {
        // Preparar la consulta SQL para insertar los datos
        $stmt = $conn->prepare("INSERT INTO tuopinion (nombre, correo, calificacion, comentario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $correo, $calificacion, $comentario);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Comentario registrado correctamente"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al registrar el comentario"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Todos los campos son obligatorios"]);
    }
}

// Cerrar conexión
$conn->close();
?>
