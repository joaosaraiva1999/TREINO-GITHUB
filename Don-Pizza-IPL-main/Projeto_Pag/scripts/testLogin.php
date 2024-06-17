<?php
session_start();

$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");

if (strlen($email) == 0) {
    $_SESSION['erros']['email'] = "Vazio";
}
if (strlen($password) == 0) {
    $_SESSION['erros']['password'] = "Vazia";
}
if (empty($_SESSION['erros'])) {
    require_once("../admin/admin/db_connection.php");
    $email = $conn->real_escape_string($email); //ou $email = mysqli_real_escape_string($conn,$email);
    $sql = "SELECT * FROM utilizador WHERE email= '$email'";
    $result = $conn->query($sql);
     if (
            $result && $result->num_rows != 0 &&
            ($result->fetch_object()->pass === hash("sha512", $password))
        ) {
            $_SESSION["authenticated"] = true;
            $_SESSION["email"] = $email;
            $_SESSION['msg_sucesso'] = "Login bem sucedido";
            header("Location: ../admin/admin/index.php");
            exit(0);
        } else {
            $_SESSION['erros']['auth']  = "Email ou Password está errado";
            header("location: ../index.php");
        }
    } 
    else {
        $_SESSION['erros']['Autenticação'] = "Credencias inválidas!";
    }

if (!empty($_SESSION['erros'])) {
    header("Location: ../admin/admin/index.php");
    exit(0);
}
