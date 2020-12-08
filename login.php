<?php  
$nomedeusuario = $_POST['nomedeusuario'];
$senha = $_POST['senha'];

if($nomedeusuario != "" && $senha != ""){

    $conn = new PDO("sqlsrv:Database=dbphp7;server=localhost;ConnectionPooling=0","sa","root");

    $query = $conn->prepare("select nomedeusuario, senha, tipoUsuario from Usuario where nomedeusuario = :nomedeusuario and senha = :senha");
    $query->bindParam(":nomedeusuario",$nomedeusuario);
    $query->bindParam(":senha",$senha);

    $query->execute();

    $results = $query->fetchall(PDO::FETCH_ASSOC);

    if(empty($results)) {
        echo "Dados de login inválidos";
    } else {
        session_start();

        foreach ($results as $user) {
            $_SESSION['tipoUsuario'] = $user['tipoUsuario'];
            $_SESSION['nomeusuario'] = $user['nomedeusuario'];
        }

        header('Location: cursos.php');
    }
}

?> 