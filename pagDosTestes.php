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
<body id="finalpage">
<div id="form2">
	<h1>Questões</h1>
		<form method="POST">
			<a href="questao1.php" type="submit" name="roatateArray" id="info" value="rotateArray"><strong>1: Rotacionar Array</strong></a>
			<a href="questao2.php" type="submit" name="ordenaVetor" id="info" value="ordenaVetor"><strong>2: Ordena Vetor</strong></a>
			<a href="questao3.php" type="submit" name="calculaTempo" id="info" value="calculaTempo"><strong>3: Calcula o tempo</strong></a>
			<a href="questao4.php" type="submit" name="qtdTriaguluos" id="info" value="qtdTriaguluos"><strong>4: Quantidade de trinângulo</strong></a>
			<a href="questao5.php" type="submit" name="encontraSubtexto" id="info" value="encontraSubtexto"><strong>5: Encontra sub-texto</strong></a>		
			<a href="questao6.php" type="submit" name="recebePosicoes" id="info" value="calculaArea"><strong>6: Calcula a área da sobreposição dos quadrados</strong></a>
			<a href="questao7.php" type="submit" name="imprimeCaminhos" id="info" value="imprimeCaminhos"><strong>7: Imprime Caminhos</strong></a>
			<a href="questao9.php" type="submit" name="bancoDados" id="info" value="bancoDados"><strong>9: Banco de dados </strong></a>
		</form>
</div>
