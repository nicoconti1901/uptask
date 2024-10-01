<?php
	
    //Ejemplo de un hook que se ejecuta después de guardar un registro de contacto

	$hook_array['after_save'][] = Array(1,enviar_mail,/custom/modules/Contacts/hooks, WelcomeEmailLogicHook.php, WelcomeEmailLogicHook, sendWelcomeEmail );
?>

<?php

   //Valida la entrada a través del punto de entrada de Sugar
   //Esta valildación evita que se ejecute el código si no se ha accedido a través del punto de entrada de Sugar
    
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    

    class WelcomeEmailLogicHook //Nombre de la clase
    {
	function sendWelcomeEmail ($bean, $event, $arguments) //Función que se ejecuta después de guardar un registro de contacto
        {
            $this->sendEmail($bean); //Llama a la función sendEmail
            $to = $bean->email1; //Dirección de correo electrónico del contacto
            $subject = "Bienvenido a nuestro sitio web"; //Asunto del correo electrónico
            $message = "Estimado/a ".$bean->first_name." ".$bean->last_name." con el cargo de ".$bean->cargo." y tipo de contacto ".$bean->tipo_contacto." "; //Mensaje del correo electrónico
            $message = "Bienvenido a nuestro sitio web. Nos alegra tenerte como miembro de nuestra comunidad.\n\n" //Mensaje del correo electrónico
        }

    }
?>
// Como primer punto definimos el logick hook($hook_array) que se ejecutará después de  registrar y guardar un registro de contacto. 
//Se efectua una verificacion de seguridad(propia de SugarCRM) para evitar que el código se ejecute si no se ha accedido a través del punto de entrada de Sugar.
//Si pasa la validacion se crea la clase WelcomeEmailLogicHook que contiene el metodo sendWelcomeEmail.
// La función sendWelcomeEmail enviará un correo electrónico de bienvenida al contacto que se ha guardado.
El correo electrónico de bienvenida se enviará a la dirección de correo electrónico del contacto(email1 a $bean ) y tendrá un asunto($subjet) y un mensaje específicos($message).
