<html lang="pt-br">
  <head>
    <title>cursos</title>
    <link rel="stylesheet" href="cursosativos.css" />
    <script src="cursosativos.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="img corpo" >
    <?php 
    if(isset($_POST['cursoativado'])) {
        for($i = 0; $i < count($_POST['cursoativado']); ++$i) {
            $curso =  $_POST['cursoativado'][$i];
            $nome_do_curso = "$curso";

            echo "  <div>
            <div class='curso'> $curso
            </div> 
                        
             <input class='concluir' id='$i' onClick='botaoCursoConluidoFoiClickado($i)' type='button' value='Concluir curso'> 
            
             <input class='certificado'id='certificado$i' onClick='emitirCertificado(`$nome_do_curso`)' type='button' value='Emitir certificado' disabled> 
            
            </div>";
            
        }
    }
    else header("location: cursos.php");
    ?>
    </div>
</body>
</html>