<?php

    require_once 'database/config.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $invalid_msg = $_REQUEST['invalid_msg'];   
    }
    
    if(trim($username) != "" && trim($email) != "" && trim($password) != ""){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = 'INSERT INTO cl202247.EcoMomentBD_UsuarioWeb (nomeWeb, emailWeb, senhaWeb) values (?, ?, ?)';
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $username, $email, $password);  // Bind the parameters to the parameter markers
    
            if($stmt->execute()){
                echo 'Usuario cadastrado com sucesso';
            }else{
                echo 'ERRO: '. $sql. '<br>'. $conn->error;
            }
    
            $stmt->close();
        }
    }else{
        $invalid_msg = 'Preencha todos os campos corretamente!';
    }
   
    $conn->close();