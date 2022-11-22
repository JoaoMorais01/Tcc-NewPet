<?php
    if(!empty($_GET['id_serv']))
    {
        include_once('conexao.php');

        $id_serv = $_GET['id_serv'];

        $sqlSelect = "SELECT * FROM servico WHERE id_serv=$id_serv";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM servico WHERE id_serv=$id_serv";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: lista.php');
?>