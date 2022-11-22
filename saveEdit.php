<?php

    include_once('conexao.php');

    if(isset($_POST['update']))
    {   
        $id_serv = $_POST['id_serv'];
        $nome_pet = $_POST['nome_pet'];
        $raca_pet = $_POST['raca_pet'];
        $tipo_servico = $_POST['tipo_servico'];
        $data_serv = $_POST['data_serv'];

        $sqlInsert = "UPDATE servico SET nome_pet='$nome_pet',raca_pet='$raca_pet',tipo_servico='$tipo_servico',data_serv='$data_serv'
        WHERE id_serv=$id_serv";

        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: lista.php');

?>