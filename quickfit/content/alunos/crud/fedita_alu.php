<?php
	//include "base\conexao.php";
	$id = (int) $_GET['id_aluno'];
	$sql = mysqli_query($con, "select * from aluno where id_aluno = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<br><h3 class="page-header">Editar registro do Aluno - <?php echo $id;?></h3>

	<!-- Área de campos do formulário de edição-->

	<form action="?page=atualiza_alu&id_aluno=<?php echo $row['id_aluno']; ?>" method="post">

	<!-- 1ª LINHA -->	
		<input type="hidden" name="id_aluno" value="<?php echo $row['id_aluno']; ?>">
		<div class="row"> 
			<div class="form-group col-md-3">
				<label for="mat_alu">Matrícula</label>
				<input type="text" class="form-control" name="mat_alu" value="<?php echo $row['mat_alu']; ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="nome_alu">Nome Completo</label>
				<input type="text" class="form-control" name="nome_alu" value="<?php echo $row['nome_alu']; ?>">
			</div>
			<div class="form-group col-md-3">
				<label for="dt_nasc_alu">Data Nascimento</label>
				<input type="date" class="form-control" name="dt_nasc_alu" value="<?php echo $row['dt_nasc_alu']; ?>">
			</div>
		</div>
		<!-- 2ª LINHA -->
		<div class="row"> 
			<div class="form-group col-md-4">
				<label for="rg_alu">RG</label>
				<input type="text" class="form-control" name="rg_alu" value="<?php echo $row['rg_alu']; ?>">
			</div>
			<div class="form-group col-md-4">
			<label for="oe_rg_alu">ORG. EXP.</label>
				<input type="text" class="form-control" name="oe_rg_alu" value="<?php echo $row['oe_rg_alu']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="cpf_alu">CPF</label>
				<input type="text" class="form-control" name="cpf_alu" value="<?php echo $row['cpf_alu']; ?>">
			</div>
		</div>
		<!-- 3ª LINHA -->
		<div class="row"> 
			<div class="form-group col-md-6">
				<label for="pai_alu">Nome do Pai</label>
				<input type="text" class="form-control" name="pai_alu" value="<?php echo $row['pai_alu']; ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="mae_alu">Nome da Mãe</label>
				<input type="text" class="form-control" name="mae_alu" value="<?php echo $row['mae_alu']; ?>">
			</div>
		</div>
		<!-- 4ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label for="sexo_alu">SEXO</label><br>
				<?php 
					if($row["sexo_alu"]=="M") 
						echo '<input type="radio"name="sexo_alu"id="sexo_alu"value="M" checked>Masculino 
						&nbsp; &nbsp; 
						<input type="radio"name="sexo_alu"id="sexo_alu"value="F">Feminino'; 
					else 
						echo '<input type="radio"name="sexo_alu"id="sexo_alu"value="M">Masculino 
						&nbsp; &nbsp; 
						<input type="radio"name="sexo_alu"id="sexo_alu"value="F" checked>Feminino'; 
				?>
				<!-- <input type="radio" name="sexo_alu" id="sexo_alu" value="M">Masculino 
				&nbsp; &nbsp;
				<input type="radio" name="sexo_alu" id="sexo_alu" value="F">Feminino -->
			</div>
			<div class="form-group col-md-8">
				<label for="esc_alu">Escolaridade</label>
				<select class="form-control" name="esc_alu">
					<?php 
					if($row["esc_alu"]=="M") 
						echo '<option selected="selected" value="M">Médio</option><option value="S">Superior</option>'; 
					else 
						echo '<option value="M">Médio</option><option selected="selected" value="S">Superior</option>'; 
				?>
				</select>
			</div>

		</div>
		<!-- 5ª LINHA -->
		<div class="row">
			<div class="form-group col-md-3">
				<label for="cep_alu">CEP</label>
				<input type="text" class="form-control" name="cep_alu" value="<?php echo $row['cep_alu']; ?>">
			</div>
				<div class="form-group col-md-7">
				<label for="">Logradouro</label>
				<input type="text" class="form-control" name="">
			</div>
				<div class="form-group col-md-2">
				<label for="nr_alu">Número</label>
				<input type="number" class="form-control" name="nr_alu" value="<?php echo $row['nr_alu']; ?>">
			</div>
		</div>
		<!-- 6ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label for="comp_alu">Complemento</label>
				<input type="text" class="form-control" name="comp_alu" value="<?php echo $row['comp_alu']; ?>">
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
			<a href="?page=lista_alu" class="btn btn-secondary">Voltar</a>
			<button type="submit" class="btn btn-primary">Salvar Alterações</button>
		</div>
	</div>
</div>