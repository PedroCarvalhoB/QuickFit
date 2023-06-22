<?php
if (!isset($_SESSION))
    session_start();
?>

<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-10">
            <h2>Exercícios</h2>
        </div>

        <div class="col-md-2">
            <!-- Chama o Formulário para adicionar alunos -->
            <?php
            $nivel = $_SESSION['UsuarioNivel'];

            if ($nivel >= 3) {
                echo '<a href="?page=fadd_exec" class="btnsub">Novo Exercício</a>';
            }
            ?>
        </div>
    </div>
    <!--top - Lista dos Campos-->
    <hr />
    <div id="bloco-list-pag">
        <div id="list" class="row">
            <div class="table-responsive col-xs-12">
                <?php
                $acad = $_SESSION['UsuarioAcad'];
                $nivel = $_SESSION['UsuarioNivel'];

                $quantidade = 10;

                $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
                $inicio = ($quantidade * $pagina) - $quantidade;

                // $sql= "select * from usuario where tipo_usu = 'ALUNO' order by id_usu asc limit $inicio, $quantidade;";
                $sql = "SELECT * FROM exercicio
                ORDER BY id_exec
                LIMIT $inicio, $quantidade;
                ";

                $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                echo "<thead><tr>";
                echo "<td><strong>ID</strong></td>";
                echo "<td><strong>Nome</strong></td>";
                echo "<td><strong>Grupo Muscular</strong></td>";
                echo "<td class='actions'><strong>Ações</strong></td>";
                echo "</tr></thead><tbody>";

                while ($info = mysqli_fetch_array($data_all)) {
                    echo "<tr>";
                    echo "<td>" . $info['id_exec'] . "</td>";
                    echo "<td>" . $info['nome_exec'] . "</td>";
                    echo "<td>" . $info['grupo_muscular'] . "</td>";
                    echo "<td><div class='btn-group btn-group-sm'>";
                    // Visualizar
                    echo "<a class='btn' href=?page=view_exec&id=" . $info['id_exec'] . " > <i class='fa-solid fa-eye'></i> </a>";
                }
                echo "</tr></tbody></table>";
                ?>
            </div><!-- Div Table -->
        </div><!--list-->

        <!-- PAGINAÇÃO -->
        <div id="bottom" class="row">
            <div class="col-md-12">
                <?php
                $sqlTotal = "SELECT * FROM exercicio
                ORDER BY id_exec";
                $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                $numTotal = mysqli_num_rows($qrTotal);
                $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                $exibir = 3;

                $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                echo "<ul class='pagination'>";
                echo "<li class='page-item'><a class='page-link' href='?page=lista_exec&pagina=1'> Primeira</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_exec&pagina=$anterior\"> Anterior</a></li> ";

                echo "<li class='page-item'><a class='page-link' href='?page=lista_exec&pagina=" . $pagina . "'><strong>" . $pagina . "</strong></a></li> ";

                for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                    if ($i <= $totalpagina)
                        echo "<li class='page-item'><a class='page-link' href='?page=lista_exec&pagina=" . $i . "'> " . $i . " </a></li> ";
                }

                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_exec&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_exec&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

                ?>
            </div>
        </div><!--bottom-->
    </div>
</div><!--main-->