<?php require_once "validador_acesso.php" ?>

<?php 

  $chamados = array();
  //abrir arquivo .txt
  $arquivo = fopen('../../../app_help_desk/chamado.txt', 'r');
  while(!feof($arquivo)){ //testa pelo fim do arquivo
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }
  fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

  <?php require_once "menu.php" ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
            <?php foreach ($chamados as $c) { 
              $chamado = explode('#', $c);
              if($_SESSION['perfil_id'] == 2){
                //só exibir os chamados abertos pelo próprio usuário
                if($_SESSION['id'] != $chamado[0]){
                  continue;
                }
              }

              if(count($chamado) <4 ){
                continue;
              } ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado[2]?></h6>
                  <p class="card-text"><?=$chamado[3]?></p>
                </div>
              </div>
            <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>