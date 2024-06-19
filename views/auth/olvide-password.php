<div class="contenedor olvide">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Reestablezca su contraseña</p>

        <form class="formulario" action="/olvidePassword" method="POST">
        <
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">
            </div>
            
            <input type="submit" class="boton" value="Reestrablecer password">
        </form>
        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
            <a href="/crear-cuenta">¿Aun no tienes cuenta? Crea la tuya</a>
        </div>
    </div><!-- .contenedor-sm -->

</div>