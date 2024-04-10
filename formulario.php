<?php 

$servidor = "localhost";
$username = "root";
$usersenha = "";
$database = "cadastro";

//Criar conexão com bando de dados

$conexao = new mysqli($servidor, $username, $usersenha, $database);

//Verificar conexão

if($conexao->connect_error){
    die("Erro na conexão" . $conexao->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['cadastrar'])) {
        //Cadastro de novo usuário
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO clientes (email, senha) VALUES ('$email', '$senha')";
        
        if($conexao->query($sql) === TRUE) {
            echo "USUÁRIO CADASTRADO COM SUCESSO!";
        }else{
            echo "ERRO AO CADASTRAR" . $conexao->error;
        }
            

        }



    }






?>