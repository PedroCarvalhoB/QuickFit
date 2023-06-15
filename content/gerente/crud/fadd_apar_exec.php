<?php
if (!isset($_SESSION))
  session_start();
?>

<!doctype html>
<html lang="en">

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

<body>
    <main>
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11">
                    <h2>Cadastrar Exercícios</h2>
                </div>
            </div>

            <br>

            <form action="?page=insere_apar_exec" method="post">
                <!-- 1ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exec">Exercicio</label>
                        <select class="form-select" name="exec" required>
                            <?php
                                $data = mysqli_query($con, "select * from exercicio order by nome_exec asc;") or die(mysqli_error($con));

                                while($info = mysqli_fetch_array($data)){
                                    echo "<option value='".$info['id_exec']."'>".$info['nome_exec']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="apar">Aparelho</label>
                        <select class="form-select" name="apar" required>
                            <?php
                                $acad = $_SESSION['UsuarioAcad'];

                                $data = mysqli_query($con, "select * from aparelho AS a
                                INNER JOIN apar_acad AS apac ON apac.id_apar = a.id_apar
                                WHERE apac.id_acad = $acad
                                order by nome_apar asc;") or die(mysqli_error($con));

                                while($info = mysqli_fetch_array($data)){
                                    echo "<option value='".$info['id_apar']."'>".$info['nome_apar']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <hr/>

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