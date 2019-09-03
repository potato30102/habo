<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Endereço | Hospital</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<body>
	<?php
		include('conexao.php'); 
	 ?>
	<form method="post">
		Endereço:<input type="tex" name="endereco">
		Bairro:<input type="text" name="bairro">
		Número:<input type="text" name="numero">
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
		CEP:<input type="text" name="cep">
		<input type="submit" value="vaii">
	</form>
	<?php 
		if (isset($_POST['endereco'])) {
		 	$endereco = $_POST['endereco'];
		 	$bairro = $_POST['bairro'];
		 	$numero = $_POST['numero'];
		 	$estado = $_POST['estado'];
		 	$city = $_POST['cidade'];
		 	$cep = $_POST['cep'];

		 	$sql = "INSERT INTO tb_endereco_hospital VALUES (null,'1', '".$endereco."', '".$numero."', '".$bairro."', '".$estado."', '".$city."', '".$cep."')";
		 	
			if (!$mysqli->query($sql)) {
				echo $mysqli->error;
			} 
		 }
	 ?>
</body>
</html>