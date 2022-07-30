<?php
/* Procura evitar lógica inversa y, a ser posible, el operador fusión de null */
switch (
    substr(
        $_SERVER['HTTP_ACCEPT_LANGUAGE']) ?? 'es',
        0,
        2
    )
) {
    //El error es que si un usuario cuyo idioma es castellano visita la raiz, es redirigido nuevamente aunque YA ESTÉ en la raiz. La idea es que quizá con una cookie detecte si ya está en la raiz y no haga la redirección para evitar el error de "TOO MANY REDIRECTS".
    case 'es':
        /* No tenemos que redirigir a ningún sitio */
        break;
    case 'pt':
        header("Location: https://ejemplo.com/pt.php");
        exit();
        break;
    default:
        /* Ante cualquier otro idioma que no sea "es" o "pt" asumimos el inglés */
        header("Location: https://ejemplo.com/en.php");
        exit();
}
