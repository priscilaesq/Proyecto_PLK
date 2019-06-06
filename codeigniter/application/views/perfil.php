<section id="mi-perfil">
    <div class="container">

    <div class="row">
        <article class="col-md-6 col-sm-6 col-xs-6">
        <p class = "big-titles">Perfil General </p>
    </article>
    <article class="col-md-6 col-sm-6 col-xs-6 padding-less">
        <a href="http://localhost/principal/logout" class="button boton-rojo-perfil position"> Cerrar Sesión </a>
    </article>
    </div>
        <div class="row">
           <div class="col-md-12 perfil-box">
                <div class="row">
                <article class="col-sm-8 col-md-10">
                <p class = "small-title-black-name"><?php echo $_SESSION['info']->nombre . ' ' . $_SESSION['info']->apellido  ?></p>
                </article>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 perfil-box-form">
            <form action="#" method='post'>
            <div class="space-20"></div>
                <article class="col-md-6">
                <p class="input-title"> Nombre </p>
                <input name="nombre" class="form-input" type="text" value="<?php echo $_SESSION['info']->nombre ?>">
            </article>

            <article class="col-md-6">
                <p class="input-title"> Apellidos </p>
                <input name="apellido" class="form-input" type="text" value="<?php echo $_SESSION['info']->apellido ?>">
            </article>

            <article class="col-xs-12">
                <p> Cambiar contraseña (opcional) </p>
            </article>

            <article class="col-md-6">
                <p class="input-title"> Contraseña </p>
                <input name="contrasena" class="form-input" type="password">
            </article>

            <article class="col-md-6">
                <p class="input-title"> Repite la Contraseña </p>
                <input name="contrasena2" class="form-input" type="password">
            </article>

            <?php if(@$error_contrasena != '') : ?>
                <article class="col-xs-12">
                    <div class="alert alert-principal">
                        <?php echo $error_contrasena ?>
                    </div>
                </article>
            <?php endif; ?>

            <?php if(@$status != '') : ?>
                <article class="col-xs-12">
                    <div class="alert alert-principal">
                        <?php echo $status ?>
                    </div>
                </article>
            <?php endif; ?>


            <article class="col-xs-12">
                <button class="boton-verde position"> Guardar cambios </button>
            </article>

            <div class="space-20"></div>
            <div class="space-15"></div>
            <div class="space-15"></div>
            </form>
        </div>
    </div>
</section>
