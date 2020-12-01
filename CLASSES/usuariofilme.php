<?php

Class UsuarioFilme
{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		global $msgErro;
		try 
		{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);	
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function busca($titulo)
	{
		global $pdo;

		$sql = $pdo->prepare("SELECT nome.ator FROM ator WHERE 
			INNER JOIN atuou ON filme.id = atuou.id_filme 
			INNER JOIN ator ON atuou.id_ator = ator.id
			WHERE filme.titulo LIKE :t");
		
		$sql->bindValue(":t", $titulo);
		$sql->execute();
	}


}

?>