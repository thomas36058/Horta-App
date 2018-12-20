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
<div id="TelaCaracPlanta" style = "display: none">
	<div class="corpoCaracPlanta">
		<div><h1 class="tituloDadosPlanta" style="padding: 10px">Cebolinha</h1></div>

		<div class="caracteristicas">
			<h3 class="tituloBox1">Características:</h3>
			<ul class="listaCaracteristicas">
				<li>- Cresce melhor em temperaturas indo de 13ºC a 24ºC;</li>
				<li>- Necessita de luz direta ao menos por algumas horas diariamente;</li>
				<li>- Preferencialmente em solo bem drenado, fértil e rico em matéria orgânica;</li>
				<li>- Necessário irrigação do solo com frequência.</li>
			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Colheita:</h3>
			<ul class="listaCaracteristicas">
				<li>- Pode começar entre 75 e 120 dias após o plantio;</li>
				<li>- As folhas devem ser colhidas por inteiro, junto à base, e não pela metade.</li>
			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Propriedades:</h3>
			<ul class="listaCaracteristicas">
				<li>- Rica em ferro e vitaminas diversas;</li>
				<li>- Estimulante do apetite, além de auxiliar a digestão;</li>
				<li>- Ajuda no combate à gripe e nas doenças das vias respiratórias.</li>
			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Usos Culinários:</h3>
			<ul class="listaCaracteristicas">
				<li>- Muito utilizada nas cozinhas chinesas e ocidental (tanto crua quanto cozida);</li>
				<li>- Indispensável no preparo de saladas, sanduíches, sopas e omeletes;</li>
				<li>- Sabor especial a manteigas, queijos cremosos e patês.</li>
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
			$("#cabeça2").show();
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