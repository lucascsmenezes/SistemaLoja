<?php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require_once 'conexao.php';
    require_once 'Usuario-class.php';
    $erros = array();
    $u = new Usuario();
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $nivel = "Comum";

    if($u->login($email, $senha, $nivel) == true);
        if(isset($_SESSION['usuario'])){
            header('index.php');
        }else{
            header('Location: login.php');
        }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logar.css">
    <title>Pagina Logar</title>
</head>
<body>
<form class="form-logar" action="" method="POST">
    <div class="card-log">
        <div class="card-top-log">
            <h1 class="title">Acessar o sistema</h1>
            <h2> Seja bem vindo! </h2>
        </div>
    <div class="card-bottom">
        <button class="btn-logar" type="submit"> Acessar </button>
    </div>
</div>
</form>
</body>
</html>

