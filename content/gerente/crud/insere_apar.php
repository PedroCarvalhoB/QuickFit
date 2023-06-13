<?php
if (!isset($_SESSION))
session_start();



$nome             = $_POST["nome_apar"];
$acad             = $_SESSION['UsuarioAcad'];
$quant            = $_POST["quant"];

$sql = "insert into aparelho values ";
$sql .= "('0','$acad','select id_apar from aparelho where nome_aparelho like '$nome'', '$quant');";


$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit-main/dashboard.php?page=home');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/dashboard.php?page=fadd_apar');
    mysqli_close($con);
}