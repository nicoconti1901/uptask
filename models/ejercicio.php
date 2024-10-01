<?php
$hook_array['before_save'][] = Array(
    1,
    'Actualizar el cargo y el tipo de contacto',
    'custom/modules/Contacts/hooks/ActualziarContacto.php',
    'ActualizarContacto.php',
    'ActualizarContacto',
    'actualizarContacto'
);

$hook_array['after_save'][] = Array(
2,
'Enviar un mail de bienvenida despues de actualizar el cargo y tipo de contacto ',
'custom/modules/Contacts/hooks/WelcomeEmailLogicHook.php', 
'WelcomeEmailLogicHook.php', 
'WelcomeEmailLogicHook', 
'sendWelcomeEmail' );
?>

<?php
define('sugarEntry', true);
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class ActualizarContacto
{
    function actualizarContacto($bean, $event, $arguments)
    {
        // Actualizar el cargo y el tipo de contacto
        if($bean->title == 'Jefe o encargado'){
            $bean->type == 'alto mando';
        }elseif($bean->title == 'Lider o especialista'){
            $bean->type = 'lideres';
        }else{
            $bean->type = 'empleado';
        }

        
    }
}

class WelcomeEmailLogicHook //Nombre de la clase
    {
	function sendWelcomeEmail ($bean) //Función que se ejecuta después de guardar un registro de contacto
        {
            $to = $bean->email1; //Dirección de correo electrónico del contacto
            $subject = "Bienvenido a nuestro sitio web"; //Asunto del correo electrónico
            $message = "Estimado/a ".$bean->first_name." ".$bean->last_name.",\n\n"; //Mensaje del correo electrónico
            $message .= "Con el cargo de " . $bean->title . " y tipo de contacto " . $bean->type . ".\n\n"; //Mensaje del correo electrónico
        
            //Enviar el correo electrónico
            mail($to, $subject, $message);
        
        }

    }
?>


// Como primer punto definimos el hook para actualizar el contacto con la funcion de before_save con prioridad 1,
// Luego se define el hook para enviar un correo de bienvenida con la funcion after_save con prioridad 2.

//Se efectua una verificacion de seguridad(propia de SugarCRM) para evitar que el código se ejecute si no se ha accedido a través del punto de entrada de Sugar.
//Si pasa la validacion se crea la clase ActualizarContacto que contiene el metodo actualizarContacto, dentro del metodo se crea un condicional con todos predefinidos en una tabla existente.
//Luego se crea la clase WelcomeEmailLogicHook que contiene el metodo sendWelcomeEmail.
// La función sendWelcomeEmail enviará un correo electrónico de bienvenida al contacto que se ha guardado.
// El correo electrónico de bienvenida se enviará a la dirección de correo electrónico del contacto(email1) y tendrá un asunto($subjet) y un mensaje específicos($message).

//creame un logic hook para actualizar el cargo y el tipo de contacto de un modulo de contactos
   


