<?php   

$nomecompleto = $_POST['nomecompleto'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$nomedeusuario = $_POST['nomedeusuario'];
$senha = $_POST['senha'];
$tipo_usuario = $_POST['tipo_usuario'];

if($nomecompleto != "" && $endereco != "" && $cidade != "" && $estado != "" && $nomedeusuario != "" && $senha != "" && $tipo_usuario != "" )
{

    $conn = new PDO("sqlsrv:Database=dbphp7;server=localhost;ConnectionPooling=0","sa","root");

    $query = $conn->prepare("INSERT INTO Usuario (nomecompleto, endereco, cidade, estado, nomedeusuario, senha, tipoUsuario) VALUES (:nomecompleto,:endereco,:cidade,:estado,:nomedeusuario,:senha, :tipoUsuario)");

    $query->bindParam(":nomecompleto",$nomecompleto);
    $query->bindParam(":endereco",$endereco);
    $query->bindParam(":cidade",$cidade);
    $query->bindParam(":estado",$estado);
    $query->bindParam(":nomedeusuario",$nomedeusuario);
    $query->bindParam(":senha",$senha);
    $query->bindParam(":tipoUsuario", $tipo_usuario);


    $result = $query->execute();
    echo $result;
    if (!$result)
    {
            var_dump($query->errorInfo());
            exit;
    }
    else{
        header('Location: index.html');
    }
}