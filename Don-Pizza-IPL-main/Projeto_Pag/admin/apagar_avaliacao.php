<?php
session_start();

require_once "db_connection.php";

// Verificar se o ID foi passado
if (isset($_GET['avaliacao'])) {
    $id = intval($_GET['avaliacao']);

    // Deletar o registro
    $sql = "DELETE FROM avaliacao WHERE avaliacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Avaliação excluída com sucesso.";
    } else {
        $_SESSION['msg_erros'] = "Erro ao excluir a avaliação: " . $conn->error;
    }

    $stmt->close();
} else {
    $_SESSION['msg_erros'] = "ID inválido.";
}

// Redirecionar de volta para a página de listagem
header("Location: listar_avaliacoes.php");
exit();

