<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Exercícios</title>
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
                    <h2>Cadastrar Exercícios</h2>
                </div>
            </div>

            <br>

            <form enctype="multipart/form-data" action="?page=insere_exec" method="post">
                <!-- 1ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nome_exec">Nome do Exercício</label>
                        <input type="text" class="form-control" name="nome_exec" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="grupo_muscular">Grupo Muscular Trabalhado</label>
                        <input type="text" class="form-control" name="grupo_muscular" required>
                    </div>
                    
                </div>
                
                <br>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="imagem">Imagem</label>
                        <input type="file" class="form-control" name="imagem" required>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="desc_exec">Descrição do Exercício</label>
                        <textarea class="form-control" style="resize: none;" name="desc_exec" id="textAreaExample1" rows="6"></textarea>
                    </div>
                </div>

                <br>
                <hr/>

                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <a href="?page=lista_exec" class="btncancel">Cancelar</a>
                        <button type="submit" class="btnsub">Salvar</button>
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