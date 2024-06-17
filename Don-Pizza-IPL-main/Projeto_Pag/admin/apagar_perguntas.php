<?php
session_start();
// if (!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
//     header("Location:../index.php");
//     exit(0);
// }


    if (!empty($_POST)) {
        $ide = $_POST["id"];
    
        if (!empty($ide)) {
            require_once "db_connection.php";
    
            // Verifica se o ID existe na tabela
            $sql = "SELECT * FROM faq WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $ide);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result && $result->num_rows > 0) {
                $sql = "DELETE FROM faq WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $ide);
                $stmt->execute();
    
                if ($stmt->affected_rows > 0) {
                    $_SESSION["msg_sucesso"] = "Utilizador apagado com sucesso!";
                } else {
                    $_SESSION["erros"]["Apagar"] = "Não foi possível apagar o utilizador";
                }
            } else {
                $_SESSION["erros"]["Utilizador"] = "Utilizador não encontrado";
            }
    
            $stmt->close();
            $conn->close();
        }
    }
    header("listar_perguntas.php");
    
header("Location:listar_perguntas.php");
