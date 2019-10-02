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
    <title>Exercise 4</title>
</head>
<style type="text/css">
    .radio{
        font-size: 24px;
        font-weight: bold;
    }
    .radio:hover{
        color: #45b9e0;
        cursor: pointer;
    }
    .radioColored{
        font-size: 24px;
        color: #45b9e0;
        font-weight: bold;
    }
</style>
<body background="../blur.jpg">
    <?php include "menu.php";?>
    <div class="container">
        <form class="form-group" method="post" action="verifica4.php">
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
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="1" value="0" onclick="verify()" required />
                                            <label class="custom-control-label" for="1">
                                                seat - great
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="2" value="1" onclick="verify()" required/>
                                            <label class="custom-control-label" for="2">
                                                hurry - worry
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="3"value="2" value="0"onclick="verify()" required/>
                                            <label class="custom-control-label" for="3">
                                                wound - round
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="4" value="3" onclick="verify()" required/>
                                            <label class="custom-control-label" for="4">
                                                love - of
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="5" value="4" onclick="verify()" required/>
                                            <label class="custom-control-label" for="5">
                                                great - late
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="6" value="5" onclick="verify()" required/>
                                            <label class="custom-control-label" for="6">
                                                grown - own
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="7" value="6" onclick="verify()" required/>
                                            <label class="custom-control-label" for="7">
                                                tough - though
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="8" value="7" onclick="verify()" required/>
                                            <label class="custom-control-label" for="8">
                                                twin - been
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="9" value="8" onclick="verify()" required/>
                                            <label class="custom-control-label" for="9">
                                                home - come
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="10" value="9" onclick="verify()" required/>
                                            <label class="custom-control-label" for="10">
                                                achieve - believe
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="11" value="10" onclick="verify()" required/>
                                            <label class="custom-control-label" for="11">
                                                tough - enough
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="1[]" id="12" value="11" onclick="verify()" required/>
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
                            <input type="radio" name="2a" value="ah" id="aH" onmouseover="changeColor('ah','aH')" required/>
                            <input type="radio" name="2a" value="ao" id="aO" onmouseover="changeColor('ao','aO')" required/>
                            <input type="radio" name="2a" value="au" id="aU" onmouseover="changeColor('au','aU')" required/>
                            <input type="radio" name="2a" value="ar" id="aR" onmouseover="changeColor('ar','aR')" required/>
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
                            <input type="radio" name="2b" value="bt" id="bT" onmouseover="changeColor('bt','bT')" required/>
                            <input type="radio" name="2b" value="bh" id="bH" onmouseover="changeColor('bh','bH')" required/>
                            <input type="radio" name="2b" value="bu" id="bU" onmouseover="changeColor('bu','bU')" required/>
                            <input type="radio" name="2b" value="bm" id="bM" onmouseover="changeColor('bm','bM')" required/>
                            <input type="radio" name="2b" value="bb" id="bB" onmouseover="changeColor('bb','bB')" required/>
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
                            &emsp;
                            <input type="radio" name="2c" value="cd1" id="cD1" onmouseover="changeColor('cd1','cD1')" required/>
                            <input type="radio" name="2c" value="co" id="cO" onmouseover="changeColor('co','cO')" required/>
                            <input type="radio" name="2c" value="cu" id="cU" onmouseover="changeColor('cu','cU')" required/>
                            <input type="radio" name="2c" value="cb" id="cB" onmouseover="changeColor('cb','cB')" required/>
                            <input type="radio" name="2c" value="ct" id="cT" onmouseover="changeColor('ct','cT')" required/>
                            <input type="radio" name="2c" value="ce" id="cE" onmouseover="changeColor('ce','cE')" required/>
                            <input type="radio" name="2c" value="cd2" id="cD2"onmouseover="changeColor('cd2','cD2')" required/>
                        </div>
                    </div>
                </center>
            </div>
            <div class="card-footer">
                <input type="hidden" name="codex" value="4" />
                <button class="btn btn-lg btn-outline-info btn-block" type="submit">
                    Send
                </button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    function changeColor(id1,id2){
        document.getElementById(id1).className ="radioColored";
        document.getElementById(id2).addEventListener("mouseout", function(){
            document.getElementById(id1).className ="radio";
        }
        );
    }
    function backColor(id){
        document.getElementById(id).style.color="#000";
    }

    function verify() {
        var checkboxes = document.getElementsByClassName('custom-control-input');
        var cont = 0;
        for (var i = checkboxes.length - 1; i >= 0; i--) {
            if (checkboxes[i].checked == true) {
              cont = cont +1;
              verifyCont(cont);
          }
      }
      console.log(cont);
      function verifyCont(cont){
        var checkboxes = document.getElementsByClassName('custom-control-input');
        if (cont >= 8) {

            for (var x = checkboxes.length - 1; x >= 0; x--) {
                if (checkboxes[x].checked == false) {
                    checkboxes[x].disabled = true;

                }
            }
        }
        else{
            for (var x = checkboxes.length - 1; x >= 0; x--) {
                if (checkboxes[x].checked == false) {
                 checkboxes[x].disabled = false;
             }
         }
     }
 }
}
</script>
</body>
</html>