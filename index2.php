<?php
    require_once ('config.php');

    if(!isset($_SESSION)){
      session_start();
    }

    require_once ('verificaAut.php');
    require_once ($_SESSION['tipo_menu']);
    
    $sql = "select * from jogo where id_jogo = '6'";
    $resultado1 = mysqli_query($conn, $sql);

    $sql = "select * from jogo where id_jogo = '7'";
    $resultado2 = mysqli_query($conn, $sql);

    $sql = "select * from jogo where id_jogo = '8'";
    $resultado3 = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f7fb26712d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css.css">

    <style>
      .card{
        background-size: 415px 590px; 
        background-repeat: no-repeat;
        height:590px;
        width:415px;
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
                <?php echo $_GET['mensagem_suc']?> <i class="fa-solid fa-face-laugh-wink"></i>
              </div>  
      <?php
          }   
      ?>
  <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col">
      <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('imagensJogo/home_gtav.jpg')">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="imagensJogo/rockstar-logo.png" alt="Bootstrap" width="32" height="32" class="">
              </li>
              <li>
                <a href="produto.php?jogo=Grand Theft Auto V" class="stretched-link"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col">
      <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('imagensJogo/home_tw3.jpg')">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="imagensJogo/cdprojekt-logo.png" alt="Bootstrap" width="64" height="64" class="">
              </li>
              <li>
                <a href="produto.php?jogo=The Witcher 3" class="stretched-link"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col">
      <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('imagensJogo/home_terraria.png')">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="imagensJogo/relogic-logo.png" alt="Bootstrap" width="118" height="32" class="">
              </li>
              <li>
                <a href="produto.php?jogo=Terraria" class="stretched-link"></a>
              </li>
            </ul>
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