<?php 
include '.conexao.php';
if (isset($_REQUEST['username'])) {
	$login = $_REQUEST['username'];
	$query = "SELECT login_aluno FROM tbalunos WHERE login_aluno = '$login'";
	$sql = mysqli_query($conexao, $query);
	//se não retornar nenhuma linha, significa que o nome de usuario escolhido não esta sendo usado, logo retorna 1 pois o usuario pode prosseguir com o cadastro
	if (mysqli_num_rows($sql) == 0) {
		echo 1;
	}
	else{
		echo 0;
	}
}

 ?>