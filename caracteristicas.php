<?php
session_start();
	include 'php/Conexao.php';
		

	if (!isset($_SESSION['AAS']['Login']))
	{
		header('Location: index.php');
	}

	$spacoAtual = ( isset($_GET['espaco']) ? $_GET['espaco'] : null);
	$userId = $_SESSION['AAS']['Login']['emailUsuario'];
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
		<div><h1 class="tituloDadosPlanta" style="padding: 10px;"><?php $row['NM_PLANTA'] ?></h1></div>

		<div class="caracteristicas">
			<h3 class="tituloBox1">Características:</h3>
			<ul class="listaCaracteristicas">
				<li>
					<?php
					$resultQuery = $conexaoBanco->prepare("select ds_dados from tb_caracteristica WHERE ds_categoria = 1 Order by id_caracteristica");		
					$resultQuery->execute(); 
						while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
							if($row_msg > 1){echo $row_msg['ds_dados']."    ";}
								else {echo $row_msg['ds_dados']."";}
						}
					?>
				</li>
			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Colheita:</h3>
			<ul class="listaCaracteristicas">
				<li>
					<?php
					$resultQuery = $conexaoBanco->prepare("select ds_dados from tb_caracteristica WHERE ds_categoria = 2 Order by id_caracteristica");		
					$resultQuery->execute(); 
						while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
							if($row_msg > 1){echo $row_msg['ds_dados']."    ";}
								else {echo $row_msg['ds_dados']."";}
						}
					?>
				</li>

			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Propriedades:</h3>
			<ul class="listaCaracteristicas">
				<li>
					<?php
					$resultQuery = $conexaoBanco->prepare("select ds_dados from tb_caracteristica WHERE ds_categoria = 3 Order by id_caracteristica");		
					$resultQuery->execute(); 
						while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
							if($row_msg > 1){echo $row_msg['ds_dados']."    ";}
								else {echo $row_msg['ds_dados']."";}
						}
					?>
				</li>
			</ul>
		</div>
		<div class="caracteristicas">
			<h3 class="tituloBox1">Usos Culinários:</h3>
			<ul class="listaCaracteristicas">
				<li>
					<?php
					$resultQuery = $conexaoBanco->prepare("select ds_dados from tb_caracteristica WHERE ds_categoria = 4 Order by id_caracteristica");		
					$resultQuery->execute(); 
						while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
							if($row_msg > 1){echo $row_msg['ds_dados']."    ";}
								else {echo $row_msg['ds_dados']."";}
						}
					?>
				</li>
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