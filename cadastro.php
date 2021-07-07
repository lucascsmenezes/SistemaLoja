<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Pagina de Cadastro</title>
</head>
<body class="background">
<?php 
require_once 'conexao.php';
if(isset($_POST['btn-env'])){
$erros = array();
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = addslashes($_POST['senha']);
$nivel = "Comum";
}
    if(empty($nome) || empty($email) || empty($senha) || empty($nivel)){
        if(!empty($nome)){
            echo "";
        }else{
            echo "Digite seu nome!";
        }
        if(empty($email)){
            echo "";
        }else{
            echo "Digite seu email";
        }
        if(empty($senha)){
            echo "";
        }else{
            echo "Digite sua senha";
        }
    }else{
    $sql = "INSERT INTO formulario (senha, nome, email, nivel) VALUES (:senha, :nome, :email, :nivel)";
    $query = $pdo->prepare($sql);
    $query->bindparam("senha", $senha);
    $query->bindparam("nome", $nome);
    $query->bindparam("email", $email);
    $query->bindparam("nivel", $nivel);
    $query->execute();
    echo "<font color='green'>Dados adicionados com sucesso.";
    echo "<br/><a href='index.php'>Voltar</a>";
}  
?>  
<?php 
if(isset($erros)):
    foreach ($erros as $erro):
        echo $erro;
    endforeach;
endif;
?>
    <form class="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-top">
                <img src="img/icone-user.png" class="img-user">
                <p class="painel">Cadastre-se Grátis</p>
            </div>
            <div class="card-group-cad">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu nome"><br>
            </div>
            <div class="card-group-cad">
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email"><br>
            </div>
            <div class="card-group-cad">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha"><br>
            </div>
            <div class="card-top-cad">
                <button class="btn-enviar" name="btn-env" type="submit"> Cadastrar</button>
            </div>
        </div>
    </form>
</body>
</html>