<?php 
if (!isset($_REQUEST['search'])) {
	?>
	<script type="text/javascript">
		window.location.assign('./');
	</script>
	<?php
}
$search = $_REQUEST['search'];
include '../../conexao.php';
$query = "SELECT * FROM tbalunos,tbturmas,tbescolas WHERE nome_aluno LIKE '%$search%' AND `tbalunos`.turma_aluno = `tbturmas`.cod_turma AND `tbescolas`.cod_escola = `tbalunos`.aluno_escola";
$sql = mysqli_query($conexao, $query);
if (mysqli_num_rows($sql) == 0) {
	?>
	<br>
	<div class="alert alert-warning">
		<center>
			No student found. Try again.
		</center>
	</div>
	<?php
}
else{
?>
<table class="table table-hover bg-light">
	<thead class="thead thead-dark">
		<tr>
			<th colspan="4">
				Click to see student results
			</th>
		</tr>
		<tr>
			<th>
				<center>
					N°
				</center>
			</th>
			<th>
				<center>
					Name
				</center>
			</th>
			<th>
				<center>
					Scholl
				</center>
			</th>
			<th>
				<center>
					Class
				</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while ($row = mysqli_fetch_object($sql)) {
			?>
			<tr style="cursor:  pointer;" onclick="select(<?=$row->cod_aluno?>,<?=$row->cod_turma?>,<?=$row->cod_escola?>)">
				<td>
					<center>
						<?=$row->cod_aluno?>
					</center>
				</td>
				<td>
					<?=$row->nome_aluno?>
				</td>
				<td>
					<center>
						<?=$row->nome?>
					</center>
				</td>
				<td>
					<center>
						<?=$row->turma?>
					</center>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	function select(cod_aluno,turma,escola) {
		window.location.assign('./?pg=2&student='+cod_aluno+'&class='+turma+'&school='+escola);
	}
</script>
<?php
}
?>