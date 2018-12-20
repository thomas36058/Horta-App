<?php
	session_start();
	
	if (isset($_SESSION['AAS']['Login']))
	{
		header('Location: index.php');
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">

        <style>
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
        </style>

		<title>Cadastro</title>
		
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
	
		<div id="splash" ></div>
		
		<!-- TELA CADASTRO -->

		<div id="TelaCadastro" style = "display: none">

			<form id="Frm_Cadastro" action="php/cadastrarUsuario.php" method="POST">
				<input type="text" id="txtNomeCadastro" name="nomeUsuario" placeholder = " Nome" required/>
				<input type="text" id="txtEmailCadastro" name="emailUsuario" placeholder = " E-mail" required/>
				<input type="password" id="txtSenhaCadastro" name="senhaUsuario" placeholder = " Senha" required/>
				<input type="password" id="txtRepeteSenha" name="confirmaSenha" placeholder = "Confirmar senha" required/>
				<input type="submit" id="btnCadastraBanco" name="cadastrar" value="">
			</form>
			
			<div id="btnEntrarCadastro" onclick="window.location.href = 'login.php';"></div>

		</div>
	</body>
	
	<script src="js/jquery.js"></script>
	<script>
		window.onload = function()
		{
			var tempo = setTimeout
			(
				function()
				{
					$("#splash").hide();
					$("#TelaCadastro").show();
				},
				1000
			);
		}
		
		Frm_Cadastro.onsubmit = function()
		{
			if (txtSenhaCadastro.value.trim() != txtRepeteSenha.value.trim())
			{
				alert('As senhas não conferem! Preencha-as corretamente e tente novamente.');
				txtSenhaCadastro.focus();
			}
			else
			{
				$.ajax
				(
					{
						url: Frm_Cadastro.action,
						method: Frm_Cadastro.method,
						data: $(Frm_Cadastro).serialize(),
						success: function(result)
						{
							var indicador = result.split(';-;')[0];
							var mensagem = result.split(';-;')[1];
							
							alert(mensagem);

							if (indicador == 1)
							{
								window.location.href = 'index.php';
							}
						},
						error: function(exe)
						{
							alert('Ocorreu um erro durante o processo! Erro: ' + exe.status + ' - ' + exe.statusText);
						}
					}
				);
			}
			
			return false;
		}
	</script>
</html>