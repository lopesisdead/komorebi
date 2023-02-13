<?php

    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }
        
    require_once ('verificaAut.php');
    require_once ($_SESSION['tipo_menu']);

    if(isset($_POST['pesquisa_nome'])){
        $pesquisa_nome = $_POST['pesquisa_nome'];
        header("location: jogos.php?nome={$pesquisa_nome}");
    }

    if(isset($_POST['pesquisa_gen'])){
        $pesquisa_gen = $_POST['pesquisa_gen'];
        header("location: jogos.php?genero={$pesquisa_gen}");
    }

    if(isset($_POST['pesquisa_desenv'])){
        $pesquisa_desenv = $_POST['pesquisa_desenv'];
        header("location: jogos.php?desenvolvedora={$pesquisa_desenv}");
    }

    if(!empty($_GET['nome'])){
        $nome_jogo = $_GET['nome'];
        $sql = "select * from jogo where nome_jogo like '$nome_jogo%'";
        $resultado = mysqli_query($conn, $sql);

    } else if(!empty($_GET['genero'])){
        $gen_jogo = $_GET['genero'];
        $sql = "select * from jogo where genero_id_gen = '$gen_jogo'";
        $resultado = mysqli_query($conn, $sql);

    } else if(!empty($_GET['desenvolvedora'])){
        $desenv_jogo = $_GET['desenvolvedora'];
        $sql = "select * from jogo where desenvolvedora_id_desenv = '$desenv_jogo'";
        $resultado = mysqli_query($conn, $sql);
    }
    
    else{
        $sql = "select * from jogo";
        $resultado = mysqli_query($conn, $sql);
    }




    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css.css">

    <style>
        .card{
            border:none;
        }

        .btn{
            width: 70px;
        }

        .input-group-text{
            background-color: #a1bfff;
            border: 0;
            transition-duration: 0.4s;
        }
        .input-group-text:hover{
            background-color: #738bbf;
        }
    </style>

</head>
<body>

    

    <br><br><br>

        <div class="container">


        <center>

            <form>
            <div class="input-group w-75 mb-3">
                <input type="search" name="nome" class="form-control" placeholder="Pesquisar por nome" aria-label="Username">
                <button name="pesquisa_nome" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <div class="input-group w-75 mb-3">
            <select class="form-select" name="desenvolvedora">
                <option value="" selected>Pesquisar por desenvolvedora</option>
                        <?php   
                            $sql = "select * from desenvolvedora order by nome_desenv";
                            $resultado_desenv = mysqli_query($conn, $sql);
                            
                            while ($linha_desenv = mysqli_fetch_array($resultado_desenv)){
                                $id_desenv = $linha_desenv ['id_desenv'];
                                $nome_desenv = $linha_desenv ['nome_desenv'];
                                echo "<option value='{$id_desenv}'>{$nome_desenv}</option>";
                            }
                        ?>
                </select>
                <button name="pesquisa_desenv" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>

                <select class="form-select" name="genero">
                        <option value="" selected>Pesquisar por gênero</option>
                        <?php   
                            $sql = "select * from genero order by nome_gen";
                            $resultado_gen = mysqli_query($conn, $sql);
                            
                            while ($linha_gen = mysqli_fetch_array($resultado_gen)){
                                $id_gen = $linha_gen ['id_gen'];
                                $nome_gen = $linha_gen ['nome_gen'];
                                echo "<option value='{$id_gen}'>{$nome_gen}</option>";
                            }
                        ?>
                </select>
                <button name="pesquisa_gen" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            </form>

            

        </center>

        <?php 

          if(isset($_GET['mensagem'])){ ?>
              <?php $mensagem = $_GET['mensagem']?>           
        <?php
          }     
        if (isset($mensagem)){ ?>
            <div class="alert alert-danger" role="alert">
                <?= $mensagem ?>
            </div>
        <?php 
        }
        ?>

        <br>
            
        <div style="background:none" class="card border-top-0">
            <table class="table table-borderless ">
                <tbody class="row">
                <?php while ($linha = mysqli_fetch_array($resultado)){
                        $nome_jogo = $linha['nome_jogo'];
                        $img_jogo = $linha['img_jogo'];
                        list($width, $height) = getimagesize($img_jogo);
                        $proporcao = ($width/$height);
                        $h = 240;
                        $w = $h * $proporcao; 
                    ?>
                        <tr style="background:none" class="card col-md-4 text-center">
                        <th scope="row"><?=$nome_jogo?></th>
                        <td>
                            <a href="produto.php?jogo=<?=$nome_jogo?>" class="stretched-link">
                            <img src="<?php echo $img_jogo ?>" style="width:<?php echo $w?>px;height:<?php echo $h?>px"class="ms-3 me-3 mw-100" 
                            alt="<?php echo $img_jogo ?>"></a>
                        </td>
                        </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
        
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>