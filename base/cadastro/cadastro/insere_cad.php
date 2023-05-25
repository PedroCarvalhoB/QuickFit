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
// $org              = $_POST["orgao_reg"];
// $num_reg          = $_POST["num_reg_func"];
// $acad             = $_POST["id_acad"];

$fdt_nasc     = implode("-", array_reverse(explode("/", $dt_nasc)));

$nivel = 1;
switch ($tipo) {
    case 'ALUNO':
        $nivel = 1;
        break;
    
    case 'PROFESSOR':
        $nivel = 2;
        break;
    
    case 'RECEPCIONISTA':
        $nivel = 3;
        break;

    case 'GERENTE':
        $nivel = 4;
        break;

    case 'ADMIN':
        $nivel = 5;
        break;
    
    default:
        $nivel = 1;
        break;
}

$matri = rand( 10000000, 99999999);

$sql = "insert into usuario values ";
$sql .= "('0','$nome','$cpf',$matri,'$tipo','$cep','$nr', '$comp',";
$sql .= "'$rg','$sexo','$fdt_nasc','$nomepai','$nomemae','$nivel','$senha', 1);";

// echo $sql; exit;

$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

// Caso seja Professor //
if ($tipo == 'PROFESSOR') {

    $org              = $_POST["orgao_reg"];
    $num_reg          = $_POST["num_reg_func"];

    $id_usu = mysqli_insert_id($con);
    $sql2 = "insert into professor values ('0','$id_usu','$num_reg','$org');";

    $resultado_prof = mysqli_query($con, $sql2) or die(mysqli_error($erro));
}

// Caso seja Gerente //
if ($tipo == 'GERENTE') {

    $acad             = $_POST["acad"];
    $data_cad         = date('Y/m/d');

    $id_usu = mysqli_insert_id($con);
    $sql3 = "insert into gerencia values ('0','$id_usu','$acad','$data_cad',1);";

    $resultado_geren = mysqli_query($con, $sql3) or die(mysqli_error($erro));
}

if ($resultado || $resultado_prof || $resultado_geren) {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
}
