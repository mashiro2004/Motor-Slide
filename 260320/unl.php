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
    <label for="lblsc">Scatti da effettuare:</label>
    <input type="text" id="scatti" name="scatti"><br><br>
	<label for="lblsec">Secondi tra uno scatto e l'altro:</label>
    <input type="text" id="sec" name="sec"><br><br>
	<label for="lblsec">Gradi di rotazione tra uno scatto e l'altro:</label>
    <input type="text" id="rot" name="rot"><br><br>
	<label for="dir">Verso di rotazione:</label>
    <select id="dir" name="dir">
    <option value="Orario">Orario</option>
    <option value="Anti">Antiorario</option>
    </select>
		<p>
        <button name="start">Start</button>
    </p>
   <!-- Progress bar -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Stato del progresso -->
<div id="information" style="width"></div>
</form>
  </div>
</div>




<?php

$status = "Pronto per lo stacking";

    if (isset($_POST['start']))
   
	{
set_time_limit(300);

// Numero di scatti da effettuare presi dalla textbox


$total = $_POST['scatti'];
$secondi = $_POST['sec'];
$rot = $_POST['rot'];
// DEFINISCO QUANTI STEP DEVE FAREIL MIO MOTORE PER RAGGIUNGERE 360°
$step=512;
$gradi = number_format((($step * $rot) / 360)); 

// controllo che i campi non siano vuoti e che i campi siano numerici
if(empty($total) or empty($secondi) or empty($rot) or !is_numeric($total) or !is_numeric($secondi) or !is_numeric($rot))

{
	$status = "Errore inserimento parametri";
	
} else {
	
// Loop fino alla fine degli scatti da effettuare
for($i=1; $i<=$total; $i++){
	if($i==1)
{
	// Calcolo della percentuale
  $percent = intval($i/$total * 100)."%";

  // Javascript per fare l'update della barra di scorrimenti e segnala il numero di scatti
  echo '<script language="javascript">
  document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
  document.getElementById("information").innerHTML="Scatto: '.$i.' di '.$total.'";
  </script>';
  
  // Chiude il relé e lo riapre
  
  $output = shell_exec('echo 1 > /sys/class/gpio/gpio15/value');
  usleep(500);
  $output = shell_exec('echo 0 > /sys/class/gpio/gpio15/value');

  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();

  // Tempo che si deve aspettare tra uno scatto e l'altro
  sleep($secondi);
	
} else {
		
  // Calcolo della percentuale
  $percent = intval($i/$total * 100)."%";

  // Javascript per fare l'update della barra di scorrimenti e segnala il numero di scatti
  echo '<script language="javascript">
  document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
  document.getElementById("information").innerHTML="Scatto: '.$i.' di '.$total.'";
  </script>';
  
  // Senso Orario
  if ($_POST['dir'] == "Orario")
		{
  for($t=1; $t<=$gradi; $t++){
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
	}
		}
		else
			// Senso Antiorario
		{
			for($t=1; $t<=$gradi; $t++){
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
  
  // Chiude il relé e lo riapre
  
  usleep(500);
  $output = shell_exec('echo 1 > /sys/class/gpio/gpio15/value');
  usleep(500);
  $output = shell_exec('echo 0 > /sys/class/gpio/gpio15/value');

  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();

  // Tempo che si deve aspettare tra uno scatto e l'altro
  sleep($secondi);
  $status = "Stacking terminato";
}
}
}
	}
// Segnala che è pronto per lo stacking o il numero di scatti è terminato 

echo '<script language="javascript">document.getElementById("information").innerHTML="'.$status.'"</script>';
?>
</body>
</html>