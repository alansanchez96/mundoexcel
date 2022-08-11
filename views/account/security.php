<?php
$suscripcionSubmit = true;
$dashboard = false;
$editar = false;
$payments = false;
$certificados = false;
$courses = false;
$security = true;
$script = '<script src="/build/js/sidebar.js"></script>';
?>

<section>

    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="account-contenido">

        <h3>Configuracion de tu cuenta</h3>
        <h4>Seguridad</h4>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario-account" method="POST" enctype="multipart/form-data">


            <div class="campo campo-account">
                <label for="email">Nuevo Email</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario->email; ?>">
            </div>
            <div class="campo campo-account">
                <label for="password">Contraseña Actual</label>
                <input type="password" id="password" name="password_actual">
            </div>
            <div class="campo campo-account">
                <label for="password">Nueva Contraseña</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="campo campo-account">
                <label for="password1">Repite Contraseña</label>
                <input type="password" id="password1" name="password1">
            </div>
            <h4>Notificaciones</h4>
            <div class="campo campo-checkbox">
                <label for="check1">Promociones y actualizaciones de los cursos</label>
                <input type="checkbox" id="check1">
            </div>
            <div class="campo campo-checkbox">
                <label for="check2">No quiero recibir correos promocionales</label>
                <input type="checkbox" id="check2">
            </div>
            <input type="submit" value="Guardar Cambios" class="boton">

            <h4>¿Quieres cerrar tu cuenta?</h4>
            <p class="close-account"><span class="error">Advertencia:</span> Si cierras tu cuenta, se cancelará tu suscripción a tus cursos X y perderás el acceso para siempre.</p>

            <button class="btn-rojo">Eliminar Cuenta</button>

        </form>

    </div>
</section>