<?php
$id = (int) @$_GET['id_exec'];

$id_alu = (int) @$_GET['id_alu']
 
$sql = "delete from execucao where id_exec = '$id';"; 

$resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=fadd_treino&id='.$id_alu.'');
    mysqli_close($con);
}else{
    header('Location: \siscrud/index.php?page=home');
    mysqli_close($con);
}
?>