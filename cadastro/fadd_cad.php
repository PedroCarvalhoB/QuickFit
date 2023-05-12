<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-11">
            <h2>Cadastro de Usuarios</h2>
        </div>

        <div class="col-md-1">
            <!-- Chama o Formulário para adicionar alunos -->
            <a href="?page=insere_cad" class="btn btn-primary pull-right h2">Novo Aluno</a>
        </div>
    </div>
    <form action="insere_cad.php" method="post">
        <!-- 1ª LINHA -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="tipo_usu">Tipo</label>
                <select class="form-control" name="tipo_usu">
                    <option value="alu">Aluno</option>
                    <option value="prof">Professor</option>
                    <option value="ate">Atendente</option>
                    <option value="ger">Gerente</option>
                    <option value="adm">Admin</option>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="nome_usu">Nome Completo</label>
                <input type="text" class="form-control" name="nome_usu">
            </div>

            <div class="form-group col-md-3">
                <label for="senha_usu">Senha</label>
                <input type="password" class="form-control" name="senha_usu">
            </div>
        </div>
        <!-- 2ª LINHA -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf">
            </div>
            
            <div class="form-group col-md-3">
                <label for="rg_usu">RG</label>
                <input type="text" class="form-control" name="rg_usu">
            </div>

            <div class="form-group col-md-4">
                <label for="sexo">Sexo</label><br>
                <input type="radio" name="sexo" id="sexo" value="M">Masculino
                &nbsp; &nbsp;
                <input type="radio" name="sexo" id="sexo" value="F">Feminino
            </div>
        </div>
        <!-- 3ª LINHA -->
        <div class="row">
            <div class="form-group col-md-3">
                <label for="dt_nasc">Data Nascimento</label>
                <input type="date" class="form-control" name="dt_nasc">
            </div>

            <div class="form-group col-md-6">
                <label for="nome_pai">Nome do Pai</label>
                <input type="text" class="form-control" name="nome_pai">
            </div>

            <div class="form-group col-md-6">
                <label for="nome_mae">Nome da Mãe</label>
                <input type="text" class="form-control" name="nome_mae">
            </div>
        </div>

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
                <input type="number" class="form-control" name="numero">
            </div>
        </div>
        <!-- 6ª LINHA -->
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
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="../../index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>