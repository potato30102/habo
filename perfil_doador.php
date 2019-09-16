<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>HABO | Perfil</title>
	<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="CSS/style_perfil.css">
             <link rel = "shortcut icon" type = "imagem/x-icon" href = "IMG/icone.png"/>
</head>
<body>
	<!-- Menu -->
		<?php
			//session_start();
			//if ((!isset($_SESSION['semail']) == true) and (!isset($_SESSION['ssenha']) == true)) {
			//	unset($_SESSION['semail']);
			//	unset($_SESSION['ssenha']);
			//	header("location:login.php");
			//}
	

			include('conexao.php'); 
			include('menu.php');
		?>
	<!-- FIm do menu -->
	
	<div id="endereco" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Dados de Endereço</h4>
				</div>
				<div class="modal-body">
					<?php
						$sql = "SELECT * FROM tb_endereco_usuario WHERE id_usuario = 1";
						if ($result = $mysqli->query($sql)){
							if($result->num_rows>=0){
								while($row = $result->fetch_object()){
									echo '<b>Endereço:</b>'.$row->ds_enedereco.'<br><br>
										<b>Número:</b>'.$row->ds_numero.'<br><br>
										<b>Complemento:</b>'.$row->ds_complemento.'<br><br>
										<b>Bairro:</b>'.$row->nm_bairro.'<br><br>
										<b>CEP:</b>'.$row->ds_cep.'<br><br>
										<b>Telefone:</b>'.$row->ds_telefone.'<br><br>';
								}
							}
						}

						$sql = "SELECT * FROM tb_estado, tb_endereco_usuario, tb_usuario WHERE tb_estado.cd_estado = tb_endereco_usuario.id_estado = tb_endereco_usuario.id_usuario";
																				
						if ($result = $mysqli->query($sql)){
							if($result->num_rows>=0){
								while($row = $result->fetch_object()){
									echo '<b>Estado:</b>'.$row->nm_estado.'<br><br>';
								}
							}
						}

						$sql = "SELECT * FROM tb_cidade, tb_endereco_usuario, tb_usuario WHERE tb_cidade.cd_cidade = tb_endereco_usuario.id_cidade = tb_endereco_usuario.id_usuario";
																				
						if ($result = $mysqli->query($sql)){
							if($result->num_rows>=0){
								while($row = $result->fetch_object()){
									echo '<b>Cidade:</b>'.$row->nm_cidade.'<br><br>';
								}
							}
						}
					?>
	   			</div>
				<div class="modal-footer">
		        	<a href="editar_endereco_usuario.php"> <button type="button" class="btn btn-default" >Editar dados</button></a>
		        </div>	
		    </div>
														      
		</div>
	</div>

	<div id="triagem" class="modal fade" role="dialog">
 		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Dados da Triagem</h4>
				</div>
				<div class="modal-body">

					<?php															
						$sql = "SELECT * FROM tb_triagem WHERE id_usuario = 1";
																					
						if ($result = $mysqli->query($sql)){
							if($result->num_rows>=0){
								while($row = $result->fetch_object()){
								echo '<b>Já Doou:</b>'.$row->ds_doacao.'<br><br>
								<b>Quando:</b>'.$row->dt_ultimadoacao.'<br><br>
								<b>Você bebeu nas últimas 12 horas ?:</b>'.$row->ds_fuma.'<br><br>
								<b>Você fuma nos últimos 30 dias ?:</b>'.$row->ds_bebe.'<br><br>
								<b>Possui tatuagem?:</b>'.$row->ds_tatuagem.'<br><br>
								<b>Está gestante?:</b>'.$row->ds_gestante.'<br><br>
								<b>Viajou recentemente?:</b>'.$row->ds_viagem.'<br><br>
								<b>Se vacinou contra a gripe recentemente ?:</b>'.$row->ds_vacina.'<br><br>
								<b>Já fez uso de drogas ilícitas ?:</b>'.$row->ds_drogas.'<br><br>
								<b>Contraiu hepatite B após seus 11 anos ?:</b>'.$row->ds_doencac.'<br><br>
								<b>Contraiu malária em algum momento da sua vida ?:</b>'.$row->ds_malaria.'<br><br>';
								}
							}
						}

						$sql = "SELECT * FROM tb_orientacao, tb_triagem, tb_usuario WHERE tb_orientacao.cd_orientacao = tb_triagem.id_orientacao ";
																					
						if ($result = $mysqli->query($sql)){
							if($result->num_rows>=0){
								while($row = $result->fetch_object()){
									echo '<b>Orientação sexual:</b>'.$row->nm_orientacao.'<br><br>';
								}
							}
						}
					?>
				</div>
    			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Editar dados</button>
				</div>
			</div>      
    	</div>
  	</div>

</body>
</html>