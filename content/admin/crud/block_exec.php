<?php
$id = (int) $_GET['id'];

$sql = "update exercicio set ";
$sql .= "status_exec='0' ";
$sql .= "where id_exec = '".$id."';";

$resultado = mysqli_query($con, $sql)or die(mysqli_error($con));

if($resultado){
	header('Location: \quickfit/dashboard.php?page=lista_exec');
	mysqli_close($con);
}else{
	header('Location: \quickfit/dashboard.php?page=lista_exec');
	mysqli_close($con);
}

?>
