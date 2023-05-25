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
$acad             = $_POST["acad"];
// $org              = $_POST["orgao_reg"];
// $num_reg          = $_POST["num_reg_func"];

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

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));




// Inserir dados na tabela matriculado //

$id_usu          = mysqli_insert_id($con);
$data_hj         = date('Y/m/d');

$sql_matr = "insert into matriculado values ('0','$acad','$id_usu',1,'$data_hj',NULL);";

$resultado_matr = mysqli_query($con, $sql_matr) or die(mysqli_error($con));




// Caso seja Professor //

if ($tipo == 'PROFESSOR') {

    $org              = $_POST["orgao_reg"];
    $num_reg          = $_POST["num_reg_func"];

    $sql_prof = "insert into professor values ('0','$id_usu','$num_reg','$org');";

    $resultado_prof = mysqli_query($con, $sql_prof) or die(mysqli_error($con));
}




// Caso seja Gerente //

if ($tipo == 'GERENTE') {

    // $acad             = $_POST["acad"];

    // $sql3 = "insert into gerencia values ('0','$id_usu','$acad','$data_cad',1);";
    $sql_geren = "insert into gerencia values ('0','$id_usu','$acad','$data_hj',1);";
    // echo $sql3; exit;

    $resultado_geren = mysqli_query($con, $sql_geren) or die(mysqli_error($con));
}





if ($resultado || $resultado_prof || $resultado_geren || $resultado_matr) {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/base/login.php');
    mysqli_close($con);
}
