<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Excel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header id="header">
        <div class="barra contenedor">

            <div class="logo">
                <a href="/" class="logo">
                    <div class="logo__img">
                        <img src="/build/img/logo__blanco.webp" alt="Logo">
                    </div>
                    <div class="logo__txt">
                        <p>Mundo <span>Excel</span></p>
                    </div>
                </a>
            </div> <!-- Fin logo -->

            <div class="menu">
                <i class='bx bx-menu menu-open'></i>
                <i class='bx bx-x menu-close'></i>

                <nav class="nav">
                    <a href="/cursos">Cursos</a>
                    <a href="#">Power Bi</a>
                    <a href="/quienes-somos">¿Quienes Somos?</a>
                    <a href="contacto">Contacto</a>
                </nav>

            </div>

            <div class=" log-header">
                <i class='bx bx-user'></i>
            </div>

        </div> <!-- Fin barra -->
    </header>

    <?php echo $contenido; ?>

    <footer>
        <div class="contenedor">
            <div class="info <?php echo $suscripcionSubmit ? 'displayNone' : ''; ?>">
                <div class="info__img">
                    <img src="/build/img/emailsvg.svg" alt="#">
                </div>
                <div class="info__texto">
                    <h3>Enterate de todas nuestras actualizaciones</h3>
                    <form class="form__suscribir" action="/suscripcion" method="POST">
                        <input type="email" placeholder="Ingresa tu email" name="email">
                        <input type="submit" value="Suscribirme" class="boton__suscribir">
                    </form>
                </div>
            </div>
            <div class="extra">
                <div class="extra__logo">
                    <h4>Encuentranos En</h4>
                </div>
                <div class="extra__redes">
                    <a href="#facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" width="50px" height="50px">
                            <g id="surface125066792">
                                <path style=" stroke:none;fill-rule:nonzero;fill:rgb(19.607843%,65.490198%,54.11765%);fill-opacity:1;" d="M 25 3 C 12.863281 3 3 12.863281 3 25 C 3 36.019531 11.128906 45.136719 21.714844 46.730469 L 22.863281 46.902344 L 22.863281 29.566406 L 17.664062 29.566406 L 17.664062 26.046875 L 22.863281 26.046875 L 22.863281 21.371094 C 22.863281 18.496094 23.550781 16.597656 24.695312 15.410156 C 25.839844 14.222656 27.527344 13.621094 29.878906 13.621094 C 31.757812 13.621094 32.488281 13.734375 33.183594 13.820312 L 33.183594 16.699219 L 30.738281 16.699219 C 29.351562 16.699219 28.210938 17.476562 27.617188 18.507812 C 27.027344 19.539062 26.84375 20.773438 26.84375 22.027344 L 26.84375 26.042969 L 32.964844 26.042969 L 32.421875 29.566406 L 26.84375 29.566406 L 26.84375 46.929688 L 27.976562 46.777344 C 38.714844 45.320312 47 36.125 47 25 C 47 12.863281 37.136719 3 25 3 Z M 25 5 C 36.058594 5 45 13.941406 45 25 C 45 34.730469 38.035156 42.730469 28.84375 44.535156 L 28.84375 31.566406 L 34.136719 31.566406 L 35.296875 24.042969 L 28.84375 24.042969 L 28.84375 22.027344 C 28.84375 20.988281 29.035156 20.058594 29.351562 19.5 C 29.671875 18.945312 29.980469 18.699219 30.738281 18.699219 L 35.183594 18.699219 L 35.183594 12.007812 L 34.316406 11.890625 C 33.71875 11.8125 32.347656 11.621094 29.878906 11.621094 C 27.175781 11.621094 24.855469 12.359375 23.253906 14.023438 C 21.652344 15.6875 20.859375 18.171875 20.859375 21.371094 L 20.859375 24.046875 L 15.664062 24.046875 L 15.664062 31.566406 L 20.859375 31.566406 L 20.859375 44.46875 C 11.816406 42.554688 5 34.625 5 25 C 5 13.941406 13.941406 5 25 5 Z M 25 5 " />
                            </g>
                        </svg>
                    </a>
                    <a href="#instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" width="50px" height="50px">
                            <g id="surface125069085">
                                <path style=" stroke:none;fill-rule:nonzero;fill:rgb(19.607843%,65.490198%,54.11765%);fill-opacity:1;" d="M 16 3 C 8.832031 3 3 8.832031 3 16 L 3 34 C 3 41.167969 8.832031 47 16 47 L 34 47 C 41.167969 47 47 41.167969 47 34 L 47 16 C 47 8.832031 41.167969 3 34 3 Z M 16 5 L 34 5 C 40.085938 5 45 9.914062 45 16 L 45 34 C 45 40.085938 40.085938 45 34 45 L 16 45 C 9.914062 45 5 40.085938 5 34 L 5 16 C 5 9.914062 9.914062 5 16 5 Z M 37 11 C 35.894531 11 35 11.894531 35 13 C 35 14.105469 35.894531 15 37 15 C 38.105469 15 39 14.105469 39 13 C 39 11.894531 38.105469 11 37 11 Z M 25 14 C 18.9375 14 14 18.9375 14 25 C 14 31.0625 18.9375 36 25 36 C 31.0625 36 36 31.0625 36 25 C 36 18.9375 31.0625 14 25 14 Z M 25 16 C 29.980469 16 34 20.019531 34 25 C 34 29.980469 29.980469 34 25 34 C 20.019531 34 16 29.980469 16 25 C 16 20.019531 20.019531 16 25 16 Z M 25 16 " />
                            </g>
                        </svg>

                    </a>
                </div>
            </div>
            <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
        </div>
    </footer>

    <script src="/build/js/app.js"></script>
    <?php
    echo $script ?? '';
    ?>
</body>

</html>