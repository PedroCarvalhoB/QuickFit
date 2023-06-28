<?php
if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION['UsuarioID'];

?>

<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-11 titulo">
            <h2>Treinamentos</h2>
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
                    echo"<hr>";
                    echo"<br><br>";
                }
                ?>
            </div><!-- Div Table -->

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
                    echo"<hr>";
                    echo"<br><br>";
                }
                ?>
            </div>

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

                if ($numTotal != 0) {
                    $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                    $exibir = 3;

                    $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                    $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                    echo "<ul class='pagination'>";
                    echo "<li class='page-item'><a class='page-link' href='?page=view_treino_alu&pagina=1&id=$id'> Primeira</a></li> ";
                    echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino_alu&pagina=$anterior&id=$id\"> Anterior</a></li> ";

                    echo "<li class='page-item'><a class='page-link' href='?page=view_treino_alu&pagina=" . $pagina . "&id=$id'><strong>" . $pagina . "</strong></a></li> ";

                    for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                        if ($i <= $totalpagina)
                            echo "<li class='page-item'><a class='page-link' href='?page=view_treino_alu&pagina=" . $i . "&id=$id'> " . $i . " </a></li> ";
                    }

                    echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino_alu&pagina=$posterior&id=$id\"> Pr&oacute;xima</a></li> ";
                    echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino_alu&pagina=$totalpagina&id=$id\"> &Uacute;ltima</a></li></ul>";
                } else {
                    echo "<h2>Sua ficha de treinamento ainda não está pronta.<br> Aguarde até que seu professor faça ela!</h2>";
                }

                ?>
            </div>
        </div><!--bottom-->
    </div>
</div>