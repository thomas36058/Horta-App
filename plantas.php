<?php
	session_start();
	include 'php/Conexao.php';
		

	if (!isset($_SESSION['AAS']['Login']))
	{
		header('Location: index.php');
	}

	$spacoAtual = ( isset($_GET['espaco']) ? $_GET['espaco'] : null);
	$userId = $_SESSION['AAS']['Login']['emailUsuario'];
	$planta = ( isset($_GET['planta']) ? $_GET['planta'] : null);

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
	
		<!-- TELA PLANTAS -->
		<div id="TelaPlantas" style = "display: none">

			<?php
				if(!$spacoAtual){
					echo 'Não encontramos o espaço!';
				}

				$resultQuery = $conexaoBanco
					->prepare("
						SELECT 
						* 
						FROM TB_PLANTA
					");

				$resultQuery->execute();

					echo '<div class="boxPlantas">';
					
					$count = 1;
					while ($row = $resultQuery->fetch(PDO::FETCH_ASSOC)) {

						$style = ( $count > 1 ? 'style="padding-bottom: 0.3em"' : '');
						?>	

							<div id="boxPlanta<?=$count?>">
								<div class = "btnCaracPlantas" onclick="window.location.href = 'caracteristicas.php';"></div>
								<div onclick="$.get('php/InserePlanta.php?espaco=<?=$spacoAtual?>&planta=<?=$row['NM_PLANTA']?>', function(data){alert(data);});"; class="tituloPlanta" <?=$style?>><?=$row['NM_PLANTA']?></div>
								<div class="tempoColheita" type="text"><br>Tempo de Colheita: <?=$row['TEMPO_COLHEITA']?></div>
							</div>

						<?php
						$count++;
					}
					echo '</div>';
			?>

			<div class="footer" style="display:flex; align-items: center">
				<ul class="footerBotao" style="display:flex; list-style-type: none;">
					<li onclick="window.location.href = 'home.php';">Voltar</li>
					<li onclick="apagarEspaco()">Apagar</li>
					<li onclick="window.location.href = 'sobre.php';">Sobre</li>
					<li onclick="if (confirm('Tem certeza que deseja efetuar logout?')) {efetuarLogout();}">Sair</li>
				</ul>
			</div>

		</div>	

	</body>
	
	<script src="js/jquery.js"></script>
	<script>
		function apagarEspaco() {
		    alert("<?php 
		    	$resultQuery = $conexaoBanco
					->prepare("delete FROM TB_ESPACO WHERE EMAIL_USU = '$userId' AND NM_ESPACO = '$spacoAtual'");
				
				$resultQuery -> execute();
				
				echo 'Espaço Apagado com sucesso!';
		    	?>");
		}
	</script>
	<script>
		window.onload = function()
		{
			var tempo = setTimeout
			(
				function()
				{
					$("#TelaPlantas").show();
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