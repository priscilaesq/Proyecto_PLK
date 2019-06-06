
<section id="login">
    <div class="container">
        <p class="big-titles"> Hola, <?php echo $_SESSION['info']->nombre ?> </p>
        <div class="row"> 

<?php

    foreach(@$solicitudes as $solicitud) :
        @$cliente = @$clientes[$solicitud->id_cliente];
?>
            <div class="col-md-3">
                <div class="cliente-box">
                    <div class="space-15"></div>
                    <div class="space-15"></div>
                    <center><p class="texto-general-gris-bold"> <?php echo $cliente->nombre . " " . $cliente->apellido; ?> </p></center>
                    <div class="space-15"></div>
                    <center><a href="http://localhost/vendedor/chat/<?php echo $cliente->id ?>" class="button boton-azul-db"> Chat </a>
                    <a href="http://localhost/vendedor/editar/<?php echo $cliente->id ?>" class="button boton-verde-db"> Editar </a></center>
                </div>
            </div>
    <?php endforeach; ?>

        </div>


    </div>
</section>