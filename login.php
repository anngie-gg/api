<?php
header("Content-Type: application/json");
require_once 'db.php';

$data     = json_decode(file_get_contents("php://input"), true);
$login    = $data["usu_log"]  ?? "";
$password = $data["usu_pass"] ?? "";

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usu_log = ? AND usu_pass = ? AND usu_est = 'activo'");
$stmt->execute([$login, $password]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode([
        "success"  => true,
        "usu_id"   => $user["usu_id"],
        "usu_nom"  => $user["usu_nom"],
        "usu_niv"  => $user["usu_niv"]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "mensaje" => "Credenciales incorrectas o usuario inactivo"
    ]);
}
?>