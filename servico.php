<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];


    if(isset($_POST['submit']))
    {


 include_once('conexao.php');

 $nome_pet = $_POST['nome_pet'];
 $raca_pet = $_POST['raca_pet'];
 $tipo_servico = $_POST['tipo_servico'];
 $data_serv = $_POST['data_serv'];

 

 $result = mysqli_query($conexao, "INSERT INTO servico(nome_pet,raca_pet,tipo_servico,data_serv)
 VALUES ('$nome_pet','$raca_pet','$tipo_servico','$data_serv')");
 
 header('Location: index.html');
    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="custom.css"> 
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(169,169,169), rgb(139,0,0));
        }
        .box{
            color: white;
            position: absolute;
            top: 57%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
            
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
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
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
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
                    <li><?php echo"| Logado como: <b>$logado</b> |" ?></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>
    <br><br><br><br><br>
    
    <div class="box">
        <form action="servico.php" method="post">
            <fieldset>
                <legend><b>Serviço Petshop</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_pet" id="nome_pet" class="inputUser" required>
                    <label for="nome_pet" class="labelInput">Nome do Pet</label>
                </div>
                <br><br>
                <div class="inputBox">
                <input type="text" name="raca_pet" id="raca_pet" class="inputUser" required>
                <label for="raca_pet" class="labelInput">Raça</label>
                </div>
                <br>
                <p>Tipo de Serviço:</p>
                <input type="radio" id="Banho" name="tipo_servico" value="Banho" required>
                <label for="Banho">Banho</label>
                <br>
                <input type="radio" id="Tosa" name="tipo_servico" value="Tosa" required>
                <label for="Tosa">Tosa</label>
                <br>
                <input type="radio" id="Consulta" name="tipo_servico" value="Consulta" required>
                <label for="Consulta">Consulta</label>
                <br><br>
                <label for="data_serv"><b>Data do Serviço:</b></label>
                <input type="date" name="data_serv" id="data_serv" required>
                <br><br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>