<?php 
include '../../conexao.php';
//Clasula que seleciona todas as escolas cadastradas
$query = "SELECT * FROM tbescolas WHERE cod_escola <> 2";
//efetua a clausula
$sql = mysqli_query($conexao, $query);

?>
<br>
<table class="table table-light table-striped">
	<thead class="thead thead-dark">
		<th colspan="2">
			<center>
				Class register
			</center>
		</th>
	</thead>
	<tbody>
		<form action="registerClasses.php">
			<tr>
				<td>
					<center>
						Select your school:
					</center>
				</td>
				<td>

					<select required name="school" id="school" class="form-control" onclick="selected()">
						<option value="0" disabled selected>Schools</option>
						<!-- Ao selecionar uma escola, ela busca todas as turmas com base no CODIGO da escola. A clausula que busca as escolas é realizada no topo da pagina-->
						<?php 
						while ($row = mysqli_fetch_object($sql)) {
							?>
							<option value="<?=$row->cod_escola?>" >
								<?=$row->nome?> 
							</option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<center>
						Year°Letter or Number
						<br>
						<small>Example: 3°E</small>
					</center>
				</td>
				<td>
					<input type="text" name="class" placeholder="Example: 3°E" class="form-control" style="text-transform:uppercase;" required />
				</td>
			</tr>
			<tr>
				<td>
					<center>
						Observations
					</center>
				</td>
				<td>
					<textarea name="obs" class="form-control"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<button id="btn" type="submit" class="btn btn-lg btn-outline-primary " disabled>
							Save
						</button>
					</center>
				</td>
			</tr>
		</form>
	</tbody>
</table>
<script type="text/javascript">
	function selected(){
		var select = document.getElementById('school');
		var btn = document.getElementById('btn');
		if (select.value != 0) {
			btn.disabled = false;
		}
	}

</script>