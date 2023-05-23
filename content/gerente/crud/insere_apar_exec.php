<?php

$exec              = $_POST["exec"];
$apar              = $_POST["apar"];


$sql = "insert into exe_ap values ";
$sql .= "('0','$apar', '$exec');";

// echo $sql; exit;

$resultado = mysqli_query($con, $sql) or die(mysqli_error($erro));

if ($resultado) {
    header('Location: \QuickFit-main/dashboard.php?page=home');
    mysqli_close($con);
} else {
    header('Location: \QuickFit-main/dashboard.php?page=fadd_apar_exec');
    mysqli_close($con);
}
