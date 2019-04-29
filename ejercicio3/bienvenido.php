<html>
<head>
<title>Bienvenido al sistema de acceso</title>
</head>
<body>

<?php

  function verificarClaves($usu,$pass)
  {
    if ($usu!=$pass)
	  echo "Las claves no coinciden";
  }
  
  verificarClaves($_REQUEST['usuario'],$_REQUEST['clave']);

$pass = array(

	'ruth' => '2092018',
	'jose' => '12345',
	'miguel' => 'Hp_saq',
	'michelle' => 'samsung',
	'mateo' => 'admin'

);

echo $pass[];


?>
<h2>Se hyan verificado las claves :V</h2>
</body>
</html>