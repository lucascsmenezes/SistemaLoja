<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <scrip src="https://kit.fontawesome.com/4c2ba0eb02.js" crossorigin="anonymous" defer></scrip>
  <script src="usuario.js" defer></script>
    <title>Pagina Usuario</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">Administração</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF'];?>">Usuarios</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Perfil
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
include_once 'conexao.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['adicionar'])){
    $query_usuario = "INSERT INTO formulario (senha, nome, email, nivel) VALUES (:senha, :nome, :email, :nivel)";
    $cad_usuario = $pdo->prepare($query_usuario);
    $cad_usuario->bindValue(':senha', md5($dados['senha']));
    $cad_usuario->bindValue(':nome', trim($dados['nome'])); 
    $cad_usuario->bindValue(':email', trim($dados['email']));
    $cad_usuario->bindValue(':nivel', trim($dados['nivel'])); 
    $cad_usuario->execute();
    if($cad_usuario->rowCount()){
      echo "<p style='margin: 15px; color: blue;'>Usuario cadastrado com sucesso</p>";
    }else{
      echo "<p style='margin: 15px; color:red;'>Erro: Usuario não cadastrado com sucesso</p>";
    }
}
?>

<?php
  // Adicionar usuario
  $sql = $pdo->prepare("SELECT * FROM formulario");
  $sql->execute();
  $sql = $sql->fetchAll();

  // Deletar Usuario
  if(isset($_GET['excluir'])){
    $excluir = $pdo->prepare("DELETE FROM formulario WHERE id = ?");
    $id = (int) $_GET['excluir'];
    $excluir->execute([$id]);
    header('Location: usuario.php');
    die();
  }

  //Editar Usuario
  if(isset($_POST['editar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    $editar = $pdo->prepare("UPDATE formulario SET nome = ?, email = ?, senha = ?, nivel = ? WHERE id = ?");
    $editar->execute([$nome, $email, $senha, $nivel]);
}
?>
<div class="container-fluid mt-3">
  <form action="" method="POST">
    <input type="text" name="nome" placeholder="Nome" require> 
    <input type="email" name="email" placeholder="Email" require>
    <input type="password" name="senha" placeholder="senha" require>
      <select name="nivel" require>
        <option value="Admin">Admin</option>
        <option value="Comum">Comum</option>
      </select>
      <input class="btn btn-primary" name="adicionar" type="submit" role="button"></input>
  </form>  
</div>

<div class="table-responsive container-fluid mt-3">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Senha</th>
        <th scope="col">Nivel</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <?php
      foreach ($sql as $key => $value) {
    ?>
    <tbody>
      <tr>
        <th scope="col"><?php echo trim($value['id']);?></th>
        <td name="nome"><?php echo trim($value['nome']);?></td>
        <td name="email"><?php echo trim($value['email']);?></td>
        <td name="senha"><?php echo md5($value['senha']);?></td>
        <td name="nivel"><?php echo trim($value['nivel']);?></td>
        <td><a href="editar.php?editar=<?php echo $value['id']; ?>" name="editar"><i class="fas fa-pencil-alt" style="color:#1E90FF"></i></a></td>
        <td><a href="?excluir=<?php echo $value['id'];?>" name="excluir"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
      </tr>
      <?php
            }   
        ?>
    </tbody>
  </table>
</div>

</body>
</html>
