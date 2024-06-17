<?php
session_start();
require_once "db_connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM faq WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $perguntas = $result->fetch_assoc();
    $stmt->close();

    if (!$perguntas) {
        $_SESSION['msg_erros'] = "Pergunta não encontrada.";
        header("Location: listar_perguntas.php");
        exit();
    }
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
    header("Location: listar_perguntas.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $pergunta = $_POST['pergunta'];

    $sql = "UPDATE faq SET nome = ?, pergunta = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $pergunta, $id);

    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Pergunta atualizada com sucesso.";
        header("Location: listar_perguntas.php");
        exit();
    } else {
        $_SESSION['msg_erros'] = "Erro ao atualizar a pergunta: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Pergunta - Nome do Projeto</title>
    <link href="css/styles_admin.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?php require_once "parcial/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require_once "parcial/sidenav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    require_once "parcial/msg_erros.php";
                    require_once "parcial/msg_sucesso.php";
                    ?>
                    <h1 class="mt-4">Editar Pergunta</h1>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($perguntas['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="pergunta" class="form-label">Pergunta</label>
                            <input type="text" class="form-control" id="pergunta" name="pergunta" value="<?= htmlspecialchars($perguntas['pergunta'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listar_perguntas.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </main>
            <?php require_once "parcial/footer.php"; ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
