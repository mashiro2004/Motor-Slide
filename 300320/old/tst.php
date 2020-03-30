<!DOCTYPE html>
<html>
<body>
<form method="post">
  <label for="cars">Verso di rotazione:</label>
  <select id="dir" name="dir">
    <option value="Orario">Orario</option>
    <option value="Anti">Antiorario</option>
   </select>
<p>
        <button name="start">Start</button>
    </p>  

</form>
<?php

if (isset($_POST['start']))
{
$varGender = $_POST['dir'];

	if ($_POST['dir'] == "Orario")
		{
			echo $varGender;
		}
else
{
echo 'AntiOrario'; 
} 
}
?>
</body>
</html>
