<?php

$nome             = $_POST["nome_exec"];
$img              = $_POST["imagem"];
$descr            = $_POST["desc_exec"];

$sql = "insert into exercicio values ";
$sql .= "('0','$nome','$img', '$descr');";

// echo $sql; exit;

$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit-main/dashboard.php?page=home');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/dashboard.php?page=fadd_exec');
    mysqli_close($con);
}
