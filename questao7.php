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
			<input type="submit" name="resposta" value="O caminho mais curto é">
		</form>
</div>


<?php

if(isset($_POST['resposta']))
{	
	$caminhos = array(
		array("a", "b", 7),
		array("a", "d", 5),
		array("b", "d", 9),
		array("b", "c", 8),
		array("b", "e", 7),
		array("d", "e", 15),
		array("d", "f", 6),
		array("c", "e", 5),
		array("f", "e", 8),
		array("f", "g", 11),
		array("e", "g", 9),

	);

	function encontraCaminho($grafos, $inicio, $fim)
	{
		$vertices = array();
		$vizinhos = array();
		$path = array();

		foreach ($grafos as $edge) 
		{
			//cria todos os caminhos possiveis
			array_push($vertices, $edge[0], $edge[1]);
			$vizinhos[$edge[0]][] = array('endEdge' => $edge[1], 'cost' => $edge[2]);

		}

		$vertices = array_unique($vertices);

		foreach ($vertices as $vertex) 
		{
			$dist[$vertex] = INF;
			$anterior[$vertex] = NULL;
		}

		//guarda os vertices
		$dist[$inicio] = 0;
		$g = $vertices;


		while(count($g) > 0)
		{
			$min = INF;
			foreach($g as $vertex)
			{
				if($dist[$vertex] < $min)
				{
					$min = $dist[$vertex];
					$u = $vertex;
				}
			}

			$g = array_diff($g, array($u));
			if ($dist[$u] == INF or $u == $fim) 
			{
				break;
			}
			//encontra o menor caminho pelo valor da aresta
			if(isset($vizinhos[$u]))
			{
				foreach ($vizinhos[$u] as $arr)
				{
					$alt = $dist[$u] + $arr['cost'];
					if($alt < $dist[$arr["endEdge"]])
					{	
						$dist[$arr["endEdge"]] = $alt;
						$anterior[$arr["endEdge"]] = $u;
						
					}
				}
			}
		}

		$u = $fim;
		while(isset($anterior[$u]))
		{
			array_unshift($path, $u);
			$u = $anterior[$u];
			
		}
		array_unshift($path, $u);
		return $path;
	}

	$path = encontraCaminho($caminhos, "a", "e");

	?>
	<div id="msg-ok">
		<?php echo "o caminho mais curto é [".implode(", ", $path)."]\n"; ?>
	</div>	
	<?php

}
?>