<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro do endereço do doador</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
	include('conexao.php');
 ?>
<body>
	
	<form method="post" class="enderecodoador">
		<label>Endereço:</label><input type="text" name="end">
		<label>Bairro:</label><input type="text" name="bairro">
		<label>Número:</label><input type="text" name="number">
		<label>Complemento:</label><input type="text" name="complemento">
		Estado:<select class="estado" name="estado">
			<?php
				$sql = "SELECT * FROM tb_estado order by nm_estado";
				$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					echo '<option  value="'.$row->cd_estado.'" name="'.$row->nm_estado.'">'.$row->nm_estado.'</option>';
				}
			?>
		</select>
			<div id="city">
			
				<script type="text/javascript">
					$(document).on('change','.estado', function(){
						var uf = $(this).val();
						$('#city').load('ajax.php?uf='+uf); 
					});
				</script>
			
			</div>
		<label>CEP:</label><input type="text" name="cpf">
		<label>Telefone:</label><input type="text" name="telefone">	
		<input type="submit" value="vaii">
	</form>
	<?php

	if (isset($_POST['end'])) {
		 	$end = $_POST['end'];
		 	$bairro = $_POST['bairro'];
		 	$number = $_POST['number'];
		 	$complemento = $_POST['complemento'];
		 	$estado = $_POST['estado'];
		 	$city = $_POST['cidade'];
		 	$cpf = $_POST['cpf'];
		 	$telefone = $_POST['telefone'];


		 	$sql = "INSERT INTO tb_endereco_usuario VALUES (null,'1', '".$end."', '".$number."', '".$complemento."', '".$bairro."', '".$estado."', '".$city."', '".$cpf."', '".$telefone."')";
		 	
			if (!$mysqli->query($sql)) {
				echo $mysqli->error;
			} 
		 }
	 ?>
</body>
</html>