<!doctype html>
<html lang="en">

<head>
	<title>Perfil</title>
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
		//include "base\conexao.php";
		$id = $_SESSION['UsuarioID'];
		$sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
		$row = mysqli_fetch_array($sql);
		?>
		<div id="main" class="container-fluid">
		
			<h3 class="page-header">Editar registro do Usuário - <?php echo $id; ?></h3>

			<br>

			<!-- Área de campos do formulário de edição-->

			<form action="?page=atualiza_alu&id_usu=<?php echo $row['id_usu']; ?>" method="post">

				<!-- 1ª LINHA -->
				<input type="hidden" name="id_usu" value="<?php echo $row['id_usu']; ?>">
				<div class="row">
					<div class="form-group col-md-3">
						<label for="matri_usu">Matrícula</label>
						<input type="text" class="form-control" name="matri_usu" value="<?php echo $row['matri_usu']; ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="nome_usu">Nome Completo</label>
						<input type="text" class="form-control" name="nome_usu" value="<?php echo $row['nome_usu']; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="dt_nasc">Data Nascimento</label>
						<input type="date" class="form-control" name="dt_nasc" value="<?php echo $row['dt_nasc']; ?>">
					</div>
				</div>

				<br>

				<!-- 2ª LINHA -->
				<div class="row">
					<div class="form-group col-md-5">
						<label for="nome_pai">Nome do Pai</label>
						<input type="text" class="form-control" name="nome_pai" value="<?php echo $row['nome_pai']; ?>">
					</div>
					<div class="form-group col-md-5">
						<label for="nome_mae">Nome da Mãe</label>
						<input type="text" class="form-control" name="nome_mae" value="<?php echo $row['nome_mae']; ?>">
					</div>
					<div class="form-group col-md-2">
						<label for="sexo">SEXO</label><br>
						<?php
						if ($row["sexo"] == "M")
							echo '<input type="radio"name="sexo"id="sexo"value="M" checked>Masculino 
						&nbsp; &nbsp; 
						<input type="radio"name="sexo"id="sexo"value="F">Feminino';
						else
							echo '<input type="radio"name="sexo"id="sexo"value="M">Masculino 
						&nbsp; &nbsp; 
						<input type="radio"name="sexo"id="sexo"value="F" checked>Feminino';
						?>
					</div>
				</div>

				<br>

				<!-- 3ª LINHA -->
				<div class="row">
					<div class="form-group col-md-3">
						<label for="cep">CEP</label>
						<input type="text" class="form-control" name="cep" value="<?php echo $row['cep']; ?>">
					</div>
					<div class="form-group col-md-7">
						<label for="">Logradouro</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">Número</label>
						<input type="number" class="form-control" name="numero" value="<?php echo $row['numero']; ?>">
					</div>
				</div>

				<br>

				<!-- 4ª LINHA -->
				<div class="row">
					<div class="form-group col-md-4">
						<label for="complemento">Complemento</label>
						<input type="text" class="form-control" name="complemento" value="<?php echo $row['complemento']; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="">Bairro</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group col-md-4">
						<label for="">Cidade</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group col-md-1">
						<label for="">UF</label>
						<input type="text" class="form-control" name="">
					</div>
				</div>
				<hr />

				<div id="actions" class="row botoes">
					<div class="col-md-12">
						<a href="?page=view_alu" class="btncancel">Voltar</a>
						<button type="submit" class="btnsub">Salvar Alterações</button>
					</div>
				</div>
				
				<br>
			
			</form>

		</div>
	</main>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>