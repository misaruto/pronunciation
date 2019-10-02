<?php 
if ((isset($_REQUEST['code']))&&(isset($_COOKIE['email']))) {
	$code = $_REQUEST['code'];
	$email = $_COOKIE['email'];
	include './conexao.php';
	$query = "SELECT cod_recuperacao,cod_aluno FROM tbalunos WHERE email = '$email'";
	$sql = mysqli_query($conexao, $query);
	$row = mysqli_fetch_object($sql);
	if ($code == $row->cod_recuperacao) {
		$query = "UPDATE tbalunos SET cod_recuperacao = 0 WHERE cod_aluno = '$row->cod_aluno'";
		if (mysqli_query($conexao,$query)) {
			setcookie('uid',$row->cod_aluno);
			?>1<?php
		}
		else{
			?>0<?php
		}

	}
	else{
		?>-2<?php
	}
}
else{
	?>-3<?php
}
?>
