
<?php 
$email = trim($_POST['email']);
$senha = addslashes($_POST['senha']);
if(empty($_POST['email']) && empty($_POST['senha'])){
    if(empty($email)){
        echo "Digite seu email";
    }else{
        echo "";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Pagina Login</title>
</head>
<body>
    <form class="form" action="logar.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img src="img/icone-user.png" class="img-user">
                <h2 class="painel"> Painel de Controle</h2>
                <p class="painel">Gerenciar seu negocio</p>
            </div>
            <div class="card-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email"><br>
            </div>
            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha"><br>
            </div>
            <div class="card-group">
                <label><input type="checkbox">Lembre-me ou <a href="cadastro.php">Cadastrar</a></label>
            </div>
            <div class="card-top">
                <button class="btn-enviar" name="acessar" type="submit"> Acessar </button>
            </div>
        </div>
    </form>
</body>
</html>