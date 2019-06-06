<div class="container">

<p class="big-titles"> Eliminar vendedor: <?php echo $vendedor->nombre . " " . $vendedor->apellido ?> </p>
<div class="row">
            <article class="col-md-12 registro-cliente-box">
            <p class="texto-general-gris"> Favor de seleccionar al vendedor que asumirá a los clientes. </p>
            <div class="space-20"></div>
            <form action="" method="post">
                <article class="col-md-6">
                        <p class="input-title"> Seleccionar vendedor </p>
                        <select name="seleccionar-vendedor" class="dropdown">
                            <?php
                                foreach($vendedores as $vend) :
                                    if($vend->id != $vendedor->id) :
                            ?>
                                <option value="<?php echo $vend->id ?>"> <?php echo $vend->nombre . ' ' . $vend->apellido ?> </option>
                            <?php
                                    endif;
                                endforeach;
                            ?>
                        </select>
                        <button class="boton-verde"> Eliminar vendedor </button>
                </article>
            </form>
</article>
</div>
