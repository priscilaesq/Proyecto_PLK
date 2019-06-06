<section id="login">
    <div class="container-fluid">
        <div class="row">
            <section id="formulario">
                <article class="col-12 col-md-offset-1 col-md-5">
                    <div class="space-login"></div>
                    <div class="formulario-login">
                    <center><img class="logo-login" src="/imgs/logo.png"></center>
                        <p class="small-title-black">Iniciar Sesión </p><br>
                        <?php
                            if(@$error != '') :
                        ?>
                            <div class="alert alert-primary" role=alert>
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="/" method="post">
                            <p class="input-title"> Correo electrónico </p>
                            <input name="correo" class="form-input" type="email"><br><br>
                            <p class="input-title"> Contraseña </p>
                            <input name="contrasena" class="form-input" type="password"><br>
                            <button class="boton-login" type="submit"> Iniciar Sesión </button>
                        </form>
                    </div>
                </article>
            </section>
            <section class="image-login">
                <article class="col-12 col-md-6">
                    <img class="imagen" src="/imgs/login-foto.png">
                </article>
            </section>
        </div>
    </div>
</section>






</body>
</html>