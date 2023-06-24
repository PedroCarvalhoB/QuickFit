<?php 
include "../../../base/config.php";

if (!isset($_SESSION)){
	session_start();
}

$dt = date('Y-m-d');

$id = (int) $_GET['id'];
$sql_usu = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
$row = mysqli_fetch_array($sql_usu);

$sql_check = "SELECT * FROM treinamento 
WHERE id_alu = '".$row['id_usu']."';";

$check = mysqli_query($con, $sql_check);

if (mysqli_num_rows($check) != 0) {
    $sql_block = "UPDATE treinamento 
    SET dt_final = '$dt'
    WHERE id_alu = '".$row['id_usu']."';";

    $block = mysqli_query($con, $sql_block);
}

header('Location: \QuickFit/dashboard.php?page=fadd_treino&id='.$row['id_usu'].'');
mysqli_close($con);

?>