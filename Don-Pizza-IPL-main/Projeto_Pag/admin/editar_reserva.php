<?php
session_start();
require_once "db_connection.php";

if (isset($_GET['reserva'])) {
    $id = intval($_GET['reserva']);

    $sql = "SELECT * FROM reservas WHERE reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $reservas = $result->fetch_assoc();
    $stmt->close();

    if (!$reservas) {
        $_SESSION['msg_erros'] = "Reserva não encontrada.";
        header("Location: listar_reservas.php");
        exit();
    }
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
    header("Location: listar_reservas.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $status = $_POST['statu'];
    $reserva = $_POST['data_reserva'];
    $metodo = $_POST['metodo'];
    $mesa = $_POST['mesa'];
    $pessoas = $_POST['pessoas'];

    $sql = "UPDATE reservas SET nome = ?, statu = ?, metodo = ?, data_reserva = ?, mesa = ?, pessoas = ? WHERE reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiii", $nome, $status, $metodo, $reserva, $mesa, $pessoas, $id);

    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Reserva atualizada com sucesso.";
        header("Location: listar_reservas.php");
        exit();
    } else {
        $_SESSION['msg_erros'] = "Erro ao atualizar a reserva: " . $conn->error;
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
    <title>Editar Reserva - Nome do Projeto</title>
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
                    <h1 class="mt-4">Editar Reserva</h1>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($reservas['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="statu" class="form-label">Status</label>
                            <input type="text" class="form-control" id="statu" name="statu" value="<?= htmlspecialchars($reservas['statu'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_reserva" class="form-label">Data Reserva</label>
                            <input type="date" class="form-control" id="data_reserva" name="data_reserva" value="<?= htmlspecialchars($reservas['data_reserva'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="metodo" class="form-label">Método</label>
                            <input type="text" class="form-control" id="metodo" name="metodo" value="<?= htmlspecialchars($reservas['metodo'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="mesa" class="form-label">Mesa</label>
                            <input type="text" class="form-control" id="mesa" name="mesa" value="<?= htmlspecialchars($reservas['mesa'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="pessoas" class="form-label">Pessoas</label>
                            <input type="text" class="form-control" id="pessoas" name="pessoas" value="<?= htmlspecialchars($reservas['pessoas'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listar_reservas.php" class="btn btn-secondary">Cancelar</a>
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