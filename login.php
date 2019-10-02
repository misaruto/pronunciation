<?php
if((isset($_POST['login']))&&(isset($_POST['senha']))&&(isset($_POST['g-recaptcha-response']))){
	include "conexao.php";
	//$login =  mysql_real_escape_string($_POST['login']);
	//$senha = mysql_real_escape_string($_POST['senha']);
	$login =  $_POST['login'];
	$senha = $_POST['senha'];
	//chave secreta de verificação do reCaptcha
	define("reCAPTCHA_SECRETKEY", "6Ldk87YUAAAAAFO-FW8WoTbCNTx9ku3XI2hSNJe7");

	//pega verificação do usuario
	$ValidaCaptcha = $_POST['g-recaptcha-response'];

	//Defino a Chave do meu site
	$SecretKey = reCAPTCHA_SECRETKEY;
			// Verifico se foi feita a postagem do Captcha
	$u =0; 
	if (isset($ValidaCaptcha)){
 				// Valido se a ação do usuário foi correta junto ao google
		$RetornaCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $SecretKey . '&response=' . $_POST['g-recaptcha-response']));

		 	// Se a ação do usuário foi correta executo o restante do meu formulário	

		if ($RetornaCaptcha->success){

			$tbalunos = mysqli_query($conexao,"SELECT * FROM tbalunos");
			
			while ($array = mysqli_fetch_array($tbalunos)) {

   			//$_SESSION['cpf'] = mysql_real_escape_string($array['cpf_aluno']);	
				//$_SESSION['cpf'] = $array['cpf_aluno'];	
				if (($login == $array['login_aluno']) && (md5($senha) == $array['senha_aluno'])){
				// original   setcookie(aluno,"$array[cod_aluno]");
				//permissão total de administrador
					$u =1;
					if ($array['permissao']== 2) {
						setcookie('admid',"$array[cod_aluno]", 0, "", "", false, true);
						setrawcookie('admid',"$array[cod_aluno]", 0, "", "", false, true);

						header("location:./administracao");
					}
				//permissão de Bolsistas
					if ($array['permissao']== 1) {
						setcookie('bolsista',"$array[cod_aluno]", 0, "", "", false, true);
						setrawcookie('bolsista',"$array[cod_aluno]", 0, "", "", false, true);

						header("Location: main.php");
					}
				//permissão usuario comun
					if (($array['permissao']== 0)) {
						setcookie('aluno',"$array[cod_aluno]", 0, "", "", false, true);
						setrawcookie('aluno',"$array[cod_aluno]", 0, "", "", false, true);

						header("Location: main.php");
					}

				}
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert('Captcha error, please try again!');
				window.location.assign('./');
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('Captcha error, please try again!!');
			window.location.assign('./');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Wrong login or password. Try again!');
		window.location.assign('./');
	</script>
	<?php
}
if ($u == 0) {
	?>
	<script type="text/javascript">
		alert('Wrong login or password. Try again!!');
		window.location.assign('./');
	</script>
	<?php
}
?>