<?php
$id = (int) $_GET['id'];

$sql = "update usuario set ";
$sql .= "ativo='1' ";
$sql .= "where id_usu = '".$id."';";

$resultado = mysqli_query($con, $sql)or die(mysqli_error($con));

if($resultado){
	header('Location: \quickfit/dashboard.php?page=view_alu');
    mysqli_close($con);
}else{
	header('Location: \quickfit/dashboard.php?page=view_alu');
    mysqli_close($con);
}
?>
