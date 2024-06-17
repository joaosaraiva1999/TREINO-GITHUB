<?php
session_start();
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location:../index.php");
//     exit(0);
// }


    if (!empty($_POST)) {
        $ide = $_POST["reservas"];
    
        if (!empty($ide)) {
            require_once "db_connection.php";
    
            // Verifica se o ID existe na tabela
            $sql = "SELECT * FROM reservas WHERE reserva=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $ide);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result && $result->num_rows > 0) {
                $sql = "DELETE FROM reservas WHERE reserva=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $ide);
                $stmt->execute();
    
                if ($stmt->affected_rows > 0) {
                    $_SESSION["msg_sucesso"] = "Reserva apagada com sucesso!";
                } else {
                    $_SESSION["erros"]["Apagar"] = "Não foi possível apagar a reserva";
                }
            } else {
                $_SESSION["erros"]["reserva"] = "Reserva não encontrada";
            }
    
            $stmt->close();
            $conn->close();
        }
    }
    header("listar_reservas.php");
    
header("Location:listar_reservas.php");
