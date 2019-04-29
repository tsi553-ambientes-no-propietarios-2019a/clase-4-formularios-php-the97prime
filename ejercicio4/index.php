<?php

/**
 * Problema Propuesto:
 * Desarrollar un formulario que simule el registro de un usuario (archivo index.php). 
 * El formulario debe solicitar el nombre de usuario y la clave en dos oportunidades. 
 * El formulario debe ser procesado por el archivo validarRegistro.php. Este archivo
 * debe implementar una función que permita validar si las dos contraseñas coinciden. 
 * Si las contraseñas coinciden, se debe redirigir al archivo "registroCorrecto.php"
 * Si las contraseñas no coinciden, se debe redirigir al index.php y mostrar el mensaje
 * "Las contrseñas no coinciden".
 */

?>
<html> 
  <head> 
  <title>Formulario entrada de Datos :3</title> 
  </head> 
  <body>
  <form method="post" action="validarRegistro.php"> 
   Nombre de usuario: 
  <input type="text" name="usuario"> 
  <br>
Ingrese su clave:
<input type="password" name="clave1">
<br>
Repita la clave
<input type="password" name="clave2">
<br>

  <input type="submit" center value="confirmar"> 
  </form>
</body> 
</html>