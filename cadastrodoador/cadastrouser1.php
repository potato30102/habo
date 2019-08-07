<meta charset="utf-8">
<!DOCTYPE>
<html>
<head>
<?php
include("conexao.php");
?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>Cadastro!!!!!!!!!!!!</title>
</head>
<body>
<center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<form method="post">
		<label>Digite seu nome </label></label><input type="text" name="nome" required=""><br><br>
		<label>Data de nascimento </label><input type="date" name="nascimento"><br><br>
		<label>CPF </label><input type="text" name="cpf" ><br><br>
		<label>Sexo </label>
		<select name="sexo">
			<option value="Masculino">Masculino</option>
			<option value="Feminino">Feminino</option>
			<option value="Outros">Outros</option>
		</select><br><br>
		<label>Estado Civil</label>
		<select name="estadocivil">
		<?php
			$sql = "SELECT * FROM tb_estadocivil";
			$result = $mysqli->query($sql);
			while($row = $result->fetch_object()){
				echo '<option value="'.$row->cd_estadocivil.'">'.$row->nm_estadocivil.'</option>';
			}
		?>
		</select><br><br>
		<input type="file" name="file"><br><br>
		<label>Tipo Sanguineo</label>
		<select name="tiposanguineo">
			<?php  
				$sql = "SELECT * FROM tb_tiposanguineo";
				$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					echo '<option value="'.$row->cd_tiposanguineo.'">'.$row->nm_tiposanguineo.'</option>';
				}
			?>
		</select><br><br>
		<label>E-mail </label><input type="mail" name="email"><br><br>
		<label>Digite sua Senha </label><input type="password" name="senha"><br><br>
		<input type="submit" value="foi krl">
	</form>	
<?php
if (isset($_POST['nome']) ) {
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$cpf = $_POST['cpf'];
	$orientacao = $_POST['orientacao'];
	$estadocivil = $_POST['estadocivil'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tiposanguineo = $_POST['tiposanguineo'];

	date_default_timezone_set("Brazil/East");
	if (isset($_FILES['file'])) {	
		$ext = strtolower(substr($_FILES['file']['name'],-4));
	} 
	if ($ext = ".jpg" or ".png" or ".bnp") {
		$new_name = date("Y.m.d-H.i.s").$ext;
		$dir = 'foto/';
		$foto = $dir.$new_name;
		if (isset($_FILES['file'])) {
			move_uploaded_file($_FILES['file']['tmp_name'], $foto);
		}
		echo "<img src='cadastrodoador/foto/2019.08.07-09.07.12.jpg'>";
	}else{
		echo "Extenção Invalida";
	}
			
	$sql = "INSERT INTO tb_usuario VALUES (null, '$nome', '$nascimento', '$cpf', '$orientacao', '$estadocivil', '$foto', '$email', '$senha', '$tiposanguineo')";

	if (!$mysqli->query($sql)) {
		echo "$mysqli->error";
	}
}
?>
</center>
</body>
</html>

<!--<!DOCTYPE>
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
	<h3>Este formulário serve para o sistema ter uma base de suas informações pessoais, e a partir delas, calcular o período certo para você doar sangue.</h3>-->

<!-- aqui vcs podem melhorar a explicação, mas o usuario precisa saber o pq ele está colocando essas informações -->
	
	<!--<form class="info" >
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
</body>
</html>
?>
<select name="cidade" id="city">
	<script type="text/javascript">
		$(document).on('change','#uf', function(){
			var uf = $(this).val();
			$('#city').load('ajax.php?uf='+uf); 
		});
	</script>
</select><br><br> 
-->