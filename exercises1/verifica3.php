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


$respostas[] = $_POST["3a"];
$respostas[] = $_POST["3b"];
$respostas[] = $_POST["3c"];
$respostas[] = $_POST["3d"];
$respostas[] = $_POST["3e"];
$respostas[] = $_POST["3f"];
$respostas[] = $_POST["3g"];
$respostas[] = $_POST["3h"];
$respostas[] = $_POST['3i'];
$respostas[] = $_POST['3j'];
$respostas[] = $_POST['3k'];
$respostas[] = $_POST['3l'];
$respostas[] = $_POST['3m'];
$respostas[] = $_POST['3n'];
$respostas[] = $_POST['3o'];
$respostas[] = $_POST['3p'];

$q2 = $_POST['32'];

$codex = $_POST['codex'];
$acertos = 0;
for ($i=0; $i < 16; $i++) { 
	$acertos =  $acertos + $respostas[$i];
}

if ($q2[0] == 2 || $q2[0] == 3 ) {
	$acertos = $acertos + 1;
}
if ($q2[1] == 2 || $q2[1] == 3 ) {
	$acertos = $acertos +1;
}
$erros = 18 - $acertos;


for ($i=0; $i < 16; $i++) { 	
	if ($respostas[$i] == 1) {
		$color[$i] = "#0f0";
	}
	else{
		$color[$i] = "#f00";
	}
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
<!doctype html>
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
<body background="../blur.jpg">
	<?php include "menu.php";?>
	<div class="container"><br><br>
		<div class="card">
			<div class="card-header">
				<h3>Exercise 3</h3>
			</div>
			<div class="card-body">
				<p class="card-text">
					1.We can find many polysyllabic words in the main text. The table below contains some of them. Listen to those words, notice where the stress falls and check the right boxes. Then listen again and check your answers.
				</p>
				<br>
				<center>
					<p>
						<audio controls>
							<source src="./audios/08.ogg" type="audio/ogg"/>
						</audio>
					</p>
				</center>
				<form class="form-group" action="verifica3.php" method="post">
					<table class="table table-striped table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col"></th>
								<th scope="col"><b>Stress on the 1<sup>st</sup> Syllable</b></th>
								<th scope="col">Stress on Penultimate Syllable</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$respostasCertas = array('0','0','1','1','0','0');
							for ($i=0; $i < 7; $i++) { 
								if ($respostas[$i] == $respostasCertas[$i]) {
									$s1[$i] = "checked";
									$s2[$i] = "";
								}
								else{
									$s2[$i] ="checked";
									$s1[$i] = "";
								}
							}


							 ?>
							<tr>
								<th scope="row" style="color: <?=$color[0]?>">Population</th>
								<td>
									<input class="form-control" type=radio name="3a" value="0" disabled <?=$s1[0]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3a" value="1" disabled <?=$s2[0]?>>
								</td>
							</tr>
							<tr>
								<th scope="row" style="color: <?=$color[1]?>">Mathematics</th>
								<td>
									<input class="form-control" type="radio" name="3b" value="0" disabled <?=$s1[1]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3b" value="1" disabled <?=$s2[1]?>>
								</td>
							</tr>
							<tr>
								<th scope="row" style="color: <?=$color[2]?>">Military</th>
								<td>
									<input class="form-control" type="radio" name="3c" value="1" disabled <?=$s1[2]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3c" value="0" disabled <?=$s2[2]?>>
								</td>
							</tr>
							<tr>
								<th scope="row" style="color: <?=$color[3]?>">Profitable</th>
								<td>
									<input class="form-control" type="radio" name="3d" value="1" disabled <?=$s1[3]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3d" value="0"disabled <?=$s2[3]?>>
								</td>
							</tr>
							<tr>
								<th scope="row" style="color: <?=$color[4]?>">Correlation</th>
								<td>
									<input class="form-control" type="radio" name="3e" value="0" disabled <?=$s1[4]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3e" value="1" disabled <?=$s2[4]?>>
								</td>
							</tr>
							<tr>
								<th scope="row" style="color: <?=$color[5]?>">Biometrics</th>
								<td>
									<input class="form-control" type="radio" name="3f" value="0"disabled <?=$s1[5]?>>
								</td>
								<td>
									<input class="form-control" type="radio" name="3f" value="1"disabled <?=$s2[5]?>>
								</td>
							</tr>
						</tbody>
					</table>
					<br><br>
					<p class="card-text">2. In two of the words above the stress falls on the first syllabe. Which are they?</p>
					<!--Nesses LABELs os ids servem para passar o value do input para o label na função que está lifada o window.onload()-->
					<label class="lab" id="0">
						<input type="checkbox" name="32" value="0" class="check" disabled>
						Population
					</label>
					&emsp;
					<label class="lab" id="1">
						<input type="checkbox" name="32" value="1" class="check" disabled>
						Mathematics
					</label>
					&emsp;
					<label class="lab" id="2">
						<input type="checkbox" name="32" value="2" class="check" disabled>
						Military
					</label>
					&emsp;
					<label class="lab" id="3">
						<input type="checkbox" name="32" value="3" class="check" disabled>
						Profitable
					</label>
					&emsp;
					<label class="lab" id="4">
						<input type="checkbox" name="32" value="4" class="check" disabled>
						Correlation
					</label>
					&emsp;
					<label class="lab" id="5">
						<input type="checkbox" name="32" value="5" class="check" >
						Biometrics
					</label>
					<br><br>
					<p class="card-text">
						3. Now listen to some other four-syllable words from the text Best Careers for the Future. Notice where the stress falls and check the right boxes in your notebook. Listen again and check your answers.
					</p>
					<center>
						<p>
							<audio controls>
								<source src="./audios/09.ogg" type="audio/ogg">
								</audio>
							</p>
						</center>
						<table class="table table-striped table-bordered">
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
								
								for ($i=0; $i <10 ; $i++) { 
									$selcted1 = "";
									$selcted2 = "";
									$c = $i +6;
									if ($respostas[$c] == $values1[$i]) {
										$selcted1 = "checked";
									}
									else{
										$selcted2 = "checked";
									}
									?>

									<tr>
										<th scope="row" style="color: <?=$color[$c]?>">
											<?=$enunciado[$i]?>
										</th>

									</td>
									<td>
										<center>
											<input type="radio" name="3<?=$letras[$i]?>" <?=$selcted1?> disabled>
										</center>
									</td>
									<td>
										<center>
											<input type="radio" name="3<?=$letras[$i]?>" <?=$selcted2?> disabled>
										</center>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<div class="card-footer">
						<input type="hidden" name="codex" value="3">
						<center>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
								<h3>View result</h3>
							</button>
						</center>
					</div> 
				</form>
			</div>
		</div>
		<!-- Modal -->
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
		<br>

		<script type="text/javascript">

			window.onload =function() {
				var q1 = <?=$q2[0]?>;
				var q2 = <?=$q2[1]?>;
				console.log(q1);
				var respostas = document.getElementsByClassName('lab');
				var inputs = document.getElementsByClassName('check');
				for (var i = respostas.length - 1; i >= 0; i--) {

					if (respostas[i].id == q1 || respostas[i].id == q2) {
						if (q1 == 3 || q1==4 || q2 == 3 || q2 ==4) {
							respostas[i].style="color:#0f0;";
							inputs[i].checked = true;
						}
						else{
							respostas[i].style="color:#f00;";
							inputs[i].checked = true;
						}
					}
				}
			}
		</script>


	</body>
	</html>
