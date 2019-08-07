<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>faça seu cadastro!!!</title>
</head>
<?php
	include('conexao.php');
	if (isset($_POST['nome'])) {
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$nacimento = $_POST['nacimento'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$senha2 = $_POST['senha2'];

		if ($senha == $senha2) {

			$sql = "INSERT INTO tb_cadastro VALUES (null, '$nome', '$cpf', '$nacimento', '$email', '$senha')";
			
			if ($mysqli->query($sql)) {

				echo "<br>CADASTRADO BROOWWWW!!!";			
			
			}
			else{					
				echo $mysqli->error;
			}	
		}
		else{
			echo "<br>SENHAS DEVEM IGUAIS BROOWWWW!!!";	
		}
	}
?>
<body>
	<h3>Este formulário serve para o sistema ter uma base de suas informações pessoais, e a partir delas, calcular o período certo para você doar sangue.</h3><!-- aqui vcs podem melhorar a explicação, mas o usuario precisa saber o pq ele está colocando essas informações -->
	<form class="info" >
		<label>Já doou sangue alguma vez?</label><p>
			<input type="radio" name="sim" value="true"><label>Sim</label>
			<input type="radio" name="nao" value="false"><label>Não</label></p>

		<label>Contraiu hepatite B até seus 11 anos?</label><p>
			<input type="radio" name="sim1" value="true"><label>Sim</label>
			<input type="radio" name="nao1" value="false"><label>Não</label></p>

		<label>Você bebe frequentemente?</label><p>
			<input type="radio" name="sim2" value="true"><label>Sim</label>
			<input type="radio" name="nao2" value="false"><label>Não</latrue>

		<label>Você fuma frequentemente?</label><p>
			<input type="radio" name="sim3" value="true"><label>Sim</label>
			<input type="radio" name="nao3" value="false"><label>Não</label>

		<label>Contraiu alguma doença infecciosa?</label><p>
			<input type="radio" name="sim4" value="true"><label>Sim</label>
			<input type="radio" name="nao4" value="false"><label>Não</label></p>

		<label>Possui alguma tatuagem?</label><p>
			<input type="radio" name="sim5" value="true"><label>Sim</label>
			<input type="radio" name="nao5" value="false"><label>Não</label></p>

		<label>Está gestante?</label><p>
			<input type="radio" name="sim6" value="true"><label>Sim</label>
			<input type="radio" name="nao6" value="false"><label>Não</label></p>

		<label>Já fez uso de drogas ilícitas?</label><p>
			<input type="radio" name="sim7" value="true"><label>Sim</label>
			<input type="radio" name="nao7" value="false"><label>Não</label></p>

		<label>Se vacinou recentemente?</label><p>
			<input type="radio" name="sim8" value="true"><label>Sim</label>
			<input type="radio" name="nao8" value="false"><label>Não</label></p>

		<label>Viajou recentemente?</label><p>
			<input type="radio" name="sim9" value="true"><label>Sim</label>
			<input type="radio" name="nao9" value="false"><label>Não</label></p>

		<label>Qual o seu tipo sanguíneo?</label><input type="text" name="tipo"><p></p>

		<label>Se você já doou sangue, lembra qual foi a última vez?</label><input type="date" name="data"><p></p>

		<button type="submit">Me cadastrar!</button>
	</form>
	<?php

	?>
</body>
</html>