<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <main style="padding: 10px;"> 
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['UsuarioID'];

        ?>

        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11 titulo">
                    <h2>Olá, seja bem-vido(a) de volta à sua área de treinos!</h2>
                </div>
            </div>

            <hr>
            <br>

            <div id="bloco-list-pag">
                <div id="list" class="row">
                    <div class="table-responsive col-xs-12">
                        <?php

                        $id = $_SESSION['UsuarioID'];
                        $acad = $_SESSION['UsuarioAcad'];

                        $quantidade = 10;

                        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
                        $inicio = ($quantidade * $pagina) - $quantidade;

                        // $sql= "select * from usuario where tipo_usu = 'ALUNO' order by id_usu asc limit $inicio, $quantidade;";
                        $sql = "SELECT * FROM execucao e
                            INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                            INNER JOIN aparelho a ON e.id_apar = a.id_apar
                            INNER JOIN exercicio er ON e.id_exec = er.id_exec
                            INNER JOIN usuario u ON t.id_alu = u.id_usu
                            WHERE t.id_alu = '$id' and t.treino = 'a' AND dt_final IS NULL
                            GROUP BY e.id_execucao ORDER BY t.treino ASC limit $inicio, $quantidade;";

                        $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                        if (mysqli_num_rows($data_all) != 0) {
                            echo "<h3>Treino A</h3>";
                            echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                            echo "<thead><tr>";
                            echo "<td><strong>Treino</strong></td>";
                            echo "<td><strong>Aparelho</strong></td>";
                            echo "<td><strong>Exercício</strong></td>";
                            echo "<td><strong>Séries</strong></td>";
                            echo "<td><strong>Repetições</strong></td>";
                            echo "</tr></thead><tbody>";

                            while ($info = mysqli_fetch_array($data_all)) {
                                echo "<tr>";
                                echo "<td>" . $info['treino'] . "</td>";
                                echo "<td>" . $info['nome_apar'] . "</td>";
                                echo "<td>" . $info['nome_exec'] . "</td>";
                                echo "<td>" . $info['num_serie'] . "</td>";
                                echo "<td>" . $info['num_repeat'] . "</td>";
                                echo "<td><div class='btn-group btn-group-sm'>";
                            }
                            echo "</tr></tbody></table>";
                        }
                        ?>
                        <br>
                    </div><!-- Div Table -->

                    <hr>
                    <br>

                    <div>
                        <?php
                        $sql = "SELECT * FROM execucao e
                            INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                            INNER JOIN aparelho a ON e.id_apar = a.id_apar
                            INNER JOIN exercicio er ON e.id_exec = er.id_exec
                            INNER JOIN usuario u ON t.id_alu = u.id_usu
                            WHERE t.id_alu = '$id' and t.treino = 'b' AND dt_final IS NULL
                            GROUP BY e.id_execucao ORDER BY t.treino ASC limit $inicio, $quantidade;";

                        $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                        if (mysqli_num_rows($data_all) != 0) {
                            echo "<h3>Treino B</h3>";
                            echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                            echo "<thead><tr>";
                            echo "<td><strong>Treino</strong></td>";
                            echo "<td><strong>Aparelho</strong></td>";
                            echo "<td><strong>Exercício</strong></td>";
                            echo "<td><strong>Séries</strong></td>";
                            echo "<td><strong>Repetições</strong></td>";
                            echo "</tr></thead><tbody>";

                            while ($info = mysqli_fetch_array($data_all)) {
                                echo "<tr>";
                                echo "<td>" . $info['treino'] . "</td>";
                                echo "<td>" . $info['nome_apar'] . "</td>";
                                echo "<td>" . $info['nome_exec'] . "</td>";
                                echo "<td>" . $info['num_serie'] . "</td>";
                                echo "<td>" . $info['num_repeat'] . "</td>";
                                echo "<td><div class='btn-group btn-group-sm'>";
                            }
                            echo "</tr></tbody></table>";
                        }
                        ?>
                        <br>
                    </div>

                    <hr>
                    <br>

                    <div>
                        <?php
                        $sql = "SELECT * FROM execucao e
                            INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                            INNER JOIN aparelho a ON e.id_apar = a.id_apar
                            INNER JOIN exercicio er ON e.id_exec = er.id_exec
                            INNER JOIN usuario u ON t.id_alu = u.id_usu
                            WHERE t.id_alu = '$id' and t.treino = 'c' AND dt_final IS NULL
                            GROUP BY e.id_execucao ORDER BY t.treino ASC limit $inicio, $quantidade;";

                        $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                        if (mysqli_num_rows($data_all) != 0) {
                            echo "<h3>Treino C</h3>";
                            echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                            echo "<thead><tr>";
                            echo "<td><strong>Treino</strong></td>";
                            echo "<td><strong>Aparelho</strong></td>";
                            echo "<td><strong>Exercício</strong></td>";
                            echo "<td><strong>Séries</strong></td>";
                            echo "<td><strong>Repetições</strong></td>";
                            echo "</tr></thead><tbody>";

                            while ($info = mysqli_fetch_array($data_all)) {
                                echo "<tr>";
                                echo "<td>" . $info['treino'] . "</td>";
                                echo "<td>" . $info['nome_apar'] . "</td>";
                                echo "<td>" . $info['nome_exec'] . "</td>";
                                echo "<td>" . $info['num_serie'] . "</td>";
                                echo "<td>" . $info['num_repeat'] . "</td>";
                                echo "<td><div class='btn-group btn-group-sm'>";
                            }
                            echo "</tr></tbody></table>";
                        }
                        ?>
                    </div>

                </div><!--list-->

                <br>

                <!-- PAGINAÇÃO -->
                <div id="bottom" class="row">
                    <div class="col-md-12">
                        <?php
                        $sqlTotal = "SELECT * FROM execucao e
                        INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                        INNER JOIN aparelho a ON e.id_apar = a.id_apar
                        INNER JOIN exercicio er ON e.id_exec = er.id_exec
                        INNER JOIN usuario u ON t.id_alu = u.id_usu
                        WHERE t.id_alu = '$id' AND dt_final IS NULL
                        GROUP BY e.id_execucao ORDER BY t.treino ASC;";
                        $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                        $numTotal = mysqli_num_rows($qrTotal);

                        if ($numTotal = 0) {
                            echo "<h2>Você ainda não tem um treino <br> Vá ao professor e peça para fazê-lo.</h2>";
                        }

                        ?>
                    </div>
                </div><!--bottom-->
            </div>
        </div>

    </main>

</body>

</html>