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
<style>
    .btnsub {
        display: inline-block;
        font-size: 12px;
        padding: 11px 17px;
        background-color: #ed563b;
        color: #fff;
        text-align: center;
        font-weight: 400;
        text-transform: uppercase;
        transition: all .3s;
        border: none;
        outline: none;
        margin-top: -8px;
        border-radius: 10px;
    }

    .btnsub:hover {
        background-color: #f9735b;
    }
</style>

<body>
    <main>
    <div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-11" style="margin-top: 10px;">
            <h2>Cadastro de Usuarios</h2>
        </div>
    </div>

    <hr>

    <form action="insere_cad.php" method="post">
        <!-- 1ª LINHA -->
        <div class="row">
            <div class="form-group col-md-2">
                <label for="tipo_usu">Tipo</label>
                <select class="form-select" name="tipo_usu">
                    <option value="alu">Aluno</option>
                    <option value="prof">Professor</option>
                    <option value="ate">Atendente</option>
                    <option value="ger">Gerente</option>
                    <option value="adm">Admin</option>
                </select>
            </div>
            <div class="form-group col-md-7">
                <label for="nome_usu">Nome Completo</label>
                <input type="text" class="form-control" name="nome_usu">
            </div>
            <div class="form-group col-md-3">
                <label for="senha_usu">Senha</label>
                <input type="password" class="form-control" name="senha_usu">
            </div>
        </div>

        <br>

        <!-- 2ª LINHA -->
        <div class="row">
            <div class="form-group col-md-3">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf">
            </div>

            <div class="form-group col-md-3">
                <label for="rg_usu">RG</label>
                <input type="text" class="form-control" name="rg_usu">
            </div>
            <div class="form-group col-md-3">
                <label for="sexo">Sexo</label><br>
                <input type="radio" name="sexo" id="sexo" value="M">Masculino
                &nbsp; &nbsp;
                <input type="radio" name="sexo" id="sexo" value="F">Feminino
            </div>
            <div class="form-group col-md-3">
                <label for="dt_nasc">Data Nascimento</label>
                <input type="date" class="form-control" name="dt_nasc">
            </div>
        </div>

        <br>

        <!-- 3ª LINHA -->
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nome_pai">Nome do Pai</label>
                <input type="text" class="form-control" name="nome_pai">
            </div>
            <div class="form-group col-md-6">
                <label for="nome_mae">Nome da Mãe</label>
                <input type="text" class="form-control" name="nome_mae">
            </div>
        </div>
        
        <br>

        <!-- 4ª LINHA -->
        <div class="row">
            <div class="form-group col-md-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep">
            </div>
            <div class="form-group col-md-7">
                <label for="">Logradouro</label>
                <input type="text" class="form-control" name="">
            </div>
            <div class="form-group col-md-2">
                <label for="numero">Número</label>
                <input type="text" class="form-control" name="numero">
            </div>
        </div>

        <br>

        <!-- 5ª LINHA -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" name="complemento">
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
                <button type="submit" class="btnsub">Salvar</button>
                <a href="../../index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
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

