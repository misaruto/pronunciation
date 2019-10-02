<?php
if ((!isset($_COOKIE['admid']))&&!isset($_COOKIE['bolsista'])) {
	?>
	<script type="text/javascript">
		alert("User not found, please login");
    //apos usuario confirmar caixa de dialogo, sera redirecionado pra index.php
    window.location.assign("../");
</script>
<?php
}
if ((isset($_REQUEST['name']))&&(isset($_REQUEST['obs']))) {
	$school = $_REQUEST['name'];
	$obs = $_REQUEST['obs'];
	include '../../conexao.php';

	$query = "INSERT INTO `tbescolas`( `nome`, `observacoes`) VALUES ('$school','$obs')";
	if (mysqli_query($conexao, $query)) {
		?>
		<script type="text/javascript">
			alert('Successfully registered school !!!');
			window.location.assign('./');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('School not registered !!!');
			window.location.assign('./');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Some values ​​were not sent !!!');
		window.location.assign('./');
	</script>
	<?php
}
?>