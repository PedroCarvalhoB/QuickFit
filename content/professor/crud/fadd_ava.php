<!--  -->
<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Avaliação</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <main>
    <div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-11 titulo">
            <h2>Cadastro de Avaliação</h2>
        </div>
    </div>

    <hr>

    <form action="?page=insere_ava" method="post">
        <!-- 1ª LINHA -->
        <div class="row">
            <div class="form-group col-md-3">
                <label for="cpf">CPF do Aluno</label>
                <input type="text" class="form-control" name="cpf" id="cpf" required>
            </div>
            <div class="form-group col-md-3">
                <label for="altura">Altura</label>
                <input type="number" class="form-control" name="altura" step="any" required>
            </div>
            <div class="form-group col-md-3">
                <label for="peso">Peso</label>
                <input type="number" class="form-control" name="peso" step="any" required>
            </div>
            <div class="form-group col-md-3">
                <label for="imc">IMC</label>
                <input type="number" class="form-control" name="imc" step="any" required>
                
            </div>
        </div>

        <br>

        <!-- 2ª LINHA -->
        <div class="row">
            <div class="form-group col-md-7">
                <label for="objetivo">Objetivo</label>
                <input type="text" class="form-control" name="objetivo"required>
            </div>
        </div>

        <hr />
        
        <div id="actions" class="row botoes">
            <div class="col-md-12">
                <button type="submit" class="btnsub">Salvar</button>
                <a href="../../index.php" class="btncancel">Cancelar</a>
            </div>
        </div>
        
        <br>
        
    </form>
</div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../assets/js/jquery-3.3.1.min.js" type="text/javascript" ></script>
  <script src="js/dash.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

