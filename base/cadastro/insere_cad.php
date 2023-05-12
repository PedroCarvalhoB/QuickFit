<?php

include '../config.php';

$nome             = $_POST["nome_usu"];
$cpf              = $_POST["cpf"];
$tipo             = $_POST["tipo_usu"];
$cep              = $_POST["cep"];
$nr               = $_POST["numero"];
$comp             = $_POST["complemento"];
$sexo             = $_POST["sexo"];
$dt_nasc          = $_POST["dt_nasc"];
$nomepai          = $_POST["nome_pai"];
$nomemae          = $_POST["nome_mae"];
$senha            = $_POST["senha_usu"];
$rg               = $_POST["rg_usu"];

$fdt_nasc     = implode("-", array_reverse(explode("/", $dt_nasc)));

$mat = rand(1, 1000000);

switch ($tipo) {
    case 'alu':
        $nivel = 1;
        break;
    case 'prof':
        $nivel = 2;
        break;
    case 'ate':
        $nivel = 3;
        break;
    case 'ger':
        $nivel = 4;
        break;
    case 'adm':
        $nivel = 5;
        break;

    default:
        $nivel = 1;
        break;
}

$sql = "insert into usuario values ";
$sql .= "('0','$nome','$cpf', 0 ,'$tipo','$cep','$nr', '$comp',";
$sql .= "'$rg', '$sexo','$fdt_nasc', '$nomepai','$nomemae','$nivel','$senha', 1);";

// echo $sql; exit;

$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
}
