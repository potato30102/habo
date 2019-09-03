<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Informações | Hospital</title>
</head>
<body>
	<?php
		include('conexao.php');

		session_start();

		 //$_SESSION['email'] = "vfhtf";
		 //$_SESSION['senha'] = "vfhtf";

		$sql = "SELECT * FROM tb_hospital WHERE cd_hospita = 1";
		
			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){ 
						echo '<b>Foto:</b>'.$row->ds_foto.'<br><br>
							  <b>Nome do Hospital:</b>'.$row->nm_hospital.'<br><br>
						      <b>Nome Fantasia:</b>'.$row->nm_fantasia.'<br><br>
						      <b>Telefone:</b>'.$row->ds_telefone.'<br><br>
						      <b>Email:</b>'.$row->ds_email.'<br><br>
						      <b>Senha:</b>'.$row->ds_senha.'<br><br>';
					}
				}
			}


		$sql = "SELECT * FROM tb_endereco_hospital, tb_hospital WHERE cd_endereco_hospital = id_hospital";
		
			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){
						//echo $sql;
						echo '<b>Endereço:</b>'.$row->ds_enedereco.'<br><br>
							  <b>Número:</b>'.$row->ds_numero.'<br><br>
							  <b>Bairro:</b>'.$row->nm_bairro.'<br><br>
							  <b>CEP:</b>'.$row->ds_cep.'<br><br>';
					}
				}
			}

		$sql = "SELECT * FROM tb_estado, tb_endereco_hospital, tb_hospital WHERE tb_estado.cd_estado = tb_endereco_hospital.id_estado = tb_endereco_hospital.id_hospital";

			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){
						//echo $sql;
						echo '<b>Estado:</b>'.$row->nm_estado.'<br><br>';
					}
				}
			}

		$sql = "SELECT * FROM tb_cidade, tb_endereco_hospital, tb_hospital WHERE tb_cidade.cd_cidade = tb_endereco_hospital.id_cidade = tb_endereco_hospital.id_hospital";

			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){
						//echo $sql;
						echo '<b>Cidade:</b>'.$row->nm_cidade.'<br><br>';
					}
				}
			}

	 ?>
</body>
</html>