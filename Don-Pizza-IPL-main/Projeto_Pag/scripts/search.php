<?php

define("DB_HOST", "localhost");
define("DB_NAME", "bd_vp");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

if (isset($_POST['search'])) {
    $stmt = $pdo->prepare("SELECT * FROM reservas WHERE reserva LIKE ?");
    $stmt->execute([
        "%" . $_POST['search'] . "%",
    ]);
    $results = $stmt->fetchAll();
} else {
    $results = [];
}

foreach ($results as $result) {
    echo "<div style='text-align: center; font: 400 16pt Poppins; margin-top: 30px;'>" . $result['reserva'] . " - " . $result['nome'] . " - " . $result['data_reserva'] . "</div>";
}
