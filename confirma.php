<?php
    require_once ('config.php');
    
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['id_ass'] != 0){
        $mensagem = "Você já possui uma assinatura em andamento. Caso queira gerenciá-la, vá ao seu perfil"; 
        header("location:index2.php?mensagem_err={$mensagem}");
    }
        
    require_once ('verificaAut.php');
    require_once ($_SESSION['tipo_menu']);

    if(!isset($_GET['tipo'])){
        $mensagem_tipo = "Erro: você precisa escolher um tipo de assinatura abaixo";
        header("location: assinar.php?mensagem_err=$mensagem_tipo");
    } else if($_GET['tipo'] == 1){
        $val = 14.99;
        $tipo = "tipo=1";
        $aviso = "será feita uma cobrança de R$$val por mês";
        $mes = "1 mês";
    } else if($_GET['tipo'] == 2){
        $val = 37.49;
        $tipo = "tipo=2";
        $aviso = "será feita uma cobrança de R$$val a cada 3 meses";
        $mes = "3 meses";
    } else if($_GET['tipo'] == 3){
        $val = 119.90;
        $tipo = "tipo=3";
        $aviso = "será feita uma cobrança de R$$val a cada 12 meses";
        $mes = "12 meses";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação dados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css.css">

    <style>
        .card{
            background-color: white;
        }

        a{
            color: black;
            text-decoration: none;
        }

        .info{
            color: white;
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
        <div class="info">
            <h1><?php echo "Inscrição de {$mes}"?></h1>
            <h5>Sua assinatura começará assim que o pagamento for aprovado e <?php echo $aviso?> ou até o cancelamento.</h5>      
        </div>
        <br><br>
        <form method="post">
        <div class="card">
                <a href="checkout.php?<?php echo $tipo?>"><div class="card-body">
                    <h5 style="position: relative; top: 4px"><i class="fa-brands fa-cc-visa"></i> <i class="fa-brands fa-cc-mastercard"></i> <i class="fa-brands fa-cc-amex"></i> Adicionar forma de pagamento <i style="position: relative; left: 870px" class="fa-solid fa-arrow-right"></i></h5>
                </div></a>
        </div>


        </form>

    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>