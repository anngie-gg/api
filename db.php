<?php
$url = parse_url("mysql://root:LGTsQbSolFSzCnSTTvtSMdDsXnQwnwMc@zephyr.proxy.rlwy.net:59275/railway");

$host     = $url["host"];
$port     = $url["port"];
$dbname   = ltrim($url["path"], "/");
$user     = $url["user"];
$password = $url["pass"];

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