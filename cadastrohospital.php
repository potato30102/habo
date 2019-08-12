<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro do Hospital</title>
</head>
<body>	
<?php
	include('conexao.php');
?>
<form method="post">
	<label>Nome do Hospital:<input type="text" name="hospital"></label>
	<label>Nome Fantasia:<input type="text" name="fantasia"></label>
	<label>Razão Social:<input type="text" name="razao"></label>
	<label>CNPJ:<input type="number" name="cnpj"></label>
	<label>Telefone:<input type="number" name="tell"></label>
	<label>E-mail:<input type="mail" name="email"></label>
	Estado:<select>
	<?php
		$sql = "SELECT * FROM tb_estado";
		$result = $mysqli->query($sql);
		while($row = $result->fetch_object()){
			echo '<option name="'.$row->nm_estado.'">'.$row->nm_estado.'</option>';
		}
	?>
	</select>
	<label>Cidade:<input type="text" name="cidade"></label>
	<label>CEP:<input type="number" name="cep"></label>
	<label>Endereço:<input type="texte" name="endereco"></label>
	<label>Bairro:<input type="text" name="bairro"></label>
	<label>Número:<input type="number" name="numero"></label>
	<label>Crie uma senha:<input type="password" name="senha"></label>
	<label>Confirmação de Senha: <input type="password" name="confsenha"></label>
	<input type="submit" value="Cadastrar">
</form>
<?php  
	if (isset($_POST['fantasia'])) {
		date_default_timezone_set("Brazil/East");
		$hora = date("d/m/y H:i:s");
		$hospital = $_POST['hospital'];	
		$fantasia = $_POST['fantasia'];
		$razao = $_POST['razao'];
		$cnpj = $_POST['cnpj'];
		$tell = $_POST['tell'];
		$email = $_POST['email'];
		$cidade = $_POST['cidade'];
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];
		$senha = $_POST['senha'];
		$confsenha = $_POST['confsenha'];

		echo $hora;
		$sql = "INSERT INTO tb_hospital VALUES (null , '$hospital', '$fantasia', '$cnpj', '$tell', 'foto', '$email', '$senha', '$hora')";
		$result = $mysqli->query($sql);
		
		$sql = "SELECT * FROM tb_hospital";
		if ($result = $mysqli->query($sql)) {
			while ($row = $result->fetch_object()) {
				echo $row->nm_hospital;
			}
		}
	
	}
?>
</body>
</html>