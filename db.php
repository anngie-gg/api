<?php
$host     = "TU_MYSQL_HOST";
$port     = "TU_MYSQL_PORT";
$dbname   = "TU_MYSQL_DATABASE";
$user     = "TU_MYSQL_USER";
$password = "TU_MYSQL_PASSWORD";

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Conexión fallida: " . $e->getMessage()]);
    exit;
}
?>