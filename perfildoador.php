<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Perfil do usuário</title>
</head>
<body>
	<?php
		include('conexao.php');
		session_start();

		 //$_SESSION['email'] = "vfhtf";
		 //$_SESSION['senha'] = "vfhtf"; 

		$sql = "SELECT * FROM tb_usuario";
		
			if ($result = $mysqli->query($sql)){
				if($result->num_rows>=0){
					while($row = $result->fetch_object()){

						 echo '<ul><li value="'.$row->nm_usuario.'">'.$row->nm_usuario.'</li>
							   <li value="'.$row->dt_nascimento.'">'.$row->dt_nascimento.'</li>
							   <li value="'.$row->ds_cpf.'">'.$row->ds_cpf.'</li>
							   <li value="'.$row->ds_sexo.'">'.$row->ds_sexo.'</li>
							   <li value="'.$row->id_estadocivil.'">'.$row->id_estadocivil.'</li>
							   <li value="'.$row->ds_foto.'">'.$row->ds_foto.'</li>
							   <li value="'.$row->ds_senha.'">'.$row->ds_senha.'</li>
							   <li value="'.$row->id_sangue.'">'.$row->id_sangue.'</li></ul>';
					}
				}else{
					echo "vazio";
				}				
			}else{
				echo "erro";		
			}
		

			

	?>
</body>
</html>