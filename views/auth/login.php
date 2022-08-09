<?php
    $suscripcionSubmit = true;
?>
<section class="auth contenedor">

    <div class="izquierda">
        <h1>Iniciar sesión</h1>
    </div>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <div class="derecha">

        <form action="" class="formulario-login" method="POST">

            <div class="campo">
                <input type="email" id="email" placeholder="Ingresa tu correo" name="email">
            </div>
            <div class="campo">
                <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password">
            </div>

            <input type="submit" value="Iniciar sesión" class="btn-feedback btn-log">

        </form>

        <div class="enlaces-login">
            <a href="/register">¿No tienes una cuenta? ¡Registrate!</a>
            <a href="/recover/email">¿Olvidaste tu contraseña? ¡Recuperala!</a>
        </div>

    </div>

</section>