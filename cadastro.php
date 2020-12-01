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
<body>
<div id="body-form">
	<h1>Cadastro</h1>
		<form method="POST">
			<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
			<input type="text" name="celular" placeholder="Celular" maxlength="11">
			<input type="email" name="email" placeholder="Email" maxlength="40">
			<input type="password" name="senha" placeholder="Senha" maxlength="16">
			<input type="password" name="confirmaSenha" placeholder="Confirmar Senha" maxlength="16">
			<input type="submit" value="ENTRAR">
		</form>
</div>

<?php

if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$celular = addslashes($_POST['celular']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confirmaSenha']);

	if(!empty($nome) && !empty($celular) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	{
		$aux->conectar("teste_bling", "localhost", "root", "");
		if($aux->msgErro == "")
		{
			if($senha ==  $confirmarSenha)
			{
				if($aux->cadastrar($nome, $celular, $email, $senha))
				{
					?>
					<div id="msg-ok">

					</div>
					 "Cadastrado com sucesso!"
					<?php
				}else{
					?>
					<div class="msg-erro">
						echo "email já cadastrado";
					</div>	
					<?php
				}
			}else{
				?>
				<div class="msg-erro">
					echo "as senhas não correspondem";
				</div>	
				<?php
			}
	
		}else{
			?>
			<div>
				<?php echo "Erro: ".$aux->msgErro;?>
			</div>
			<?php
		}

	}else{
		?>
		<div class="msg-erro">
			echo "Um ou mais dados incorretos";
		</div>	
		<?php
	}
}


?>

</body>
</html>	