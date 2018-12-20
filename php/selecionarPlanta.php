<?php
	include 'Conexao.php';

	$resultQuery = $conexaoBanco->prepare('select NM_PLANTA from TB_ESPACO WHERE NM_ESPACO = "Espaço I"');
				
	$resultQuery->execute();

	while ($row_msg = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
		if($row_msg > 1){echo $row_msg['NM_PLANTA']."      ";}
		else {echo $row_msg['NM_PLANTA']."";}
	}
?>