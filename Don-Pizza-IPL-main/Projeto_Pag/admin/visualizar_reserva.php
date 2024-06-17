<?php
session_start();

require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Buscar o registro para visualização
    $sql = "SELECT * FROM avaliacao WHERE avaliacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $avaliacao = $result->fetch_assoc();
    $stmt->close();

    if (!$avaliacao) {
        $_SESSION['msg_erros'] = "Avaliação não encontrada.";
        header("Location: listar_avaliacoes.php");
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
                        <h2>Detalhes da Avaliação</h2>
                        <p><strong>Nome:</strong> <?= htmlspecialchars($avaliacao["nome"]) ?></p>
                        <p><strong>Apelido:</strong> <?= htmlspecialchars($avaliacao["estrelas"]) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($avaliacao["email"]) ?></p>
                        <p><strong>Telefone:</strong> <?= htmlspecialchars($avaliacao["telefone"]) ?></p>
                        <p><strong>Descrição:</strong> <?= htmlspecialchars($avaliacao["descricao"]) ?></p>
                        <a href="listar_avaliacoes.php" class="btn btn-secondary">Voltar</a>
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
