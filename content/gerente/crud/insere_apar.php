<?php
if (!isset($_SESSION))
session_start();


$nome             = $_POST["nome_apar"];
$acad             = $_SESSION['UsuarioAcad'];
$quant            = $_POST["quant"];

$sql_apar = "select id_apar from aparelho a where nome_apar like '".$nome."';";

$resul_id = mysqli_query($con, $sql_apar);

$id_apar = mysqli_fetch_array($resul_id);

$sql = "insert into apar_acad values ";
$sql .= "(null,'$acad','".$id_apar['id_apar']."', '$quant');";


$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=home');
    mysqli_close($con);
} else {
    header('Location: \QuickFit/dashboard.php?page=fadd_apar');
    mysqli_close($con);
}