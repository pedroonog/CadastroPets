<?php	// salvar como conexao.php

	$conexao=mysqli_connect("localhost",
					"root",
					"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "petshop") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($conn) );

?>