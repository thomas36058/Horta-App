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

<title>Selecione uma Planta</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="splash" ></div>

<!-- TELA Caracteristicas plantas -->
<div class="line"></div>
<div id="cabeça1" class="tituloDadosPlanta" style="display: none"><h1>Alecrim</h1></div>
<div id="TelaCaracPlanta" style = "display: none; overflow: unset;">
	<div class="corpoCaracPlanta">
		<div class="caracteristicas" style="margin-top: 20px;">
			<h3 class="tituloBox1">Sobre</h3>
			<ul class="listaCaracteristicas">
				<li>Esse aplicativo nasceu a patir de um trabalho de Iniciação Científica com foco em sustentabilidade e tem o objetivo de auxiliar no controle e automação de uma horta inteligente desenvolvida pelos respectivos alunos:</li><br>
				<li style="text-align: center;">Lucas Bezerra</li>
				<li style="text-align: center;">Lucas Carnaval</li>
				<li style="text-align: center;">Lucas Santana</li>
				<li style="text-align: center;">Thomas Alexandre</li>
			</ul>
		</div>
	</div>

	<div class="footer" style="display:flex; align-items: center">
		<ul class="footerBotao" style="display:flex; list-style-type: none;">
			<li onclick="window.location.href = 'home.php';">Início</li>
			<li onclick="window.location.href = 'sobre.php';">Sobre</li>
			<li onclick="if (confirm('Tem certeza que deseja efetuar logout?')) {efetuarLogout();}">Sair</li>
		</ul>
	</div>
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
			$("#TelaCaracPlanta").show();			
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