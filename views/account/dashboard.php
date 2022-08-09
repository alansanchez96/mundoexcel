<?php
$suscripcionSubmit = true;
$dashboard = true;
$editar = false;
$payments = false;
$certificados = false;
$courses = false;
$security = false;
$script = '<script src="/build/js/sidebar.js"></script>';
?>
<section class="account">

    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="dashboard">

        <div class="dashboard__head"></div>
        <div class="dashboard__body">
            
            <div class="dashboard_imagen-perfil">
                <img src="<?php echo $usuario->picture ? '/build/img/imagenes_usuarios/'. $usuario->picture : '/build/img/imagenes_usuarios/perfildefault.png';?>" alt="">
            </div>

            <h1>Bienvenido</h1>
            <h3><span><?php echo $usuario->nombre . ' ' . $usuario->apellido;?></span></h3>

            <div class="dashboard__contenido contenedor">
                <div class="dashboard__contenido-biografia">
                    <h4>Un poco sobre mi</h4>
                    <p><?php echo $usuario->biografia ? $usuario->biografia : 'El usuario ' . $usuario->nombre . ' aún no ha escrito nada...';?></p>
                </div>
                <div class="dashboard_contenido-redes">
                    <h4>Mis redes sociales</h4>
                    <?php
                        if($usuario->website){ ?>
                            <p>Website: <?php echo $usuario->website;?></p>
                        <?php }
                        elseif($usuario->facebook){ ?>
                            <p>Facebook: <?php echo $usuario->facebook; ?></p>
                        <?php }
                        elseif($usuario->twitter){ ?>
                            <p>Twitter: <?php echo $usuario->twitter; ?></p>
                        <?php }
                        elseif($usuario->linkedin){ ?>
                            <p>LinkedIn: <?php echo $usuario->linkedin; ?></p>
                        <?php }
                        else{ ?>
                            <p class="dashboard_text-redes">El usuario aún no ha publicado sus redes sociales <i class='bx bx-sad'></i></p>
                        <?php }
                    ?>
                </div>
            </div>

        </div>
    </div>


    </div> <!-- Contenido -->
</section>