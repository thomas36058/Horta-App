<?php
	session_start();
	
	unset($_SESSION['AAS']['Login']);
	
	echo '1;-;Usuário efetuou logout com sucesso!';
?>