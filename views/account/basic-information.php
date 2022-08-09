<?php
$suscripcionSubmit = true;
$dashboard = false;
$editar = true;
$payments = false;
$certificados = false;
$courses = false;
$security = false;
$script = '<script src="/build/js/sidebar.js"></script>';
?>

<section class="account">

    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="account-contenido">

        <h1>Información Básica</h1>

        <div class="seccion" id="paso-1">
            <h3>Editar Perfil</h3>

            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <form action="/account/basic-information" class="formulario-account" method="POST" enctype="multipart/form-data">
                <div class="campo campo-account">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" id="nombre" placeholder="Ej: Pablo Emilio" value="<?php echo $usuario->nombre; ?>" name="nombre">
                </div>
                <div class="campo campo-account">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" placeholder="Ej: Escobar Gaviria" value="<?php echo $usuario->apellido; ?>" name="apellido">
                </div>
                <div class="campo campo-account">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" placeholder="Ej: 10.987.456" value="<?php echo $usuario->dni; ?>" name="dni">
                </div>
                <div class="campo campo-account">
                    <label for="biografia">Biografia</label>
                    <textarea type="text" id="biografia" placeholder="200 caracteres" name="biografia"><?php echo $usuario->biografia;?></textarea>
                </div>
                <div class="campo campo-account">
                    <label for="pp">Foto de perfil</label>
                    <input type="file" id="pp" accept="image/jpeg , image/png" name="picture">
                </div>
                <div class="campo campo-account">
                    <label for="pagina">URL de tu Web</label>
                    <input type="text" id="pagina" placeholder="Ej: facebook.com/PabloEscobar" value="<?php echo $usuario->website; ?>" name="website">
                </div>
                <div class="campo campo-account">
                    <label for="fb">Facebook</label>
                    <input type="text" id="fb" placeholder="Ej: facebook.com/EmilioGaviria" value="<?php echo $usuario->facebook; ?>" name="facebook">
                </div>
                <div class="campo campo-account">
                    <label for="twitter">Twitter</label>
                    <input type="text" id="twitter" placeholder="Ej: twitter.com/PabloEscobar" value="<?php echo $usuario->twitter; ?>" name="twitter">
                </div>
                <div class="campo campo-account">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin" placeholder="Ej: linkedin.com/PabloEscobar" value="<?php echo $usuario->linkedin; ?>" name="linkedin">
                </div>

                <input type="submit" value="Guardar Cambios" class="boton">
            </form>
        </div> 

    </div>
</section>