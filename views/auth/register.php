<?php $suscripcionSubmit = true; ?>
<section class="auth contenedor">

    <div class="izquierda">
        <h1>Crear cuenta</h1>

        <?php
            include_once __DIR__ . '/../templates/alertas.php';
        ?>

    </div>
    <div class="derecha">

        <form action="" class="formulario-create" method="POST">

            <div class="campos">
                <div class="campo">
                    <p>Información personal</p>
                    <input type="text" id="nombre" placeholder="Ingresa tu nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
                    <input type="text" id="apellido" placeholder="Ingresa tu apellido" name="apellido" value="<?php echo $usuario->apellido; ?>">
                    <input type="text" id="dni" placeholder="Ingresa tu DNI" pattern="[0-9]{8}{1}" name="dni" value="<?php echo $usuario->dni; ?>">
                </div>
                <div class="campo">
                    <p>Credenciales</p>
                    <input type="email" id="email" placeholder="Ingresa tu correo" name="email" value="<?php echo $usuario->email; ?>">
                    <input type="tel" id="tel" placeholder="Ingresa tu teléfono" name="telefono" value="<?php echo $usuario->telefono; ?>">
                    <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password">
                    <input type="password" id="password1" placeholder="Confirmar contraseña" name="password1">
                </div>
            </div>

            <input type="submit" value="Registrar" class="btn-feedback btn-log">

        </form>

        <div class="enlaces-login">
            <a href="/login">¿Ya tienes una cuenta? ¡Logeate!</a>
            <a href="/recover/email">¿Olvidaste tu contraseña? ¡Recuperala!</a>
        </div>

    </div>

</section>