<?php
$id = (int) $_GET['id'];

$sql = "update academia set ";
$sql .= "status_acad='1' ";
$sql .= "where id_acad = '".$id."';";

$resultado = mysqli_query($con, $sql)or die(mysqli_error($con));

if($resultado){
	header('Location: \quickfit/dashboard.php?page=lista_acad');
    mysqli_close($con);
}else{
	header('Location: \quickfit/dashboard.php?page=lista_acad');
    mysqli_close($con);
}
?>
