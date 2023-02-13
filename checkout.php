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

    if(!isset($_GET['tipo'])){
        $mensagem_tipo = "Erro: você precisa escolher um tipo de assinatura abaixo";
        header("location: assinar.php?mensagem_err=$mensagem_tipo");
    } else if($_GET['tipo'] == 1){
        $val = 14.99;
        $_SESSION['val'] = 14.99;
        $tipo = "tipo=1";
        $_SESSION['tipo_ass'] = 2;
        $aviso = "será feita uma cobrança de R$$val por mês";
        $mes = "mês";
        $_SESSION['mes'] = 1;
    } else if($_GET['tipo'] == 2){
        $val = 37.49;
        $_SESSION['val'] = 12.49;
        $tipo = "tipo=2";
        $_SESSION['tipo_ass'] = 3;
        $aviso = "será feita uma cobrança de R$$val a cada 3 meses";
        $mes = "3 meses";
        $_SESSION['mes'] = 3;
    } else if($_GET['tipo'] == 3){
        $val = 119.90;
        $_SESSION['val'] = 9.99;
        $tipo = "tipo=3";
        $_SESSION['tipo_ass'] = 4;
        $aviso = "será feita uma cobrança de R$$val a cada 12 meses";
        $mes = "12 meses";
        $_SESSION['mes'] = 12;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

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

        .form-floating{
          color:black;
        }

        .btn{
        }
    </style>

</head>
<body>

    <div class="container">

    <br>
    <center><img src="imagensSite/logo_4.png" alt="Logo" width="324" height="100"></center>
        <br>
        <h3>Insira os dados do seu cartão de crédito</h3>   
        <br><br>
        <center><div class="card mb-3" style="width:48rem">
    <div class="row g-0">

    <div class="card-body">

    <form action="pagamento.php" method="post" class="row g-3">

    <input type="hidden" name="teste_tipo" value="<?php echo $_GET['tipo']?>">

    <div class="col-md-11">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="nome" id="floatingInput">
        <label for="floatingInput">Nome do titular do cartão</label>
      </div>
    </div>

    <div class="col-md-11">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="numero" id="floatingInput">
        <label for="floatingInput">Número do cartão</label>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="val_mes" id="floatingInput">
        <label for="floatingInput">Mês de validade</label>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="ano" id="floatingInput">
        <label for="floatingInput">Ano de validade</label>
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="cvv" id="floatingInput">
        <label for="floatingInput">CVV</label>
      </div>
    </div>

    <div class="col-md-4">
      <select style="position: relative;top:20px;left:46px"class="form-select border-top-0 border-end-0 border-start-0" aria-label="Default select example">
        <option>Alemanha</option>
        <option selected>Brasil</option>
        <option>Canadá</option>
        <option>Estados Unidos</option>
      </select>
    </div>

    <div class="col-md-7">
      <div class="form-floating ms-5">
        <input type="text" class="form-control border-top-0 border-end-0 border-start-0" name="cpf" id="floatingInput">
        <label for="floatingInput">CPF</label>
      </div>
    </div>

    <center><hr style="height:2px;width:90%;border-width:0;color:black;background-color:black"></hr></center>

    <?php
      if($_GET['tipo'] == 1){ ?>
          <div style="color: black;margin-top:5px;margin-left: 53px">Quando o pagamento for confirmado, sua assinatura iniciará imediatamente e <br><div style="margin-left:138px">serão cobrados R$<?php echo $val?>
          (+ impostos aplicáveis) a cada <?php echo $mes?></div>
          <button type="submit" name="assinar" class="btn" style="position: relative; top:5px;left:202px;width: 150px">Iniciar assinatura</button></div>
    <?php
      } else if($_GET['tipo'] == 2){ ?>
          <div style="color: black;margin-top:5px;margin-left: 55px">Quando o pagamento for confirmado, sua assinatura iniciará imediatamente e <br><div style="margin-left:105px">serão cobrados R$<?php echo $val?>
          (+ impostos aplicáveis) a cada <?php echo $mes?></div><button type="submit" name="assinar" class="btn" style="position: relative; top:5px;left:202px;width: 150px">Iniciar assinatura</button></div>
    <?php
      } else if($_GET['tipo'] == 3){ ?>
          <div style="color: black;margin-top:5px;margin-left: 55px">Quando o pagamento for confirmado, sua assinatura iniciará imediatamente e <br><div style="margin-left:100px">serão cobrados R$<?php echo $val?>
          (+ impostos aplicáveis) a cada <?php echo $mes?></div><button type="submit" name="assinar" class="btn" style="position: relative; top:5px;left:202px;width: 150px">Iniciar assinatura</button></div>
    <?php
      }
    ?>
    </form>

    
    
  </div></center>

  <br>

  <center><hr style="height:2px;width:766px;border-width:0;color: white;background-color: white"></hr></center>

  <center>
  <h2>Pague também com</h2>
  <button style="width: 200px; background-color: #009cde; color: white" class="btn">PayPal <i class="fa-brands fa-paypal" disabled></i></button>
  <br><br>
  <button style="width: 200px; background-color: white; color: black" class="btn">Boleto <i class="fa-solid fa-barcode" disabled></i></button>
    
  </center>
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

  <br>

  </div>
  </div>
  </div>
  </div>
  </div>
  </div> 

    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>