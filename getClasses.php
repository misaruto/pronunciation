<?php 
include 'conexao.php';
if (isset($_REQUEST['cod_escola'])) {
	$codigo = $_REQUEST['cod_escola'];
	$query = "SELECT * FROM tbturmas WHERE cod_escola = '$codigo'";
	$sql = mysqli_query($conexao, $query);
	while ($row = mysqli_fetch_object($sql)) {
		?>
		<option value="<?=$row->cod_turma?>"><?=$row->turma?></option>
		<?php
	}
}

 ?>