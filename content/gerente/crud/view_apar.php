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
        <?php
        $id = $_GET['id'];
        $id_acad = $_SESSION['UsuarioAcad'];

        $sql = mysqli_query($con, "select * from apar_acad as apac inner join aparelho as ap on ap.id_apar = apac.id_apar where id_acad = $id_acad and ap.id_apar = '" . $id . "';");
        $row = mysqli_fetch_array($sql);

        $sql_acad = mysqli_query($con, "select * from academia where id_acad = '" . $id_acad . "';");
        $row_acad = mysqli_fetch_array($sql_acad);
        ?>

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
                        <p><strong>Nome</strong></p>
                        <p>
                            <?php echo $row['nome_apar'] ?>
                        </p>
                    </div>

                    <!-- PRECISA SER MUDADO PARA APARECER AS ACADEMIAS VINCULADAS AOU GERENTE -->
                    <div class="form-group col-md-2">
                        <p><strong>Academia</strong></p>
                        <p>
                            <?php echo $row_acad['nome_acad'] ?>
                        </p>
                    </div>

                    <div class="form-group col-md-2">
                        <p><strong>Quantidade</strong></p>
                        <p>
                            <?php echo $row['quant_apar'] ?>
                        </p>
                    </div>
                </div>
                <br>
                <hr />
                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <a href="?page=lista_apar" class="btncancel">Cancelar</a>
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