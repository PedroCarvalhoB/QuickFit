<div id="main" class="container-fluid">
 	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Cadastro de alunos</h2>
		</div>

		<div class="col-md-1">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_alu" class="btn btn-primary pull-right h2">Novo Aluno</a> 
		</div>
	</div>
	<form action="?page=insere_alu" method="post">
		<!-- 1ª LINHA -->	
		<div class="row"> 
			<div class="form-group col-md-3">
				<label for="mat_alu">Matrícula</label>
				<input type="text" class="form-control" name="mat_alu">
			</div>
			<div class="form-group col-md-6">
				<label for="nome_alu">Nome Completo</label>
				<input type="text" class="form-control" name="nome_alu">
			</div>
			<div class="form-group col-md-3">
				<label for="dt_nasc_alu">Data Nascimento</label>
				<input type="date" class="form-control" name="dt_nasc_alu">
			</div>
		</div>
		<!-- 2ª LINHA -->
		<div class="row"> 
			<div class="form-group col-md-4">
				<label for="rg_alu">RG</label>
				<input type="text" class="form-control" name="rg_alu">
			</div>
			<div class="form-group col-md-4">
			<label for="oe_rg_alu">ORG. EXP.</label>
				<input type="text" class="form-control" name="oe_rg_alu">
			</div>
			<div class="form-group col-md-4">
				<label for="cpf_alu">CPF</label>
				<input type="text" class="form-control" name="cpf_alu">
			</div>
		</div>
		<!-- 3ª LINHA -->
		<div class="row"> 
			<div class="form-group col-md-6">
				<label for="pai_alu">Nome do Pai</label>
				<input type="text" class="form-control" name="pai_alu">
			</div>
			<div class="form-group col-md-6">
				<label for="mae_alu">Nome da Mãe</label>
				<input type="text" class="form-control" name="mae_alu">
			</div>
		</div>
		<!-- 4ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label for="sexo_alu">SEXO</label><br>
				<input type="radio" name="sexo_alu" id="sexo_alu" value="M">Masculino 
				&nbsp; &nbsp;
				<input type="radio" name="sexo_alu" id="sexo_alu" value="F">Feminino
			</div>
			<div class="form-group col-md-8">
				<label for="esc_alu">Escolaridade</label>
				<select class="form-control" name="esc_alu">
					<option> --------- </option>
					<option value="M">Médio</option>
					<option value="S">Superior</option>
				</select>
			</div>

		</div>
		<!-- 5ª LINHA -->
		<div class="row">
			<div class="form-group col-md-3">
				<label for="cep_alu">CEP</label>
				<input type="text" class="form-control" name="cep_alu">
			</div>
				<div class="form-group col-md-7">
				<label for="">Logradouro</label>
				<input type="text" class="form-control" name="">
			</div>
				<div class="form-group col-md-2">
				<label for="nr_alu">Número</label>
				<input type="number" class="form-control" name="nr_alu">
			</div>
		</div>
		<!-- 6ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label for="comp_alu">Complemento</label>
				<input type="text" class="form-control" name="comp_alu">
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
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=lista_alu" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</form> 
</div>
