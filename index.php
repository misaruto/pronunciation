<?php 
   //prevenção de ataque csrf e força bruta
define("reCAPTCHA_SITEKEY", "6Ldk87YUAAAAAB8idK2EF2l2qy3aEPx4piziPw0H"); //Site key

?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
  <title>Pronunciation Tips</title>
</head>
<body background="blur.jpg">
  <div class="container">
    <br><br><br><br><br>
    <div class="col d-flex justify-content-center">
      <div class="card">
        <!-- Card de Logins, inicialmente mostrado ao usuario-->
        <div class="card-header">Pronunciation Tips</div>
        <div class="card-body" id="login-card">
         <form action="login.php" method="POST" id="formLogin">
          <input type="text" name="login" id="login" class="form-control" size="22" placeholder="Login" required autofocus>
          <br>
          <input type="password" name="senha" id="senha" class="form-control" size="22" placeholder="Password" required autofocus autocomplete="off">
          <br>

          <div class="card-body-lg">
            <!-- Onde aparecerá o reCaptcha da google-->
            <div class="g-recaptcha" data-sitekey="<?= reCAPTCHA_SITEKEY; ?>"></div>
            <p id="alert" style="color:#f00; font-size: 12px;"></p>
          </div>
          <br>
          <center>
            <div class="d-flex row justify-content-center" style="width: 100%;">
              <div class="f-2" style="width: 50%; padding-right: 4px;">
                <button class="btn btn-lg btn-outline-info btn-signin btn-block" type="submit">
                  Login
                </button>
              </div>
              <div class="f-2" style="width: 50%; margin: 0;">
                <a href="registerForm.php" class="btn btn-lg btn-outline-success btn-signup btn-block">
                 Sign up
               </a>
             </div>
           </div>
           <div>
             <a href="recovery.php" class="alert-link">Recovery password</a>
           </div>
         </center>
       </form>
     </div>
   </div>
 </div>
</div>
<br><br>
<!-- Inclui script do reCaptcha da google-->
<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

<script type="text/javascript">

//obrigar a seleção do captcha
window.onload = function() {
  var alert = document.getElementById('alert');
  var recaptcha = document.forms["formLogin"]["g-recaptcha-response"];
  recaptcha.required = true;
  recaptcha.oninvalid = function(e) {
    // fazer algo, no caso to dando um alert
    alert.textContent = "Select the captcha first";
  }
}


/*
  //Preenche altomaticamente os pontos e traços do CPF

  function mascaraCPF(e) {
    //a cada tecla digitada a variavel tecla tem o seu calor, 
    var tecla=(window.event)?event.keyCode:e.which;

    if (tecla == '') {

    }
    else{
      if((tecla<=47 || tecla>=58 || tecla!=8 || tecla!=0)){


      } 
      else{
        var cpf = document.getElementById('cpf');
        if (document.getElementById('cpf').value.length == 3) {
          cpf.value = cpf.value + '.';
        }
        if (document.getElementById('cpf').value.length == 7) {
          cpf.value = cpf.value + '.';
        }
        if (document.getElementById('cpf').value.length == 11) {
          cpf.value = cpf.value + '-';
        }
      }
    }
  }
  //Verifica se o usuario digitou somente numeros
  function SomenteNumero(e){

    var tecla=(window.event)?event.keyCode:e.which;   

    if((tecla>47 && tecla<58)){
      return true;
    }
    else{
      if (tecla==8 || tecla==0){ 
        return true;
      }
      else{  
        return false;
      }
    }
  }
  */
</script>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>