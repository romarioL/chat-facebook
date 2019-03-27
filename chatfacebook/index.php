<?php 
session_start();
include_once "config.php";
require_once('classes/BD.class.php');
BD::conn();

?>

<html>
  <head>
  	<title>Entre no chat</title>
  </head>
  <style type="text/css">
  	* {
  		margin: 0;
  		padding: 0;
  	}

  	body {
  		background: #f4f4f4;
  	}

  	div#formulario {
  		width: 500px;
  		padding: 5px;
  		height: 100px;
  		background: #fff;
  		border: 1px solid #333;
  		position: absolute;
  		left: 50%;
  		top: 50%;
  		margin-left: -250px;
  		margin-top: -50px;
  	}

  	div#formulario span {
  		font: 18px "Trebuchet MS", tahoma, arial;
  		color: #036;
  		float: left;
  		width: 100%;
  		margin-bottom: 10px;
  	}

  	div#formulario input[type=text] {
        padding: 5px;
        width: 490px;
        border: 1px solid #ccc;
        outline: none;
        font: 16px, tahoma, arial;
        color: #666;
  	}

  		div#formulario input[type=text]:focus {
  			border-color: #036;
  		}

  		div#formulario input[type=submit] {
  			padding: 4px;
  			background: #069;
  			font: 15px tahoma, arial;
  			color: #fff;
  			border: 1px solid #036;
  			float: left;
  			margin-top: 5px;
  			text-align: center;
  			width: 95px;
  			text-shadow: #000 0 1px 0;
  		}

  		div#formulario input[type=submit]:hover {
  			cursor: pointer;
  			background: #09f;
  		}
  </style>
  <body>

    <?php if(isset($_POST['acao']) && $_POST['acao']) {
        $email = strip_tags(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        echo $email;
        

        if($email == '') {

        }else {
         $pegar_user = BD::conn()->prepare("SELECT id FROM `usuarios` WHERE email = ?");
         $pegar_user->execute(array($email));

          if($pegar_user->rowCount() == 0) {
            var_dump($pegar_user->rowCount());
            echo '<script>alert("Usuário não encontrado")</script>';
          }else {
            $fetch = $pegar_user->fetchObject();
            $_SESSION['id_user'] = $fetch->id;
            echo '<script>alert("Usuário logado"); location.href="chat.php";</script>';
          }
        }

       
    } ?>
  	<div id="formulario">
  		<span>Digite seu email</span>
  		<form action="" method="post" enctype="multipart/form-data">
  				<input type="text" name="email">
  				<input type="hidden" name="acao" value="logar">
  				<input type="submit" value="Logar">
  		</form>
  	</div>
  </body>
</html>