<?php
session_start();

require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['avaliacao'])) {
    $id = intval($_GET['avaliacao']);

    // Buscar o registro para edição
    $sql = "SELECT * FROM avaliacao WHERE avaliacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $avaliacao = $result->fetch_assoc();
    $stmt->close();

    if (!$avaliacao) {
        $_SESSION['msg_erros'] = "Avaliação não encontrada.";
        header("Location: listagem.php");
        exit();
    }
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
    header("Location: listagem.php");
    exit();
}

// Atualizar o registro se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $apelido = $_POST["apelido"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $descricao = $_POST["descricao"];

    $sql = "UPDATE avaliacao SET nome = ?, apelido = ?, email = ?, telefone = ?, descricao = ? WHERE avaliacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nome, $apelido, $email, $telefone, $descricao, $id);

    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Avaliação atualizada com sucesso.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['msg_erros'] = "Erro ao atualizar a avaliação: " . $conn->error;
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
    <title>Editar Avaliação - Nome do Projeto</title>
    <link href="../css/styles_admin.css" rel="stylesheet">
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
                    <h1 class="mt-4">Editar Avaliação</h1>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($avaliacao["nome"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="apelido" class="form-label">Apelido</label>
                            <input type="text" class="form-control" id="apelido" name="apelido" value="<?= htmlspecialchars($avaliacao["apelido"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($avaliacao["email"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($avaliacao["telefone"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" required><?= htmlspecialchars($avaliacao["descricao"]) ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listar_avaliacoes.php" class="btn btn-secondary">Cancelar</a>
                    </form>
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
