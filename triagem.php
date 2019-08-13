<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>faça seu cadastro!!!</title>
</head>
	<?php
		include('conexao.php');
	?>
<body>
	<h3>Este formulário serve para o sistema ter uma base de suas informações pessoais, e a partir delas, calcular o período certo para você doar sangue. Não se preocupe, todas as informações são preveservadas, e apenas o sistema terá acesso a estes dados.</h3><!-- aqui vcs podem melhorar a explicação, mas o usuario precisa saber o pq ele está colocando essas informações -->

	<h4> Se você contraiu algum tipo de doença infecciosa por meio de relação sexual, que não seja hepatite B e C, AIDS, doença pelo vírus HTLV I e II e também Doença de Chagas, poderá doar sangue somente após um ano. Caso tenha passado por uma transfusão de sangue, deverá esperar por 12 meses, e doenças como apendicite, hérnia, amigdalectomia e varizes exigem que se deva passar 3 meses. Se eventualmente você estiver amamentando, o recomendado é que se deva aguardar no mínino 12 meses após o parto, e qualquer procedimneto endoscópico exige uma espera de 6 mesmes para realizar a doação. Se você não pertence a nenhum desses grupos, faça a triagem para que o sistema possa te indicar de maneira mais precisa quando você poderá realizar essa boa ação. Essa etapa é muito importante, e não se esqueça: doe mais, ame mais! </h4>
	<!-- Se vcs quiserem mudar alguma coisa do textinho, é com vcs(Ana/Batata) -->
	<form method="post">

		<label>Já doou sangue alguma vez?</label><p>
			<input type="radio" name="sim" value="true"><label>Sim</label>
			<input type="radio" name="nao" value="false"><label>Não</label></p>
			<!-- Se sim, pergunte qual foi a ultima doação. De acordo com a ultima data, veja qual pode ser a próxima doação -->

		<label>Contraiu hepatite B após seus 11 anos?</label><p>
			<input type="radio" name="sim1" value="true"><label>Sim</label>
			<input type="radio" name="nao1" value="false"><label>Não</label></p>
			<!-- Se sim, o usuario não poderá doar sangue. Esse é um requisito definitivo que o impede de doar -->

		<label>Você bebe frequentemente?</label><p>
			<input type="radio" name="sim2" value="true"><label>Sim</label>
			<input type="radio" name="nao2" value="false"><label>Não</latrue><p>
			<!-- O usuário não pode consumir bebidas alcoólicas nas 12 horas que entecedem a doação -->

		<label>Você fuma frequentemente?</label><p>
			<input type="radio" name="sim3" value="true"><label>Sim</label>
			<input type="radio" name="nao3" value="false"><label>Não</label><p>
			<!-- O usuáro só poderá doar depois de 30 dias sem ter fumado   -->

		<label>Contraiu alguma doença infecciosa?</label><p>
			<input type="radio" name="sim4" value="true"><label>Sim</label>
			<input type="radio" name="nao4" value="false"><label>Não</label></p>
			<!-- Se sim, faça um select com tipos de infecções possíveis para que o usuário indique qual doença contraiu. Dependendo da infecção, ele poderá doar sangue depois de um ano após tratamento. -->

		<label>Possui alguma tatuagem?</label><p>
			<input type="radio" name="sim5" value="true"><label>Sim</label>
			<input type="radio" name="nao5" value="false"><label>Não</label></p>
			<!-- Se sim, o usuário deverá esperar até 12 meses após efetuação da tatuagem -->

		<label>Está gestante?</label><p>
			<input type="radio" name="sim6" value="true"><label>Sim</label>
			<input type="radio" name="nao6" value="false"><label>Não</label></p>
			<!-- Se sim, a gestante deverá esperar até 90 dias após parto normal, ou 180 dias após cesariana -->

		<label>Já fez uso de drogas ilícitas?</label><p>
			<input type="radio" name="sim7" value="true"><label>Sim</label>
			<input type="radio" name="nao7" value="false"><label>Não</label></p>
			<!-- Drogas injetáveis impedem permanentemente o usuário de doar. Caso a droga seja consumida a partir do tabagismo ou de inalação, como maconha e cocaína, o usuário deverá esperar 30 dias para doar  -->

		<label>Se vacinou recentemente?</label><p>
			<input type="radio" name="sim8" value="true"><label>Sim</label>
			<input type="radio" name="nao8" value="false"><label>Não</label></p>
			<!-- Se sim, caso a vacina seja de gripe, o usuário deverá esperar por 2 dias para efetuar a doação. -->

		<label>Viajou recentemente?</label><p>
			<input type="radio" name="sim9" value="true"><label>Sim</label>
			<input type="radio" name="nao9" value="false"><label>Não</label></p>
			<!-- Se sim, pergunte qual região do país ou do mundo o usuário esteve, e pergunte se exitia ameaça de contrair doenças de risco no local visitado. Se existiu, o usuário deve esperar um ano para doar. Tem um comentário embaixo do HTML que fala de cada região do país e quanto tempo depois pode ser efetuada a doação  -->
		<label>Contraiu malária em algum momento da sua vida?</label><p>
			<input type="radio" name="sim10" value="true"><label>Sim</label>
			<input type="radio" name="nao10" value="false"><label>Não</label></p>
			<!-- Se sim, o usuário fica impedido permanentemente de realizar uma doação -->

		<label>Tipo Sanguineo</label>
		<select name="tiposanguineo">
			<?php  
				$sql = "SELECT * FROM tb_tiposanguineo";
				$result = $mysqli->query($sql);
				while($row = $result->fetch_object()){
					echo '<option value="'.$row->cd_tiposanguineo.'">'.$row->nm_tiposanguineo.'</option>';
				}
			?>
		</select><p>
		<button type="submit">Me cadastrar!</button>
	</form>
	<?php
		
	?>
</body>
</html>
 <!-- Brasil: estados como Acre, Amapá, Amazonas, Rondônia, Roraima, Maranhão, Mato Grosso, Pará e Tocantins são locais onde há alta prevalência de malária. Quem esteve nesses estados deve aguardar 12 meses para doar, após o retorno
EUA: quem esteve nesse país deve aguardar 30 dias para doar, após o retorno
Europa: quem morou na Europa após 1980, verificar aptidão para doação através do telefone 0800550300
Malária: quem esteve em países com alta prevalência de malária deve aguardar 12 meses após o retorno para doar. (Critério semelhante ao dos estados brasileiros com prevalência elevada de malária)
Febre Amarela: quem esteve em região onde há surto da doença deve aguardar 30 dias para doar, após o retorno
se tomou a vacina, deve aguardar 04 semanas
se contraiu a doença, deve aguardar 6 meses após recuperação completa (clínica e laboratorial). -->