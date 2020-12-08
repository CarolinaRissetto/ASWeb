<?php   

$nome = $_POST['nomecompleto'];
session_start();
if($_SESSION["tipoUsuario"] != "administrador") {
    echo "Apenas administradores podem acessar essa pagina";
} else {
    if($nome != "")
    {
        $conn = new PDO("sqlsrv:Database=dbphp7;server=localhost;ConnectionPooling=0","sa","root");
        
        $query = $conn->prepare("INSERT INTO Curso (nome) VALUES (:nome)");
        
        $query->bindParam(":nome", $nome);
        
        $result = $query->execute();
        echo $result;
        if (!$result)
        {
            var_dump($query->errorInfo());
            exit;
        }
        else{
            header('location: cursos.php');
        }
    }
}