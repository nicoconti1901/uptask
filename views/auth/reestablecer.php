<div class="contenedor reestablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Ingrese su nueva contraseña</p>
        <?php include_once __DIR__ . '/../templates/alertas.php' ?>
        <?php if ($mostrar) { ?>
            <form class="formulario" method="POST">
                <div class="campo">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Tu Password">
                </div>

                <input type="submit" class="boton" value="Guardar password">
            </form>
        <?php } ?>
        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
            <a href="/crear-cuenta">¿Aun no tienes cuenta? Crea la tuya</a>
        </div>
    </div><!-- .contenedor-sm -->

</div>