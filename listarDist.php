<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
        session_start();
    }
        
    require_once ('verificaAut_adm.php');
    require_once ($_SESSION['tipo_menu']);

    $sql = "select * from distribuidora";
    $resultado = mysqli_query($conn, $sql);

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar distribuidoras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css.css">

</head>
<body>

    <br><br><br>

        <div class="container">
        
            <?php if (isset($mensagem)){ ?>

                <div class="alert alert-danger" role="alert">
                    <?= $mensagem ?>
                </div>

            <?php 
                }
            ?>

<div style="background:none" class="card border-0">
                        <table class="table table-borderless m-3">
                            <tbody class="row m-3">
                            <?php while ($linha = mysqli_fetch_array($resultado)){ ?>
                                    <tr class="card col-md-4">
                                        <th scope="row"><?=$linha['nome_dist']?>, ID <?=$linha['id_dist']?></th>
                                        <td>
                                        <a href="alterarDist.php?id_dist=<?= $linha['id_dist'] ?>"> <button type="button" class="btn" name="alterar">
                                        <i class="fa-solid fa-pen"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
        
        </div>
        
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>