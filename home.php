<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Usuario comum</title>
</head>
<body>
    <div class="container">
    <h2 class="display-4 mt-5">Produtos</h2>
    
    <?php
    require_once "conexao.php";
    $query_produtos = "SELECT id, nome, preço, descrição, imagem FROM produto";
    $resultado_produto = $pdo->prepare($query_produtos);
    $resultado_produto->execute();
    ?>
        <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php while ($row_produto = $resultado_produto->fetch(PDO::FETCH_ASSOC)){
        extract($row_produto);
        /*echo "<img src='img/$id/$imagem'><br>";
        echo "ID: $id<br>";
        echo "nome: $nome<br>";
        echo "preço: R$" .number_format($preço, 2, ",", ".")."<br>";
        echo "descrição: $descrição<br>";*/
    ?>
    <div class="col mb-4 text-center">
        <div class="card ">
            <img src='<?php echo "img/$id/$imagem";?>' class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $nome; ?></h5>
            <p class="card-text">R$<?php echo number_format($preço, 2, ",", "."); ?></p>
            <a href="#" class="btn btn-primary">Detalhes</a>
            </div>
        </div>
    </div>
    <?php } ?>
        </div>
    </div>
</body>
</html>