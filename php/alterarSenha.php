<?php
	include 'Conexao.php';
	
	if (!isset($_POST['emailUsuario']) || !isset($_POST['senhaUsuario']))
	{
		echo '0;-;Dados não fornecidos! Forneça-os e tente novamente.';
		exit;
	}
	else
	{
		$emailUsuario = $_POST['emailUsuario'];
		$senhaUsuario = $_POST['senhaUsuario'];
		
		$resultQuery = $conexaoBanco -> prepare('select TB_USUARIO.IDUSU_USU from TB_USUARIO where TB_USUARIO.EMAIL_USU = :emailUsuario');
		
		$resultQuery -> bindParam(':emailUsuario', $emailUsuario);
		
		$resultQuery -> execute();
		
		if ($resultQuery -> rowCount() > 0)
		{
			try
			{
				$resultQuery = $conexaoBanco -> prepare('update TB_USUARIO set SENHA_USU = :senhaUsuario where EMAIL_USU = :emailUsuario');
				
				$resultQuery -> bindParam(':emailUsuario', $emailUsuario);
				$resultQuery -> bindParam(':senhaUsuario', $senhaUsuario);
				
				$resultQuery -> execute();
				
				echo '1;-;Senha do usuário alterada com sucesso!';
			}
			catch (PDOException $exe)
			{
				echo '0;-;Ocorreu um erro durante o processo! Erro: '.$exe -> getMessage();
			}
		}
		else
		{
			echo '0;-;Não existe um usuário cadastrado com esse e-mail! Verifique e tente novamente.';
			exit;
		}
	}
?>