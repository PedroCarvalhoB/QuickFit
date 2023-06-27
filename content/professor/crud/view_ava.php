<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <main>
        <?php
        $id = (int) $_GET['id'];
        $id_aval = (int) $_GET['id_aval'];

        $sql = mysqli_query($con, "select * from avaliacao where id_aval = '" . $id_aval . "';");
        $row = mysqli_fetch_array($sql);

        $sql_alu = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
        $row_alu = mysqli_fetch_array($sql_alu);
        ?>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Visualizar registro da Avaliação -
                <?php echo $id; ?>
            </h3>

            <hr>

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Aluno</strong></p>
                    <p>
                        <?php echo $row_alu['nome_usu']; ?>
                    </p>
                </div>
                <div class="col-md-3">
                    <p><strong>Altura</strong></p>
                    <p>
                        <?php echo $row['altura']; ?>
                    </p>
                </div>
                <div class="col-md-3">
                    <p><strong>Peso</strong></p>
                    <p>
                        <?php echo $row['peso']; ?>
                    </p>
                </div>
                <div class="col-md-3">
                    <p><strong>IMC</strong></p>
                    <p>
                        <?php echo $row['imc']; ?>
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Objetivo</strong></p>
                    <p>
                        <?php echo $row['objetivo']; ?>
                    </p>
                </div>
            </div>
        </div>

        <hr>

		<div id="actions" class="row botoes">
			<div class="col-md-12">
				<a href="?page=lista_ava" class="btncancel">Voltar</a>
			</div>
		</div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>