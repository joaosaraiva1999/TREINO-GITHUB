<section class="home">
    <div class="form_container">
        <i class="uil uil-times form_close"></i>

        <!-- Login Form  -->

        <div class="form login_form">
            <form action="scripts/testLogin.php" id="form_login" method="post">
                <h2>Login</h2>
                <div class="input_box">
                    <input type="email" name="email" id="defemail"  placeholder="Insira seu email">
                    <a>Aqui Possui um erro!</a>
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password" id="defpass" placeholder="Insira sua senha">
                    <a>Aqui Possui um erro!</a>
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


                <button type="submit" class="button">Login Now</button>

                <div class="login_signup">
                    Não tem uma conta? <a href="#" id="signup">Registe-se</a>
                </div>
            </form>
        </div>


        <!-- Signup Form -->

        <div class="form signup_form">
            <form action="#" id="form_signup" method="post">
                <h2>Signup</h2>
                <div class="input_box">
                    <input type="email" placeholder="Insira seu email" name="email" id="email">
                    <a>Aqui Possui um erro!</a>
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Crie a sua senha" name="password" id="password">
                    <a>Aqui Possui um erro!</a>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Confirme a sua senha" name="confirmpass" id="confirmpass">
                    <a>Aqui Possui um erro!</a>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>

                <button type="submit" class="button">Signup Now</button>

                <div class="login_signup">
                    Já tem uma conta? <a href="#" id="login">Entre</a>
                </div>
            </form>
        </div>



    </div>
</section>