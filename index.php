
<?php
	require_once 'CLASSES/usuarios.php';
	$aux = new Usuario;
?>


<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Loguin</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body id="final">
<div id="body-form">
	<h1>Entrar</h1>
		<form method="POST">
			<input type="email" name="email" placeholder="Email">	
			<input type="password" name="senha" placeholder="Senha">
			<input type="submit" value="ENTRAR">
			<a href="cadastro.php">Não possui cadastro?<strong>Cadastre-se aqui!</strong></a></div>
		</form>
</div>

<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	if(!empty($email) && !empty($senha))
	{
		$aux->conectar("teste_bling", "localhost", "root", "");
		if($aux->msgErro == "")
		{
			if($aux->logar($email, $senha))
			{
				header("location: pagDosTestes.php");
			}else{
				?>
				<div class="msg-erro">
					<?php echo "Email ou senha incorretos"; ?>
				</div>	
				<?php
			}
		}else{
			?>
			<div class="msg-erro">
				<?php echo "Erro".$aux->msgErro; ?>
			</div>	
			<?php
			
		}
	}else{
		?>
		<div class="msg-erro">
			<?php echo "Preencha todos os campos"; ?>
		</div>	
		<?php
		
	}
}
?>
</body>
</html>	