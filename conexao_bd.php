<?php

//Alterar os valores dos atributos ENDERECO_SERVIDOR, BD_USUARIO, BD_SENHA e BD_NOME, de acordo com o banco de dados criado.

$conexao = mysqli_connect("__ENDERECO_SERVIDOR__", "__BD_USUARIO__", "__BD_SENHA__", "__BD_NOME__");

// Define que a conexão com o banco use UTF-8
mysqli_set_charset($conexao, "utf8");

if (mysqli_connect_errno())
	echo "Erro ao conectar ao MySQL: " . mysqli_connect_error();
else
	echo "Conexão com BD realizada!"; 
	
mysqli_close($conexao); 
?>



