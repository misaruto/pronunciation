<?php 
//faz a verificação de usuarios.
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

if (($_POST['codex'])&&(isset($_POST['1']))&&(isset($_POST['2a']))&&(isset($_POST['2b']))&&(isset($_POST['2c']))) {
    $ex1 = $_POST['1'];
    $a2 = $_POST['2a'];
    $b2 = $_POST['2b'];
    $c2 = $_POST['2c'];
    $codex = $_POST['codex'];
    $acertos = 0;
    foreach ($ex1 as $key => $value) {
        if (($value == 4)||($value == 1)||($value == 5)||($value == 9)||($value == 10)||($value == 3)||($value == 7)||($value == 11)) {
            $acertos = $acertos +1;
        }
    }

    if ($a2 == 'ah') {
        $acertos = $acertos +1;
        $colorA = "#0f0";
    }
    else{
        $colorA = "#f00";
    }
    if ($b2 == 'bb') {
        $acertos = $acertos +1;
        $colorB = "#0f0";
    }
    else{
        $colorB = "#f00";
    }
    if ($c2 == 'cb') {
        $acertos = $acertos +1;
        $colorC = "#0f0";
    }
    else{
        $colorC = "#f00";
    }
    $erros = 11 - $acertos;
}

include "../conexao.php";

date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');

//VERIFICA SE O USUARIO JÁ RESPONDEU.
$query_verifica = "SELECT * FROM tbresultados WHERE cod_aluno = '$aluno' and cod_exercicio = '$codex'";
$sql_verifica = mysqli_query($conexao,$query_verifica);
if (mysqli_num_rows($sql_verifica) == 0) {
    $query = mysqli_query($conexao,"INSERT INTO `tbresultados` (`cod_aluno`, `cod_exercicio`, `acertos`,`data`,`cod_registro`,`erros`) VALUES ('$aluno','$codex','$acertos','$date',NULL,'$erros')");
}
else{
    ?>
    <script type="text/javascript">
        alert('Answers not saved.');
    </script>
    <?php
}

$nomealuno = mysqli_query($conexao,"SELECT nome_aluno FROM tbalunos WHERE `cod_aluno` = '$aluno'");

$nome_aluno = mysqli_fetch_array($nomealuno);
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
    <title>Exercise 4</title>
</head>

<body background="../blur.jpg">
    <?php include "menu.php";?>
    <div class="container">
        <form class="form-group">
            <div class="card">
                <div class="card-header">
                    <h3>Exercise 4</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        1. The words in the box below can be found in the texts <i><a href="text4.php">Someone Who Cares and Foster Mother's Unconditional Love Helps Children Overcome Odds</a></i>. Select below the pairs of words that rhyme with each other.
                    </p>
                    <center>
                        <p>
                            <audio controls>
                                <source src="./audios/11.ogg" type="audio/ogg"/>
                            </audio>
                        </p>
                    </center>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1" id="1" disabled />
                                            <label class="custom-control-label" for="1">
                                                seat - great
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="2" id="2" disabled/>
                                            <label class="custom-control-label" for="2">
                                                hurry - worry
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="3" id="3" disabled/>
                                            <label class="custom-control-label" for="3">
                                                wound - round
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="4" id="4" disabled/>
                                            <label class="custom-control-label" for="4">
                                                love - of
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="5" id="5" disabled/>
                                            <label class="custom-control-label" for="5">
                                                great - late
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="6" id="6" disabled/>
                                            <label class="custom-control-label" for="6">
                                                grown - own
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="7" id="7" disabled/>
                                            <label class="custom-control-label" for="7">
                                                tough - though
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="8" id="8" disabled/>
                                            <label class="custom-control-label" for="8">
                                                twin - been
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="9" id="9" disabled/>
                                            <label class="custom-control-label" for="9">
                                                home - come
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="10" id="10" disabled/>
                                            <label class="custom-control-label" for="10">
                                                achieve - believe
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="11" id="11" disabled/>
                                            <label class="custom-control-label" for="11">
                                                tough - enough
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="12" id="12" disabled/>
                                            <label class="custom-control-label" for="12">
                                                tears - years
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>
                       2. Each of the three words below contains a silent letter. Can you spot them? Then listen and check your answers. Say those words aloud.
                   </p>
                   <center>
                    <p>
                        <audio controls>
                            <source src="./audios/12.ogg" type="audio/ogg" />
                        </audio>
                    </p>
                    <div class="row">
                        <div style="font-size: 20px" class="col-sm">
                            A)
                            <label for="aH" class="radio" id="ah">h</label>
                            <label for="aO" class="radio" id="ao">o</label>
                            <label for="aU" class="radio" id="au">u</label>
                            <label for="aR" class="radio" id="ar">r</label>
                            <br>
                            &emsp;
                            <input type="radio" name="2a" value="h" id="aH" disabled/>
                            <input type="radio" name="2a" value="o" id="aO" disabled/>
                            <input type="radio" name="2a" value="u" id="aU" disabled/>
                            <input type="radio" name="2a" value="r" id="aR" disabled/>
                        </div>
                        <div style="font-size: 20px" class="col-sm">
                            B)
                            <label for="bT" class="radio" id="bt">t</label>
                            <label for="bH" class="radio" id="bh">h</label>
                            <label for="bU" class="radio" id="bu">u</label>
                            <label for="bM" class="radio" id="bm">m</label>
                            <label for="bB" class="radio" id="bb">b</label>
                            <br>
                            &emsp;
                            <input type="radio" name="2b" value="t" id="bT" disabled/>
                            <input type="radio" name="2b" value="h" id="bH" disabled/>
                            <input type="radio" name="2b" value="u" id="bU" disabled/>
                            <input type="radio" name="2b" value="m" id="bM" disabled/>
                            <input type="radio" name="2b" value="b" id="bB" disabled/>
                        </div>
                        <div style="font-size: 20px" class="col-sm">
                            C)
                            <label for="cD1" class="radio" id="cd1">d</label>
                            <label for="cO" class="radio" id="co">o</label>
                            <label for="cU" class="radio" id="cu">u</label>
                            <label for="cB" class="radio" id="cb">b</label>
                            <label for="cT" class="radio" id="ct">t</label>
                            <label for="cE" class="radio" id="ce">e</label>
                            <label for="cD2" class="radio" id="cd2">d</label>
                            <br>
                            <input type="radio" name="2c" value="d" id="cD" disabled/>
                            <input type="radio" name="2c" value="o" id="cO" disabled/>
                            <input type="radio" name="2c" value="u" id="cU" disabled/>
                            <input type="radio" name="2c" value="b" id="cB" disabled/>
                            <input type="radio" name="2c" value="t" id="cT" disabled/>
                            <input type="radio" name="2c" value="e" id="cE" disabled/>
                            <input type="radio" name="2c" value="d" id="cD" disabled/>
                        </div>
                    </div>
                </center>
            </div>
            <div class="card-footer">
                <center>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                        <h3>View result</h3>
                    </button>
                </center>
            </div>
        </div>
    </form>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle"><span class="badge badge-dark">Your result</span></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>
                        <span class="badge badge-success">Hits</span>:  <span class="badge badge-info"><?=$acertos?></span></h4>
                        <h4><span class="badge badge-danger">Errors</span>:  <span class="badge badge-info"><?=$erros?></span></h4> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"><a href="print.php?nome=<?=$nome_aluno?>">Print</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function(){
            <?php 
            foreach ($ex1 as $key => $value) {

                if (($value == 4)||($value == 1)||($value == 5)||($value == 9)||($value == 10)||($value == 3)||($value == 7)||($value == 11)) {
                 //incrementa +1 no value devido os ids começarem do 1, porem os values que foram passados começam do 0.
                    $value = $value +1;
                    ?>
                    document.getElementById('<?=$value?>').labels[0].style.color = '#0f0';
                    <?php
                }
                else{
                 $value = $value +1;
                 ?>
                 document.getElementById('<?=$value?>').labels[0].style.color = '#f00';
                 <?php
             }

             ?>
             document.getElementById('<?=$value?>').selected = true;
             <?php
         }
         ?>
         document.getElementById('<?=$a2?>').style.color = '<?=$colorA?>';
         document.getElementById('<?=$b2?>').style.color = '<?=$colorB?>';
         document.getElementById('<?=$c2?>').style.color = '<?=$colorC?>';
     }
 </script>
</body>
</html>