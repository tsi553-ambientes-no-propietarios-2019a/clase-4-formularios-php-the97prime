<?php
/*
- Escribir código PHP que inicialice un arreglo con los números del 1 al 365. Determine a que mes pertenece cada día del año (suponiendo un año no bisiesto) y muestre por pantalla la lista con el mes como encabezado seguido de la lista de los días que pertenecen a ese mes. 
- Utilizar HTML y CSS para dar estilo a la lista. Cada mes debe mostrarse de diferente color junto con la lista de días. Los meses deben aparecer con negrita. Pista: se puede utilizar elementos ul y li para mostrar la lista.
*/
function conocer_dia($nombredia) {
$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$fecha = $dias[date('N', strtotime($nombredia))];
echo $fecha;
}

conocer_dia('2019-10-25');

for($f=1;$f<=100;$f++)
{
  echo $f;
  echo "<br>";
}

?>