<html> 
  <head> 
  <title>	BIENVENIDO</title> 
  </head> 
  <body>
  <?php 

 
  function verificarClaves($cla1,$cla2)
  {
    if ($cla1!=$cla2)
    
	  echo "Claves no coinciden ";
  }
  
  verificarClaves($_REQUEST['clave1'],$_REQUEST['clave2']);

  ?>
</body> 
</html>