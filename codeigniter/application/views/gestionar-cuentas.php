
<section id="login">
    <div class="container">
        <p class="big-titles"> Gestionar Vendedores </p>
        <div class="row"> 
            <section id="gestionar-cuentas">

                <article class="col-12 col-md-6">
                    <div class="cajita-vendedores">
                    <br><br>
                        <p class="texto-general-gris-bold"> Vendedores </p><br>

                            <?php
                                foreach($vendedores as $vendedor) :
                            ?>
                            <article class="lista-vendedor">
                                <p class="texto-general-gris"><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></p>
                                <a href="http://localhost/administrador/eliminar/<?php echo $vendedor->id ?>">
                                    <img src="/imgs/delete.svg">
                                </a>
                            </article>
                                <?php endforeach; ?>

                </article>
                <article class="col-12 col-md-6">
                    <div class="cajita-crear-vendedor">
                    <br><br>
                        <p class="texto-general-gris-bold"> Crear vendedor </p><br>
                            <div class="row">
                                <form action="#" method="post">
                                    <article class="col-md-6">
                                            <p class="input-title"> Nombre </p>
                                            <input name="nombre" class="form-input" type="text">
                                    </article>
                                    <article class="col-md-6">
                                            <p class="input-title"> Apellido </p>
                                            <input name="apellido" class="form-input" type="text">
                                    </article>    
                                    <article class="col-md-6">
                                            <p class="input-title"> Correo electrónico </p>
                                            <input name="correo" class="form-input" type="email">
                                    </article>
                                    <article class="col-md-6">
                                            <p class="input-title"> Contraseña </p>
                                            <input name="contrasena" class="form-input" type="password">
                                    </article>
                                    <center><button class="boton-verde" type="submit"> Registrar vendedor </button></center>
                                    <?php
                                        if(@$status != '') :
                                    ?>
                                        <div class="alert alert-principal">
                                            <?php echo $status; ?>
                                        </div>
                                    <?php endif; ?>
                                </form>
                    </div>
                </article>
            </section>
        </div>
    </div>
</section>



</body>
</html>

