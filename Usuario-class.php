<?php
class Usuarioadm{ 
    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM formulario WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['usuario'] = $dado['nome'];
            return true;
        }else{
            return false;
        }
    }   
}