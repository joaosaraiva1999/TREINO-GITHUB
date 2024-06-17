<?php
session_start();
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location: ");
//     exit(0);
// }

if (!empty($_POST)) {
    $ide = $_POST["id_utilizador"];

    if (!empty($ide)) {
        require_once "db_connection.php";

        // Check if the user ID exists in the table
        $sql = "SELECT * FROM utilizador WHERE utilizador = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('i', $ide);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $sql = "DELETE FROM utilizador  WHERE utilizador = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("i", $ide);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        $_SESSION["msg_sucesso"] = "Utilizador apagado com sucesso!";
                    } else {
                        $_SESSION["erros"]["Apagar"] = "Não foi possível apagar o utilizador";
                    }
                } else {
                    $_SESSION["erros"]["SQL"] = "Erro na preparação da query DELETE";
                }
            } else {
                $_SESSION["erros"]["Utilizador"] = "Utilizador não encontrado";
            }

            $stmt->close();
        } else {
            $_SESSION["erros"]["SQL"] = "Erro na preparação da query SELECT";
        }

        $conn->close();
    }
}
header("Location: listar_utilizadores.php ");
exit();
