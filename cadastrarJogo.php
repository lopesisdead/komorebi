<?php
    require_once ('config.php');
    $erro = "";

    if(!isset($_SESSION)){
        session_start();
    }
        
    require_once ('verificaAut_adm.php');
    require_once ($_SESSION['tipo_menu']);

    if(isset($_POST['cadastrar'])){

        $teste_jogo = $_POST['nome_jogo'];
        $sql = "select id_jogo from jogo where nome_jogo = '$teste_jogo'";
        $resultado = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultado) >= 1){
            $nome_err = "Já existe um jogo com esse nome! <br>";
        } else{
            $nome_jogo = $_POST['nome_jogo'];
        }

        if($_POST['data_jogo'] < date("Y/m/d", strtotime(" - 30 years")) or $_POST['data_jogo'] > date("Y/m/d")){
            $data_jogo_err = "Data inválida! <br>";
        } else{
            $data_jogo = $_POST['data_jogo'];
        }

        $diretorio = "imagensJogo/";
        $arquivoPath = $diretorio . $_FILES['img_jogo']['name'];
        
        if(move_uploaded_file($_FILES['img_jogo']['tmp_name'], $arquivoPath) and empty($nome_err) and empty($data_jogo_err)){
            $desc_jogo = $_POST['desc_jogo'];
            $genero = $_POST['genero'];
            $desenvolvedora = $_POST['desenvolvedora'];
            $distribuidora = $_POST['distribuidora'];


            $sql = "insert into jogo (nome_jogo, datalanc_jogo, img_jogo, desc_jogo, genero_id_gen, distribuidora_id_dist, desenvolvedora_id_desenv)
                values('{$nome_jogo}', '{$data_jogo}', '{$arquivoPath}', '{$desc_jogo}', '{$genero}', '{$distribuidora}', '{$desenvolvedora}')";


            mysqli_query($conn, $sql);
            $mensagem = "Jogo cadastrado com sucesso!";
            header("location: cadastrarJogo.php?mensagem_suc={$mensagem}");

        } else{
            if(isset($nome_err)){
                $erro .= $nome_err;
            }
            if(isset($data_jogo_err)){
                $erro .= $data_jogo_err;
            }
            trim($erro);
            header("location: cadastrarJogo.php?mensagem_err={$erro}");
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar jogo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

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


        <br><br><br>
        <form method="post" enctype="multipart/form-data">

        <div class="modal modal-signin position-static d-block" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Cadastrar jogo</h1>
                </div>

                <div class="modal-body p-5 pt-0">
                    <input type="hidden" name="id_jogo" value="<?= $linha['id_jogo']?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0"
                        name="nome_jogo" id="floatingInput" placeholder="Nome do jogo" required>
                        <label for="floatingInput">Nome do jogo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control border-top-0 border-end-0 border-start-0"
                        name="data_jogo" id="floatingInput" required>
                        <label for="floatingInput">Data de lançamento do jogo</label>
                    </div>


                <label for="floatingInput">Imagem do jogo</label>
                <div class="input-group my-3">
                    <span class="input-group-text border-0" id="imagem1"></span>
                    <input style="text-decoration: none" type="file" class="form-control" name="img_jogo" required>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Descrição do jogo" name="desc_jogo" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Descrição do jogo</label>
                </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="genero">
                        <?php   
                            $sql = "select * from genero order by nome_gen";
                            $resultado = mysqli_query($conn, $sql);
                            
                            while ($linha = mysqli_fetch_array($resultado)){
                                $id_gen = $linha ['id_gen'];
                                $nome_gen = $linha ['nome_gen'];
                                echo "<option value='{$id_gen}'>{$nome_gen}</option>";
                            }
                        ?>
                        </select>

                        <label for="floatingSelect">Gênero</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="desenvolvedora">
                        <?php   
                            $sql = "select * from desenvolvedora order by nome_desenv";
                            $resultado = mysqli_query($conn, $sql);
                            
                            while ($linha = mysqli_fetch_array($resultado)){
                                $id = $linha ['id_desenv'];
                                $nome_desenv = $linha ['nome_desenv'];
                                echo "<option value='{$id}'>{$nome_desenv}</option>";
                            }

                        ?>
                        </select>
                        <label for="floatingSelect">Desenvolvedora</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="distribuidora">
                        <?php   
                            $sql = "select * from distribuidora order by nome_dist";
                            $resultado = mysqli_query($conn, $sql);
                            
                            while ($linha = mysqli_fetch_array($resultado)){
                                $id_dist = $linha ['id_dist'];
                                $nome_dist = $linha ['nome_dist'];
                                echo "<option value='{$id_dist}'>{$nome_dist}</option>";
                            }

                        ?>
                        </select>
                        <label for="floatingSelect">Distribuidora</label>
                    </div>
                </div>
                <button class="w-100 mt-3 btn btn-lg rounded-3" name="cadastrar" type="submit">Cadastrar</button>
                </div>
            </div>
            </div>
            <br>


            <br><br><br>

        </form>

    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>