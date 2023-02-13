<?php 
  require_once ('config.php');
  
  if(!isset($_SESSION)){
    session_start();
  }
    
  require_once ('verificaAut.php');
  require_once ($_SESSION['tipo_menu']);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assinar</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css.css">

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

    <div class="header_ass">
      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Opções de assinatura</h1>
        <p class="fs-5">Selecione o plano com que você mais se identifica abaixo! <i class="fa-regular fa-face-smile-wink"></i></p>
      </div>
    </div>

      </header>

      <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3">

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <center><h4 class="my-0 fw-normal">Mensal</h4>
                <p class="card-text"><small class="text-muted">Pior custo benefício <i class="fa-solid fa-face-sad-tear"></i></small></p>
                </center>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">R$14,99<small class="text-muted fw-light fs-4">/mês*</small></h1>
                <p class="card-text">ou R$179,90/ano</p>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><i class="fa-regular fa-circle-check"></i> Acesso ilimitado ao acervo de jogos</li>
                  <li><i class="fa-regular fa-circle-check"></i> Jogue offline</li>
                  <li><i class="fa-regular fa-circle-xmark"></i> Sem desconto na anuidade</li>
                </ul>
                <a href="confirma.php?tipo=1"><button type="button" class="w-100 btn btn-lg">Assinar</button></a>
              </div>
            </div>
          </div>
          
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <center><h4 class="my-0 fw-normal">Trimestral</h4>
                <p class="card-text"><small class="text-muted">Mais popular!</small></p>
                </center>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">R$12,49<small class="text-muted fw-light fs-4">/3 meses*</small></h1>
                <p class="card-text">ou R$149,90/ano</p>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><i class="fa-regular fa-circle-check"></i> Acesso ilimitado ao acervo de jogos</li>
                  <li><i class="fa-regular fa-circle-check"></i> Jogue offline</li>
                  <li><i class="fa-regular fa-circle-check"></i> 16% de desconto na anuidade</li>
                </ul>
                <a href="confirma.php?tipo=2"><button type="button" class="w-100 btn btn-lg">Assinar</button></a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <center><h4 class="my-0 fw-normal">Anual</h4>
                <p class="card-text"><small class="text-muted">Melhor custo benefício!</small></p>
                </center>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">R$9,99<small class="text-muted fw-light fs-4">/12 meses*</small></h1>
                <p class="card-text">ou R$119,90/ano</p>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><i class="fa-regular fa-circle-check"></i> Acesso ilimitado ao acervo de jogos</li>
                  <li><i class="fa-regular fa-circle-check"></i> Jogue offline</li>
                  <li><i class="fa-regular fa-circle-check"></i> 33% de desconto na anuidade</li>
                </ul>
                <a href="confirma.php?tipo=3"><button type="button" class="w-100 btn btn-lg">Assinar</button></a>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
  integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
  integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
</body>
</html>