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

		<title>Esqueci a senha</title>
	

		<link href="css/style.css" rel="stylesheet" type="text/css" />

	</head>

	<body>
	
		<div id="splash" ></div>

		<div id = "TelaEsqueciSenha" style = "display: none">
			<form id="Frm_EsqueciSenha" action="php/alterarSenha.php" method="POST">
				<input type="text" id="txtEmailSenha" name="emailUsuario" placeholder = "E-mail" required/>
				<input type="password" id="txtSenhaSenha" name="senhaUsuario" placeholder = "Nova senha" required/>
				<input type="password" id="txtRepeteSenhaSenha" name="confirmaSenha" placeholder = "Confirmar Senha" required/>
				<input type="submit" id="btnMudarSenha" name="esqueciSenha" value="">
			</form>
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
					$("#TelaEsqueciSenha").show();
				},
				1000
			);
		}
		
		Frm_EsqueciSenha.onsubmit = function()
		{
			if (txtSenhaSenha.value.trim() != txtRepeteSenhaSenha.value.trim())
			{
				alert('As senhas não conferem! Preencha-as corretamente e tente novamente.');
				txtSenhaSenha.focus();
			}
			else
			{
				$.ajax
				(
					{
						url: Frm_EsqueciSenha.action,
						method: Frm_EsqueciSenha.method,
						data: $(Frm_EsqueciSenha).serialize(),
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