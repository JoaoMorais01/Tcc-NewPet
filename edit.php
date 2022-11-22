<?php

    include_once('conexao.php');
    if(!empty($_GET['id_serv']))
    {


        

        $id_serv = $_GET['id_serv'];

        $sqlSelect = "SELECT * FROM servico WHERE id_serv=$id_serv";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome_pet = $user_data['nome_pet'];
                $raca_pet = $user_data['raca_pet'];
                $tipo_servico = $user_data['tipo_servico'];
                $data_serv = $user_data['data_serv'];
            }
            
        }
        else
        {
            header('Location: lista.php');
        }
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
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
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
        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
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
                    <li><a href="index.html">Sobre NewPet</a></li>
                    <li><a href="index.html">Unidades</a></li>
                    <li><a href="index.html">Contato</a></li>
                    <li><a href="lista.php">Voltar para a lista</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>
    <br><br><br><br><br>
    

    <div class="box">
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend><b>Serviço Petshop</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_pet" id="nome_pet" class="inputUser" value="<?php echo $nome_pet;?>" required>
                    <label for="nome_pet" class="labelInput">Nome do Pet</label>
                </div>
                <br><br>
                <div class="inputBox">
                <input type="text" name="raca_pet" id="raca_pet" class="inputUser" value="<?php echo $raca_pet;?>" required>
                <label for="raca_pet" class="labelInput">Raça</label>
                </div>
                <br>
                <p>Tipo de Serviço:</p>
                <input type="radio" id="Banho" name="tipo_servico" value="Banho" <?php echo$tipo_servico == 'Banho' ? 'checked' : '' ?> required>
                <label for="Banho">Banho</label>
                <br>
                <input type="radio" id="Tosa" name="tipo_servico" value="Tosa" <?php echo$tipo_servico == 'Tosa' ? 'checked' : '' ?> required>
                <label for="Tosa">Tosa</label>
                <br>
                <input type="radio" id="Consulta" name="tipo_servico" value="Consulta" <?php echo$tipo_servico == 'Consulta' ? 'checked' : '' ?> required>
                <label for="Consulta">Consulta</label>
                <br><br>
                <label for="data_serv"><b>Data do Serviço:</b></label>
                <input type="date" name="data_serv" id="data_serv" value="<?php echo $data_serv ?>" required>
                <br><br><br>
                <input type="hidden" name="id_serv" value=<?php echo $id_serv;?>>
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
</body>
</html>