<?php

if(isset($_POST['submit']))
{


 include_once('conexao.php');

 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $data = $_POST['data'];
 $endereco = $_POST['endereco'];
 $senha = $_POST['senha'];

 $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,email,telefone,data_nasc,endereco,senha)
 VALUES ('$nome','$email','$telefone','$data','$endereco','$senha')");
 
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>PetShop NewPet</title>      
    <!-- MATERIALIZE CSS -->		
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="custom.css">  
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(192,192,192), rgb(0,0,0));
        }
        .box{
            color: white;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid rgb(255, 255, 255);
        }
        legend{
            border: 1px solid rgb(255, 30, 30);
            padding: 10px;
            text-align: center;
            background-color: rgb(255, 30, 30);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(255, 30, 30);
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(255, 0, 0), rgb(255, 238, 0));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(172, 0, 0), rgb(243, 229, 38));
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar-fixed">
        <nav class="navbar z-depth-0">
            <div class="nav-wrapper container">
                <h1 class="logo_text">Petshop - Espaço para o seu amigo</h1>
                <a href="index.html"><img class="logo_img" src="img/logo.png" alt="Petshop"></a>
                <ul class="right light hide-on-med-and-down">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html">Sobre NewPet</a></li>
                    <li><a href="index.html">Unidades</a></li>
                    <li><a href="index.html">Contato</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>
    <div class="box">
        <form action="cadastro.php" method="post">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <label for="data"><b>Data de Nascimento:</b></label>
                <input type="date" name="data" id="data" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>