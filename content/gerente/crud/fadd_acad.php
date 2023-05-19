<head>
    <title>Cadastro de Usuários</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/cadastros.css">
</head>

<div id="main" class="container-fluid">
	<h2 class="page-header ">Cadastrar Academia</h2>
	<form action="?page=insere_acad" method="post">

		<div id="linha01" class="row">
			<div class="form-group col-md-1">
				<label for="id">ID</label>
				<input type="text" disabled="disabled" value="0" class="form-control" name="id">
			</div>

			<div class="form-group col-md-3">
				<label for="nome">Nome da Academia</label>
				<input type="text" class="form-control" name="nome">
			</div>

			<div class="form-group col-md-3">
				<label for="cnpj">CNPJ</label>
				<input type="text" class="form-control" name="cnpj">
			</div>


		</div>

		<div id="linha02" class="row">

			<div class="form-group col-md-3">
				<label for="cep">CEP</label>
				<input type="text" class="form-control" name="cep">
			</div>

			<div class="form-group col-md-1">
				<label for="numero">Número</label>
				<input type="number" class="form-control" name="numero">
			</div>

			<div class="form-group col-md-4">
				<label for="comp">Complemento</label>
				<input type="text" class="form-control" name="comp">
			</div>

		</div>

		<hr />
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btnsub">Salvar</button>
			</div>
		</div>

	</form>

	<!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</div>