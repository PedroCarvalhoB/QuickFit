<?php

// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)

if (!empty($_POST) and (empty($_POST['cpf']) or empty($_POST['senha']))) {

	header("Location: ../index.php"); exit;

}

// Tenta se conectar ao servidor MySQL e ao DB

$con = mysqli_connect('localhost', 'root', '', 'academia') or trigger_error(mysqli_error($con));




$cpf = mysqli_real_escape_string($con, $_POST['cpf']);

$senha = mysqli_real_escape_string($con, $_POST['senha']);




// Valida��o do usu�rio/senha digitados

$sql = "select u.id_usu, u.cpf, u.nivel, a.id_acad from usuario u, academia a, matriculado m ";

$sql .= "where (a.id_acad = m.id_acad) and (u.id_usu = m.id_usu) and (u.cpf = '".$cpf."') ";

$sql .= "and (u.senha_usu = '".$senha."') and  (u.status_usu = 1) limit 1;";




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

	$_SESSION['UsuarioCPF'] = $resultado['cpf'];

	$_SESSION['UsuarioNivel'] = $resultado['nivel'];

	$_SESSION['UsuarioAcad'] = $resultado['id_acad'];



	// Redireciona o visitante

	// switch($_SESSION['UsuarioNivel']){

	// 	case 1: header("Location: dashboard.php"); exit;break;

	// 	case 2: header("Location: dashboard.php"); exit;break;

	// 	case 3: header("Location: dashboard.php"); exit;break;

	// }

	include "ch_pages.php";
	
    switch ($_SESSION['UsuarioNivel']) {
		case 1:
		header("Location: ../dashboard.php?page=home_alu");
        break;

      case 2:
        header("Location: ../dashboard.php?page=home_prof");
        break;

      case 3:
        header("Location: ../dashboard.php?page=home_func");
        break;

      case 4:
        header("Location: ../dashboard.php?page=home_ger");
        break;

      case 5:
        header("Location: ../dashboard.php?page=home_adm");
        break;

      default:
        header("Location: home.php");
        break;
    }

}




?>