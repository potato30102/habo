<meta charset="utf-8">
<!DOCTYPE>
<html>
<head>
<?php
include("conexao.php");
?>
<style type="text/css">
	img{
		width: 40%;
	}
.container{
   	border: 2px solid lightgray;
}
.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: #b32c1d;
    background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
   
   
   
    border-radius: 4px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: #D13321;
}
</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	
	<meta charset="utf-8">
	<title>HABO | Cadastro</title>
</head>
<body>
<center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<form method="post" >
	<br>	<br>
	<div class="container">
   
<br> 
<!-- logo -->
 <img id="profile-img" class="profile-img-card" src="img/logosite.png" />
  
 <div class="row">
  	<div class="col-md-1"></div>

<div class="col-md-4">
	Adicione sua foto
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="icondemo"
       name="file">
    <label class="custom-file-label" for="inputGroupFile01">Adicionar foto</label>

</div>

</div>
    <div class="col-md-4">
		Digite seu nome <input type="text" id="campoData" placeholder="Digite seu nome"  class="form-control" name="nome" required="">
	</div>
	<div class="col-md-2">
		Data de nascimento <input type="date"  class="form-control" name="nascimento">
	</div>
	
</div>
<br>
<div class="row">
  	<div class="col-md-1"></div>
  	<div class="col-md-4">

		CPF <input type="text" class="form-control " name="cpf" id="cpf" placeholder="Digite seu CPF"><br><br>
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
		<div class="col-md-4"> E-mail <input type="mail" class="form-control " name="email" placeholder="Digite seu E-mail"></div>
		<div class="col-md-3">Digite sua Senha <input type="password" class="form-control " name="senha" placeholder="Digite sua senha..."></div>
		<div class="col-md-3"> Confirme sua Senha <input type="password" class="form-control " name="confsenha" placeholder="Confirme sua senha..."></div>

</div><br>
<div class="row">
  	<div class="col-md-9"></div>
		  <div class="col-md-2"> <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button></div>
</div>                               <br> 
		</div>
	</div>
	</form>	
<?php
if (isset($_POST['nome']) ) {
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
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
				$dir = 'fotodoador/';
				$foto = $dir.$new_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $foto);
			}
			else{
				echo "Extenção Invalida";
				 }
		}
		
			$sql = "INSERT INTO tb_usuario VALUES (null, '$nome', '$nascimento', '$cpf', '$sexo', '$estadocivil', '$foto', '$email', '$senha', '$tiposanguineo')";
		}
	if (!$mysqli->query($sql)) {
			echo "$mysqli->error";
		}
	
}
?>
</center>
</body>
</html>

