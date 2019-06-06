<?php
  $cliente = $cliente[0];
  $solicitud = $solicitud[0];
?>

<section id="dashboard">
    <div class="container">

        <div class="row">

            <div class="row">
                <section id="nombre-boton">
                    <article class = "col-xs-9 col-md-9">
                        <p class="big-titles push-left"> Chat cliente: <?php echo $cliente->nombre . " " . $cliente->apellido; ?> </p>
                    </article>
                    <article class="col-xs-3 col-md-3 ">
                        <a href="http://localhost/vendedor/archivar/<?php echo $solicitud->id ?>" class="button boton-rojo-no-margen float-boton-right"> Archivar caso </a>
                    </article> 
                </section>
            </div>
          
            <section id="info-cliente">
                <article class="col-md-5">

                <div class = "info-auto">

                    <div class="row">
                      <section class = "auto-specs">
                        <article class="col-md-12">
                            <p class="texto-general-gris-bold"> Información del carro </p> 
                        </article> 

                        <article class="col-md-6">
                          <div class = "spacer-laura">
                          <p class = "texto-general-gris"> Marca </p>
                          <p class = "texto-general-azul"> <?php echo $solicitud->marca ?> </p>
                          </div>

                          <p class = "texto-general-gris"> Estado </p>
                          <p class = "texto-general-azul"> <?php echo $solicitud->estado ?></p>
                        </article>

                        <article class="col-md-6">
                          <div class = "spacer-laura">
                          <p class = "texto-general-gris"> Modelo </p>
                          <p class = "texto-general-azul"> <?php echo $solicitud->modelo ?></p>
                          </div>

                          <p class = "texto-general-gris"> Costo </p>
                          <p class = "texto-general-verde"> $<?php echo $solicitud->costo ?> MXN</p>
                        </article> 
                      </section>
                    </div>
                  </div>

                <div class = "profile-client">
                    <div class = "row">
                      <section class = "profile auto-specs">
                        <article class="col-md-12">
                            <p class="texto-general-gris-bold">  Avisos </p>
                        </article>

                        <article class="col-md-12">
                            <p class="texto-general-gris pre"><?php echo $solicitud->aviso ?></p>
                        </article>

                      </section>
                    </div>

                </div>

                </article>
            </section>

            <section class="muro-cliente">
              <article class="col-md-7">
                <div class = "mensajes">
                  <p class = "small-title-black">Mensajes</p>
                  <form action="" method="post">
                    <div class = "texto-cliente">
                      <textarea placeholder="¿Tienes alguna duda?" name="mensaje"></textarea>
                    </div>
                    <div class="row">
                      <article class="col-md-6">
                        <button class="boton-azul"> Comentar </button>
                      </article>
                    </div>
                  </form>

                 <?php foreach($chat as $mensaje) :
                    $autor = json_decode($mensaje->datos_emisor);
                  ?>
                    <article class = "mensajes-muro-general">
                      <div class = "respuesta-muro">
                        <p class = "nombre-chat"> <?php echo $autor->nombre . " " . $autor->apellido;  ?> </p>
                        <p class = "texto-general-gris"><?php echo $mensaje->mensaje ?></p>
                        <p class = "texto-fecha"> <?php
                        $time = time($mensaje->fecha);
                        echo date("F j, Y", $time) ;
                        
                        ?></p>
                      </div>
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

