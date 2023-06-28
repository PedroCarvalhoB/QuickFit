<?php
$id = (int) $_GET['id'];
$sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
$row = mysqli_fetch_array($sql);

$dt = (int) $_GET['id_trei'];
$sql_dt = mysqli_query($con, "select * from treinamento where id_treinamento = '" . $dt . "';");
$row_dt = mysqli_fetch_array($sql_dt);
?>

<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-11 titulo">
            <h2>Vizualizando Treino</h2>
        </div>
        <hr>
    </div>

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
                WHERE t.id_alu = ".$row['id_usu']." AND dt_inicio = '".$row_dt['dt_inicio']."'
                GROUP BY e.id_execucao ORDER BY t.treino ASC limit $inicio, $quantidade;";

                $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                echo "<thead><tr>";
                echo "<td><strong>ID</strong></td>";
                echo "<td><strong>Aluno</strong></td>";
                echo "<td><strong>Treino</strong></td>";
                echo "<td><strong>Aparelho</strong></td>";
                echo "<td><strong>Exercício</strong></td>";
                echo "<td><strong>Séries</strong></td>";
                echo "<td><strong>Repetições</strong></td>";
                echo "</tr></thead><tbody>";

                while ($info = mysqli_fetch_array($data_all)) {
                    echo "<tr>";
                    echo "<td>" . $info['id_alu'] . "</td>";    
                    echo "<td>" . $info['nome_usu'] . "</td>";
                    echo "<td>" . $info['treino'] . "</td>";
                    echo "<td>" . $info['nome_apar'] . "</td>";
                    echo "<td>" . $info['nome_exec'] . "</td>";
                    echo "<td>" . $info['num_serie'] . "</td>";
                    echo "<td>" . $info['num_repeat'] . "</td>";
                    echo "<td><div class='btn-group btn-group-sm'>";

                }
                echo "</tr></tbody></table>";

                ?>

            </div><!-- Div Table -->
        </div><!--list-->

        <!-- PAGINAÇÃO -->
        <div id="bottom" class="row">
            <div class="col-md-12">
                <?php
                $sqlTotal = "SELECT * FROM execucao e
                INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                INNER JOIN aparelho a ON e.id_apar = a.id_apar
                INNER JOIN exercicio er ON e.id_exec = er.id_exec
                INNER JOIN usuario u ON t.id_alu = u.id_usu
                WHERE t.id_alu = " . $row['id_usu'] . " AND dt_inicio = '".$row_dt['dt_inicio']."'
                GROUP BY e.id_execucao ORDER BY t.treino ASC;";
                $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                $numTotal = mysqli_num_rows($qrTotal);
                $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                $exibir = 3;

                $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                echo "<ul class='pagination'>";
                echo "<li class='page-item'><a class='page-link' href='?page=view_treino&pagina=1&id=".$row['id_usu']."&id_trei=$dt'> Primeira</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino&pagina=$anterior&id=".$row['id_usu']."&id_trei=$dt\"> Anterior</a></li> ";

                echo "<li class='page-item'><a class='page-link' href='?page=view_treino&pagina=" . $pagina . "&id=".$row['id_usu']."&id_trei=$dt'><strong>" . $pagina . "</strong></a></li> ";

                for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                    if ($i <= $totalpagina)
                        echo "<li class='page-item'><a class='page-link' href='?page=view_treino&pagina=" . $i . "&id=".$row['id_usu']."&id_trei=$dt'> " . $i . " </a></li> ";
                }

                echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino&pagina=$posterior&id=".$row['id_usu']."&id_trei=$dt\"> Pr&oacute;xima</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=view_treino&pagina=$totalpagina&id=".$row['id_usu']."&id_trei=$dt\"> &Uacute;ltima</a></li></ul>";

                ?>
                <hr />

                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <?php echo "<a href=?page=lista_treino_alu&id=".$row['id_usu']." class='btncancel'>Voltar</a>"; ?>
                    </div>
                </div>
            </div>
        </div><!--bottom-->
    </div>
</div>