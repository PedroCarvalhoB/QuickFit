<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Usuários</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/cadastros.css">
</head>

<body>
    <main>
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11 titulo">
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
                            <option value="ALUNO">Aluno</option>
                            <option value="PROFESSOR">Professor</option>
                            <option value="ATENDENTE">Atendente</option>
                            <option value="GERENTE">Gerente</option>
                            <option value="ADMIN">Administrador(a)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="nome_usu">Nome Completo</label>
                        <input type="text" class="form-control" name="nome_usu" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="senha_usu">Senha</label>
                        <input type="password" class="form-control" name="senha_usu" required>
                    </div>
                </div>

                <br>

                <!-- 2ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" class="form-control" name="cpf" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="rg_usu">RG</label>
                        <input type="text" class="form-control" name="rg_usu" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="sexo">Sexo</label><br>
                        <input type="radio" name="sexo" id="sexo" value="M" required>Masculino
                        &nbsp; &nbsp;
                        <input type="radio" name="sexo" id="sexo" value="F" required>Feminino
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dt_nasc">Data Nascimento</label>
                        <input type="date" class="form-control" name="dt_nasc" required>
                    </div>
                </div>

                <br>

                <!-- 3ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome_pai">Nome do Pai</label>
                        <input type="text" class="form-control" name="nome_pai" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome_mae">Nome da Mãe</label>
                        <input type="text" class="form-control" name="nome_mae" required>
                    </div>
                </div>

                <br>

                <!-- 4ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" class="form-control" name="cep" required>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" name="numero" required>
                    </div>
                </div>

                <br>

                <!-- 5ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Bairro</label>
                        <input type="text" class="form-control" name="bairro" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Cidade</label>
                        <input type="text" class="form-control" name="cidade" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="">UF</label>
                        <input type="text" class="form-control" name="uf" required>
                    </div>
                </div>
                <hr />

                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <button type="submit" class="btnsub">Salvar</button>
                        <a href="../../index.php" class="btncancel">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../../assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../../assets/js/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="../../assets/js/script_mask.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>