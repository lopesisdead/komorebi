<?php
require_once('config.php');

if(!isset($_SESSION)){
    session_start();
}

date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['adicionar'])){
        $id_usuario = $_SESSION['id'];
        $id_jogo = $_POST['jogo'];
        $sql_jogo = "select * from jogo where id_jogo = '$id_jogo'";
        $resultado_jogo = mysqli_query($conn, $sql_jogo);
        $linha_jogo = mysqli_fetch_array($resultado_jogo);
        $nome_jogo = $linha_jogo['nome_jogo'];
        $sql = "select * from assinatura where usuario_id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_array($resultado);
        $id_ass = $linha['id_ass'];
        $data = date("Y/m/d");
    
        $sql = "insert into assinatura_has_jogo(assinatura_id_ass, jogo_id_jogo, data_ass_jogo)
                values('{$id_ass}', '{$id_jogo}', '{$data}')";
        mysqli_query($conn, $sql);

        $mensagem = "Jogo foi adicionado à sua biblioteca com sucesso";
        header("location: produto.php?jogo={$nome_jogo}&mensagem_suc={$mensagem}");
    
}