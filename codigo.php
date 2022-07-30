<?php
//Este código está hasta arriba de mi index.php.
//Y el  idioma principal es castellano
$accept_languaje = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'es';
$main_languaje   = substr($accept_languaje, 0, 2);
//tanto el index, como "en.php" y "pt.php" están en la raiz del dominio
switch ($main_languaje):
    //El error es que si un usuario cuyo idioma es castellano visita la raiz, es redirigido nuevamente aunque YA ESTÉ en la raiz. La idea es que quizá con una cookie detecte si ya está en la raiz y no haga la redirección para evitar el error de "TOO MANY REDIRECTS".
    case 'es':
        exit(header("Location: https://ejemplo.com/"));
    case 'en':
        exit(header("Location: https://ejemplo.com/en.php"));
    case 'pt':
        exit(header("Location: https://ejemplo.com/pt.php"));
endswitch;
if (false !== strpos($accept_languaje, 'es')) {
    exit(header("Location: https://ejemplo.com/"));
}
if (false !== strpos($accept_languaje, 'en')) {
    exit(header("Location: https://ejemplo.com/en.php"));
}
if (false !== strpos($accept_languaje, 'pt')) {
    exit(header("Location: https://ejemplo.com/pt.php"));
}
//Si el usuario habla otro idioma, se redirecciona a la versión en Inglés
exit(header("Location: https://ejemplo.com/en.php"));