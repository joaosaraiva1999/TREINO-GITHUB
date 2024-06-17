<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    require_once "scripts/head.php"
?>
    <link rel="stylesheet" href="css/style_contactos.css">

</head>

<body>
    
<?php 
    require_once "scripts/header.php"
?>

    <main>
        <section class="formulario">
            <div class="interface">
                <h2 class="titulo">FALE     <span>CONNOSCO</span></h2>

                <form action="">
                    <input type="text" name="" id="" placeholder="NOME" required>
                    <input type="email" name="" id="" placeholder="EMAIL" required>
                    <input type="text" name="" id="" placeholder="TELEFONE">
                    <textarea name="" id="" placeholder="SEUA MENSAGEM" required></textarea>
                    <div id="btn-enviar"><input type="submit" value="ENVIAR"></div>
                </form>
            </div>
        </section>

        <section class="home">
            <div class="form_container">
                <i class="uil uil-times form_close"></i>

                <!-- Login Form  -->

                <div class="form login_form">
                    <form action="#">
                        <h2>Login</h2>
                        <div class="input_box">
                            <input type="email" placeholder="Insira seu email">
                            <i class="uil uil-envelope-alt email"></i>
                        </div>
                        <div class="input_box">
                            <input type="password" placeholder="Insira sua senha">
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>

                        <div class="option_field">
                            <span class="checkbox">
                                <input type="checkbox" id="check">
                                <label for="check">Me lembrar</label>
                            </span>
                            <a href="#" class="forgot_pw">Esqueceu a Senha?</a>
                        </div>


                        <button class="button">Login Now</button>

                        <div class="login_signup">
                            Não tem uma conta? <a href="#" id="signup">Registe-se</a>
                        </div>
                    </form>
                </div>


                <!-- Signup Form -->

                <div class="form signup_form">
                    <form action="#">
                        <h2>Signup</h2>
                        <div class="input_box">
                            <input type="email" placeholder="Insira seu email">
                            <i class="uil uil-envelope-alt email"></i>
                        </div>
                        <div class="input_box">
                            <input type="password" placeholder="Crie a sua senha">
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>
                        <div class="input_box">
                            <input type="password" placeholder="Confirme a sua senha">
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>


                        <button class="button">Signup Now</button>

                        <div class="login_signup">
                            Já tem uma conta? <a href="#" id="login">Entre</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    
    <?php 
require_once "scripts/footer.php"
?>
    <script src="../../../Header/js/navigator.js"></script>
    <script src="../../../Header/js/form.js"></script>

</body>

</html>