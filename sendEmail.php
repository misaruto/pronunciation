<?php 
if ((isset($_REQUEST['email']))||(isset($_COOKIE['email']))) {
	if (isset($_REQUEST['email'])) {
		$email = $_REQUEST['email'];
	}
	if (isset($_COOKIE['email'])) {
		$email = $_COOKIE['email'];
	}
	include './conexao.php';
	$query = "SELECT * FROM tbalunos WHERE email = '$email'";
	$sql = mysqli_query($conexao, $query);
	$row = mysqli_fetch_object($sql);
	$codigo = rand(100000,999999);
	$sql_update = "UPDATE tbalunos SET `cod_recuperacao` = '$codigo' WHERE cod_aluno = '$row->cod_aluno'";
	if (mysqli_query($conexao, $sql_update)) {
		//chama a classe de enviar emails
		include 'PHPMailer-master/PHPMailerAutoload.php';


		// Inicia a classe PHPMailer 
		$mail = new PHPMailer(); 

		define('GUSER', 'tipspron@gmail.com');
		define('GPWD', '@protips');

            // Corpo do email 
		$body = '
		<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<title></title>
		</head>
		<body>

		<div>
		<h2>Password recovery Pronunciation </h2>
		<div style="font-size: 26px">
		Hi '.$row->nome_aluno.' your verification code is:  
		<font style="font-size: 24px; font-weight:bold;">
		'.$codigo.'	
		</font>
		<div style="font-size: 20px">
		No reply this mail.
		</div>
		</div>
		</body>
		</html>'; 



		$mail = new PHPMailer();
		/* Montando o Email*/
		$mail->IsSMTP(); /* Ativar SMTP*/
		$mail->SMTPDebug = 0; /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
		$mail->SMTPAuth = true; /* Autenticação ativada */
		$mail->SMTPSecure = 'tls'; /* TLS REQUERIDO pelo GMail*/
		$mail->Host = 'smtp.gmail.com'; /* SMTP utilizado*/
		$mail->Port = 587; /* A porta 465 deverá estar aberta em seu servidor*/
		$mail->Username = 'tipspron@gmail.com';
		$mail->Password = '@protips';
		$mail->CharSet = 'UTF-8'; 
		$mail->SetFrom(GUSER,'Pronunciation');
		$mail->Subject = "Recovery code Pronunciation [".$codigo."].";
		$mail->Body = $body;
		$mail->AddAddress($email);
		$mail->IsHTML(true);




// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
		$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
		if ($enviado){
			setcookie('email',$email);
			?>1<?php
		} 
		else { 
			?>-1<?php
		} 
	}		
	else { 
		?>-2<?php
	} 

}
else { 
	?>-3<?php
} 
?>