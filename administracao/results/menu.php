<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0; z-index: 1001; box-shadow: 2px 2px 4px #000;">
  <a class="navbar-brand" href="#">Pronunciation Tips</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="../../main.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../">
          Administration
          
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./results">
          Results
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Register
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../register?pg=0">Classes</a>
          <a class="dropdown-item" href="../register?pg=1">Schools</a>
        </div>
      </li>
      <li>
        <a class="nav-link" href="../../logoff.php">Logoff</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="./">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar  nome do aluno" aria-label="Pesquisar" name="search">
      <input type="hidden" name="pg" value="3">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>