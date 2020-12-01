<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}
?>
	<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Loguin</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body id="final">
<div id="body-form">
		<form method="POST">
			<input type="text" name="string" placeholder="Digite array: " maxlength="6">
			<input type="submit" name="resposta" value="RESPOSTA">
		</form>
</div>


<?php

if(isset($_POST['resposta']))
{	
	$string = $_POST['string'];

	$tamString = strlen($string);

	for($i = 0; $i < $tamString - 2; $i++)
	{
		for($j = $i + 1; $j < $tamString -1; $j++)
		{
			for($k = $j + 1; $k < $tamString; $k++)
			{
				?>
				<div id="msg-ok">
					<?php echo "  ".$string[$i].$string[$j].$string[$k]."  "; ?>
				</div>	
				<?php	
			}
		}
	}
}

?>