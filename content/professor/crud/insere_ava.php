<?php

$DB_NAME = 'academia';
$DB_USER = 'root';
$DB_PASS = '';
$DB_HOST = 'localhost';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


if (!isset($_SESSION))
	session_start();


$cpf = $_SESSION['UsuarioCPF'];
$sql_cpf = mysqli_query($con, "select * from usuario where cpf = '" . $cpf . "';");
$row = mysqli_fetch_array($sql_cpf);


$cpf_alu          = $_POST["cpf"];
$alt              = $_POST["altura"];
$peso             = $_POST["peso"];
$imc              = $_POST["imc"];
$obj              = $_POST["objetivo"];
$dt               = date('Y-m-d');
$abdome           = $_POST["med_abdom"];
$torax            = $_POST["med_torax"];
$coxa             = $_POST["med_coxa"];

$query_alu = mysqli_query($con, "select * from usuario where cpf = '".$cpf_alu."';");

$resul_alu = mysqli_fetch_array($query_alu);

// exit;
// header('location: \Quick-fit/index.php');

$sql = "insert into avaliacao values ";
$sql .= "('0','".$resul_alu['id_usu']."','".$row['id_usu']."','".$obj."','".$peso."','".$alt."','".$imc."','".$dt."', '".$abdome."', '".$torax."', '".$coxa."');";

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));


if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=lista_ava');
    mysqli_close($con);
} else {
    header('Location: \QuickFit/dashboard.php?page=fadd_prof');
    mysqli_close($con);
}
?>