<?php

$DB_NAME = 'academia';
$DB_USER = 'root';
$DB_PASS = '';
$DB_HOST = 'localhost';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!isset($_SESSION))
	session_start();

$id_alu     = $_POST['id'];
$id_prof    = $_SESSION['UsuarioID'];
$exec       = $_POST['id_exec'];
$apar       = $_POST['id_apar'];
$treino     = $_POST['treino'];
$serie      = $_POST['num_serie'];
$repeat     = $_POST['num_repeat'];
$dt         = date('Y-m-d');

$sql_treino = "SELECT * FROM treinamento WHERE id_alu = '$id_alu' AND dt_final IS NULL AND treino = '$treino' GROUP BY id_alu;";
$query_treino = mysqli_query($con, $sql_treino);

if (mysqli_num_rows($query_treino) == 0) {
    // $sql_id = 'select u.id_usu from usuario u where u.cpf = "'.$cpf.'";';
    // $query_id = mysqli_query($con, $sql_id);
    // $array_id = mysqli_fetch_array($query_id);
    
    $sql_ava = 'select * from avaliacao a where a.id_alu = "'.$id_alu.'";';
    $query_ava = mysqli_query($con, $sql_ava);
    $array_ava = mysqli_fetch_array($query_ava);
    
    $sql_trei = 'insert into treinamento values ';
    $sql_trei .= '(null,"'.$array_ava['id_aval'].'","'.$id_alu.'","'.$id_prof.'","'.$treino.'","'.$dt.'",null);';
    
    $query_trei = mysqli_query($con, $sql_trei);
}

$array_select_treino = mysqli_fetch_array($query_treino);

$sql = "insert into execucao values (null,'$apar','$exec','".$array_select_treino['id_treinamento']."','$serie','$repeat');";

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($resultado) {
    header('Location: \QuickFit/dashboard.php?page=fadd_treino&id='.$id_alu.'');
    mysqli_close($con);
} else {
    header('Location: \QuickFit/dashboard.php?page=home_prof');
    mysqli_close($con);
}
?>