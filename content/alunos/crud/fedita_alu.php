<?php
if (!isset($_SESSION))
  session_start();
?>
<?php
	//include "base\conexao.php";
	$id = $_SESSION['UsuarioID'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<div>
		<br><h3 class="page-header">Editar registro do Aluno - <?php echo $id;?></h3>
	</div>

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
					if($row["sexo"]=="M") 
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

	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=view_alu" class="btn btn-secondary">Voltar</a>
			<button type="submit" class="btn btn-primary">Salvar Alterações</button>
		</div>
	</div>
</div>