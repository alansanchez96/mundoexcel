<section class="contenedor default">

    <h1>Crear nueva contraseña</h1>

    <p>Porfavor ingrese nueva contraseña</p>

    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form action="" class="formulario-login <?php if($error === 'hidden'){ echo $error; } else{ echo $error; } ?>" method="POST">

        <div class="campo">
            <input type="password" id="password" placeholder="Ingresa tu nueva contraseña" name="password">
        </div>
        <div class="campo">
            <input type="password" id="password1" placeholder="Repite tu nueva contraseña" name="password1">
        </div>

        <input type="submit" value="Confirmar" class="btn-feedback btn-log">

    </form>

</section>