<?php
    $id              = $_POST["id_aluno"];
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

    $fdg_dt_nasc = date('Y-m-d',strtotime($dt_nasc)); 

    $sql = "update aluno set nome_alu='".$nome."', pai_alu='".$nomepai."', mae_alu='".$nomemae."', dt_nasc_alu='".$fdg_dt_nasc."', 
    rg_alu='".$rg."', cpf_alu='".$cpf."', sexo_alu='".$sexo."', esc_alu='".$esc."', cep_alu='".$cep."', 
    oe_rg_alu='".$oe_rg."', nr_alu=".$nr.", comp_alu='".$comp."', mat_alu=".$mat." where id_aluno = '".$id."';";

    // echo $sql; exit;

    $resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

    if($resultado){
        header('Location: \dashboard/dashboard.php?page=lista_alu&msg=2');
        mysqli_close($con);
    }else{
        header('Location: \dashboard/dashboard.php?page=lista_alu&msg=4');
        mysqli_close($con);
    }
?>
