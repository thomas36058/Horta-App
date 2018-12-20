<?php
	include 'Conexao.php';
	
	if (!isset($_POST['nomeUsuario']) || !isset($_POST['senhaUsuario']) || !isset($_POST['emailUsuario']))
	{
		echo '0;-;Dados não fornecidos! Forneça-os e tente novamente.';
		exit;
	}
	else
	{
		$nomeUsuario = $_POST['nomeUsuario'];
		$senhaUsuario = $_POST['senhaUsuario'];
		$emailUsuario = $_POST['emailUsuario'];
		
		$resultQuery = $conexaoBanco -> prepare('select TB_USUARIO.IDUSU_USU from TB_USUARIO where EMAIL_USU = :emailUsuario');
		
		$resultQuery -> bindParam(':emailUsuario', $emailUsuario);
		
		$resultQuery -> execute();
		
		if ($resultQuery -> rowCount() > 0)
		{
			echo '0;-;Já existe um usuário com esse e-mail! Altere e tente novamente.';
			exit;
		}
		else
		{
			try
			{
				$resultQuery = $conexaoBanco -> prepare('insert into TB_USUARIO(NM_USU, EMAIL_USU, SENHA_USU) values (:nomeUsuario, :emailUsuario, :senhaUsuario)');
			
				$resultQuery -> bindParam(':nomeUsuario', $nomeUsuario);
				$resultQuery -> bindParam(':emailUsuario', $emailUsuario);
				$resultQuery -> bindParam(':senhaUsuario', $senhaUsuario);
				
				$resultQuery -> execute();
				
				echo '1;-;Usuário cadastrado com sucesso!';
			}
			catch (PDOException $exe)
			{
				echo '0;-;Ocorreu um erro durante o processo! Erro: '.$exe -> getMessage();
			}
		}
	}
?>