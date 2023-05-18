<?php

$nome             = $_POST["nome_apar"];
$acad             = $_POST["acad"];
$quant            = $_POST["quant"];

$sql = "insert into aparelho values ";
$sql .= "('0','$acad','$nome', '$quant');";


$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit-main/dashboard.php?page=home');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/dashboard.php?page=fadd_apar');
    mysqli_close($con);
}