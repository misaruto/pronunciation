<?php 
if ((!isset($_REQUEST['school']))||(!isset($_REQUEST['class']))||(!isset($_REQUEST['student']))) {
	?>
	<script type="text/javascript">
		alert('School, Class or Student not selected');
		window.location.assign('./');
	</script>
	<?php
}
$school = $_REQUEST['school'];
$class= $_REQUEST['class'];
$student = $_REQUEST['student']; 
include '../../conexao.php';

$query = "SELECT * FROM tbalunos,tbresultados WHERE tbresultados.cod_aluno = '$student' AND tbalunos.cod_aluno = '$student' ORDER BY cod_exercicio ASC";
$sql = mysqli_query($conexao, $query);
$nome = mysqli_fetch_object($sql);

?>
<br>
<table class="table table-striped bg-light">
	<thead class="thead thead-dark">
		<tr>
			<th colspan="6">
				<center>
					<p id="nome"></p>
				</center>
			</th>
		</tr>
		<tr>
			<th>
				<center>
					Exercise
				</center>
			</th>
			<th>
				<center>
					Date
				</center>
			</th>
			<th>
				<center>
					Hits
				</center>
			</th>
			<th>
				<center>
					Hits(%)
				</center>
			</th>
			<th>
				<center>
					Mistakes
				</center>
			</th>
			<th>
				<center>
					Max hits
				</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$pctg_total =0;
		$i = 0;
		while ($row = mysqli_fetch_object($sql)) {
			$i = $i +1;
			$total = $row->acertos + $row->erros;
			$pctg_acertos = ($row->acertos * 100)/$total; 
			$pctg_acertos = ceil($pctg_acertos);
			$pctg_total = $pctg_total + $pctg_acertos;
			?>
			<tr>
				<td>
					<center>
						<a href="../../exercise<?=$row->cod_exercicio?>.php">
							<?=$row->cod_exercicio?>
						</a>
					</center>
				</td>
				<td>
					<center>
						<?=$row->data?>
					</center>
				</td>
				<td>
					<center>
						<?=$row->acertos?>
					</center>
				</td>
				<td>
					<center>
						<?=$pctg_acertos?>%
					</center>
				</td>
				<td>
					<center>
						<?=$row->erros?>
					</center>
				</td>
				<td>
					<center>
						<?=$row->acertos + $row->erros?>
					</center>
				</td>
			</tr>
			<?php
			$nome = $row->nome_aluno;
		}
		$media = $pctg_total/$i;
		$media = ceil($media);
		?>
	</tbody>
	<tfoot>
		<td colspan="6">
			<div class="alert alert-info">
				<center>
					Average of total hit percentages: <b><?=$media?>%</b>
				</center>
			</div>
		</td>
	</tfoot>
</table>
<script type="text/javascript">
	document.getElementById('nome').textContent = '<?=$nome?>';
</script>