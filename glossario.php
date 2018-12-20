<?php
	session_start();
	
	if (!isset($_SESSION['AAS']['Login']))
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

	<title>Glossário</title>

	<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
	
		<div id="splash" ></div>
	
		<!-- TELA GLOSSÁRIO -->
		<div id="TelaGlossario" style = "display: none">
				
			<input type="text" id="txtNomePlanta" placeholder = "Procurar Planta"/>
			<div id="btnInicioG" class = "btnBase1" onclick="window.location.href = 'home.php';"> Inicio </div>
			<div id="btnIpsumG" class = "btnBase3" onclick="window.location.href = 'sobre.php';"> Sobre </div>
			<div id="btnSairI" class = "btnBase4" onclick="if (confirm('Tem certeza que deseja efetuar logout?')) {efetuarLogout();}"> Sair </div>
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
					$("#TelaGlossario").show();
				},
				1000
			);
		}
		
		function efetuarLogout()
		{
			$.ajax
			(
				{
					url: 'php/efetuarLogout.php',
					method: 'GET',
					success: function(result)
					{
						var indicador = result.split(';-;')[0];
						var mensagem = result.split(';-;')[1];
						
						if (indicador == 1)
						{
							window.location.href = 'index.php';
						}
						else
						{
							alert(mensagem);
						}
					},
					error: function(exe)
					{
						alert('Ocorreu um erro durante o processo! Erro: ' + exe.status + ' - ' + exe.statusText);
					}
				}
			);
		}
	</script>
</html>