
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
			<input type="text" name="data1" id="info2" placeholder="Digite a data inicial no formato dd/mm/aaaa" maxlength="10">	
			<input type="text" name="data2" id= "info2" placeholder="Digite a data inicial no formato dd/mm/aaaa" maxlength="10">	
			<input type="submit" name="resposta" id= "info2" value="RESPOSTA">
		</form>
</div>

<?php
if(isset($_POST['resposta']))
{	
	$dataI = $_POST['data1'];
	$dataF = $_POST['data2'];

	list($diaInicial, $mesInicial, $anoInicial) = explode("/", $dataI);
	list($diaFinal, $mesFinal, $anoFinal) = explode("/", $dataF);
	$meses = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	//print_r($meses);

	$totalSegundos1 = 0;

	//Converte a data inicial para Segundos
	$totalSegundos1 += ($anoInicial - 1) * 31526000;
	for($mes = 1; $mes < $mesInicial; $mes++)
	{
		$totalSegundos1 += $meses[$mes - 1] * 86400;
	}
	$totalSegundos1 += ($diaInicial - 1) * 86400;
	;

	//converte a data final para segundos
	$toralSegundos2 = 0;
	$totalSegundos2 += ($anoFinal - 1) * 31526000;
	for($mes = 1; $mes < $mesFinal; $mes++)
	{
		$totalSegundos2 += $meses[$mes - 1] * 86400;
	}
	$totalSegundos2 += ($diaFinal - 1) * 86400;
	
	//calcula a diferença em sem segundo e transforma pra dias
	if($totalSegundos1 > $totalSegundos2)
	{
		$diferenca = $totalSegundos1 - $totalSegundos2;
	}else{
		$diferenca = $totalSegundos2 - $totalSegundos1;
	}
	$diferenca /= 86400;


	?>
	<div id="msg-ok">
		<?php print_r($diferenca); ?>
	</div>	
	<?php
	

}
?>