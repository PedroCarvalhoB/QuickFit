<?php
    $id              = $_POST["id_usu"];
    $mat              = $_POST["matri_usu"];
    $nome             = $_POST["nome_usu"];
    $dt_nasc          = $_POST["dt_nasc"];
    $sexo             = $_POST["sexo"];
    $nomepai          = $_POST["nome_pai"];
    $nomemae          = $_POST["nome_mae"];
    $nr               = $_POST["numero"];
    $comp             = $_POST["complemento"];

    $fdg_dt_nasc = date('Y-m-d',strtotime($dt_nasc)); 

    $sql = "update usuario set nome_usu='".$nome."', nome_pai='".$nomepai."', 
    nome_mae='".$nomemae."', dt_nasc='".$fdg_dt_nasc."', sexo='".$sexo."', 
    numero=".$nr.", complemento='".$comp."', matri_usu=".$mat." where id_usu = '".$id."';";

    // echo $sql; exit;

    $resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

    if($resultado){
        header('Location: \quickfit/dashboard.php?page=view_gerente');
        mysqli_close($con);
    }else{
        header('Location: \quickfit/dashboard.php?page=view_gerente');
        mysqli_close($con);
    }
?>
