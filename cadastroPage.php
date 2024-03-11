<?php
/* session_start();

require 'database/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

    $sql = "SELECT * FROM cl202247.EcoMomentBD_UsuarioWeb WHERE NomeWeb = ? AND EmailWeb = ?";  //Verificar se o utilizador existe

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',$username, $email);  // Bind the parameters with variable
    $stmt->execute();   // Execute the prepared statement

    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $row - $result->fetch_assoc();

        if (password_verify( $password , $row["senhaWeb"])) {
            $_SESSION["loggedin"] = true;

            header('Location: logado.php');
            exit;
    }
}
else{
    $error = 'Usuario ou senha incorretos';
} CODIGO DE LOGIN */
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


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Page</title>
    <link rel="stylesheet" href="styleCadastro/cadastro-page.css">
    <link rel="stylesheet" href="styleCadastro/mediaQuery.css">
    <link rel="stylesheet" href="https://use.typekit.net/xhc2seb.css">
    


    <style>
        .circeR{
            font-family: "circe", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .circeB{
            font-family: "circe", sans-serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>
</head>
<body>


    
<div class="container">

<!---------------------------------------- Começo da form-image --------------------------------------------------->
        
        <div class="form-image">

            <div class="header">
                <div class="title">
                    <h1 id="bv" class="circeB t1">CHEGOU O MOMENTO DE <br> AJUDAR O MUNDO</h1>
                </div>
            </div>

            <div class="image">
                <img id="ip" src="mídia/imgCadastro.png" alt="">
            </div>
            
            <div class="logo">
                <img src="mídia/EcoMomenticon.ico" alt="">
            </div>
        </div>
        
<!---------------------------------------- Fim da form-image --------------------------------------------------->


<!----------------------------------------Começo da form dos inputs --------------------------------------------------->

        <div class="form">

                <div class="form-header">
                    <div class="bvf logo">
                        <img src="mídia/EcoMomenticon.ico" alt="">
                    </div>
                    <div class="title2">
                        <h1 class="circeB t2">CADASTRE-SE</h1>
                    </div>
                </div>

                <form method="post" action="logado.php">
                    <div class="input-group">

                        <div class="input-box">
                            <label class="lbl circeB" for="username">Nome de usuário:</label>
                            <div class="InputContainer">
                                <label for="username" class="labelforsearch">
                                    <img id="icon" src="mídia/do-utilizador.png" alt="">
                                </label>
                                <input type="text" name="username" class="input" id="username">
                            <div class="border"></div>
                            <button class="micButton">
                                <img id="icon" src="midias/danger.png" alt="">
                            </button>
                            </div>
                        </div>

                        <div class="input-box">
                            <label class="lbl circeB" for="email">E-mail:</label>
                            <div class="InputContainer">
                                <label for="email" class="labelforsearch">
                                    <img id="icon" src="mídia/email.png" alt="">
                                </label>
                                <input type="text" name="email" class="input" id="email">
                            <div class="border"></div>
                            <button class="micButton">
                                <img id="icon" src="midias/danger.png" alt="">
                            </button>
                            </div>
                        </div>

                        <div class="input-box">
                            <label class="lbl circeB" for="password">Senha:</label>
                            <div class="InputContainer">
                                <label for="password" class="labelforsearch">
                                    <img id="icon" src="mídia/padlock.png" alt="">
                                </label>
                                <input type="password" name="password" class="input" id="password">
                              <div class="border"></div>
                              <button class="micButton">
                                <img id="icon" src="midias/danger.png" alt="">
                              </button>
                              </div>
                        </div>

                    </div>

                    <div class="btn-entrar">
                        <button class="button" type="submit">CADASTRAR</button>
                    </div>

                    <div>
                        <p id="or" class="circeB">ou</p>
                    </div>

                    <div class="btn-google">
                        <button class="buton circeB" id="b2">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262">
                            <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                            <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                            <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                            <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
                          </svg>
                            Continuar com o Google
                          </button>
                    </div>
                      
                </form>
                <div class="footer">
                </div>
                <div class="footer-image">
                    <img class="logo2" src="mídia/reciclagem-icone.png" alt="">
                </div>
        </div>

<!---------------------------------------------- Fim da form dos inputs --------------------------------------------->
    
    </div>
</body>
</html>