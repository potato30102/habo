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
<style type="text/css">


body, html {
    height: 100%;
    background-repeat: no-repeat;

}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;
    }

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
   	border: 1px solid lightgray;
  	 /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 10%;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: #b32c1d;
    background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
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

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #D13321;
}
</style>
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