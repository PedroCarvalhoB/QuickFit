<?php
if (!isset($_SESSION))
  session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Aparelho</title>
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
                    <h2>Cadastro de Aparelho</h2>
                </div>
            </div>

            <br>

            <form action="?page=insere_apar" method="post">
                <!-- 1ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nome_apar">Nome do Aparelho</label>
                        <input type="text" class="form-control" name="nome_apar" required>
                    </div>

                    <!-- PRECISA SER MUDADO PARA APARECER AS ACADEMIAS VINCULADAS AOU GERENTE -->
                    <div class="form-group col-md-2">
                        <label for="acad">Academia</label>
                        <select class="form-select" name="acad" required>
                            <?php
                            $id = $_SESSION['UsuarioID'];
                            $data = mysqli_query($con, "select * from academia AS a
                            INNER JOIN gerencia AS g ON a.id_acad = g.id_acad
                            WHERE g.id_usu = $id
                            order by nome_acad asc;") or die(mysqli_error($con));
                            
                            while($info = mysqli_fetch_array($data)){
                                echo "<option value='".$info['id_acad']."'>".$info['nome_acad']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="quant">Quantidade</label>
                        <input type="number" class="form-control" name="quant" required>
                    </div>
                </div>
                <br>
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