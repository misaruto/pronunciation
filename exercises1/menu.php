<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0; z-index: 1001; box-shadow: 2px 2px 4px #000; color: ">
  <a class="navbar-brand" href="#">Pronunciation Tips</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../main.php">Home</a>
      </li>
      <?php
      //verifica se é um administrador ou um bolsista, se for libera o link de acesso para a administração do sistema
      if ((isset($_COOKIE['admid']))||(isset($_COOKIE['bolsista']))) {
       ?>
       <li class="nav-item">
         <a class="nav-link" href="./administracao">Administration</a>
       </li>
       <?php
     } 
     ?>
     <li class="nav-item dropdown active">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Exercises 1°
        <span class="sr-only">(current)</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="./exercise1.php">Exercise 1</a>
        <a class="dropdown-item" href="./exercise2.php">Exercise 2</a>
        <a class="dropdown-item" href="./exercise3.php">Exercise 3</a>
        <a class="dropdown-item" href="./exercise4.php">Exercise 4</a>
        <a class="dropdown-item" href="./exercise5.php">Exercise 5</a>
        <a class="dropdown-item" href="./exercise6.php">Exercise 6</a>
        <a class="dropdown-item" href="./exercise7.php">Exercise 7</a>
        <a class="dropdown-item" href="./exercise8.php">Exercise 8</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Exercises 2°
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../exercises2/exercise9.php">Exercise 9</a>
        <a class="dropdown-item" href="../exercises2/exercise10.php">Exercise 10</a>
        <a class="dropdown-item" href="../exercises2/exercise11.php">Exercise 11</a>
        <a class="dropdown-item" href="../exercises2/exercise12.php">Exercise 12</a>
        <a class="dropdown-item" href="../exercises2/exercise13.php">Exercise 13</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 14</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 15</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 16</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Exercises 3°
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../exercises3/exercise8.php">Exercise 17</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 18</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 19</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 20</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 21</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 22</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 23</a>
        <a class="dropdown-item" href="../exercises2/exercise8.php">Exercise 24</a>
      </div>
    </li>
    <div>
      <a class="nav-link" href="../logoff.php">Logoff</a>
    </div>
  </ul>
</div>
</nav>