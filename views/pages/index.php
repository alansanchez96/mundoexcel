<div class="hero contenedor">
    <div class="izquierda">
        <div class="logo-hero">
            <div class="logo-hero__img">
                <img src="build/img/logo__blanco.webp" alt="#">
            </div>
            <div class="logo-hero__txt">
                <h1>Mundo <span>Excel</span></h1>
            </div>
        </div>
        <h2>Academia</h2>
        <p>Aprende de profesionales y obtén nuevos ingresos</p>
    </div>
    <div class="derecha">
        <img src="build/img/hero.webp" alt="#">
    </div>
</div>

<main>

    <section class="bg-resumen">
        <div class="resumen contenedor">

            <div class="izquierda">
                <h2>Lo que aprenderás con nosotros</h2>
                <p>Dominaras la herramienta al 100% con amplia salida laboral</p>
                <p>Herramienta excel 1 ejemplo</p>
                <p>Herramienta excel 2 ejemplo</p>
            </div>
            <div class="derecha">
                <img src="build/img/learn.webp" alt="#">
            </div>
        </div>
    </section>

    <section class="courses contenedor">
        <h2>Nuestros cursos</h2>

        <div class="cards-courses">
            <?php include __DIR__ . '/../templates/card.php'; ?>
        </div>

        <a href="/cursos" class="btn__viewmore">Ver mas cursos</a>

    </section>

    <section class="feedback contenedor">

        <div class="izquierda">

            <div class="feedback__contenedor">
                <div class="perfiles">

                    <div class="perfil">
                        <div class="perfil__img">
                            <img src="build/img/perfildefault.webp" alt="#">
                        </div>
                        <div class="perfil__detalles">
                            <div class="perfil__nombre">
                                <p class="perfil-nombre">Alan Sanchez</p>
                            </div>
                            <div class="perfil__publicado">
                                <p class="perfil-fecha"><?php echo date('l d M Y'); ?></p>
                            </div>
                            <div class="perfil__comentario">
                                <p class="perfil-comentario">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam.</p>
                            </div>
                        </div>
                    </div> <!-- Fin perfil -->
                    <div class="perfil">
                        <div class="perfil__img">
                            <img src="build/img/perfildefault.webp" alt="#">
                        </div>
                        <div class="perfil__detalles">
                            <div class="perfil__nombre">
                                <p class="perfil-nombre">Alan Sanchez</p>
                            </div>
                            <div class="perfil__publicado">
                                <p class="perfil-fecha"><?php echo date('l d M Y'); ?></p>
                            </div>
                            <div class="perfil__comentario">
                                <p class="perfil-comentario">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam.</p>
                            </div>
                        </div>
                    </div> <!-- Fin perfil -->
                    <div class="perfil">
                        <div class="perfil__img">
                            <img src="build/img/perfildefault.webp" alt="#">
                        </div>
                        <div class="perfil__detalles">
                            <div class="perfil__nombre">
                                <p class="perfil-nombre">Alan Sanchez</p>
                            </div>
                            <div class="perfil__publicado">
                                <p class="perfil-fecha"><?php echo date('l d M Y'); ?></p>
                            </div>
                            <div class="perfil__comentario">
                                <p class="perfil-comentario">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam.</p>
                            </div>
                        </div>
                    </div> <!-- Fin perfil -->

                    <div class="post__feedback-responsive">
                        <h3>Da a conocer tu opinión</h3>

                        <form action="" method="POST" class="form-feedback">
                            <textarea id="feedback" placeholder="Tu mensaje"></textarea>
                            <input type="submit" class="btn-feedback" value="Enviar">
                        </form>
                    </div>
                </div><!-- Fin perfiles -->
            </div><!-- Fin contenedor feedback -->

        </div>
        <div class="derecha">
            <h2>Opiniones</h2>

            <div class="post__feedback">
                <h3>Da a conocer tu opinión</h3>
                <form action="" method="POST" class="form-feedback">
                    <textarea id="feedback" placeholder="Tu mensaje"></textarea>
                    <input type="submit" class="btn-feedback" value="Enviar">
                </form>
            </div>



        </div>
    </section>

</main>