<sidebar class="sidebar">
    <div class="head-sidebar">
        <i class='bx bxs-grid-alt icon'></i>
        <p>Dashboard</p>
        <i class='bx bx-menu' id="btnSidebar"></i>
    </div>
    <ul class="nav-list">
        <li class="perfil-sidebar" data-paso="6" id="btnPerfil">
            <div class="perfil-contenedor <?php echo $dashboard ? 'perfilActive' : '';?>" data-paso="6">
                <img data-paso="6" src="<?php echo $usuario->picture ? '/build/img/imagenes_usuarios/'. $usuario->picture : '/build/img/imagenes_usuarios/perfildefault.png';?>" alt="#">
                <div class="perfil-detalles" data-paso="6">
                    <p class="perfil-nombre"><?php echo $usuario->nombre . ' ' . $usuario->apellido; ?></p>
                    <p class="perfil-nivel">Web designer</p>
                </div>
            </div>
        </li>
        <li>
            <button type="button" data-paso="1" <?php echo $editar ? 'class="actual"' : '';?>>
                <i class='bx bxs-user' data-paso="1"></i>
                <p class="nombre-link" data-paso="1">Editar perfil</p>
            </button>
        </li>
        <li>
            <button type="button" data-paso="2" <?php echo $payments ? 'class="actual"' : '';?>>
                <i class='bx bx-credit-card-front' data-paso="2"></i>
                <p class="nombre-link" data-paso="2">Metodos de Pagos</p>
            </button>
        </li>
        <li>
            <button type="button" data-paso="3" <?php echo $certificados ? 'class="actual"' : '';?>>
                <i class='bx bx-medal' data-paso="3"></i>
                <p class="nombre-link" data-paso="3">Certificados</p>
            </button>
        </li>
        <li>
            <button type="button" data-paso="4" <?php echo $courses ? 'class="actual"' : '';?>>
                <i class='bx bx-heart' data-paso="4"></i>
                <p class="nombre-link" data-paso="4">Mis Cursos</p>
            </button>
        </li>
        <li>
            <button type="button" data-paso="5" <?php echo $security ? 'class="actual"' : '';?>>
                <i class='bx bx-cog' data-paso="5"></i>
                <p class="nombre-link" data-paso="5">Configuracion</p>
            </button>
        </li>
    </ul>
</sidebar>