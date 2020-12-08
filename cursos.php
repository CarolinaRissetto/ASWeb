<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>cursos</title>
    <link rel="stylesheet" href="cursos.css" />
    <script src="cursos.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="img corpo" >
      <form action="cursosativos.php" method="POST" class="curso">
          <?php
            session_start();
            $nome = $_SESSION['nomeusuario'];
            if($_SESSION['tipoUsuario'] == 'administrador') {
                echo '<input class="cadastrar" type="button" value="Cadastrar curso" onClick="cadastrarCurso()">';
                echo '<input class="deletar" type="button" value="Deletar curso" onClick="deletarCurso()">';
            }

            echo "<h2 class='titulo'> Bem vindo, $nome </h2>";

            $conn = new PDO("sqlsrv:Database=dbphp7;server=localhost;ConnectionPooling=0","sa","root");
        
            $query = $conn->prepare("SELECT nome from Curso");
                
            $result = $query->execute();

            $results = $query->fetchall(PDO::FETCH_ASSOC);

            if(empty($results)) {
                echo "Nenhum curso cadastrado";
            }

            for($i = 0; $i < count($results); ++$i) {
                $curso = $results[$i]['nome'];

                echo "
                    <div >
                        $curso
                    <input type='checkbox' value='$curso' name='cursoativado[]'>
                    </div >";
            }

          ?>

    
    <input class="ativar" type="submit" value="Ativar cursos"> 

</form>
</div>

</body>
</html>