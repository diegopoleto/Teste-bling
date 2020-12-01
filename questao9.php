
<?php
	require_once 'CLASSES/usuarios.php';
	$aux = new UsuarioFilme;
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
			<input type="busca" name="busca" placeholder="Digite o nome do filme para buscar os atores: ">	
			<input type="password" name="senha" placeholder="Senha">
			<input type="submit" value="ENTRAR">
			<a href="cadastro.php">Não possui cadastro?<strong>Cadastre-se aqui!</strong></a></div>
		</form>
</div>

<?php
if(isset($_POST['email']))
{
	$busca =$_POST['busca'];

 	$aux->conectar("teste_bling", "localhost", "root", "");
 	if($aux->msgErro == "")
		{
			if($aux->busca($busca))
			{
				header("location: pagDosTestes.php");
			}	

			?>
			<div id="msg-ok">
				<?php echo "Erro".$aux->msgErro; ?>
			</div>	
			<?php
			
		}
}

?>