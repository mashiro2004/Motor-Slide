<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
</head>
<body style="font-family:Verdana;">

<div style="background-color:#f1f1f1;padding:15px;text-align:center;">
  <h1>Spegni o Riavvia il Raspberry</h1>
  <h3>Clicca il tasto spegni o riavvia per procedere</h3>
  <h4>Se scegli spegni per riaccenderlo dovrai togliere e rimettere l'alimentazione</h4>
</div>

 <div class="main">
    <h2>Scegli come procere:</h2>
<form method="post">
    <label for="lblsc">Spegni:</label>
       <button name="spegni">Spegni</button>
    </p>
	<label for="lblsc">Riavvia:</label>
       <button name="riavvia">Riavvia</button>
    </p>
 


<?php

    if (isset($_POST['spegni']))
   
	{
	$output = shell_exec('sudo poweroff');
	}
	
 if (isset($_POST['riavvia']))
   
	{
	$output = shell_exec('sudo reboot');
	}
?>
</body>
</html>