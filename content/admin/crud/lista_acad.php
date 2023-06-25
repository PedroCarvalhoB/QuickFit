<?php
if (!isset($_SESSION))
    session_start();
?>

<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-10">
            <h2>Academia</h2>
        </div>

        <div class="col-md-2">
            <!-- Chama o Formulário para adicionar alunos -->
            <?php
            $nivel = $_SESSION['UsuarioNivel'];

            if ($nivel >= 3) {
                echo '<a href="?page=fadd_acad" class="btnsub">Nova Academia</a>';
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
                $sql = "SELECT * FROM academia 
                ORDER BY id_acad 
                LIMIT $inicio, $quantidade;
                ";

                $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                echo "<thead><tr>";
                echo "<td><strong>ID</strong></td>";
                echo "<td><strong>Nome</strong></td>";
                echo "<td><strong>CNPJ</strong></td>";
                echo "<td><strong>CEP</strong></td>";
                echo "<td><strong>Ativo</strong></td>";
                echo "<td class='actions'><strong>Ações</strong></td>";
                echo "</tr></thead><tbody>";

                while ($info = mysqli_fetch_array($data_all)) {
                    echo "<tr>";
                    echo "<td>" . $info['id_acad'] . "</td>";
                    echo "<td>" . $info['nome_acad'] . "</td>";
                    echo "<td>" . $info['cnpj'] . "</td>";
                    echo "<td>" . $info['cep'] . "</td>";
                    if ($info['status_acad'] == 1) {
						echo "<td>SIM</td>";
					} else if ($info['status_acad'] == 0) {
						echo "<td>NÃO</td>";
					}
                    echo "<td><div class='btn-group btn-group-sm'>";

                    // Block e Desblock				
                    if ($info['status_acad'] == 1) {
                        echo "<a class='btn'  href=?page=block_acad&id=" . $info['id_acad'] . "> <i class='fa-solid fa-ban'></i> </a>";
                    } else if ($info['status_acad'] == 0) {
                        echo "<a class='btn'  href=?page=ativa_acad&id=" . $info['id_acad'] . "><i class='fa-solid fa-check'></i></a></div></td>";
                    }


                }
                echo "</tr></tbody></table>";
                ?>
            </div><!-- Div Table -->
        </div><!--list-->

        <!-- PAGINAÇÃO -->
        <div id="bottom" class="row">
            <div class="col-md-12">
                <?php
                $sqlTotal = "SELECT * FROM academia 
                ORDER BY id_acad ";
                $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                $numTotal = mysqli_num_rows($qrTotal);
                $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                $exibir = 3;

                $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                echo "<ul class='pagination'>";
                echo "<li class='page-item'><a class='page-link' href='?page=lista_acad&pagina=1'> Primeira</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_acad&pagina=$anterior\"> Anterior</a></li> ";

                echo "<li class='page-item'><a class='page-link' href='?page=lista_acad&pagina=" . $pagina . "'><strong>" . $pagina . "</strong></a></li> ";

                for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                    if ($i <= $totalpagina)
                        echo "<li class='page-item'><a class='page-link' href='?page=lista_acad&pagina=" . $i . "'> " . $i . " </a></li> ";
                }

                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_acad&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
                echo "<li class='page-item'><a class='page-link' href=\"?page=lista_acad&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

                ?>
            </div>
        </div><!--bottom-->
    </div>
</div><!--main-->