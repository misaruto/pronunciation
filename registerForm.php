<?php 
//inclui a pagina de conexão com o Banco de Dados
include 'conexao.php';
//Clasula que seleciona todas as escolas cadastradas
$query = "SELECT * FROM tbescolas";
//efetua a clausula
$sql = mysqli_query($conexao, $query);

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
  <title>Pronunciation Tips</title>
</head>
<body background="blur3.jpg">
  <br>
  <div class="container">
    <div class="col d-flex justify-content-center">
     <div class="card">
       <div class="card-header">Pronunciation Tips</div>
       <div class="card-body" id="register-card">
        <form action="register.php" id="form-register">
          <table class="table">
            <tr>
              <td colspan="2">
                Name
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </td>
            </tr>
            <tr>
              <td>
                CPF
                <input type="text" name="cpf" id="cpf" class="form-control" required  placeholder="000.000.000-00">                
              </td>
              <td>
                Date of birth
                <input type="date" name="born" id="born" class="form-control" required>
              </td>
            </tr>
            <tr>
              <td>
                E-mail <small>used to recovery passwords</small>
                <input type="mail" name="email" id="email" class="form-control" placeholder="E-mail" required>

              </td>
              <td>
                Username
                <input type="text" name="login" id="login2" class="form-control" placeholder="Username" required oninput="verificaLogin()">
                <p id="alert1"></p>
              </td>
            </tr>

            <tr>
              <td>
                Password <small>minimum length 6 characters</small>
                <input type="password" name="password1" id="password1" class="form-control" placeholder="Password" required>
              </td>
              <td>
                Retype password
                <br>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype the password" oninput="verifyPassword()" required>
              </td>
            </tr>
            <tr>
              <td colspan="2">
               <center>
                <span id="msg"></span>
              </center>
            </td>
          </tr>

          <tr>
            <td style="width: 50%;">
              Select your school:
              <select name="school" id="school" onclick="findClasses()" required class="form-control">
                <option disabled selected>Schools</option>
                <!-- Ao selecionar uma escola, ela busca todas as turmas com base no CODIGO da escola. A clausula que busca as escolas é realizada no topo da pagina-->
                <?php 
                while ($row = mysqli_fetch_object($sql)) {
                  ?>
                  <option value="<?=$row->cod_escola?>"> <?=$row->nome?> </option>
                  <?php 
                }
                ?>
              </select>
            </td>
            <td>
              Select your class: 
              <select name="class" id="classes" class="form-control">
                <option disabled selected>Select school first</option>

              </select>
            </td>
          </tr>
          <tr>
            <td>
              <a href="./" class="btn btn-lg btn-outline-danger btn-block">Cancel</a>
            </td>
            <td>
              <button type="submit" id="btn-save" class="btn btn-lg btn-outline-info btn-block" disabled>Save</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
     //verifica tamanho e se as senhas são iguais
     function verifyPassword(){
      var password1 = document.getElementById('password1').value;
      var password2 = document.getElementById('password2').value;
      var btn = document.getElementById('btn-save');
      var msg = document.getElementById('msg');
      if (password1.length >=6 && password2.length>=6) {
       if (password2 == password1) {
        btn.disabled = false;
        msg.textContent = "*Valid passwords";
        msg.style="color:rgb(39, 206, 22);font-weight: bold; size: 10px;";
      }
      else{
        btn.disabled = true;
        msg.textContent = "*Invalid passwords";
        msg.style="color:#fd1b1b;font-weight: bold; size: 10px;";
        
      }
    } 
    else{
      btn.disabled = true;
      msg.textContent = "*Small passwords";
      msg.style="color:#fd1b1b;font-weight: bold; size: 10px;";
    }
  }
//função que verifica se o nome de usuario escolhido está disponivel;
function verificaLogin(){
  var login = document.getElementById('login2').value;
  var alert = document.getElementById('alert1');
  if (login.length >= 6) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == "1"){
          alert.style.color = "#0f0";
          alert.style.fontSize= "12px";
          alert.textContent = "Valid username";
        }
        else{
          alert.style.color = "#f00";
          alert.style.fontSize= "12px";
          alert.textContent = "Username already used";
        }
      }
    };

    xmlhttp.open("GET", "verificaLogin.php?username=" + login, true);
    xmlhttp.send();
  }
  else{
    alert.style.color = "#f00";
    alert.style.fontSize= "12px";
    alert.textContent = "Small username, min length 6 characters.";
  }
}

//função que encontra as classe de acordo com a escola selecionada pelo aluno
function findClasses() {
    //pega o valor selecionado
    var cod_escola = document.getElementById('school').value;
    //verifica se esta vazio
    if (cod_escola.length == 0) { 
      document.getElementById("classes").innerHTML = "";
      return;
    } 
    //caso não
    else {
      //chama a classe XMLHttpRequest
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("classes").innerHTML = this.responseText;
        }
      };
      //passa o codigo da escola para a pagina getClasses.php que retorna as classes que pertencem a escola selecionada
      xmlhttp.open("GET", "getClasses.php?cod_escola=" + cod_escola, true);
      xmlhttp.send();
    }
  }
</script>
</html>