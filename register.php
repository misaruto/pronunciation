<?php
//verificam se todos os dados pedidos no cadastro foram enviados
if ((isset($_REQUEST['name']))&&(isset($_REQUEST['cpf']))&&(isset($_REQUEST['email']))&&(isset($_REQUEST['born']))&&(isset($_REQUEST['login']))&&(isset($_REQUEST['password1']))&&(isset($_REQUEST['password2']))&&(isset($_REQUEST['school']))) {
	//pega todos os dados e salva em variaveis locais
	$name = $_REQUEST['name'];
	$cpf = $_REQUEST['cpf'];
	$email = $_REQUEST['email'];
	$born = $_REQUEST['born'];
	$login = $_REQUEST['login'];
	$password1 = $_REQUEST['password1'];
	$password2 = $_REQUEST['password2'];
	$cod_escola = $_REQUEST['school'];

	include 'conexao.php';
	//verifica se todos as veriveis tem dados.
	if(($name != "")&&($cpf != "")&&($email != "")&&($born != "")&&($login != "")&&($password2 != "")&&($password1 != "")&&($cod_escola != "")){

		if ($password1 == $password2) {
			//o 2 faz referencia a 2 escola cadastrada, que no caso é nenhuma.
			if ($cod_escola == 2) {
				//codigo referente a nenhuma turma
				$cod_turma =1;
			}
			else{
				if (isset($_REQUEST['class'])) {
					$cod_turma = $_REQUEST['class'];
				}
			}

			$senha = md5($password1);
			$query = "INSERT INTO `tbalunos`(`nome_aluno`, `login_aluno`, `senha_aluno`, `cpf_aluno`, `turma_aluno`, `email`, `aluno_escola`,`nascimento`,`permissao`,`cod_recuperacao`) VALUES ('$name','$login','$senha','$cpf','$cod_turma','$email','$cod_escola','$born','0','0')";
			//retorna 1 se o usuario for cadastrado.
			if (mysqli_query($conexao,$query)) {
				?>
				<script type="text/javascript">
					alert("Successfully registered user!!!");
					window.location.assign('./');
				</script>
				<?php
			}
			else{
				echo $query;
								?>
				<script type="text/javascript">
					alert("User not registered!!!");
					//window.location.assign('./');
				</script>
				<?php
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert("The passwords are different. Try again.");
				window.location.assign('./');
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert("Some datas not have been sended.");
			window.location.assign('./');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert("Some datas not have been sended.");
		window.location.assign('./');
	</script>
	<?php
}
?>