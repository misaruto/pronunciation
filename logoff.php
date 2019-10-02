<?php
if (isset($_COOKIE['admid'])) {
	setcookie('admid',"");
}
if (isset($_COOKIE['bolsista'])) {
	setcookie('bolsista',"");
}
if (isset($_COOKIE['aluno'])) {
	setcookie('aluno',"");		
}
header("location:index.php");
?>