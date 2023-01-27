<html>
	<head>
		<title>...</title>
	</head>
	<body>
	<?php	// Criar a pasta no WAMP 
		//	[07] BANCO e salvar esta 
		//	página como listagemPets.php  
	
	include "conexao.php";
			
	$comando="SELECT * FROM pets ORDER BY nome" ;
	
	$rs = mysqli_query($conexao , $comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($conexao) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Falha na recuperação dos registros:" . mysqli_error($conn) );
			
	echo "N�mero de registros encontrados: $linhas <br>";
	
	// Ou assim:
	// mysqli_query($conn , "SELECT * FROM pets")
	echo "<table border='1'>";
	echo "	<tr>";
	echo "		<th>id</th>";
	echo "		<th>Nome Pet</th>";
	echo "		<th>Tipo</th>";
	echo "		<th>Idade</th>";
	echo "		<th>Peso</th>";
	echo "		<th>dono</th>";
	echo "		<th>foto</th>";
	echo "		<th colspan=2>Ações</th>";
	echo "	</tr>";
	while( $dados = mysqli_fetch_array($rs) )
	{
		$codigo = $dados["codigo"] ;
		$nome   = $dados["nome"] ;
		$tipo   = $dados["tipo"] ;
		$idade  = $dados["idade"] ;
		$peso   = $dados["peso"] ;
		$dono   = $dados["codigoDono"] ;
		$foto   = $dados["foto"] ;
		echo "	<tr>";
		echo "		<td>$codigo</td>" ;
		echo "		<td>$nome</td>" ;
		echo "		<td>$tipo</td>" ;
		echo "		<td>$idade</td>" ;
		echo "		<td>$peso</td>" ;
		echo "		<td>$dono</td>" ;
		echo "		<td><img src='fotos/$foto' width='80'></td>" ;
		echo "		<td> <a href='alterarPet.php?c=$codigo'>Alterar</a> </td>" ;
		echo "		<td> <a href='excluirPet.php?c=$codigo'>Excluir</a> </td>" ;
		echo "	</tr>";
	}
	
	echo "</table>" ;
	
?>
	<hr>
	Clique <a href='cadPet.html'>aqui</a> para 
		incluir um novo pet.
		
	</body>
</html>