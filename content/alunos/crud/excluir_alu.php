<?php
$id = (int) @$_GET['id_aluno'];
 
$sql = "delete from aluno where id_aluno = '$id';"; 

$resultado = mysqli_query($con, $sql)or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \dashboard/dashboard.php?page=lista_alu&msg=3');
    mysqli_close($con);
}else{
    header('Location: \dashboard/dashboard.php?page=lista_alu&msg=4');
    mysqli_close($con);
}
?>
