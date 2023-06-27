<?php
if (!isset($_SESSION))
session_start();


$id = (int) $_GET['id'];
$sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-10">
            <h2>
                <?php echo "Avaliações de " . $row["nome_usu"] . "" ?>
            </h2>
        </div>

        <div class="col-md-2">
            <?php echo "<a href=?page=fadd_ava&cpf=" . $row['cpf'] . " class='btnsub'>Novo Treino</a>"; ?>
        </div>
    </div>

    <hr>
    <div id="bloco-list-pag">
        <div id="list" class="row">
            <div class="table-responsive col-xs-12">
                <?php

                // $id = $_SESSION['UsuarioID'];
                $acad = $_SESSION['UsuarioAcad'];

                $quantidade = 10;

                $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
                $inicio = ($quantidade * $pagina) - $quantidade;

                // $sql= "select * from usuario where tipo_usu = 'ALUNO' order by id_usu asc limit $inicio, $quantidade;";
                $sql = "SELECT * FROM avaliacao AS a
                INNER JOIN usuario AS u ON id_alu = u.id_usu
                INNER JOIN usuario AS up ON id_prof = up.id_usu
                WHERE id_alu = $id
                limit $inicio, $quantidade;";

                $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				echo "<thead><tr>";
				echo "<td><strong>ID</strong></td>";
				echo "<td><strong>Professor</strong></td>";
				echo "<td><strong>Peso</strong></td>";
				echo "<td><strong>Altura</strong></td>";
				echo "<td><strong>IMC</strong></td>";
				echo "<td><strong>Data Aval.</strong></td>";
				echo "<td class='actions'><strong>Ações</strong></td>";
				echo "</tr></thead><tbody>";

				while ($info = mysqli_fetch_array($data_all)) {
					echo "<tr>";
					echo "<td>" . $info['id_aval'] . "</td>";
					echo "<td>" . $info['nome_usu'] . "</td>";
					echo "<td>" . $info['peso'] . "</td>";
					echo "<td>" . $info['altura'] . "</td>";
					echo "<td>" . $info['imc'] . "</td>";
					echo "<td>" . date('d/m/Y', strtotime($info['dt_aval'])) . "</td>";
					echo "<td><div class='btn-group btn-group-sm'>";

                    // Visualizar
                    echo "<a class='btn' href=?page=view_ava&id=" . $info['id_alu'] . "&id_aval=" . $info['id_aval'] . " > <i class='fa-solid fa-eye'></i> </a>";
                }
                echo "</tr></tbody></table>";

                ?>

            </div><!-- Div Table -->
        </div><!--list-->

        <!-- PAGINAÇÃO -->
        <div id="bottom" class="row">
            <div class="col-md-12">
                <?php
                $sqlTotal = "SELECT *, up.nome_usu AS nome_prof FROM treinamento t
                    INNER JOIN usuario u ON t.id_alu = u.id_usu
                    INNER JOIN usuario up ON t.id_prof = up.id_usu
                    WHERE id_alu = " . $row['id_usu'] . " AND t.treino = 'A'
                    GROUP BY t.id_treinamento ASC ORDER BY dt_inicio DESC;";
                $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                $numTotal = mysqli_num_rows($qrTotal);
                $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                $exibir = 3;

                $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                echo "<ul class='pagination'>";
                echo "<li class='page-item'><a class='page-link' href='?page=lista_treino_alu&pagina=1&id=" . $row['id_usu'] . "'> Primeira</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino_alu&pagina=$anterior&id=" . $row['id_usu'] . "\"> Anterior</a></li> ";

                echo "<li class='page-item'><a class='page-link' href='?page=lista_treino_alu&pagina=" . $pagina . "&id=" . $row['id_usu'] . "'><strong>" . $pagina . "</strong></a></li> ";

                for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                    if ($i <= $totalpagina)
                        echo "<li class='page-item'><a class='page-link' href='?page=lista_treino_alu&pagina=" . $i . "&id=" . $row['id_usu'] . "'> " . $i . " </a></li> ";
                }

                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino_alu&pagina=$posterior&id=" . $row['id_usu'] . "\"> Pr&oacute;xima</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino_alu&pagina=$totalpagina&id=" . $row['id_usu'] . "\"> &Uacute;ltima</a></li></ul>";

                ?>
            </div>

            <hr />

            <div id="actions" class="row botoes">
                <div class="col-md-12">
                    <a href="?page=lista_ava" class="btncancel">Voltar</a>
                </div>
            </div>
        </div><!--bottom-->
    </div>
</div>