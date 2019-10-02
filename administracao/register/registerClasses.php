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
if ((isset($_REQUEST['school']))&&(isset($_REQUEST['class']))&&(isset($_REQUEST['obs']))) {
	$school = $_REQUEST['school'];
	$class = $_REQUEST['class'];
	$obs = $_REQUEST['obs'];
	include '../../conexao.php';

	$query = "INSERT INTO `tbturmas`(`turma`, `observacoes`, `cod_escola`) VALUES ('$class','$obs','$school')";
	if (mysqli_query($conexao, $query)) {
		?>
		<script type="text/javascript">
			alert('Successfully registered class !!!');
			window.location.assign('./');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Class not registered !!!');
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