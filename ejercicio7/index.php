<?php 
/*
Escribir código PHP que inicialice un arreglo con los números del 1 al 365. Determine a que mes pertenece el día del año. Y luego calcule cuántos días faltan para que se acabe el año con cada día del año, y muestre el mensaje “Falta poco para el año nuevo” solo si faltan menos de 5 días.
*/
function Agrega($fecha){
    $diasSemana = array('Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo', 'Lunes'); 
    $contDias = 0; 
    $mesesAnio = array('Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    for ($i = 1 ; $i <=365; $i++ ){
        if($contDias > 6){
            $contDias = 0; 
        }
        if($i <= 31){
            $fecha [$i] = array( $mesesAnio[0] => $diasSemana[$contDias]); 
        }else if($i <= 59){
            $fecha [$i] = array( $mesesAnio[1] => $diasSemana[$contDias]); 
        }else if($i <= 90){
            $fecha [$i] = array( $mesesAnio[2] => $diasSemana[$contDias]); 
        }else if($i <= 120){
            $fecha [$i] = array( $mesesAnio[3] => $diasSemana[$contDias]); 
        }else if($i <= 151){
            $fecha [$i] = array( $mesesAnio[4] => $diasSemana[$contDias]); 
        }else if($i <= 181){
            $fecha [$i] = array( $mesesAnio[5] => $diasSemana[$contDias]); 
        }else if($i <= 212){
            $fecha [$i] = array( $mesesAnio[6] => $diasSemana[$contDias]); 
        }else if($i <= 243){
            $fecha [$i] = array( $mesesAnio[7] => $diasSemana[$contDias]); 
        }else if($i <= 273){
            $fecha [$i] = array( $mesesAnio[8] => $diasSemana[$contDias]);
        }else if($i <= 304){
            $fecha [$i] = array( $mesesAnio[9] => $diasSemana[$contDias]); 
        }else if($i <= 334){
            $fecha [$i] = array( $mesesAnio[10] => $diasSemana[$contDias]); 
        }else if($i <= 365){
            $fecha [$i] = array( $mesesAnio[11] => $diasSemana[$contDias]); 
        }  
        $contDias++; 
    }
return $fecha; 
}
function revisaDia ($busqueda){
    
    $diadelAA = 0; 
    if($busqueda >= 1 and $busqueda <= 31){
        $diadelAA = $busqueda; 
    }else if($busqueda >=32 and $busqueda <= 59){
        $diadelAA = -1 * (59 - $busqueda - 28); 
    }else if($busqueda >=60 and $busqueda <= 90){
        $diadelAA = -1 * (90 - $busqueda - 31);
    }else if($busqueda >=91 and $busqueda <= 120){
        $diadelAA = -1 * (120 - $busqueda - 30);
    }else if($busqueda >=121 and $busqueda <= 151){
        $diadelAA = -1 * (151 - $busqueda - 31);
    }else if($busqueda >=152 and $busqueda <= 181){
        $diadelAA = -1 * (181 - $busqueda - 30);
    }else if($busqueda >=182 and $busqueda <= 212){
        $diadelAA = -1 * (212 - $busqueda - 31);
    }else if($busqueda >=213 and $busqueda <= 243){
        $diadelAA = -1 * (243 - $busqueda - 31);
    }else if($busqueda >=244 and $busqueda <= 273){
        $diadelAA = -1 * (273 - $busqueda - 30);
    }else if($busqueda >=274 and $busqueda <= 304){
        $diadelAA = -1 * (304 - $busqueda - 31);
    }else if($busqueda >=305 and $busqueda <= 334){
        $diadelAA = -1 * (334 - $busqueda - 30);
    }else if($busqueda >=335 and $busqueda <= 365){
        $diadelAA = -1 *(365 - $busqueda -31); 
    }
    return $diadelAA;
}
function resultados($busqueda){
    $arreglo = array(); 
    $aux = 0; 
    $aux = 365 - $busqueda; 
if($busqueda >= 1 and $busqueda <= 365){
foreach(Agrega($arreglo) as $dia => $arreglo){
    if($dia == $busqueda){
        echo 'El dia numero ' . $dia . ' del año 2019'; 
    foreach($arreglo as $mes => $diaAA){
        echo ', corresponde a la fecha: ' . $diaAA . ' / ' . revisaDia($busqueda) . ' / ' . $mes; 
        echo '<br>'; 
        echo  ' Faltan: ' . $aux . ' dias para que termine el año.';
        if($aux >= 1 and $aux <= 5){
            echo '<br>';
            echo ' Falta poco para el año nuevo';
        }else{
            echo ''; 
        }
    }
    echo '<br>';
    }
    
}
}else{
    echo 'Ingrese los valores en los rangos solicitados ....'; 
}
} 
//resultados(363); 
//----------------------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 7</title>
  </head>
  <body>

    <form method = "POST">
        <div>
        <h2> INGRESE UN NUMERO ENTRE 1 y 365 (Dias del año)</h2>
        </div>
        <div>
        ¿Que día debo buscar? <input type= "number" name = "numeroBusqueda">
        </div>     
        <div>
        <input type="submit" name = "BtnSend" value= "Buscar">
        </div>

        
            <?php
            echo '';
            $ingresa = $_POST['numeroBusqueda'];  
            if(empty($ingresa)){
                echo 'Ingrese los datos:'; 
                 
            }else{
                echo '<br>';
                echo '<br>';
                resultados($ingresa);
            }
            ?>
        

    </form>
  </body>
</html>
?>