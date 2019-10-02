<?php 
if ((isset($_REQUEST['pas1']))&&(isset($_REQUEST['pas2']))&&(isset($_COOKIE['email']))&&(isset($_COOKIE['uid']))) {
	$p1 = $_REQUEST['pas1'];
	$p2 = $_REQUEST['pas2'];
	$uid = $_COOKIE['uid'];
	$email = $_COOKIE['email'];
	include './conexao.php';
	if ($p1 == $p2) {
		$password = md5($p1);
		$query = "UPDATE tbalunos SET senha_aluno = '$password' WHERE cod_aluno = '$uid'";
		if (mysqli_query($conexao,$query)) {
			setcookie('uid','');
			setcookie('email','');
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
