<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }
  
    require_once ('verificaAut_adm.php');
    require_once ($_SESSION['tipo_menu']);
    $id_jogo = $_GET['id_jogo'];

    if(isset($_POST['alterar'])){
            $nome_jogo = $_POST['nome_jogo'];

            if($_POST['data_jogo'] < date("Y/m/d", strtotime(" - 30 years")) or $_POST['data_jogo'] > date("Y/m/d")){
                $data_jogo_err = "Data inválida! <br>";
            } else{
                $data_jogo = $_POST['data_jogo'];
            }

            $desc_jogo = $_POST['desc_jogo'];
            $data_jogo = $_POST['data_jogo'];
            $genero = $_POST['genero'];
            $desenvolvedora = $_POST['desenvolvedora'];
            $distribuidora = $_POST['distribuidora'];
            $diretorio = "imagensJogo/";
            $arquivoPath = $diretorio . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivoPath);

            if(empty($data_jogo_err)){
                $sql = "update jogo
                set nome_jogo = '{$nome_jogo}',
                datalanc_jogo = '{$data_jogo}',
                genero_id_gen = '{$genero}',
                img_jogo = '{$arquivoPath}',
                desc_jogo = '{$desc_jogo}',
                desenvolvedora_id_desenv = '{$desenvolvedora}',
                distribuidora_id_dist = '{$distribuidora}'
                where id_jogo = {$id_jogo}";
                mysqli_query($conn, $sql);

                $mensagem = "Jogo alterado com sucesso!";
                header("location: alterarJogo.php?id_jogo={$id_jogo}&mensagem_suc={$mensagem}");
            } else{
                if(isset($data_jogo_err)){
                    $erro .= $data_jogo_err;
                }
                header("location: alterarJogo.php?id_jogo={$id_jogo}&mensagem_err={$erro}");
            }

        }


    $sql = "select * from jogo where id_jogo = {$id_jogo}";
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar jogo</title>

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


        <br>

        <?php 
          if(isset($_GET['mensagem_err'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['mensagem_err']?>
            </div>
        <?php
          } else if(isset($_GET['mensagem_suc'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['mensagem_suc']?>
            </div>
        <?php
          }
        ?>

        <form method="post" enctype="multipart/form-data">

            <div class="modal modal-signin position-static d-block" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Alterar jogo</h1>
                </div>

                <div class="modal-body p-5 pt-0">
                    <input type="hidden" name="id_jogo" value="<?= $linha['id_jogo']?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['nome_jogo']?>"
                        name="nome_jogo" placeholder="Nome do jogo" id="floatingInput" required>
                        <label for="floatingInput">Nome do jogo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['datalanc_jogo'] ?>" 
                        name="data_jogo" placeholder="Data de lançamento do jogo" id="floatingInput" required>
                        <label for="floatingInput">Data de lançamento do jogo</label>
                    </div>
                
                <br>

                <?php
                    $img_jogo = $linha['img_jogo'];
                    list($width, $height) = getimagesize($img_jogo);
                    $proporcao = ($width/$height);
                    $h = 200;
                    $w = $h * $proporcao; 
                ?>

                <img style="width:<?php echo $w?>;height:<?php echo $h?>" src="<?php echo $img_jogo?>" alt="...">
                <label for="floatingInput">Imagem cadastrada do jogo</label>
                <br><br>
                <div style="position: relative; left:-20px" class="input-group mb-3">
                    <span class="input-group-text border-0" id="imagem1"><i class="fa-solid fa-image"></i></span>
                    <input style="text-decoration: none" required type="file" class="form-control form-control-sm" name="imagem">
                </div>

                <br>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Descrição do jogo" name="desc_jogo" id="floatingTextarea2" style="height: 100px"><?php echo $linha['desc_jogo']?></textarea>
                    <label for="floatingTextarea2">Descrição do jogo</label>
                </div>

                <br>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="genero">
                            <?php   
                                $sql = "select * from genero order by nome_gen";
                                $resultado_gen = mysqli_query($conn, $sql);
                                
                                while ($linhaTU = mysqli_fetch_array($resultado_gen)){
                                    $id = $linhaTU['id_gen'];
                                    $nome_gen = $linhaTU['nome_gen'];

                                    $selected = ($id == $linha['genero_id_gen']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$nome_gen}</option>";
                                }
                                ?>
                        </select>
                        <label for="floatingSelect">Gênero</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="desenvolvedora">
                            <?php   
                                $sql = "select * from desenvolvedora order by nome_desenv";
                                $resultado_desenv = mysqli_query($conn, $sql);
                                
                                while ($linhaTU = mysqli_fetch_array($resultado_desenv)){
                                    $id = $linhaTU['id_desenv'];
                                    $nome_desenv = $linhaTU['nome_desenv'];

                                    $selected = ($id == $linha['desenvolvedora_id_desenv']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$nome_desenv}</option>";
                                }
                            ?>
                        </select>
                        <label for="floatingSelect">Desenvolvedora</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select border-top-0 border-end-0 border-start-0" name="distribuidora">
                            <?php   
                                $sql = "select * from distribuidora order by nome_dist";
                                $resultado_dist = mysqli_query($conn, $sql);
                                
                                while ($linhaTU = mysqli_fetch_array($resultado_dist)){
                                    $id = $linhaTU['id_dist'];
                                    $nome_dist = $linhaTU['nome_dist'];

                                    $selected = ($id == $linha['distribuidora_id_dist']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$nome_dist}</option>";
                                }

                            ?>
                        </select>
                        <label for="floatingSelect">Distribuidora</label>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="w-100 mt-3 btn btn-lg" name="alterar" type="submit"><i class="fa-solid fa-right-to-bracket"></i>Alterar</button>
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