<?php

//function getConnection(){
//	$host ="db_estufa.mysql.dbaas.com.br";
//	$usuario = 'db_estufa';
//	$senha = "estufal3t";
//	$bd = "db_estufa";
//
//	try {
//
//		$conn = new PDO("mysql:host=" .$host. ";dbname=" .$bd, $usuario, $senha);
//		return array("conexao"=>$conn, "mensagem"=>"Sucesso!");
//
//	} catch(PDOException $e) {
//		return array("conexao"=>null, "mensagem"=>"Ocorreu o seguinte erro:<br>" . $e->getMessage());
//	}
//}

//$teste = getConnection();
//print_r($teste);

$conn=mysqli_connect("db_estufa.mysql.dbaas.com.br","db_estufa","estufal3t","db_estufa");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>