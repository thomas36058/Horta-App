<?php
	session_start();
	include 'php/Conexao.php';
	
	if (!isset($_SESSION['AAS']['Login']))
	{
		header('Location: index.php');
	}

	$userId = $_SESSION['AAS']['Login']['emailUsuario'];
	$spacoAtual = ( isset($_GET['espaco']) ? $_GET['espaco'] : null);
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

		<link href="css/style.css" rel="stylesheet" type="text/css" />
		
		<title>Home</title>

	</head>

	<body>
	
		<div id="splash" ></div>

		<!-- TELA INICIAL -->
		<div id="telaInicial" style = "display: none" >

		<!-- ESPAÇO I -->
			<div id="Espaço I" name="nomePlanta" class="Espaços" onclick="window.location.href = 'plantas.php?espaco=1'">
				<h2 >Espaço I</h2>
				<p class="plantaPuxada"><?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select NM_PLANTA from TB_ESPACO WHERE NM_ESPACO = '1' AND EMAIL_USU = '$userId' Order by ID_ESPACO DESC LIMIT 2 ");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['NM_PLANTA']."    ";}
					else {echo $row_msg['NM_PLANTA']."";}
	} ?></p>
				<ul class="dadosExibidos">
					<li>Umidade do Solo: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare('select VL_UMIDADE FROM TB_UMIDADE ORDER BY ID_UMIDADE DESC LIMIT 1');
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_UMIDADE']."    ";}
					else {echo $row_msg['VL_UMIDADE']."";}
	} ?>%</li>
					<li>Temperatura: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare('select VL_TEMP FROM TB_TEMPERATURA ORDER BY ID_TEMP DESC LIMIT 1');
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_TEMP']."    ";}
					else {echo $row_msg['VL_TEMP']."";}
	} ?> °C</li>
				</ul>
		</div>

			<!-- ESPAÇO II -->
			<div id="Espaço II" class="Espaços" onclick="window.location.href = 'plantas.php?espaco=2';">
				<h2>Espaço II</h2>
				<p class="plantaPuxada"><?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select NM_PLANTA from TB_ESPACO WHERE NM_ESPACO = '2' AND EMAIL_USU = '$userId' Order by ID_ESPACO DESC LIMIT 2 ");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['NM_PLANTA']."    ";}
					else {echo $row_msg['NM_PLANTA']."";}
	} ?></p>
				<ul class="dadosExibidos">
					<li>Umidade do Solo: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select VL_UMIDADE FROM TB_UMIDADE WHERE DS_SENSOR = '2' ORDER BY ID_UMIDADE DESC LIMIT 1");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_UMIDADE']."    ";}
					else {echo $row_msg['VL_UMIDADE']."";}
	} ?>%</li>
					<li>Temperatura: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare('select VL_TEMP FROM TB_TEMPERATURA ORDER BY ID_TEMP DESC LIMIT 1');
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_TEMP']."    ";}
					else {echo $row_msg['VL_TEMP']."";}
	} ?> °C</li>
				</ul>
			</div>

			<!-- ESPAÇO III -->
			<div id="Espaço III" class="Espaços" onclick="window.location.href = 'plantas.php?espaco=3';">
				<h2>Espaço III</h2>
				<p class="plantaPuxada"><?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select NM_PLANTA from TB_ESPACO WHERE NM_ESPACO = '3' AND EMAIL_USU = '$userId' Order by ID_ESPACO DESC LIMIT 2");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['NM_PLANTA']."    ";}
					else {echo $row_msg['NM_PLANTA']."";}
	} ?></p>
				<ul class="dadosExibidos">
					<li>Umidade do Solo: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select VL_UMIDADE FROM TB_UMIDADE WHERE DS_SENSOR = '3' ORDER BY ID_UMIDADE DESC LIMIT 1");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_UMIDADE']."    ";}
					else {echo $row_msg['VL_UMIDADE']."";}
	} ?>%</li>
					<li>Temperatura: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare('select VL_TEMP FROM TB_TEMPERATURA ORDER BY ID_TEMP DESC LIMIT 1');
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_TEMP']."    ";}
					else {echo $row_msg['VL_TEMP']."";}
	} ?> °C</li>
				</ul>
			</div>

			<!-- ESPAÇO IV -->
			<div id="Espaço IV" class="Espaços" onclick="window.location.href = 'plantas.php?espaco=4';" style="margin-bottom: 60px;">
				<h2>Espaço IV</h2>
				<p class="plantaPuxada"><?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select NM_PLANTA from TB_ESPACO WHERE NM_ESPACO = '4' AND EMAIL_USU = '$userId' Order by ID_ESPACO DESC LIMIT 2 ");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['NM_PLANTA']."    ";}
					else {echo $row_msg['NM_PLANTA']."";}
	} ?></p>
				<ul class="dadosExibidos">
					<li>Umidade do Solo: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare("select VL_UMIDADE FROM TB_UMIDADE WHERE DS_SENSOR = '3' ORDER BY ID_UMIDADE DESC LIMIT 1");
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_UMIDADE']."    ";}
					else {echo $row_msg['VL_UMIDADE']."";}
	} ?>%</li>
					<li>Temperatura: <?php include 'php/Conexao.php';
		$resultQuery = $conexaoBanco->prepare('select VL_TEMP FROM TB_TEMPERATURA ORDER BY ID_TEMP DESC LIMIT 1');
				
	$resultQuery->execute(); while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
					if($row_msg > 1){echo $row_msg['VL_TEMP']."    ";}
					else {echo $row_msg['VL_TEMP']."";}
	} ?> °C</li>
				</ul>
			</div>
			
			<div class="footer" style="display:flex; align-items: center">
				<!-- <div id="btnInicioG" class = "btnBase1" onclick="window.location.href = 'home.php';"> Inicio </div>
				<div id="btnLoremG" class = "btnBase2"> Teste 1 </div>
				<div id="btnIpsumG" class = "btnBase3"> Sobre </div>
				<div id="btnSairI" class = "btnBase4" onclick="if (confirm('Tem certeza que deseja efetuar logout?')) {efetuarLogout();}"> Sair </div> -->
				<ul class="footerBotao" style="display:flex; list-style-type: none;">
					<li onclick="window.location.href = 'php/insert_umidade.php';">Início</li>
					<li onclick="window.location.href = 'sobre.php';">Sobre</li>
					<li onclick="if (confirm('Tem certeza que deseja efetuar logout?')) {efetuarLogout();}">Sair</li>
				</ul>
			</div>
	</body>

	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		
	</script>
	<script>
		window.onload = function()
		{
			var tempo = setTimeout
			(
				function()
				{
					$("#telaInicial").show();
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