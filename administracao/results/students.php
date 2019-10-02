<?php 
if ((!isset($_REQUEST['school']))||(!isset($_REQUEST['class']))) {
	?>
	<script type="text/javascript">
		alert('School and Class not selected');
		window.location.assign('./');
	</script>
	<?php
}
$school = $_REQUEST['school'];
$class= $_REQUEST['class'];

include '../../conexao.php';

$query = "SELECT * FROM tbalunos WHERE turma_aluno = '$class' ORDER BY nome_aluno ASC";
$sql = mysqli_query($conexao, $query);
?>
<table class="table table-hover bg-light">
	<thead class="thead thead-dark">
		<tr>
			<th>
				Click to see student results
			</th>
		</tr>
		<tr>
			<th>
				Nome
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			while ($row = mysqli_fetch_object($sql)) {
				?>
				<tr style="cursor:  pointer;" onclick="select(<?=$row->cod_aluno?>)">
					<td>
						<?=$row->nome_aluno?>
					</td>
				</tr>
				<?php
			}
		 ?>
	</tbody>
</table>
<script type="text/javascript">
	function select(cod_aluno) {
		window.location.assign('./?pg=2&student='+cod_aluno+'&class='+<?=$class?>+'&school='+<?=$school?>);
	}
</script>