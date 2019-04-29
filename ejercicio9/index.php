<?php
/*
- Escribir una página en PHP que presente un calendario del mes actual.
- Utlizar HTML y CSS para darle color y estilo al calendario. El día actual debe ser resaltado en negrita y con la celda de diferente color.
- Pista: utilizar la función date(). Entre otros parámetros la función date puede recibir: ‘Y’, ‘m’, ‘d’, ‘N’. Investigar sobre la función date si es necesario utilizar otros parámetros (http://php.net/manual/es/function.date.php).
- Pista: Utilizar tablas HTML para presentar el calendario.
*/
function CalendarioPHP($year, $month, $day_heading_length = 3){
// Parametros de aspecto del calendario
$nombreFichero = basename($_SERVER['PHP_SELF']);
$ColorFondoCelda = '#CCCCCC';
$ColorFondoTabla = '#666666';
$ColorFondoCeldasDiaSemana = '#fff4bf';
$ColorFondoCeldasFestivo = '#ee0000';
$ColorFondoCeldaDiaActual = '#00ff00';
$ColorDiaLaboral = '#444444';
$ColorDiaFestivo = '#ffffff';
$ColorDiaActual = '#0000ff';
$TamanioFuente = '9';
$TipoFuente = 'Arial, Helvetica, sans-serif';
$AnchoCalendario = '2%';
$AltoCalendario = '2%';
$AnchoCeldas = '2%';
$AltoCeldas = '2%';
$AlineacionHorizontalTexto = 'center';
$AlineacionVerticalTexto = 'center';

// ----------- INICIO Dias Festivos ----------
$DiasFestivos[0] = '1/1'; // 1 de enero
$DiasFestivos[1] = '14/2'; // 14 de febrero
$DiasFestivos[2] = '1/5'; // 1 de mayo
$DiasFestivos[3] = '24/5'; // 24 de mayo
$DiasFestivos[4] = '10/8'; // 10 de agosto
$DiasFestivos[5] = '9/10'; // 9 de octubre
$DiasFestivos[6] = '2/11'; // 2 de noviembre
$DiasFestivos[7] = '3/11'; // 3 de noviembre
$DiasFestivos[8] = '25/12'; // 25 de diciembre
// festivos Regionales
$DiasFestivos[9] = '24/2'; // 24 de febrero(Cumpleaños Papá)
$DiasFestivos[10] = '10/12'; // 12 de diciembre(Cumpleaños Mamá)
$DiasFestivos[11] = '25/10'; // Mi cumpleaños
// Semana Santa
$DiasFestivos[12] = '18/4'; // Jueves Santo
$DiasFestivos[13] = '19/4'; // Viernes Santo
// ----------- FIN Dias Festivos ----------

//Calculo la fecha actual
$dia_actual=date("j",time());
$mes_actual=date("n",time());
$anio_actual=date("Y",time());

$first_of_month = mktime (0,0,0, $month, 1, $year);
#remember that mktime will automatically correct if invalid dates are entered
# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
# this provides a built in "rounding" feature to generate_calendar()

static $day_headings = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
$maxdays = date('t', $first_of_month); #number of days in the month
$date_info = getdate($first_of_month); #get info about the first day of the month
$month = $date_info['mon'];
$year = $date_info['year'];

//Traduzco los meses de ingles a Español
switch ($date_info['mon']) {
case "January" : $date_info[$month]="Enero";break;
case "February" : $date_info[$month]="Febrero";break;
case "March" : $date_info[$month]="Marzo";break;
case "April" : $date_info[$month]="Abril";break;
case "May" : $date_info[$month]="Mayo";break;
case "June" : $date_info[$month]="Junio";break;
case "July" : $date_info[$month]="Julio";break;
case "August" : $date_info[$month]="Agosto";break;
case "September": $date_info[$month]="Septiembre";break;
case "October" : $date_info[$month]="Octubre";break;
case "November" : $date_info[$month]="Noviembre";break;
case "December" : $date_info[$month]="Diciembre";break;
};

//Comienzo la tabla que contiene el calendario
$calendar = ("<table ").
("border='0' ").
("height='".$AltoCalendario."' ").
("width='".$AnchoCalendario."' ").
("cellspacing='1' cellpadding='2' ").
("bgcolor='".$ColorFondoTabla."'>\n");

//Cabecera de la tabla calendario
//Use the <caption> tag or just a normal table heading. Take your pick.
//$calendar .= "<caption class=\\"month\\">$date_info[month], $year</caption>\n";
$calendar .= ("<tr>\n").
("<th height='".$AltoCeldas."' colspan='7'>").
("<font color='".$ColorDiaFestivo."' size=".$TamanioFuente." face='".$TipoFuente."'>").
("$date_info[month], $year").
("</font>").
("</th>\n</tr>\n");

// Imprime los dias de la semana "Lun", "Mar", etc.
// Si day_heading_length es 4, aparecerá el nombre entero del dia
// si no, solo imprime los n primeros caracteres
if($day_heading_length > 0 and $day_heading_length <= 4){
$calendar .= "<tr>\n";
foreach($day_headings as $day_heading){
$calendar .= ("<th height='".$AltoCeldas."' abbr='".$day_heading."' class='dayofweek' bgcolor='".$ColorFondoCeldasDiaSemana."'>").
("<font color='".$ColorDiaLaboral."' size='".$TamanioFuente."' face='".$TipoFuente."'>").
($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading).
("</font>").
("</th>\n");
}
$calendar .= "</tr>\n";
}
$calendar .= "<tr>\n";

//$weekday = $date_info['wday']; //Para que sea el Domingo el primer dia de la semana
$weekday = $date_info['wday']-1; #weekday (zero based) of the first day of the month
if ($weekday==-1) $weekday=6; //Por si el Domingo es el dia 1 del mes
$day = 1; #starting day of the month

// Cuidadin con los primeros dias "vacios" del mes
if($weekday > 0){
$calendar .= ("<td bgcolor='".$ColorFondoTabla).
("' colspan='".$weekday."'></td>\n");
}

//Imprimimos los dias del mes
while ($day <= $maxdays){
if($weekday == 7){ //Empieza una nueva semana
$calendar .= "</tr>\n<tr>\n";
$weekday = 0;
}

//Miro si el dia que voy a pintar es festivo
$esFestivo = 0;
$tmp_date=$day."/".$month;
for ($i=0;$i<14;$i++) {
if ($tmp_date==$DiasFestivos[$i]) {$esFestivo=1;break;}
}

$calendar .= ("<td width='".$AnchoCeldas).
("' height='".$AltoCeldas).
("' align='".$AlineacionHorizontalTexto).
("' valign='".$AlineacionVerticalTexto).
("' ");

// Coloreo el fondo dependiendo del dia en el que nos encontremos
$calendar .= "bgcolor='";
if (($day==$dia_actual) and
($month==$mes_actual) and
($year==$anio_actual)) { //Si el dia es el de hoy
$calendar .= $ColorFondoCeldaDiaActual;
} else { // Si el dia no es el de hoy
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6
$calendar .= $ColorFondoCeldasFestivo;
} else {
$calendar .= $ColorFondoCelda;
};
};
// Aqui es donde le pongo lo que tiene que hacer en caso de exista enlace
$link = (basename($_SERVER["PHP_SELF"]))."?fecha=".$month."/".$day."/".$year;
$calendar .= "'><a href='".$link."'><font color='";

if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) { //Si el dia es el de hoy
$calendar .= $ColorDiaActual;
} else { // Si el dia no es el de hoy
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6
$calendar .= $ColorDiaFestivo;
} else {$calendar .= $ColorDiaLaboral;};
};
$calendar .= ("' ").
("size='".$TamanioFuente."' ").
("face='".$TipoFuente."'><strong>".$day).
("</strong></font></a>").
("</td>\n");
$day++;
$weekday++;
}

//Cuidadin con los ultimos dias vacios del mes
if($weekday != 7){
$calendar .= '<td bgcolor="'.$ColorFondoTabla.'" colspan="' . (7 - $weekday) . '"></td>';
}

//Chinnnnn pon, devolvemos toda la cadena calendario
return $calendar . "</tr>\n</table>\n";
} // Fin de la funcion CalendarioPHP(año, mes, caracteres del dia)

for($i=1;$i<=12;$i++){
    echo CalendarioPHP(2019,$i,1);
    echo '<br>';
  }
?> 
?>