<?php $suscripcionSubmit = true; ?>
<section class="contenedor recover">

    <h1>Recupera tu contraseña</h1>
    <p>Ingresa tu email de la cuenta que quieras recuperar</p>

    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form action="" class="formulario-recover" method="POST">
        <div class="campo" id="inputEmail">
            <input type="email" placeholder="Ingresa tu email" name="email">
        </div>
        <input type="submit" value="Enviar" class="btn-feedback btn-log">
    </form>
    
    <div class="otro-metodo">
        <a href="/recover/dni" class="btn-feedback" id="metodoDni">Recuperar con DNI</a>
    </div>

    <div class="enlaces-login">
        <a href="/login">¿Ya tienes una cuenta? ¡Logeate!</a>
        <a href="/register">¿No tienes una cuenta? ¡Registrate!</a>
    </div>
</section>