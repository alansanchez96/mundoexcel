<section class="contenedor default suscripcion">

    <h2>Boletin de nuestras actualizaciones</h2>

    <?php
        $suscripcionSubmit = true;
        include_once __DIR__ . '/../templates/alertas.php';
        
        if(empty($alertas) and $suscripcion->email){ ?>
            <h4>Se enviaran actualizaciones a <span><?php echo $suscripcion->email; ?></span></h4>
            <h4>¡Gracias por suscribirte!</h4>
    <?php }
        elseif(isset($alertas)){ ?>
            <h3>Si te suscribes a nuestras actualizaciones</h3>
            <h4>Recibiras en tu casilla de email</h4>

            <form class="formulario form-suscribir" method="POST">
                <div class="campo campo-suscribir">
                    <input type="email" placeholder="Ingresa tu email" name="email">
                    <button type="submit" class="btn-feedback">Suscribir</button>
                </div>
            </form>

            <div class="opciones-suscripcion">
                <ul class="items-izquierda">
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                </ul>
                <ul class="items-derecha">
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                </ul>
            </div>
    <?php }; 
    ?>

</section>