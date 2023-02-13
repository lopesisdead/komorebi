<?php
    require_once ('config.php');
    
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['cadastrar'])){

        $teste_desenv = $_POST['desenv'];
        $sql = "select id_desenv from desenvolvedora where nome_desenv = '$teste_desenv'";
        $resultado = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultado) >= 1){
            $erro = "Já existe uma desenvolvedora com este nome cadastrada!";
            header("location: cadastrarDesenv.php?mensagem_err={$erro}");
        } else{
            $desenv = $_POST['desenv'];
            $sql = "insert into desenvolvedora (nome_desenv)
            values('{$desenv}')";
            mysqli_query($conn, $sql);
            $mensagem = "Desenvolvedora cadastrada com sucesso";
            header("location: cadastrarDesenv.php?mensagem_suc={$mensagem}");
        }
    }
        
    require_once ('verificaAut_adm.php');
    require_once ($_SESSION['tipo_menu']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar desenvolvedora</title>

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
        <form method="post">

        <div class="modal modal-signin position-static d-block" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Cadastrar desenvolvedora</h1>
                </div>

                <div class="modal-body p-5 pt-0">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-top-0 border-end-0 border-start-0"
                        name="desenv" id="floatingInput" placeholder="Nome da desenvolvedora" required>
                        <label for="floatingInput">Nome da desenvolvedora</label>
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