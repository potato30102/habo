<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Habo | Cadastro dados de endereço</title>
</head>

<?php 
	include('conexao.php');
	//session_start();
	//if ((!isset($_SESSION['semail']) == true) and (!isset($_SESSION['ssenha']) == true)) {
	//	unset($_SESSION['semail']);
	//	unset($_SESSION['ssenha']);
	//	header("location:login.php");
	//}
 ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/style_user_cadastro.css">
	 <link rel = "shortcut icon" type = "imagem/x-icon" href = "IMG/icone.png"/>
<body>

	<form method="post" class="enderecodoador">
		<div class="container" style="margin-top: 6%; border: 1px solid lightgray">
			<center>
			<img id="profile-img" class="profile-img-card" src="IMG/logosite.png" width="400" />
			<br> 

 				<div class="row">
 					<div class="col-md-1"></div>
						<div class="col-md-4">
								<label>Rua:</label><input type="text" class="form-control" name="end" placeholder="Ex.: Rua Joaquim Pereira  ">
						</div>

						<div class="col-md-2">
								<label>Nº:</label><input type="text" class="form-control" name="numero" placeholder="Ex.: 999  ">
						</div>

						<div class="col-md-4">
								<label>Complemento:</label><input type="text" class="form-control" name="complemento" placeholder="Ex.: Casa, Apartamento, Bloco...">
						</div>

						
				</div>
<br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4">
								<label>Bairro:</label><input type="text" class="form-control" name="bairro" placeholder="Ex.: Savoy ">
						</div>
						<div class="col-md-3">
						<label>	Estado: </label><select  class="form-control" id="estado" name="estado" >
								<option>...</option>
										<?php
											$sql = "SELECT * FROM tb_estado order by nm_estado";

											$result = $mysqli->query($sql);
											while($row = $result->fetch_object()){
												echo '
												<option  value="'.$row->cd_estado.'" name="'.$row->nm_estado.'">'.$row->nm_estado.'</option>';
											}
										?>
									</select>
						</div>
						<div class="col-md-3">			
							<div id="cidade">
							
								<script type="text/javascript">
									$(document).on('change','#estado', function(){
										var uf = $(this).val();
										$('#cidade').load('ajax.php?uf='+uf); 
									});
								</script>
							
							</div>

						</div>
					</div>
<br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-5">
							<label>CEP:</label><input type="text" class="form-control" name="cpf" placeholder="Ex.: 999.999.999-99 ">
						</div>
						<div class="col-md-5">	
							<label>Telefone:</label><input type="text" class="form-control" name="telefone" placeholder="Ex.: (99) 99999-9999" >	
						</div>	
					</div>	
<br>
					<div class="row">
						<div class="col-md-9"></div>
						<div class="col-md-2">
							<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button> <br>
						</div>
					</div>	
	
		</center>
	</div>
	</form>
	<?php

	if (isset($_POST['end'])) {
		$end = $_POST['end'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];

		$sql = "INSERT INTO tb_endereco_usuario VALUES (null,'1', '".$end."', '".$numero."', '".$complemento."', '".$bairro."', '".$estado."', '".$cidade."', '".$cpf."', '".$telefone."')";
		header('location:triagem.php');
		 	
		if (!$mysqli->query($sql)) {
			echo $mysqli->error;
		}
	}
	////if (isset($_SESSION['id_cadastro'])) {	
	///	$id = $_SESSION['id_cadastro'];
	///}
	//header('location:triagem.php');
	?>
</body>
</html>