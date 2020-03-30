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

// Numero di scatti da effettuare, li prenderà poi da una textbox


$total = $_POST['scatti'];
$secondi = $_POST['sec'];

// controllo che i campi non siano vuoti o che non ci siano lettere
if(empty($total) or empty($secondi) or !is_numeric($total) or !is_numeric($secondi))

{
	$status = "Errore inserimento parametri";
	
} else {
	
// Loop fino alla fine degli scatti da effettuare
for($i=1; $i<=$total; $i++){
	
  // Calcolo della percentuale
  $percent = intval($i/$total * 100)."%";

  // Javascript per fare l'update della barra di scorrimenti e segnala il numero di scatti
  echo '<script language="javascript">
  document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
  document.getElementById("information").innerHTML="Scatto: '.$i.' di '.$total.'";
  </script>';
  
  // Chiude il relé e lo riapre
  
  //$output = shell_exec('echo 1 > /sys/class/gpio/gpio15/value');
  //sleep(1);
  //$output = shell_exec('echo 0 > /sys/class/gpio/gpio15/value');

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
// Segnala che è pronto per lo stacking o il numero di scatti è terminato 

echo '<script language="javascript">document.getElementById("information").innerHTML="'.$status.'"</script>';
?>
</body>
</html>