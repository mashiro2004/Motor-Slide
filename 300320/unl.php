<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<style>
.button {
  
  width: 80px;
  
}
.button2 {
  
  width: 80px;
  
}
</style>
</head>
<body style="font-family:Verdana;">

<div style="background-color:#f1f1f1;padding:15px;text-align:center;">
  <h1>Slitta Macro Motorizzata</h1>
  <h2>Inserisci tutti i parametri e premi Start</h2>
</div>

 <div class="main">
	<h2>Posizionamento Motore:</h2>
    <form method="post">
	<button class="button" name="avanti">Orario</button> <button class="button" name="indietro">Antiorario</button> <button class="button" name="stop">Stop</button>
	</form>
	<h2>Posizionamento Micrometrica:</h2>
    <form method="post">
	<button class="button" name="micavanti">Orario</button> <button class="button" name="micindietro">Antiorario</button>
	</form>
	<h2>Parametri per lo Stacking:</h2>
	<form method="post">
    <label for="lblsc">Scatti da effettuare:</label>
    <input type="text" id="scatti" name="scatti"><br><br>
	<label for="lblsec">Secondi tra uno scatto e l'altro:</label>
    <input type="text" id="sec" name="sec"><br><br>
	<label for="lblsec">Numero di step tra uno scatto e l'altro:</label>
    <input type="text" id="rot" name="rot"><br><br>
	<label for="lblrot">Senso di rotazione dello Stacking:</label>
	<button class="button2" name="stackavanti">Orario</button> <button class="button2" name="stackindietro">Antiorario</button> <button class="button2" name="stackstop">Stop</button>
	

    
   <!-- Progress bar -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Stato del progresso -->
<div id="information" style="width"></div>
<a href="welcome.html"></br></br>Torna alla home </br></br></a>
</form>
  </div>
</div>

<?php
$status = "Pronto per lo stacking";
//Alla pressione di Orario
if (isset($_POST['avanti']))
{
set_time_limit(300);
	// Loop fino allo stop
for($i=1; $i<=65500; $i++){
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
	 
  
  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser e posso premere stop
  flush();
  
  if (isset($_POST['stop']))
	  {
		  break;
	  }
}
}

//Alla pressione di Antiorario

if (isset($_POST['indietro']))
{
set_time_limit(300);
	// Loop fino allo stop
for($i=1; $i<=65500; $i++){
	  if (isset($_POST['stop']))
	  {
		  break;
	  }
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
	 
  
  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser e posso premere stop
  flush();
  
  if (isset($_POST['stop']))
	  {
		  break;
	  }
}
}

// Alla pressione mi micrometrica orario
if (isset($_POST['micavanti']))
{
set_time_limit(300);
	// Loop fino allo stop

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
	 
  
  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser e posso premere stop
  flush();
}

// Alla pressione mi micrometrica antiorario

if (isset($_POST['micindietro']))
{
set_time_limit(300);
	// Loop fino allo stop

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
	 
  
  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser e posso premere stop
  flush();
}


//Alla pressione del tasto Stack Orario


    if (isset($_POST['stackavanti']))
   
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
 
  for($t=1; $t<=$rot; $t++){
	   if (isset($_POST['stop']))
	  {
		  break;
	  }
	  else
	  {
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
		echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();
	}
  }
	
		 if (isset($_POST['stop']))
	  {
		  break;
	  }
else
{
  
  // Chiude il relé e lo riapre
  sleep($secondi);
  usleep(500);
  $output = shell_exec('echo 1 > /sys/class/gpio/gpio15/value');
  usleep(500);
  $output = shell_exec('echo 0 > /sys/class/gpio/gpio15/value');

  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();
   if (isset($_POST['stop']))
	  {
		  break;
	  }

  // Tempo che si deve aspettare tra uno scatto e l'altro

  $status = "Stacking terminato";
  echo '<script language="javascript">document.getElementById("information").innerHTML="'.$status.'"</script>';
}
}
}
	}
	}
// Segnala che è pronto per lo stacking o il numero di scatti è terminato 
//Alla pressione del tasto Stack AntiOrario


    if (isset($_POST['stackindietro']))
   
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
  
  // Senso Antiorario
 
  for($t=1; $t<=$rot; $t++){
	   if (isset($_POST['stop']))
	  {
		  break;
	  }
	  else
	  {
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
		echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();
	}
  }
		 if (isset($_POST['stop']))
	  {
		  break;
	  }
	else
	{
  
  // Chiude il relé e lo riapre
  sleep($secondi);
  usleep(500);
  $output = shell_exec('echo 1 > /sys/class/gpio/gpio15/value');
  usleep(500);
  $output = shell_exec('echo 0 > /sys/class/gpio/gpio15/value');

  // Buffer e flush data
  echo str_repeat(' ',1024*64);

  // Manda l'output al browser
  flush();
  if (isset($_POST['stop']))
	  {
		  break;
	  }
  
  // Tempo che si deve aspettare tra uno scatto e l'altro

  $status = "Stacking terminato";
  echo '<script language="javascript">document.getElementById("information").innerHTML="'.$status.'"</script>';
}
}
}
	}
	}
echo '<script language="javascript">document.getElementById("information").innerHTML="'.$status.'"</script>';
?>
</body>
</html>