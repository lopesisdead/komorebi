<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }

    $id_usuario = $_SESSION['id'];
    $id_assinatura = $_SESSION['id_ass'];
    $id_teste = $_GET['id_usuario'];

    
    if($id_usuario != $id_teste){
        header("location: perfil.php?id_usuario={$id_usuario}");
    }

    require_once('verificaAut.php');
    require_once($_SESSION['tipo_menu']);

    $sql = "select assinatura_has_jogo.jogo_id_jogo, assinatura_has_jogo.data_ass_jogo, assinatura_has_jogo.id_ass_has_jogo, jogo.id_jogo, jogo.nome_jogo, jogo.img_jogo
            from assinatura_has_jogo
            inner join jogo on jogo.id_jogo = assinatura_has_jogo.jogo_id_jogo where assinatura_id_ass = '$id_assinatura'";
    $resultado = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca do usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css.css">

    <style>
        .card{
            border:none;
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
        <h3>Meus jogos</h3>
        <div style="background:none" class="card border-top-0">
            <table class="table table-borderless ">
                <tbody class="row">
                <?php while ($linha = mysqli_fetch_array($resultado)){
                        $id_jogo = $linha['id_jogo'];
                        $nome_jogo = $linha['nome_jogo'];
                        $img_jogo = $linha['img_jogo'];
                        list($width, $height) = getimagesize($img_jogo);
                        $proporcao = ($width/$height);
                        $h = 240;
                        $w = $h * $proporcao; 
                        $data = strtotime($linha['data_ass_jogo']);
                        $data_aqui = date("d/m/Y", strtotime(" +0 months", $data));
                    ?>
                        <tr style="background:none" class="card col-md-4 text-center">
                        <th scope="row"><?=$nome_jogo?></th>
                        <th scope="row">Adquirido em <?=$data_aqui?></th>
                        <th scope="row">Nº ordem: 0000<?=$linha['id_ass_has_jogo']?></th>
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
    </form>
    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>