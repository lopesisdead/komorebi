<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }
  
    require_once ('verificaAut_adm.php');
    require_once ($_SESSION['tipo_menu']);

    if(isset($_POST['alterar'])){
        $id = $_POST['id'];
        $nome_gen = $_POST['nome_gen'];

        $sql = "update genero
                    set nome_gen = '{$nome_gen}'
                        where id_gen = {$id}";

        mysqli_query($conn, $sql);
        $mensagem = "Gênero alterado com sucesso";
        header("location: alterarGen.php?id_gen={$id}&mensagem_suc={$mensagem}");
        
    } else if(isset($_POST['voltar'])){
        header("location: listarGen.php");
    }
            
    $id = $_GET['id_gen'];
    $sql = "select * from genero where id_gen = {$id}";
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar gênero</title>

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

        <form method="post">

            <input type="hidden" name="id" value="<?= $linha['id_gen']?>">

            <div class="modal modal-signin position-static d-block" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Alterar gênero</h1>
                </div>

                <div class="modal-body p-5 pt-0">
                    <input type="hidden" name="id_gen" value="<?= $linha['id_gen']?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" value="<?= $linha['nome_gen'] ?>" 
                        name="nome_gen" placeholder="Nome do gênero" id="floatingInput" required>
                        <label for="floatingInput">Nome do gênero</label>
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