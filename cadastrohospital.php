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
<form method="post" enctype="multipart/form-data">
	<label>Nome do Hospital: <input type="text" name="hospital"></label><br><br>
	<label>Nome Fantasia: <input type="text" name="fantasia"></label><br><br>
	<label>Razão Social: <input type="text" name="razao"></label><br><br>
	<label>CNPJ: <input type="text" name="cnpj"></label><br><br>
	<label>Telefone: <input type="text" name="tell"></label><br><br>
	<label>E-mail: <input type="mail" name="email"></label><br><br>
	<label>Adicione uma foto do Hospital: </label><input type="file" name="file" ><br><br>
	<label>Crie uma senha: <input type="password" name="senha"></label><br><br>
	<label>Confirmação de Senha: <input type="password" name="confsenha"></label><br><br>
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
		$senha = $_POST['senha'];
		$confsenha = $_POST['confsenha'];

		if ($senha != $confsenha) {		
			echo "<script>alert('Senhas devem ser iguais !');</script>";
		}else{
			if (isset($_FILES['file'])) {	
				date_default_timezone_set("Brazil/East");
				$ext = strtolower(substr($_FILES['file']['name'],-4));
				if ($ext = ".jpg" or ".png" or ".bnp") {
					$new_name = date("Y.m.d-H.i.s").$ext;
					$dir = 'foto/';
					$foto = $dir.$new_name;
					move_uploaded_file($_FILES['file']['tmp_name'], $foto);
				}else{
					echo "Extenção Invalida";
				}
			//echo $hora;
			$sql = "INSERT INTO tb_hospital VALUES (null , '$hospital', '$fantasia', '$cnpj', '$tell', '$foto', '$email', '$senha', '$hora')";
			$result = $mysqli->query($sql);
			}
		}

		//$sql = "SELECT * FROM tb_hospital WHERE ds_data_registro = $hora";
		//$result = $mysqli->query($sql);
		//while ($row = $result->fetch_assoc()) {
			//echo $row->nm_hospital;
		//}
	}
?>
</body>
</html>