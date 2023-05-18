<?php

	$nome 			= $_POST["nome"];
	$cnpj		    = $_POST["cnpj"];
	$cep			= $_POST["cep"];
	$nr		        = $_POST["numero"];
	$comp		    = $_POST["comp"];


	$sql = "insert into academia values ";
	$sql .= "('0','$nome','$cnpj', '$cep','$nr','$comp');";

	$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

	if ($resultado) {
		header('Location: \quickfit/dashboard.php?page=home');
		mysqli_close($con);
	} else {
		header('Location: \quickfit/dashboard.php?page=fadd_acad');
		mysqli_close($con);
	}
	
?>