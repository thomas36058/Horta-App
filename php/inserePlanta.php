<?php
	session_start();
	include 'Conexao.php';
		
			$spacoAtual = ( isset($_GET['espaco']) ? $_GET['espaco'] : null);
			$planta = ( isset($_GET['planta']) ? $_GET['planta'] : null);
			$userId = $_SESSION['AAS']['Login']['emailUsuario'];

			$pesquisaEspaco = $conexaoBanco
			->prepare("
				SELECT 
				 NM_PLANTA
				FROM tb_espaco te
				WHERE te.NM_ESPACO = '$spacoAtual'
				AND NM_PLANTA = '$planta'
			");

			$pesquisaEspaco->execute();
			$espacos = $pesquisaEspaco->fetchAll();


			// print_r( $espacos );			

			if(count($espacos) && $espacos[0]['NM_PLANTA'] == $planta){
				echo '! Planta já está no espaço !';
			} else{

				$pesquisaEspaco = $conexaoBanco
				->prepare("
					SELECT 
					 NM_PLANTA
					FROM tb_espaco te
					WHERE te.NM_ESPACO = '$spacoAtual'
				");

				$pesquisaEspaco->execute();
				$espacos = $pesquisaEspaco->fetchAll();

				###########

				$pesquisaCompanheira = $conexaoBanco
				->prepare("
					SELECT 
					 GROUP_CONCAT(tbpc.NM_PLANTA) NM_PLANTAS
					FROM tb_planta tbp
					inner JOIN tb_companheira tbc 
						ON tbc.ID_PLANTA = tbp.ID_PLANTA
					INNER join tb_planta tbpc 
						ON tbpc.ID_PLANTA = tbc.ID_COMPANHEIRA
					WHERE tbp.NM_PLANTA = '$planta'
				");
				$pesquisaCompanheira->execute();

				$companheiras = $pesquisaCompanheira->fetchAll();
				$companheiras = (count($companheiras) ? $companheiras[0]['NM_PLANTAS'] : null );
				$companheiras = explode(',', $companheiras);

				$espacos = (count($espacos) ? $espacos[0]['NM_PLANTA'] : null);

				// print_r(['Cliquei em: ' => $planta, 'Posso plantar com: ' => $companheiras, 'E ja tem: ' => $espacos]);
				// var_dump($espacos);
				// die();


				if (in_array($espacos, $companheiras) || $espacos == null) {
						
					$resultQuery = $conexaoBanco->prepare("insert into TB_ESPACO(ID_ESPACO, NM_ESPACO, NM_PLANTA, EMAIL_USU) 
							values (null, $spacoAtual, '$planta','$userId')");
					$resultQuery -> execute();

					echo 'Planta inserida com sucesso :D';

				} else {
					echo "Plantas não companheiras :(";
				}

			}
	
?>