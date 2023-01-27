<html>
	<head>
		<title>Gravação de dados</title>
	</head>
	<body>
	<?php	// salvar como gravarDadosPet.php
	// 1 - copiar os dados do formulário em variáveis
	$codigo 		=  $_POST["codigo"];
	$nome			=  $_POST["nome"];
	$sexo			=  $_POST["sexo"];
	$tipo			=  $_POST["tipo"];
	$codigoDono		=  $_POST["codigoDono"];
	$idade			=  $_POST["idade"];
	$peso			=  $_POST["peso"];
	
	$vacinado=0;
	if ( isset($_POST["vacinado"]) )
		$vacinado=$_POST["vacinado"];
	
	$medico			=  $_POST["medico"];
	$obs			=  $_POST["obs"];
	$ultimaVisita	=  $_POST["ultimaVisita"];
	
	$foto			=  $_FILES["foto"]["name"];
	
	include "conexao.php";
	
	// transferindo o arquivo novo (chegou?)
	if ($foto !=="")
	{
		$nomeTemporario = $_FILES["foto"]["tmp_name"];
		$destino="fotos/$foto";
		
		//transferir a foto/arquivo que veio
		if (move_uploaded_file( $nomeTemporario,
								$destino))
			echo "Arquivo transferido com sucesso!<br>";
		else
			die("Falha em transferir o arquivo $foto");
	}
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE pets SET 
				nome='$nome'				,
				sexo='$sexo'				,
				tipo='$tipo'				,
				codigoDono='$codigoDono'	,
				idade='$idade'				,
				peso='$peso'				,
				vacinado='$vacinado'		,
				medico='$medico'			,
				obs='$obs'					,
				ultimaVisita='$ultimaVisita'";
				
	if ($foto !=="")
		$sql = $sql . ", foto='$foto' ";
	
	$sql = $sql . " WHERE codigo=$codigo ";
				
	//die($sql);
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do pets
	   $nome: " . mysqli_error($conexao));
	  
	echo "Pet <b>$nome</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='listagemPets.php'>aqui</a> para 
continuar

	</body>
</html>