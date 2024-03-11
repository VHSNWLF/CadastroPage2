<?php

    require_once 'database/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
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
    $conn->close();