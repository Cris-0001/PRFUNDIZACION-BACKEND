<?php
// Habilitar CORS correctamente
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// Manejo de preflight (CORS con Angular)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Conexión a la base de datos
$host = "localhost"; 
$user = "root";
$password = "";
$dbname = "tecnotec";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

// Obtener los datos del JSON recibido
$data = json_decode(file_get_contents("php://input"), true);
$correo = isset($data['correo']) ? trim($data['correo']) : '';
$contrasena = isset($data['contrasena']) ? trim($data['contrasena']) : '';

if (empty($correo) || empty($contrasena)) {
    echo json_encode(["error" => "Correo o contraseña vacíos"]);
    exit();
}

// Consulta segura con `prepare()`
$sql = "SELECT * FROM registro WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Comparar contraseñas en texto plano
    if ($contrasena === $row["contrasena"]) {
        echo json_encode(["mensaje" => "Inicio de sesión exitoso", "usuario" => $row]);
    } else {
        echo json_encode(["error" => "Contraseña incorrecta"]);
    }
} else {
    echo json_encode(["error" => "Correo no encontrado"]);
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
