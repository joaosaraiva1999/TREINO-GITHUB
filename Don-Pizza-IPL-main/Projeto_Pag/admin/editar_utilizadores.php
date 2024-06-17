<?php
session_start();

require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['utilizador'])) {
    $id = intval($_GET['utilizador']);

    // Buscar o registro para edição
    $sql = "SELECT * FROM utilizador WHERE utilizador = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $utilizador = $result->fetch_assoc();
    $stmt->close();

    if (!$utilizador) {
        $_SESSION['msg_erros'] = "Utilizador não encontrado.";
        header("Location: listar_utilizadores.php");
        exit();
    }
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
    header("Location: listar_utilizadores.php");
    exit();
}

// Atualizar o registro se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name  = $_POST["user_name"];
    $nome = $_POST["nome"];
    $data_inscricao = $_POST["data_inscricao"];
    $data_nasc = $_POST["data_nasc"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "UPDATE utilizador SET user_name = ?, nome = ?, data_inscricao = ?, data_nasc = ?, telefone = ?, email = ? WHERE utilizador = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("ssssissi", $user_name, $nome, $data_inscricao, $data_nasc, $idade, $telefone, $email, $id);

    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Utilizador atualizado com sucesso.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['msg_erros'] = "Erro ao atualizar o utilizador: " . htmlspecialchars($stmt->error);
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
    <title>Editar Utilizador - Nome do Projeto</title>
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
                    <h1 class="mt-4">Editar Utilizadores</h1>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="nome" name="user_name" value="<?= htmlspecialchars($utilizador["user_name"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="apelido" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="apelido" name="nome" value="<?= htmlspecialchars($utilizador["nome"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Data de Inscrição</label>
                            <input type="date" class="form-control" id="email" name="data_inscricao" value="<?= htmlspecialchars($utilizador["data_inscricao"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Idade</label>
                            <input type="number" class="form-control" id="telefone" name="idade" value="<?= htmlspecialchars($utilizador["data_nasc"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Telefone</label>
                            <input type="number" class="form-control" id="descricao" name="telefone" value="<?= htmlspecialchars($utilizador["telefone"]) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Email</label>
                            <input class="form-control" id="descricao" name="email" value="<?= htmlspecialchars($utilizador["email"]) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listar_utilizadores.php" class="btn btn-secondary">Cancelar</a>
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