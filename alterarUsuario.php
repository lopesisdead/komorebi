<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }

    $id_get = $_GET['id_usuario'];
  
    require_once('verificaAut_adm.php');
    require_once($_SESSION['tipo_menu']);

    if(isset($_POST['alterar'])){
        if(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['nome_usuario']))){
            $usuario_err = "Nome pode conter apenas letras, números e underlines! <br>";
        } else{
            $usuario = ($_POST['nome_usuario']);
        }
        
        if($_POST['datanasc_usuario'] < date("Y/m/d", strtotime(" - 100 years")) or $_POST['datanasc_usuario'] > date("Y/m/d")){
            $datanasc_err = "Data inválida";
        } else{
            $datanasc = $_POST['datanasc_usuario'];
        }

        $tipoUsu = $_POST['tipoUsu'];

        if(empty($usuario_err) and empty($datanasc_err)){
            $email = $_POST['email_usuario'];
            $telefone = $_POST['telefone_usuario'];
            $tipoUsu = $_POST['tipoUsu'];
            $sql = "update usuario
            set nome_usuario = '{$usuario}',
                email_usuario = '{$email}',
                telefone_usuario = '{$telefone}',
                tipousuario_id_tipousuario = '{$tipoUsu}',
                datanasc_usuario = '{$datanasc}'
                where id_usuario = {$id_get}";
            mysqli_query($conn, $sql);

            $mensagem = "Usuário(a) alterado(a) com sucesso";
            header("location: alterarUsuario.php?id_usuario={$id_get}&mensagem_suc={$mensagem}");

        } else{
            if(isset($usuario_err)){
                $erro .= $usuario_err;
            }
            if(isset($datanasc_err)){
                $erro .= $datanasc_err;
            }

            header("location: alterarUsuario.php?id_usuario={$id_get}&mensagem_err={$erro}");
        }
    } else if(isset($_POST['voltar'])){
        header("location: listarUsuario.php");
    }

    $sql = "select * from usuario where id_usuario = {$id_get}";
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css.css">

    <style>
        form{
            color: black;
        }
    </style>

</head>
<body>

    <div class="container">
        
            <?php
                if(isset($_GET['mensagem_suc'])){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['mensagem_suc']?>
                    </div>
                <?php
                } else if(isset($_GET['mensagem_err'])){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['mensagem_err']?>
                    </div>
                <?php
                    }
            ?>

        <br>

        <form method="post">     
            <div class="modal modal-signin position-static d-block" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Alterar usuário</h1>
                </div>

                <div class="modal-body p-5 pt-0">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['nome_usuario'] ?>" 
                        name="nome_usuario" placeholder="Nome do usuário" id="floatingInput" required>
                        <label for="floatingInput">Nome do usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['datanasc_usuario'] ?>" 
                        name="datanasc_usuario" placeholder="Data de nascimento do usuário" id="floatingInput" required>
                        <label for="floatingInput">Data de nascimento do usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['telefone_usuario'] ?>" 
                        name="telefone_usuario" placeholder="Número de telefone do usuário" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" id="floatingInput" required>
                        <label for="floatingInput">Número de telefone do usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['email_usuario'] ?>" 
                        name="email_usuario" placeholder="E-mail do usuário" id="floatingInput" required>
                        <label for="floatingInput">E-mail do usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['cpf_usuario'] ?>" 
                        name="cpf_usuario" placeholder="CPF do usuário" id="floatingInput" disabled readonly>
                        <label for="floatingInput">CPF do usuário (não pode ser alterado)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="tipoUsu">
                            <?php
                                $sql = "select * from tipousuario order by descricao";
                                $resultado_usu = mysqli_query($conn, $sql);

                                while($linhaTU = mysqli_fetch_array($resultado_usu)){
                                    $id = $linhaTU['id_tipousuario'];
                                    $descricao = $linhaTU['descricao'];

                                    $selected = ($id == $linha['tipousuario_id_tipousuario'])  ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$descricao}</option>";
                                }
                            ?>
                        </select>
                        <label for="floatingSelect">Tipo de usuário</label>
                    </div>


                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="w-100 mt-3 btn btn-lg" name="alterar" type="submit"><i class="fa-solid fa-right-to-bracket"></i>Alterar</button>
                    <button class="w-100 mt-3 btn btn-lg" name="voltar" type="submit"><i class="fa-solid fa-right-to-bracket"></i>Voltar</button>
                </div>
                
                </div>
            </div>
            </div>
        </form>

    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>