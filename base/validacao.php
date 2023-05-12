<?php

// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)

if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {

	header("Location: index.php"); exit;

}

// Tenta se conectar ao servidor MySQL e ao DB

$con = mysqli_connect('localhost', 'root', '', 'academia') or trigger_error(mysqli_error($con));




$usuario = mysqli_real_escape_string($con, $_POST['usuario']);

$senha = mysqli_real_escape_string($con, $_POST['senha']);




// Valida��o do usu�rio/senha digitados

$sql  = "select id_usu, nome_usu, nivel from usuario where (nome_usu = '". $usuario ."') ";

$sql .= "and (senha_usu = '". $senha ."') and (status_usu = 1) limit 1";




$query = mysqli_query($con, $sql);




if (mysqli_num_rows($query) != 1) {

	// Mensagem de erro quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado

	header('Content-Type: text/html; charset=utf-8');

	echo "Login invalido!"; exit;

} else {

	// Salva os dados encontados na vari�vel $resultado

	$resultado = mysqli_fetch_assoc($query);




	////// 4.0 - Salvando os dados na sess�o do PHP ////////




	// Se a sess�o n�o existir, inicia uma

	if (!isset($_SESSION)) session_start();




	// Salva os dados encontrados na sess�o

	$_SESSION['UsuarioID'] = $resultado['id_usu'];

	$_SESSION['UsuarioNome'] = $resultado['nome_usu'];

	$_SESSION['UsuarioNivel'] = $resultado['nivel'];




	// Redireciona o visitante

	// switch($_SESSION['UsuarioNivel']){

	// 	case 1: header("Location: dashboard.php"); exit;break;

	// 	case 2: header("Location: dashboard.php"); exit;break;

	// 	case 3: header("Location: dashboard.php"); exit;break;

	// }

	header("Location: ../dashboard.php");

}




?>