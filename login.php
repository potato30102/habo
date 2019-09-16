<meta charset="utf-8">
<!DOCTYPE html>
    <html>
        <?php  
            include('conexao.php');
        ?>
    <head>
    <title>Habo | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="    sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style_logar.css">
         <link rel = "shortcut icon" type = "imagem/x-icon" href = "IMG/icone.png"/>
    </head>

<body>
    <form  method="post" class="login">

    <div class="container">
        <div class="card card-container">
        <img  src="img/logosite.png" width="260" />
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="E-mail..." required autofocus><br>
                <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha..." required><br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button><br>
            </form>
        <center>
            <a href="esquecisenha.php" class="forgot-password">
                Esqueceu sua senha?
            </a><br><br>
            <a href="pagina_tipo_de_usuario.php" class="forgot-password">
               Novo por aqui?
            </a>
        </center>
        </div>
    </div>
    </form>

<?php
    session_start();
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM tb_usuario";
        $result = $mysqli->query($sql);
        
        if($result->num_rows>0){
            
            while ($row = $result->fetch_object()) {
                
                if ($email == $row->ds_email && $senha == $row->ds_senha) { 
                    $_SESSION['semail'] = $email;
                    $_SESSION['ssenha'] = $senha;
                    $_SESSION['id_usuario'] = $row->cd_usuario;
                    echo ('<script> alert("Login efetuado com sucesso!"); window.location.href="perfil_doador.php"; </script>');
                }else{
					echo ('<script> alert("Email ou senha não incorretos !"); </script>');
				}
			}
        }else{
            echo ('<script> alert("Nenhum email não cadastrado!"); </script>');
			echo $mysqli->error;
		}
	}

?>
</body>
</html>