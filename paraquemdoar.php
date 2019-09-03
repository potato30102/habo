<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Para quem doar</title>
</head>
<body>
	<?php
		include('conexao.php');


		//$_SESSION['email'] = "vfhtf";
		 //$_SESSION['senha'] = "vfhtf"; 

		$sql = "SELECT * FROM tb_paciente";
		
			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){

						 echo '<b>Foto:</b>'.$row->ds_foto.'<br><br>
						 	   <b>Nome do Paciente:</b>'.$row->nm_paciente.'<br><br>
						 	   <b>Descrição do Paciente:</b>'.$row->ds_paciente.'<br><br>
						 	   <b>Nome do hospital:</b>'.$row->nm_hospital.'<br><br>';
					}
				}
			}


			$sql = "SELECT * FROM tb_tiposanguineo, tb_paciente WHERE cd_tiposanguineo = id_sangue";
		
			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){
						//echo $sql;
						echo '<b>Tipo sanguíneo:</b>'.$row->nm_tiposanguineo.'<br><br>';
					}
				}
			}	 
	 ?>
</body>
</html>