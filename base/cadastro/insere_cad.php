<?php

    $nome             = $_POST["nome_usu"];
    $cpf              = $_POST["cpf_usu"];
    $tipo             = $_POST["tipo_usu"];
    $cep              = $_POST["cep_usu"];
    $nr               = $_POST["numero"];
    $comp             = $_POST["complemento"];
    $sexo             = $_POST["sexo"];
    $dt_nasc          = $_POST["dt_nasc"];
    $nomepai          = $_POST["nome_pai"];
    $nomemae          = $_POST["nome_mae"];
    $senha            = $_POST["senha_usu"];

    $fdt_nasc 	= implode("-", array_reverse(explode("/", $dt_nasc)));

    $sql = "insert into usuario values ";
    $sql .= "('0',$mat,'$nome','$nomepai','$nomemae','$rg','$cpf','$fdt_nasc', ";
    $sql .= "'$sexo','$esc','$comp','$cep','$oe_rg',$nr);";

    // echo $sql; exit;

    $resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

    if($resultado){
        header('Location: \dashboard/dashboard.php?page=lista_usu&msg=1');
        mysqli_close($con);
    }else{
        header('Location: \dashboard/dashboard.php?page=lista_usu&msg=4');
        mysqli_close($con);
    }
?>