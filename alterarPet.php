<html> 
	<head>
		<title>Cadastro de Pets - Alteração</title>
	</head>
	<body>
		<h2>Cadastro de Pets - Alteração</h2>
		<?php
			// c�digo do pet veio?
			if ( ! isset($_GET["c"]))
				die("Programa chamado de forma incorreta.");
			
			// crio variável com o código do pet
			$codigo = $_GET["c"];

			// conecto no mysql e abro o banco
			include "conexao.php";
			
			// Comando SQL para localizar o pet
			$comandoSQL = "SELECT * FROM pets 
				WHERE codigo=$codigo";
				
			// Enviar o comando para o MYSQL
			$registro=mysqli_query( $conexao , 
									$comandoSQL) or 
				die("Erro na seleção do 
				pet: " . mysqli_error($conexao));
			
			// Achou algum registro (do pet?)
			$linhas = mysqli_num_rows($registro);
			
			if($linhas<1)
				die("C�digo $codigo não encontrado. 
						Pet foi excluído?");
			
			$dados = mysqli_fetch_array($registro);
			
			$nome 		= 	$dados["nome"];
			$sexo		=	$dados["sexo"];
			$idade		=	$dados["idade"];
			$tipo		=	$dados["tipo"];
			$peso		=	$dados["peso"];
			$vacinado	=	$dados["vacinado"];
			$codigoDono	=	$dados["codigoDono"];
			$ultimaVisita=	$dados["ultimaVisita"];
			$medico		=	$dados["medico"];
			$obs		=	$dados["obs"];
			$foto		=	$dados["foto"];	
		?>
		<form 	action="gravarDadosPet.php" 
				enctype="multipart/form-data"
				method="post">
				
			<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
			
			Nome: 
			<input 	type="text" 
					name="nome"
					maxlength="30" 
					size="30" 
					placeholder="Informe o nome do seu pet"
					value="<?php echo $nome;?>">
			<br>
		    <input type="radio" name="sexo" value="M" <?php if ($sexo =='M') echo 'checked';?>>Masculino
		    <input type="radio" name="sexo" value="F" <?php if ($sexo =='F') echo 'checked';?>>Feminino
			<br>
			
			Tipo:
			<select name="tipo">
				<option value="">Escolha</option>
				<option value="G" <?php if ($tipo =="G") echo 'selected';?>>Gato</option>
				<option value="C" <?php if ($tipo =="C") echo 'selected';?>>Cachorro</option>
				<option value="P" <?php if ($tipo =="P") echo 'selected';?>>Pássaro</option>
				<option value="R" <?php if ($tipo =="R") echo 'selected';?>>Réptil</option>
				<option value="O" <?php if ($tipo =="O") echo 'selected';?>>Outros</option>
		    </select>
			
			<br>
			Dono: 
			<input 	type="number" 
					name="codigoDono"
					min="1"
					max="9999999999"
					value="<?php echo $codigoDono; ?>">
					
		    <br>
			<fieldset>
				<legend>Dados Médicos</legend>
				Idade: 
				<input 	type="number" 
					name="idade" 
					maxlength="2" 
					min="1" 
					max="99"
					value="<?php echo $idade;?>">
					<br>

				Peso (Kg):  
				<input 	type="number" 
					name="peso" 
					min="0" 
					max="999.999" 
					placeholder="999,999"
					step="0.001"
					value="<?php echo $peso;?>">
					<br>
					
				<input 	type="checkbox" 
						name="vacinado" 
						value="1"
						<?php if ($vacinado == 1) echo 'checked';?>>
				Animal foi vacinado no ano <br>
				
				Médico responsável: 
				<input 	type="text" 
						name="medico" 
						maxlength="50" 
						size="50"
						value="<?php echo $medico; ?>">
						<br>
						
				Observações:<br>
				<textarea 	name="obs" 
							rows="3" 
							cols="80"
						placeholder="Histórico Médico"><?php echo $obs;?></textarea>
				<br>
			</fieldset> 
			
			<br>	
			Última Visita: 
			<input 	type="date" 
					name="ultimaVisita"
					min="2018-09-12"
					max="2025-12-31"
					value="<?php echo $ultimaVisita; ?>">
			<br>
			Foto: 
			<input 	type="file" 
					name="foto">
			<br>
			<?php
				echo "<img src='fotos/$foto' width='80'>";
				echo "<br>";
			?>
			[Foto Atual: <?php echo $foto; ?> ]
			<hr>

			<input type="submit" value="Enviar">
		</form>
	</body>
</html>