<!DOCTYPE html>
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
<style type="text/css">
  /* Center the loader */
  #loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
  }

  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 } 
    to { bottom:0px; opacity:1 }
  }

  @keyframes animatebottom { 
    from{ bottom:-100px; opacity:0 } 
    to{ bottom:0; opacity:1 }
  }

</style>
<body background="blur.jpg">
  <div class="container">
    <br><br><br><br><br>
    <div class="col d-flex justify-content-center">
      <div class="card">
        <!-- Card de Logins, inicialmente mostrado ao usuario-->
        <div class="card-header">Pronunciation Tips</div>
        <div class="card-body" id="card-email">
          <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autofocus>
          <br>
          <center>
            <p id="alert1"></p>
          </center>
          <button class="btn btn-lg btn-outline-info btn-signin btn-block" type="submit" onclick="sendEmail()">
            Send E-mail
          </button>
          <a href="./" class="btn btn-lg btn-outline-danger btn-signup btn-block">
           Cancel
         </a>
       </div>
       <div style="width: 260px; height: 300px;" hidden id="loaderContainer">
         <div  id="loader" ></div>
       </div>
       <div class="card-body" hidden id="pegaCodigo">
        Enter your verification code below:
        <input type="text" name="" id="codigo" class="form-control" min="100000" max="999999" placeholder="000000" size="6" maxlength="6">
        <center>
          <p id="alert"></p>
        </center>
        <br>
        <button class="btn btn-lg btn-outline-info btn-signin btn-block" type="submit" onclick="verificaCodigo()">
          Verify
        </button>
      </div >

      <div class="card-body" hidden id="passwordsContainer"> 
        Type password <small>min 6 characters</small>
        <input type="password" name="p1" id="p1" class="form-control" />
        <br>
        Retype the password
        <input type="password" name="p2" id="p2" class="form-control" />
        <p id="alert2"></p>
        <br>
        <button class="btn btn-lg btn-outline-info btn-block" onclick="changePassword()">
          Send
        </button>
      </div>
    </div>
  </div>
</div>

<br><br>
<script type="text/javascript">
  function sendEmail() {
   var alert = document.getElementById('alert1');
    //pega o email
    var email = document.getElementById('email').value;
    //verifica se esta vazio
    if (email.length == 0) { 
      return;
    } 
    //caso não
    else {
      //chama a classe XMLHttpRequest
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        //mostra animação de carregamento
        document.getElementById('loaderContainer').hidden = false;
        //esconde a div de enviar email
        document.getElementById('card-email').hidden = true;
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('loaderContainer').hidden= true;
          if (this.responseText == 1) {
            document.getElementById('pegaCodigo').hidden = false;
          }
          else{
            document.getElementById('card-email').hidden = false;
            alert.style.color = "#f00";
            alert.style.fontSize= "12px";
            alert.textContent = "User not found";
          }
        }

      };

      xmlhttp.open("GET", "sendEmail.php?email=" + email, true);
      xmlhttp.send();
    }
  }
  function verificaCodigo(){
    var codigo = document.getElementById('codigo').value;
    var alert = document.getElementById('alert');
     //mostra animação de carregamento
     document.getElementById('loaderContainer').hidden = false;
     document.getElementById('pegaCodigo').hidden = true;
     if (codigo.length == 6) {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
        //esconde a div de enviar email
        
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('loaderContainer').hidden= true;

          if (this.responseText == 1) {
            document.getElementById('passwordsContainer').hidden = false;
          }
          else{
            document.getElementById('pegaCodigo').hidden = false;
            alert.style.color = "#f00";
            alert.style.fontSize= "12px";
            alert.textContent = "Invalid code.";
          }
        }

      };

      xmlhttp.open("GET", "verifyCode.php?code=" + codigo, true);
      xmlhttp.send();
    }
    else{
     document.getElementById('loaderContainer').hidden = true;
     document.getElementById('pegaCodigo').hidden = false;
     alert.style.color = "#f00";
     alert.style.fontSize= "12px";
     alert.textContent = "Code is too short.";
   }
 }
 function changePassword(){
  var p1 = document.getElementById('p1').value;
  var p2 = document.getElementById('p2').value;
  var alerta = document.getElementById('alert2');
     //mostra animação de carregamento
     document.getElementById('loaderContainer').hidden = false;
     document.getElementById('passwordsContainer').hidden = true;
     if ((p1.length>=6)&&(p2.length>=6)) {
       if (p1 == p2) {        
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
        //esconde a div de enviar email
        
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('loaderContainer').hidden= true;
          console.log(this.responseText);
          if (this.responseText == 1) {
            alert('Password has been changed, you will be redirected to the login area.');
            window.location.assign('./');
          }
          else{
            document.getElementById('passwordsContainer').hidden = false;
            alerta.style.color = "#f00";
            alerta.style.fontSize= "12px";
            alerta.textContent = "Passwords not changed";
          }
        }

      };

      xmlhttp.open("GET", "changePassword.php?pas1=" + p1+ "&pas2=" + p2, true);
      xmlhttp.send();
    }
    else{
     document.getElementById('loaderContainer').hidden = true;
     document.getElementById('passwordsContainer').hidden = false;
     alerta.style.color = "#f00";
     alerta.style.fontSize= "12px";
     alerta.textContent = "Passwords not match";
   }
 }
 else{
   document.getElementById('loaderContainer').hidden = true;
   document.getElementById('passwordsContainer').hidden = false;
   alerta.style.color = "#f00";
   alerta.style.fontSize= "12px";
   alerta.textContent = "Passwords are too short.";
 }
}
</script>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>