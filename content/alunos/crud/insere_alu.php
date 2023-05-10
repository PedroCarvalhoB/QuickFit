<?php

    $mat              = $_POST["mat_alu"];
    $nome             = $_POST["nome_alu"];
    $dt_nasc          = $_POST["dt_nasc_alu"];
    $sexo             = $_POST["sexo_alu"];
    $nomepai          = $_POST["pai_alu"];
    $nomemae          = $_POST["mae_alu"];
    $rg           	  = $_POST["rg_alu"];
    $cpf              = $_POST["cpf_alu"];
    $esc              = $_POST["esc_alu"];
    $cep              = $_POST["cep_alu"];
    $oe_rg            = $_POST["oe_rg_alu"];
    $nr               = $_POST["nr_alu"];
    $comp             = $_POST["comp_alu"];

    $fdt_nasc 	= implode("-", array_reverse(explode("/", $dt_nasc)));

    $sql = "insert into aluno values ";
    $sql .= "('0',$mat,'$nome','$nomepai','$nomemae','$rg','$cpf','$fdt_nasc', ";
    $sql .= "'$sexo','$esc','$comp','$cep','$oe_rg',$nr);";

    // echo $sql; exit;

    $resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

    if($resultado){
        header('Location: \dashboard/dashboard.php?page=lista_alu&msg=1');
        mysqli_close($con);
    }else{
        header('Location: \dashboard/dashboard.php?page=lista_alu&msg=4');
        mysqli_close($con);
    }
?>