<?php
	session_start();
	include 'Conexao.php';
	
	if (isset($_SESSION['AAS']['Login']))
	{
		echo '0;-;Usuário já efetuou login!';
		exit;
	}
	else if (!isset($_POST['emailUsuario']) || !isset($_POST['senhaUsuario']))
	{
		echo '0;-;Dados não fornecidos!';
		exit;
	}
	else
	{
		$emailUsuario = $_POST['emailUsuario'];
		$senhaUsuario = $_POST['senhaUsuario'];
		
		$resultQuery = $conexaoBanco -> prepare('select TB_USUARIO.IDUSU_USU from TB_USUARIO where TB_USUARIO.EMAIL_USU = :emailUsuario and TB_USUARIO.SENHA_USU = :senhaUsuario');
		
		$resultQuery -> bindParam(':emailUsuario', $emailUsuario);
		$resultQuery -> bindParam(':senhaUsuario', $senhaUsuario);
		
		$resultQuery -> execute();
		
		if ($resultQuery -> rowCount() > 0)
		{
			$_SESSION['AAS']['Login']['emailUsuario'] = $emailUsuario;
			$_SESSION['AAS']['Login']['senhaUsuario'] = $senhaUsuario;
			
			echo '1;-;Usuário efetou login com sucesso!';
			exit;
		}
		else
		{
			echo '0;-;E-mail e/ou senha estão incorretos! Verifique e tente novamente.';
			exit;
		}
	}
?>