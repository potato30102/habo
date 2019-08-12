<meta charset="utf-8">
<!DOCTYPE>
<html>
<head>
<?php
include("conexao.php");
	//	session_start();
	//	if ((!isset($_SESSION['semail']) == true) and (!isset($_SESSION['ssenha']) == true)) {
	//		unset($_SESSION['semail']);
	//		unset($_SESSION['ssenha']);
	//		header("location:loginuser.php");
	//}
	//$id = $_SESSION['id_cadastro'];
	//echo $id; 
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
	<title>HABO | Cadastro Receptor</title>
</head>
<body>
<center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<form method="post" class="paciente" enctype="multipart/form-data">
	<br>	<br>
	<div class="container">
   
<br> 
<!-- logo -->
 <img id="profile-img" class="profile-img-card" src="img/logosite.png" />
  
 <div class="row">
  	<div class="col-md-1"></div>

<div class="col-md-2">
	Adicione uma foto
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="icondemo"
       name="file">
    <label class="custom-file-label" for="inputGroupFile01"></label>

</div>

</div>
    <div class="col-md-3">
		Digite o nome do Receptor:  <input type="text" id="campoData" placeholder="Digite o Nome do Receptor..."  class="form-control" name="nome" required="">
	</div>
	<div class="col-md-3">
		Hospital  <input type="text"  class="form-control" name="hospital" placeholder="Em qual hospital se encontra...">
	</div>
		<div class="col-md-2">
		Tipo Sanguíneo	
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
<br>
<div class="row">
  	<div class="col-md-1"></div>
  	<div class="col-md-10">
  		Descreva a situação do Receptor
  		<textarea rows="5" class="form-control"  name="descrever" style="resize: none" placeholder="Escreva uma descrição..."></textarea>
  	</div>
</div><br>
<div class="row">
  	<div class="col-md-9"></div>
		  <div class="col-md-2"> <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button></div>
</div>                               <br>
	</form>	
<?php

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
		if (isset($_FILES['file'])) {	
			date_default_timezone_set("Brazil/East");
			$ext = strtolower(substr($_FILES['file']['name'],-4));
			if ($ext = ".jpg" or ".png" or ".bnp") {
				$new_name = date("Y.m.d-H.i.s").$ext;
				$dir = 'img/';
				$foto = $dir.$new_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $foto);
			}else{
				echo "Extenção Invalida";
			}
		}	

			$sql = "INSERT INTO tb_paciente VALUES (null,'2', '$nome', '$tiposanguineo', '$descrever', '$foto', '$hospital')";

			if (!$mysqli->query($sql)) {
				echo $mysqli->error;
			}
		}
?>
</center>
</body>
</html>

