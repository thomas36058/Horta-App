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

		<title>Login</title>
	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="splash" ></div>

		<!-- TELA LOGIN -->
		<div id="Telalogin" style = "display: none" >
			<div id="btnEsqueciSenha" onclick="window.location.href = 'esqueciSenha.php';"></div>
			<div id="btnCadastrar" onclick="window.location.href = 'cadastro.php';"></div>
			<form id="Frm_Login" action="php/efetuarLogin.php" method="POST">
				<input type="text" name="emailUsuario" id="txtEmail" placeholder = "E-mail" required/>
				<input type="password" name="senhaUsuario" id="txtSenha" placeholder = "Senha" required/>
				<input type="submit" name="entrar" id="btnEntrar" value="">
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
					$("#Telalogin").show();
				},
				1000
			);
		}
		
		Frm_Login.onsubmit = function()
		{
			$.ajax
			(
				{
					url: Frm_Login.action,
					method: Frm_Login.method,
					data: $(Frm_Login).serialize(),
					success: function(result)
					{
						var indicador = result.split(';-;')[0];
						var mensagem = result.split(';-;')[1];
						
						if (indicador == 1)
						{
							window.location.href = 'home.php';
						}
						else
						{
							alert(' ---- ' + mensagem);
						}
					},
					error: function(exe)
					{
						alert('Ocorreu um erro durante o processo! Erro: ' + exe.status + ' - ' + exe.statusText);
					}
				}
			);
			
			return false;
		}
	</script>
</html>