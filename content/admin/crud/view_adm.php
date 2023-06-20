<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.1 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	
</head>

<body>
	<main>
		<?php
		if (!isset($_SESSION))
			session_start();
		?>
		<?php
		$id = $_SESSION['UsuarioID'];
		$sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
		$row = mysqli_fetch_array($sql);

		// $id_acad = $_SESSION['UsuarioAcad'];
		// $sql_acad = mysqli_query($con, "select * from academia where id_acad = '" . $id_acad . "';");
		// $row_acad = mysqli_fetch_array($sql_acad);
		?>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Visualizar registro do Administrador - <?php echo $id; ?> </h3>
			
			<hr>
			
			<div class="row">
				<div class="col-md-2">
					<p><strong>Matrícula</strong></p>
					<p><?php echo $row['matri_usu']; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Nome Completo</strong></p>
					<p><?php echo $row['nome_usu']; ?></p>
				</div>
				<div class="col-md-3">
					<p><strong>Data Nascimento</strong></p>
					<p><?php echo date('d-m-Y', strtotime($row['dt_nasc'])); ?></p>
				</div>
				<div class="col-md-3">
					<p><strong>Sexo</strong></p>
					<p><?php
						if ($row["sexo"] == "M")
							echo "Masculino";
						else
							echo 'Feminino';
						?></p>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="col-md-4">
					<p><strong>Nome do Pai</strong></p>
					<p><?php echo $row['nome_pai']; ?></p>
				</div>
				<div class="col-md-4">
					<p><strong>Nome da Mãe</strong></p>
					<p><?php echo $row['nome_mae']; ?></p>
				</div>
				<div class="col-md-3">
					<p><strong>CPF</strong></p>
					<p><?php echo $row['cpf']; ?></p>
				</div>
				
			</div>

			<br>


			<br>

			<div class="row">
				<div class="col-md-3">
					<p><strong>CEP</strong></p>
					<p><?php echo $row['cep']; ?></p>
				</div>
				<div class="col-md-3">
					<p><strong>Número</strong></p>
					<p><?php echo $row['numero']; ?></p>
				</div>
				<div class="col-md-3">
					<p><strong>Complemento</strong></p>
					<p><?php echo $row['complemento']; ?></p>
				</div>
				
			</div>
			<hr />
			<div id="actions" class="row">
				<div class="col-md-12">
					<?php echo "<a href=?page=fedita_adm&id_usu=" . $row['id_usu'] . " class='btnsub'>Editar</a>"; ?>
				</div>
			</div>
			<br>
		</div>

	</main>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>