<?php
session_start();

require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['reserva'])) {
    $reservas = intval($_GET['reserva']);

    // Buscar o registro para visualização
    $sql = "SELECT * FROM reservas WHERE reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservas);
    $stmt->execute();
    $result = $stmt->get_result();
    $reserva = $result->fetch_assoc();
    $stmt->close();

    if (!$reserva) {
        $_SESSION['msg_erros'] = "Avaliação não encontrada.";
        header("Location: listar_reservas.php");
        exit();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualizar Avaliação - Nome do Projeto</title>
    <link href="css/styles_admin.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .content {
            width: 50%;
            text-align: center;
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .content p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php require_once "parcial/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require_once "parcial/sidenav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="content">
                        <h2>Detalhes da Reserva</h2>
                        <p><strong>Nome:</strong> <?= htmlspecialchars($reserva["nome"]) ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($reserva["statu"]) ?></p>
                        <p><strong>Data Reserva:</strong> <?= htmlspecialchars($reserva["data_reserva"]) ?></p>
                        <p><strong>Metodo Pagamento:</strong> <?= htmlspecialchars($reserva["metodo"]) ?></p>
                        <p><strong>Mesa:</strong> <?= htmlspecialchars($reserva["mesa"]) ?></p>
                        <p><strong>Numero de Pessoas:</strong> <?= htmlspecialchars($reserva["pessoas"]) ?></p>
                        <a href="listar_reservas.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </main>
            <?php require_once "parcial/footer.php"; ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>
