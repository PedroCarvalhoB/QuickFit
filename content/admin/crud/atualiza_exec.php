<?php

$id               = $_POST["id_exec"];
$nome             = $_POST["nome_exec"];
$grupo            = $_POST["grupo_muscular"];
$img              = $_FILES['imagem']['tmp_name'];
$descr            = $_POST["desc_exec"];

$img2             = rename($img, "assets/videos_exercicios/.mp4");

$sql = "update exercicio set ";
$sql .= "(nome_exec = '".$nome."', grupo_muscular = '".$grupo."', imagem = '".$img2."', desc_exec = '".$descr."' );";

//echo $sql; exit;

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

//$_SESSION['id_exec'] = mysqli_insert_id($con);

if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=lista_exec');
    mysqli_close($con);
} else {
    header('Location: \QuickFit/dashboard.php?page=fadd_exec');
    mysqli_close($con);
}
