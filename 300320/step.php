<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
</head>
<body style="font-family:Verdana;">

<div style="background-color:#f1f1f1;padding:15px;text-align:center;">
  <h1>Slitta Macro Motorizzata</h1>
  <h3>Inserisci tutti i parametri e premi Start</h3>
</div>

 <div class="main">
    <h2>Parametri:</h2>
<form method="post">
    <select id="dir" name="dir">
    <option value="Orario">Orario</option>
    <option value="Anti">Antiorario</option>
    </select>
		<p>
        <button name="start">Start</button>
		<button name="stop">Start</button>
    </p>
   <!-- Progress bar -->


<a href="welcome.html"></br></br>Torna alla home </br></br></a>
</form>
  </div>
</div>




<?php

    if (isset($_POST['start']))
   
	{
set_time_limit(300);
	$total=100;
	//$rot=1;
// Loop fino allo stop
for($i=1; $i<=$total; $i++){
 
  // Senso Orario
  
  //for($t=1; $t<=$rot; $t++){
	  if (isset($_POST['stop']))
	  {
		  break;
	  }
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio23/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio23/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio24/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio24/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio17/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio17/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio27/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio27/value');
	//}
		
		
		/* else
			// Senso Antiorario
		{
			 if (isset($_POST['stop']))
	  {
		  break;
	  }
			 for($t=1; $t<=$rot; $t++){
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio27/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio27/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio17/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio17/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio24/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio24/value');
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio23/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio23/value');
		}
		}
  */
 
   
  
  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();
  
  if (isset($_POST['stop']))
	  {
		  break;
	  }
}

	}

?>
</body>
</html>