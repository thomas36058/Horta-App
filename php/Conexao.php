<?php
	ini_set('default_charset','UTF-8');

	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

	date_default_timezone_set( 'America/Sao_Paulo' );
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$banco = 'db_estufa';
	
	try 
	{
		$conexaoBanco = new PDO("mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock; host=$host; dbname=$banco; charset=utf8", $user, $pass);
		$conexaoBanco -> exec("SET CHARACTER SET utf8");
		$conexaoBanco -> exec("SET time_zone = '-03:00'");
		
		$conexaoBanco -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $exe) 
	{
		echo 'Erro ao tentar conectar com o banco de dados: ' . $exe->getMessage();
	}
?>