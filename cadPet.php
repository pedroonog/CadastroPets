<?php
	// Criar variáveis
	$nome			= $_POST["nome"];
	$sexo			= $_POST["sexo"];
	$tipo			= $_POST["tipo"];
	$codigoDono		= (int) $_POST["codigoDono"];
	$idade			= (int) $_POST["idade"];
	$peso			= (float) $_POST["peso"];
	
	$vacinado=0;
	if ( isset($_POST["vacinado"])  )
		$vacinado = (int) $_POST["vacinado"];
	
	$medico			= $_POST["medico"];
	$obs			= $_POST["obs"];
	$ultimaVisita	= $_POST["ultimaVisita"];
	
	
	$foto			= $_FILES["foto"]["name"];
	$tamanho		= $_FILES["foto"]["size"];
	$tipoArquivo	= $_FILES["foto"]["type"];
	$nomeTemporario	= $_FILES["foto"]["tmp_name"];
	
	// validar dados
	if ( strlen($nome) <2 )
		die("Informe nome com no mínimo 2 caracteres.");
	
	if (  ($sexo <> "M") and ($sexo <> "F")  )
		die("Sexo informado incorretamente.");
	
	if ( $tipo == "")
		die("Tipo deve ser informado");

	if ($peso <= 0)
		die("Peso deve ser informado.");

	if (  ($vacinado <> 0) and ($vacinado <> 1)  )
		die("Vacinado informado incorretamente.");
	
	if ($foto=="")
		die("Foto do Pet é obrigatória.");
	
	// exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "Nome: <b>$nome</b> <br>";
	echo "Sexo: $sexo<br>";
	echo "Tipo: $tipo<br>";
	echo "Código do Dono: $codigoDono <br>";
	echo "Idade: $idade <br>";
	echo "Peso:  $peso<br>";
	echo "Vacinado?  $vacinado<br>";
	echo "Médico: $medico<br>";
	echo "Observações:<br>";
	echo "$obs<br>";
	echo "Última Visita: $ultimaVisita<br>";	
	echo "Foto: $foto<br>";
	echo "tamanho: $tamanho<br>";
	echo "tipoArquivo: $tipoArquivo<br>";
	echo "nomeTemporario: $nomeTemporario<br>";
	echo "<hr>";
	
			
	
?>