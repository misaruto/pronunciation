<?php 
include '../../conexao.php';
//Clasula que seleciona todas as escolas cadastradas
$query = "SELECT * FROM tbescolas";
//efetua a clausula
$sql = mysqli_query($conexao, $query);

?>
<br>
<table class="table table-light">
  <thead class="thead thead-dark">
    <tr>
      <th colspan="2">
        <center>
          Select school and class to see student results:
        </center>
      </th>
    </tr>
    <tr>
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
    <form action="./">
      <tr>
        <td style="width: 50%;">
          Select your school:
          <select name="school" id="school" onclick="findClasses()" class="form-control">
            <option disabled selected>Schools</option>
            <!-- Ao selecionar uma escola, ela busca todas as turmas com base no CODIGO da escola. A clausula que busca as escolas é realizada no topo da pagina-->
            <?php 
            while ($row = mysqli_fetch_object($sql)) {
              ?>
              <option value="<?=$row->cod_escola?>" > <?=$row->nome?> </option>
              <?php 
            }
            ?>
          </select>
        </td>
        <td>
          Select your class: 
          <select name="class" id="classes" class="form-control">
            <option disabled selected>Select school first</option>

          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <center>
            <input type="hidden" name="pg" value="1">
            <button class="btn btn-lg  btn-outline-primary btn-block">
              Search
            </button>
          </center>
        </td>
      </tr>
    </form>
  </tbody>
</table>
<script type="text/javascript">
    //função que encontra as classe de acordo com a escola selecionada pelo aluno
    function findClasses() {
    //pega o valor selecionado
    var cod_escola = document.getElementById('school').value;
    //verifica se esta vazio
    if (cod_escola.length == 0) { 
      document.getElementById("classes").innerHTML = "";
      return;
    } 
    //caso não
    else {
      //chama a classe XMLHttpRequest
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("classes").innerHTML = this.responseText;
        }
      };
      //passa o codigo da escola para a pagina getClasses.php que retorna as classes que pertencem a escola selecionada
      xmlhttp.open("GET", "../../getClasses.php?cod_escola=" + cod_escola, true);
      xmlhttp.send();
    }
  }
</script>