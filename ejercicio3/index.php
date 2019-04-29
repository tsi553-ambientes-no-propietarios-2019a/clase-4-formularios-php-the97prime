<?php
/**
 * Crear un arreglo asociativo que almacene las claves de acceso de 5 usuarios de un sistema. Acceder a cada componente por su nombre.
 El arreglo debe tener el formato
 [
    'juan' => 'contrasena_segura'
 ]
 Crear un formulario que permita ingresar el nombre de usuario y la contraseña. 
 Al enviar el formulario se debe validar que la combinación de nombre de usuario y contraseña existan en el arreglo.
 Si los datos no son correctos imprimir un mensaje de error.
 Si los datos son correctos debe redirigir a otra página bienvenido.php que debe imprimir el mensaje "Bienvendo JUAN". (con el nombre de usuario en mayúsculas)
 */
?>

<html>
<head>
<title>Pagina</title>
</head>
<body>

<form action="bienvenido.php" method="post">
Ingrese nombre de usuario:
<input type="text" name="usuario">
<br>
Ingrese su clave:
<input type="password" name="clave">
<br>

<br>
<input type="submit" name="Confirmar">
</form>

</body>
</html>
?>