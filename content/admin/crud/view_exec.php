<!doctype html>
<html lang="en">

<head>
    <title>Visualizar Exercício</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/cadastros.css">
    <link rel="stylesheet" href="assets/css/videos.css">
</head>

<body>
    <main style="padding: 10px;">
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($con, "select * from exercicio where id_exec = '" . $id . "';");
        $row = mysqli_fetch_array($sql);
        ?>
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11">
                    <h2>Visualizar Exercícios</h2>
                </div>
            </div>

            <hr>
            <br>

            <form action="?page=insere_exec" method="post">
                <!-- 1ª LINHA -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <p><strong>Nome do Exercício</strong></p>
                        <p>
                            <?php echo $row['nome_exec'] ?>
                        </p>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-3">
                        <p><strong>Grupo Muscular Trabalhado</strong></p>
                        <p>
                            <?php echo $row['grupo_muscular'] ?>
                        </p>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><strong>Demonstração do Exercício</strong></p>
                        <video class="videos" autoplay loop src="assets/videos_exercicios/<?php echo $row['imagem'] ?>" muted></video>
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <div class="form-group col-md-12">
                        <p><strong>Descrição do Exercício</strong></p>
                        <p>
                            <?php echo $row['desc_exec'] ?>
                        </p>
                    </div>
                </div>
                <br>
                <hr />

                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <a href="?page=lista_exec" class="btncancel">Voltar</a>
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