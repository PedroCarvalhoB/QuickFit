<?php

$DB_NAME = 'academia';
$DB_USER = 'root';
$DB_PASS = '';
$DB_HOST = 'localhost';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


$cpf        = $_POST['cpf'];
$apar       = $_POST['nome_apar'];
$treino     = $_POST['treino'];
$dt         = date('Y-m-d');


$sql_id = 'select u.id_usu from usuario u where u.cpf = "'.$cpf.'";';
$query_id = mysqli_query($con, $sql_id);
$array_id = mysqli_fetch_array($query_id);

$sql_ava = 'select a.id_aval from avaliacao a where a.id_alu = "'.$array_id["id_usu"].'";'
$query_ava = mysqli_query($con, $sql_ava);
$array_ava = mysqli_fetch_array($query_ava);

$sql = 'insert into treinamento values ';
$sql .= '(null,"'.$array_ava["id_aval"].'","'.$array_id["id_usu"].'","'.$treino.'","'.$dt.'",null);';

$query = mysqli_query($con, $sql);

if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=fadd_execu');
    mysqli_close($con);
} else {
    header('Location: \QuickFit/dashboard.php?page=home_prof');
    mysqli_close($con);
}
?>