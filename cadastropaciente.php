<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<?php
		include('conexao.php') 
	 ?>
	<title>Cadastro do paciente/receptor</title>
</head>
<body>
	<form method="post" class="paciente">
		<label>Nome do receptor:<input type="text" name="nome"></label>
		<label>Descreva a situação do receptor:<input type="textarea" name="descrever"></label>
		<label>Em que hospital o receptor está internado?<input type="textarea" name="hospital"></label>
		<label>Tipo sanguíneo</label>
		<select name="tiposanguineo">
		<?php  
			$sql = "SELECT * FROM tb_tiposanguineo";
			$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					echo '<option value="'.$row->cd_tiposanguineo.'">'.$row->nm_tiposanguineo.'</option>';
				}
		?>
		</select>
		<input type="file" name="file">
		<input type="submit" value="vamoo">
	</form>
	<?php
		session_start();

		//$_SESSION['email'] = "vfhtf";
		//$_SESSION['senha'] = "vfhtf";

		if (isset($_POST['nome'])) {
		 	$nome = $_POST['nome'];
		 	$descrever = $_POST['descrever'];
		 	$hospital = $_POST['hospital'];
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

			$sql = "INSERT INTO tb_paciente VALUES (null, '$nome', '$tiposanguineo', '$descrever', '$foto', '$hospital')";

			if (!$mysqli->query($sql)) {
				echo "$mysqli->error";
			}
		} 
	 ?>
</body>
</html>