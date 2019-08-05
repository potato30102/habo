<meta charset="utf-8">
<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
	<title>HABO| Login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="style/estilologin.css">
<body>
	<form  method="post" class="login">

	<div class="container">
        <div class="card card-container">
            <!-- logologo -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="E-mail..." required autofocus>
                <br>
                <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha..." required>
                <br>
                               <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                               <br>
            </form>
        <center>
            <a href="#" class="forgot-password">
                Esqueceu sua senha?
            </a><br><br>
            <a href="cadastrouser.php" class="forgot-password">
               Novo por aqui?
            </a>
        </center>
        </div>
    </div>
	</form>

<?php

$mysqli = mysqli_connect('localhost','root','usbw','db_bancodesangue') or die('Erro ao conectar ao banco de dados');
				mysqli_set_charset($mysqli,"utf8");

	
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = "select * from tb_usuario where ds_email = '".$email."' and ds_senha = '".$senha."'";
				if($result = $mysqli->query($sql)){
					if($result->num_rows>0){
			 			session_start();
			 			$_SESSION['semail'] = $_POST['email'];
			 			$_SESSION['ssenha'] = $_POST['senha'];

			 			echo ('<script> alert("Login efetuado com sucesso!"); window.location.href="branco.php"; </script>');
					}
				    else{
						echo ('<script> alert("Erro ao tentar efetuar login!"); </script>');
					}
				} else{
					echo $mysqli->error;
				}
	}

?>
</body>
</html>