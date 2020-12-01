
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
			<input type="text" name="array" id= "info2" placeholder="Digite o Array: ">	
			<input type="text" name="tamanhoArray" id= "info2" placeholder="Digite o tamanho do array: " maxlength="1">
			<input type="text" name="quantidadeRotacoes" id= "info2" placeholder="Digite a quantidade que deseja rotacionar: " maxlength="1">
			<input type="submit" name="resposta" id= "info2" value="RESPOSTA">
		</form>
</div>


<?php

if(isset($_POST['resposta']))
{	
	
	$array = $_POST['array'];
	$tamanhoArray = $_POST['tamanhoArray'];
	$quantidadeRotacoes = $_POST['quantidadeRotacoes'];
	
	$quantidadeRotacoes %= $tamanhoArray;

	$temp = array();
	//salva a quantidade de numeros da rotação em temp
	for($i = 0; $i < $tamanhoArray - $quantidadeRotacoes; $i++) //temp é o array que sobra
	{
		$temp[$i] = $array[$i+$quantidadeRotacoes];
	}
	
	//adiciona no final da rotação os outros numeros
	for($i = 0; $i < $quantidadeRotacoes; $i++)
	{
		$temp[$i + $tamanhoArray - $quantidadeRotacoes] = $array[$i];
		//$array[0][$i - $quantidadeRotacoes] = $array[0][$i];
	}

	?>
	<div id="msg-ok">
		<?php print_r($temp); ?>
	</div>	
	<?php
	//print_r($temp);

}

?>
