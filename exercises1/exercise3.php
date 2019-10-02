<?php 
if ((!isset($_COOKIE['aluno']))&&(!isset($_COOKIE['bolsista']))&&(!isset($_COOKIE['admid']))) {
    ?>
    <script type="text/javascript">
        alert('User not connected. Login first.');
        window.location.assign('./');
    </script>
    <?php
}
if (isset($_COOKIE['aluno'])) {
   $aluno = $_COOKIE['aluno']; 
}
if (isset($_COOKIE['bolsista'])) {
    $aluno = $_COOKIE['bolsista'];
}
if (isset($_COOKIE['admid'])) {
    $aluno = $_COOKIE['admid'];
}
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
  <title>Exercise 3</title>
</head>
<style type="text/css">
  .col-sm:hover{
    transition-duration: 600ms;
    background-color: #a5eff8;
  }
</style>
<body background="../blur.jpg">
  <?php include "menu.php";?>
  <div class="container"><br><br>
    <div class="card">
      <div class="card-header">
        <h3>Exercise 3</h3>
      </div>
      <div class="card-body">
        <p class="card-text">1.We can find many polysyllabic words in the main text. The table below contains some of them. Listen to those words, notice where the stress falls and check the right boxes. Then listen again and check your answers.</p>
        <br>
        <center>
          <p>
            <audio controls>
              <source src="./audios/08.ogg" type="audio/ogg"/>
            </audio>
          </p>
        </center>
        <form class="form-group" action="verifica3.php" method="post">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col"></th>
                <th scope="col"><b>Stress on the 1<sup>st</sup> Syllable</b></th>
                <th scope="col">Stress on Penultimate Syllable</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Population</th>
                <td><input class="form-control" type=radio name="3a" value="0" required></td>
                <td><input class="form-control" type="radio" name="3a" value="1"required></td>
              </tr>
              <tr>
                <th scope="row">Mathematics</th>
                <td><input class="form-control" type="radio" name="3b" value="0" required></td>
                <td><input class="form-control" type="radio" name="3b" value="1" required></td>
              </tr>
              <tr>
                <th scope="row">Military</th>
                <td><input class="form-control" type="radio" name="3c" value="1" required></td>
                <td><input class="form-control" type="radio" name="3c" value="0" required></td>
              </tr>
              <tr>
                <th scope="row">Profitable</th>
                <td><input class="form-control" type="radio" name="3d" value="1" required></td>
                <td><input class="form-control" type="radio" name="3d" value="0" required></td>
              </tr>
              <tr>
                <th scope="row">Correlation</th>
                <td><input class="form-control" type="radio" name="3e" value="0" required></td>
                <td><input class="form-control" type="radio" name="3e" value="1" required></td>
              </tr>
              <tr>
                <th scope="row">Biometrics</th>
                <td><input class="form-control" type="radio" name="3f" value="0" required></td>
                <td><input class="form-control" type="radio" name="3f" value="1" required></td>
              </tr>
            </tbody>
          </table>
          <br><br>
          <center>
            <p class="card-text">
              2. In two of the words above the stress falls on the first syllabe. Which are they?
            </p>
            <div class="row">
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="0" class="custom-control-input" onclick="verify()" id="21" required>
                  <label class="custom-control-label" for="21">
                    Population
                  </label>
                </div>
              </div>
              &emsp;
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="1" class="custom-control-input" onclick="verify()" id="22" required>
                  <label class="custom-control-label" for="22">
                    Mathematics
                  </label>
                </div>
              </div>
              &emsp;
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="2" class="custom-control-input" onclick="verify()" id="23" required>
                  <label class="custom-control-label" for="23">
                    Military
                  </label>
                </div>
              </div>
              &emsp;
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="3" class="custom-control-input" onclick="verify()" id="24"required>
                  <label class="custom-control-label" for="24">
                    Profitable
                  </label>
                </div>
              </div>
              &emsp;
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="4" class="custom-control-input" onclick="verify()" id="25"required>
                  <label class="custom-control-label" for="25">
                    Correlation
                  </label>
                </div>
              </div>
              &emsp;
              <div class="col-sm">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="32[]" value="5" class="custom-control-input" onclick="verify()" id="26"required>
                  <label class="custom-control-label" for="26">
                    Biometrics
                  </label>
                </div>
              </div>
            </div>
            <br><br>
            <p class="card-text">
             3. Now listen to some other four-syllable words from the text <a href="./text3.php">Best Careers for the Future</a>. Notice where the stress falls and check the right boxes in your notebook. Listen again and check your answers.
           </p>
           <center>
            <p>
              <audio controls>
                <source src="./audios/09.ogg" type="audio/ogg">
                </audio>
              </p>
            </center>
            <table class="table table-hover table-bordered">
              <thead class="thead thead-dark">
                <th></th>
                <th>
                  <b>
                    Stress on the 1<sup>st</sup> Syllable
                  </b>
                </th>
                <th>
                  <b>
                    Stress on Penultimate Syllable
                  </b>
                </th>
              </thead>
              <tbody>
                <?php 
              //pelo fato de a tabela repetir itens isso sera feito automaticamente por um for
                $letras = array('g','h','i','j','k','l','m','n','o','p');
                $enunciado = array('Eletronic','Environment','Epidemic','Technology','Anesthesia','Emergency','Engineering','Recognition','Entertainment','Investigate');
                $values1 = array('0','1','0','1','0','1','0','0','0','1');
                $values2 = array('1','0','1','0','1','0','1','1','1','0');
                for ($i=0; $i <10 ; $i++) { 
                  ?>
                  <tr>
                    <td>
                      <?=$enunciado[$i]?>
                    </td>
                    <td>
                      <center>
                        <label style="width: 100%; height: 100%">
                          <input type="radio" name="3<?=$letras[$i]?>" value="<?=$values1[$i]?>" required>
                        </label>
                      </center>
                    </td>
                    <td>
                     <center>
                      <label style="width: 100%; height: 100%">
                        <input type="radio" name="3<?=$letras[$i]?>" value="<?=$values2[$i]?>" required>
                      </label>
                    </center>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <input type="hidden" name="codex" value="3" />
          <button class="btn btn-lg btn-outline-info btn-block" type="submit">
            Send
          </button>
        </form>
      </div>
    </div>
  </div>
  <br>
  <script type="text/javascript">
    //Verifica o numeri maximo de checkboxes ativados permitidos
    function verify() {
      //cria um array com todos os checkboxes do exercicios
      var checkboxes = document.getElementsByClassName('custom-control-input');
      //inicia o contador de checkbox selecionados
      var cont = 0;
      //for passa por todos os checkboxes
      for (var i = checkboxes.length - 1; i >= 0; i--) {
        //verifica se o checkbox foi marcado
        if (checkboxes[i].checked == true) {
          //se foi incrementa mais 1 no contador
          cont = cont +1;
          //chama a função que verifica o contador e disabilita os checkboxes ou reabilita
          verifyCont(cont);
        }
      }
      //função que verifica o contador passado como parametro
      function verifyCont(cont){
        //cria um array com todos os checkboxes do exercicio
        var checkboxes = document.getElementsByClassName('custom-control-input');
       //verifica o valor do contador
       if (cont >= 2) {
        //se o contador for maior ou igual a 2:
        //zera o contador localmente
        cont = 0;
        //passa por todos os checkboxes do array
        for (var x = checkboxes.length - 1; x >= 0; x--) {
          //verifica se o checkbox está selecionado
          if (checkboxes[x].checked == false) {
            //se ñão estiver selecionado, ele será desbilitado
            checkboxes[x].disabled = true;

          }
        }
      }
      //senão
      else{
        //se o contador for menor que 2:
        //passa por todos os checkbox do array
        for (var x = checkboxes.length - 1; x >= 0; x--) {
          //verifica se o checkbox não esta selecionado
          if (checkboxes[x].checked == false) {
            //reativa todos os checkbox não selecionados
            checkboxes[x].disabled = false;
          }
        }
      }
    }
  }
</script>
</body>
</html>