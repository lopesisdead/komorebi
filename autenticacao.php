<?php
    require_once ('config.php');    

    if(isset($_POST['logar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = 
                "
                    select * from usuario where 
                    email_usuario = '{$email}'
                    and senha_usuario = '{$senha}'
                ";

        $resultado = mysqli_query($conn, $sql);
        $numLinha = mysqli_num_rows($resultado);

        if($numLinha > 0){

            $linha = mysqli_fetch_assoc($resultado);

            session_start();

            $_SESSION['id'] = $linha['id_usuario'];
            $_SESSION['nome'] = $linha['nome_usuario'];
            $_SESSION['tipousuario'] = $linha['tipousuario_id_tipousuario'];


            if($_SESSION['tipousuario'] == 1){
                $_SESSION['tipo_menu'] = 'menu_adm.php';
            } else if($_SESSION['tipousuario'] >= 2 and $_SESSION['tipousuario'] < 5){
                $_SESSION['tipo_menu'] = 'menu.php';
            } else{
                $_SESSION['tipo_menu'] = 'menu_NA.php';
            }

            $_SESSION['img'] = $linha['img_usuario'];
            $id_usuario = $_SESSION['id'];
            $sql = "select * from assinatura where usuario_id_usuario = '$id_usuario'";
            $resultado = mysqli_query($conn, $sql);
            $linha = mysqli_fetch_array($resultado);

            if(mysqli_num_rows($resultado) >= 1){
                $_SESSION['id_ass'] = $linha['id_ass'];
            } else{
                $_SESSION['id_ass'] = 0;
            }

            header("location: index2.php");
        } else {
            $mensagem = "Usuário/senha inválidos";
            header("location: login.php?mensagem_err={$mensagem}");
        }

    }

?>