<?php
if ((!isset($_COOKIE['admid']))&&!isset($_COOKIE['bolsista'])) {
  ?>
  <script type="text/javascript">
    alert("User not found, please login");
    //apos usuario confirmar caixa de dialogo, sera redirecionado pra index.php
    window.location.assign("../");
  </script>
  <?php
}
?>
<!DOCTYPE html>
<html>
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
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
  <title>Pronunciation Tips</title>
</head>
<body background="../blur.jpg">
  <?php 
  include './menu.php';
  ?>
  <div class="container">
    <br>
    <?php 
      $paginas = array('home.php');
      if (!isset($_REQUEST['pg'])) {
        $pg = 0;
      }
      else{
        $pg = $_REQUEST['pg']; 
      }
      include $paginas[$pg];

     ?>
  </div>
</body>
</html>