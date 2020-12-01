
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
			<input type="text" name="array" placeholder="Digite o Array que deseja ordenar: ">	
			<input type="text" name="tamanhoArray" placeholder="Digite o tamanho do array: " maxlength="2">
			<input type="submit" name="resposta" value="RESPOSTA">
		</form>
</div>

<?php
if(isset($_POST['resposta']))
{	
	
	$array = $_POST['array'];
	$tamanhoArray = $_POST['tamanhoArray'];
	$arrayPar = array();
	$arrayImpar = array();
	$it1 = 0;
	$it2 = 0;
	$it3 = 0;

	//salva os numeros pares no arrayPar e os ímpares no arrayImpar
	for($i = 0; $i < $tamanhoArray; $i++)
	{	
		if($array[$i]%2 == 0)
		{
			$arrayPar[$it1] = $array[$i];
			$it1++;
		}else{
			$arrayImpar[$it2] = $array[$i];
			$it2++;
		}
			
	}
	//Ordena o arrayPar
	for($k = 0; $k < sizeof($arrayPar); $k++)
	{
		for($j = 0; $j < sizeof($arrayPar); $j++)
		{
			if($arrayPar[$k] < $arrayPar[$j])
			{
				$aux = $arrayPar[$k];
				$arrayPar[$k] = $arrayPar[$j];
				$arrayPar[$j] = $aux;
			}
		}
	}
	//Ordena o arrayImpar
	for($k = 0; $k < sizeof($arrayImpar); $k++)
	{
		for($j = 0; $j < sizeof($arrayImpar); $j++)
		{
			if($arrayImpar[$k] < $arrayImpar[$j])
			{
				$aux = $arrayImpar[$k];
				$arrayImpar[$k] = $arrayImpar[$j];
				$arrayImpar[$j] = $aux;
			}
		}
	}
	//Junta o arrayImpar ao arrayPar
	$tamArrayFinal = sizeof($arrayPar) +1;
	for($tamArrayFinal; $tamArrayFinal < $tamanhoArray+1; $tamArrayFinal++)
	{
		$arrayPar[$tamArrayFinal] = $arrayImpar[$it3];
		$it3++;
	}

	?>
	<div id="msg-ok">
		<?php print_r($arrayPar); ?>
	</div>	
	<?php
	
}
?>
