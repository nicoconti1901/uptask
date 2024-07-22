<div class="contenedor login">

    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesión</p>
        <?php include_once __DIR__ . '/../templates/alertas.php' ?>
        <form class="formulario" action="/" method="POST" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu Password">
            </div>

            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>
        <div class="acciones">
            <a href="/crear-cuenta">¿Aun no tienes cuenta? Crea la tuya</a>
            <a href="/olvide-password">¿Olvidaste tu contraseña?</a>
        </div>
    </div><!-- .contenedor-sm -->

</div>