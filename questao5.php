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
			<input type="text" name="texto" placeholder="Digite o Texto: ">
			<input type="text" name="subTexto" placeholder="Digite o sub-texto a ser encontrado: ">
			<input type="submit" name="resposta" value="RESPOSTA">
		</form>
</div>


<?php

if(isset($_POST['resposta']))
{	
	
	$texto = $_POST['texto'];
	$subTexto = $_POST['subTexto'];

	//print_r($texto);
	//print_r($subTexto);
	$tamTexto = strlen($texto);
	$tamSubtexto = strlen($subTexto);
	$ocorrs = 0;
	//print_r($tamTexto);
	

	function compara($texto, $subTexto, $tamSubtexto, $tamTexto) // compStrCChar (compara String com char[])
	{
  		$j = 0;
  		$aux = 0;
  
    //compara caractere por caractere
    for($i = 0; $i < $tamTexto-$tamSubtexto+1; $i++)
    {
    	if($subTexto[0] == $texto[$i])
    	{	
    		for($j = 0; $j < $tamSubtexto; $j++)
    		{
    			//echo ' if:'.$i."</p>\n";
    			//echo ' jf:'.$j."</p>\n";

    			if($subTexto[$j] == $texto[$i+$j]){
    				$aux++;
    			}
    		}

    		if($tamSubtexto == $aux) 
    		{
    			return True;
    		}
    		$aux = 0;
    	}
    }
    return False;
	}

	if(compara($texto, $subTexto, $tamSubtexto, $tamTexto)){
		?>
		<div id="msg-ok">
			<?php echo "subTexto encontrado!"; ?>
		</div>	
		<?php
	}else{
		?>
		<div class="msg-erro">
		<?php echo "subTexto não encontrado! :( " ?>
	</div>	
	<?php
	}

}
?>