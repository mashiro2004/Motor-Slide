<!DOCTYPE html>
<html>
<head>
<title>Motor Stacking</title>
</head>
<body>
<form method="post">
    <label for="lblsc">Scatti da effettuare:</label>
    <input type="text" id="scatti" name="scatti"><br><br>
	<label for="lblsec">Secondi tra uno scatto e l'altro:</label>
    <input type="text" id="sec" name="sec"><br><br>
	<label for="dir">Verso di rotazione:</label>
  <select id="dir" name="dir">
    <option value="Orario">Orario</option>
    <option value="Anti">Antiorario</option>
   </select>
	<p>
        <button name="start">Start</button>
    </p>
   
</form>

<!-- Progress bar -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Stato del progresso -->
<div id="information" style="width"></div>


<?php

$status = "Pronto per lo stacking";

    if (isset($_POST['start']))
   
	{
set_time_limit(300);

// Numero di scatti da effettuare presi dalla textbox


$total = $_POST['scatti'];
$secondi = $_POST['sec'];
$dir=$_POST['dir'];
// DEFINISCO QUANTI STEP DEVE FAREIL MIO MOTORE PER RAGGIUNGERE 360°
$step=250;
$gradi = number_format(($step / $total)); 

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
  
  for($t=1; $t<=$gradi; $t++){
		if ($_POST['dir'] == "Orario")
		{
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio24/value');
		usleep(5);
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio25/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio25/value');
		}
		else
		{
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio24/value');
		usleep(5);
		$output = shell_exec('echo 1 > /sys/class/gpio/gpio25/value');
		usleep(5);
		$output = shell_exec('echo 0 > /sys/class/gpio/gpio25/value');
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