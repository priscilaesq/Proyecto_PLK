<section id="login">
    <div class="container">
        <p class="big-titles"> Casos archivados </p>
        <div class="row"> 
            <section id="casos-archivados">

                <article class="col-12 col-md-6">
                    <div class="cajita-vendedores">
                    <br><br>
                        <p class="texto-general-gris-bold"> Clientes </p><br>
                            <?php
                                foreach($solicitudes as $solicitud) : 
                                    $cliente = $clientes[$solicitud->id_cliente]; 
                            ?>
                            <article class="lista-archivados">
                                <p class="texto-general-gris"><?php echo $cliente->nombre . " " . $cliente->apellido ?>
                                <a href="http://localhost/vendedor/recuperar/<?php echo $solicitud->id ?>">
                                    Recuperar caso
                                </a></p>
                            </article>
                            <?php endforeach; ?>
                    </div>
                </article>
            </section>
        </div>
    </div>
</section>

</body>
</html>

