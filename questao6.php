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
			<input type="text" name="priRetangulo" id= "info2" placeholder="Digite as posições do primeiro retângulo: ">
			<input type="text" name="seRetangulo" id= "info2" placeholder="Digite as posições do segundo retângulo: ">
			<input type="submit" name="resposta" id= "info2" value="RESPOSTA">
		</form>
</div>


<?php

if(isset($_POST['resposta']))
{
	$priRetangulo = $_POST['priRetangulo'];
	$seRetangulo = $_POST['seRetangulo'];

	list($x1, $y1, $x1, $y2, $x2, $y1, $x2, $y2) = explode(",", $priRetangulo);
	list($a1, $b1, $a1, $b2, $a2, $b1, $a2, $b2) = explode(",", $seRetangulo);

	//echo "  ".$x1." </p>\n";
	//echo "  ".$y1." </p>\n";
	//echo "  ".$x1."   ".$y1." </p>\n";
	//echo "  ".$a1."   ".$b1." </p>\n";

	function calcDiferença($a, $b)
	{
		if($a > $b)
		{
			return $a - $b;
		}else{
			return $b - $a;
		}
	}

	function colisao($x1, $x2, $a1, $y1, $y2, $b1, $b2)
	{
		if(($x1 + calcDiferença($x1, $x2) > $a1) 
			&& ($x1 <= $a1) 
			&& ($y1 + calcDiferença($y1, $y2) > $b1) 
			&& ($y1 <= $b1))
		{
			?>
			<div id="msg-ok">
			<?php echo "Colidiu! </p\n>"; 
				  echo "area: ".($x2 - $a1)*($b2 - $y1); ?>
			</div>	
			<?php	
		}else{
			?>
			<div class="msg-erro">
			<?php echo " Não Colidiu! </p\n>"; ?>
			</div>	
			<?php
		}
	}

	colisao($x1, $x2, $a1, $y1, $y2, $b1, $b2);

}
?>