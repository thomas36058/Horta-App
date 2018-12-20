<?php
$humid = filter_input(INPUT_GET, 'humid', FILTER_SANITIZE_NUMBER_FLOAT);
var_dump($humid);
if (is_null($humid) ) {
	#echo $humid . " - ";
  //Gravar log de erros
  die("Dados inválidos");
} 

$servername = "localhost";
$username = 'root';
$password = 'root';
$dbname = 'db_estufa';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  //Gravar log de erros
  die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
} 

$sql = "INSERT INTO `tb_umidade`(`DS_SENSOR`, `VL_UMIDADE`) VALUES (1, "$humid")";
var_dump($sql);

echo $humid;

//INSERT INTO `tb_umidade`(`DS_SENSOR`, `VL_UMIDADE`) VALUES (1,"1024")

if (!$conn->query($sql)) {
  //Gravar log de erros
  die("Erro na gravação dos dados no banco");
}
$conn->close();
?>