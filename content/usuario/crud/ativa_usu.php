<?php
$id = (int) $_GET['id'];

$sql = "update usuario set ";
$sql .= "status_usu='1' ";
$sql .= "where id_usu = '".$id."';";

$resultado = mysqli_query($con, $sql)or die(mysqli_error($con));

if($resultado){
	header('Location: \quickfit/dashboard.php?page=lista_usu');
    mysqli_close($con);
}else{
	header('Location: \quickfit/dashboard.php?page=lista_usu');
    mysqli_close($con);
}
?>
