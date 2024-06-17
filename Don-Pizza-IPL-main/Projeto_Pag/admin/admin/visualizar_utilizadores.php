<?php
session_start();

// Conexão com o banco de dados
require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['utilizador'])) {
    $id = intval($_GET['utilizador']);

    // Buscar o registro para visualização
    $sql = "SELECT * FROM utilizador WHERE utilizador = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $utilizador = $result->fetch_assoc();
    $stmt->close();

    if (!$utilizador) {
        $_SESSION['msg_erros'] = "utilizador não encontrado.";
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
    header("Location: index.php");
    exit();
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
    <link href="../css/styles_admin.css" rel="stylesheet">
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
                        <h2>Detalhes do utilizador</h2>
                        <p><strong>ID:</strong> <?= htmlspecialchars($utilizador["utilizador"]) ?></p>
                        <p><strong>User_Name:</strong> <?= htmlspecialchars($utilizador["user_name"]) ?></p>
                        <p><strong>Nome:</strong> <?= htmlspecialchars($utilizador["nome"]) ?></p>
                        <p><strong>data da inscrição:</strong> <?= htmlspecialchars($utilizador["data_inscricao"]) ?></p>
                        <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($utilizador["data_nasc"]) ?></p>
                        <p><strong>idade:</strong> <?= htmlspecialchars($utilizador["idade"]) ?></p>
                        <p><strong>Telefone:</strong> <?= htmlspecialchars($utilizador["telefone"]) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($utilizador["email"]) ?></p>
                        <a href="listar_utilizadores.php" class="btn btn-secondary">Voltar</a>
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
