<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Exercício</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/cadastros.css">
</head>

<body>
    <main>
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11">
                    <h2>Cadastro de Exercício</h2>
                </div>
            </div>

            <hr>

            <form action="?page=insere_exec" method="post">
                <!-- 1ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nome_usu">Nome do Exercício</label>
                        <input type="text" class="form-control" name="nome_exec" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nome_usu">Imagem</label>
                        <input type="file" class="form-control" name="imagem" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="desc_exec">Descrição</label>
                        <input type="text" class="form-control" name="desc_exec" required>
                    </div>
                </div>
                <hr />
                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <button type="submit" class="btnsub">Salvar</button>
                        <!-- <a href="../../index.php" class="btncancel">Cancelar</a> -->
                    </div>
                </div>
            </form>
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