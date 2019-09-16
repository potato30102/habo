	<meta charset="utf-8">
<!DOCTYPE>
<html>
	<head>
		<?php
			include("conexao.php");
			//session_start();
			//if ((!isset($_SESSION['semail']) == true) and (!isset($_SESSION['ssenha']) == true)) {
			//	unset($_SESSION['semail']);
			//	unset($_SESSION['ssenha']);
			//	header("location:login.php");
			//}
			//$id = $_SESSION['id_cadastro'];
		?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style_doador.css">
     <link rel = "shortcut icon" type = "imagem/x-icon" href = "IMG/icone.png"/>

		<title>Habo | Editar Dados</title>
	</head>

	<?php 
	include('conexao.php');


	$sql = "SELECT * FROM tb_usuario ";

	$result = $mysqli->query($sql);
	while($row = $result->fetch_object()){	
		$Nome = $row->nm_usuario;
		$dtnasc = $row->dt_nascimento;
		$cpf = $row->ds_cpf;
		$sexo = $row->ds_sexo;
		$estadocivil = $row->id_estadocivil;
		$foto = $row->ds_foto;
		$email = $row->ds_email;
		$senha = $row->ds_senha;
		$sangue= $row->id_sangue;
	}
 ?>



<body>
	<center>
		<form method="post" enctype="multipart/form-data" >
		<br>	<br>
			<div class="container" style="margin-top: 2%;">
			<br> 
			<!-- logo --><img id="profile-img" class="profile-img-card" src="img/meupau.png" />
 				<div class="row">
  					<div class="col-md-1"></div>
						<div class="col-md-3">
						Adicione sua foto
  							<div class="custom-file">
    							<input type="file" class="custom-file-input" id="icondemo" name="file" value="<?php echo $foto;  ?>">
    							<label class="custom-file-label" for="inputGroupFile01" style="text-align: left;">Adicionar foto...</label>
							</div>
						</div>
    						<div class="col-md-4">
								Digite seu nome <input type="text" id="campoData" placeholder="Ex.: Gabriel Gomes da Silva"  class="form-control" name="nome" required="" value="<?php echo $Nome;  ?>">
							</div>
							
							<div class="col-md-3">
								Data de nascimento <input type="date"  class="form-control" name="dtnasc" value="<?php echo $dtnasc;  ?>">
							</div>
				</div>
				<br>
			<div class="row">
  				<div class="col-md-1"></div>
  					<div class="col-md-4">
						CPF <input type="text" class="form-control " name="cpf" id="cpf" placeholder="Ex.: 123.456.789-00 " value="<?php echo $cpf;  ?>"><br><br>
					</div>
    
    					<div class="col-md-2">
						Gênero 	
							<select class="form-control"  name="sexo">
								<option>...</option>
								<option value="Masculino">Masculino</option>
								<option value="Feminino">Feminino</option>
								<option value="Outros">Outros</option>
							</select>
						</div>
					<div class="col-md-2">
					Estado Civil	
						<select class="form-control" 	name="estadocivil">
							<option>...</option>
								<?php
									$sql = "SELECT * FROM tb_estadocivil";
									$result = $mysqli->query($sql);
									while($row = $result->fetch_object()){
										echo '<option value="'.$row->cd_estadocivil.'">'.$row->nm_estadocivil.'</option>';
									}
								?>
						</select>
					</div>
				<div class="col-md-2">
				Tipo Sanguineo	
					<select class="form-control" 	name="tiposanguineo">
						<option>...</option>
							<?php  
								$sql = "SELECT * FROM tb_tiposanguineo";
								$result = $mysqli->query($sql);
								while($row = $result->fetch_object()){
									echo '<option value="'.$row->cd_tiposanguineo.'">'.$row->nm_tiposanguineo.'</option>';
								}
							?>
					</select>
				</div>
			</div>
		<div class="row">
  			<div class="col-md-1"></div>
				<div class="col-md-4">
					E-mail 
					<input type="mail" class="form-control " name="email" placeholder="Ex.: seunome@habo.com" value="<?php echo $email;  ?>">
				</div>
				
				<div class="col-md-3">
					Digite sua Senha 
					<input type="password" class="form-control " name="senha" placeholder="Digite sua senha..." value="<?php echo $senha;  ?>">
				</div>
				
				<div class="col-md-3"> 
					Confirme sua Senha 
					<input type="password" class="form-control " name="confsenha" placeholder="Confirme sua senha..." value="<?php echo $senha;  ?>">
				</div>
		</div><br>
				<div class="row">
  					<div class="col-md-9"></div>
		 				<div class="col-md-2"> 
		 					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Continuar</button>
		 				</div>
				</div><br> 
			</div>
		</form>	
<?php
if (isset($_POST['nome']) ) {
	$nome = $_POST['nome'];
	$dtnasc = $_POST['dtnasc'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$estadocivil = $_POST['estadocivil'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tiposanguineo = $_POST['tiposanguineo'];
	$confsenha = $_POST['confsenha'];

	if ($senha != $confsenha) {		
		echo "<script>alert('Senhas devem ser iguais !');</script>";
	}
	else{
		if (isset($_FILES['file'])) {	
			date_default_timezone_set("Brazil/East");
			$ext = strtolower(substr($_FILES['file']['name'],-4));
			if ($ext = ".jpg" or ".png" or ".bnp") {
				$new_name = date("Y.m.d-H.i.s").$ext;
				$dir = 'IMG/';
				$foto = $dir.$new_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $foto);
			}
			else{
				echo "Extenção Invalida";
			}
		}
		
			$sql = "UPDATE tb_usuario SET 'nm_usuario' = '$nome', 'dt_nascimento' = '$dtnasc', 'ds_cpf' = '$cpf', 'id_estadocivil' = '$estadocivil', 'ds_foto' = '$foto', 'ds_email' = '$email', 'ds_senha' = '$senha', 'id_sangue' = '$tiposanguineo' where cd_usuario = '1' ";
			
			if (!$mysqli->query($sql)) {
				echo $mysqli->error;
			} 

			header("location:perfil_doador.php");
	}
}
?>
</center>
</body>
</html>