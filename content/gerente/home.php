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
        <div>
            <h2>Olá, seja bem vindo(a) de volta!</h2>
        </div>
        
        <hr>
        <br>

        <?php
            if (!isset($_SESSION))
            session_start();
        ?>

        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-10">
                    <h3>Funcionários</h3>
                </div>

                <div class="col-md-2">
                    <!-- Chama o Formulário para adicionar alunos -->
                    <?php
                    $nivel = $_SESSION['UsuarioNivel'];

                    if ($nivel >= 3) {
                        echo '<a href="?page=fadd_cad" class="btnsub">Novo Funcionário</a>';
                    }
                    ?>
                </div>
            </div>
            <!--top - Lista dos Campos-->
            <br>
            <div id="bloco-list-pag">
                <div id="list" class="row">
                    <div class="table-responsive col-xs-12">
                        <?php
                        $acad = $_SESSION['UsuarioAcad'];
                        $nivel = $_SESSION['UsuarioNivel'];

                        $quantidade = 10;

                        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
                        $inicio = ($quantidade * $pagina) - $quantidade;
                        $sql = "SELECT * FROM usuario AS u INNER JOIN matriculado AS m ON m.id_usu = u.id_usu WHERE tipo_usu <> 'ALUNO' AND id_acad = $acad ORDER BY u.id_usu ASC limit $inicio, $quantidade;";
                        

                        // $sql= "select * from usuario where tipo_usu = 'ALUNO' order by id_usu asc limit $inicio, $quantidade;";

                        $data_all = mysqli_query($con, $sql) or die(mysqli_error($erro));

                        echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                        echo "<thead><tr>";
                        echo "<td><strong>Matrícula</strong></td>";
                        echo "<td><strong>ID</strong></td>";
                        echo "<td><strong>Nome do usuário</strong></td>";
                        echo "<td><strong>Tipo</strong></td>";
                        echo "<td><strong>CPF</strong></td>";
                        echo "<td><strong>Status</strong></td>";
                        echo "<td><strong>Data Nascimento</strong></td>";
                        echo "<td class='actions'><strong>Ações</strong></td>";
                        echo "</tr></thead><tbody>";

                        while ($info = mysqli_fetch_array($data_all)) {
                            echo "<tr>";
                            echo "<td>" . $info['matri_usu'] . "</td>";
                            echo "<td>" . $info['id_usu'] . "</td>";
                            echo "<td>" . $info['nome_usu'] . "</td>";
                            echo "<td>" . $info['tipo_usu'] . "</td>";
                            echo "<td>" . $info['cpf'] . "</td>";

                            if ($info['status_usu'] == 1) {
                                echo "<td>Ativo</td>";
                            } else if ($info['status_usu'] == 0) {
                                echo "<td>NÃO</td>";
                            }
                            echo "<td>" . date('d/m/Y', strtotime($info['dt_nasc'])) . "</td>";
                            echo "<td><div class='btn-group btn-group-sm'>";

                            // Visualizar
                            echo "<a class='btn' href=?page=view_usu&id=" . $info['id_usu'] . " > <i class='fa-solid fa-eye'></i> </a>";

                            switch ($nivel) {
                                case 2:
                                    // Avaliação
                                    echo "<a class='btn' href=?page=fadd_ava&id=" . $info['id_usu'] . "> <i class='fa-solid fa-book'></i> </a>";

                                    // Treinamento 
                                    echo "<a class='btn' href=?page=fadd_treino&id=" . $info['id_usu'] . "> <i class='fa-solid fa-dumbbell'></i> </a>";

                                    break;

                                case 4 && 5:
                                    // Editar
                                    echo "<a class='btn' href=?page=fedita_usu&id=" . $info['id_usu'] . "> <i class='fa-solid fa-pen'></i> </a>";

                                    // Block e Desblock				
                                    if ($info['status_usu'] == 1) {
                                        echo "<a class='btn'  href=?page=block_usu&id=" . $info['id_usu'] . "> <i class='fa-solid fa-ban'></i> </a>";
                                    } else if ($info['status_usu'] == 0) {
                                        echo "<a class='btn'  href=?page=ativa_usu&id=" . $info['id_usu'] . "><i class='fa-solid fa-check'></i></a></div></td>";
                                    }

                                    break;

                                default:
                                    break;
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
                        switch ($nivel) {
                            case 5:
                                $sqlTotal = "SELECT * FROM usuario ORDER BY id_usu ASC ";
                                break;

                            default:
                                $sqlTotal = "SELECT * FROM usuario AS u INNER JOIN matriculado AS m ON m.id_usu = u.id_usu WHERE tipo_usu <> 'ALUNO' AND id_acad = $acad ORDER BY u.id_usu ASC";
                                break;
                        }

                        $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                        $numTotal = mysqli_num_rows($qrTotal);
                        $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                        $exibir = 3;

                        $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                        $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                        echo "<ul class='pagination'>";
                        echo "<li class='page-item'><a class='page-link' href='?page=home_ger&pagina=1'> Primeira</a></li> ";
                        echo "<li class='page-item'><a class='page-link' href=\"?page=home_ger&pagina=$anterior\"> Anterior</a></li> ";

                        echo "<li class='page-item'><a class='page-link' href='?page=home_ger&pagina=" . $pagina . "'><strong>" . $pagina . "</strong></a></li> ";

                        for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                            if ($i <= $totalpagina)
                                echo "<li class='page-item'><a class='page-link' href='?page=home_ger&pagina=" . $i . "'> " . $i . " </a></li> ";
                        }

                        echo "<li class='page-item'><a class='page-link' href=\"?page=home_ger&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
                        echo "<li class='page-item'><a class='page-link' href=\"?page=home_ger&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

                        ?>
                    </div>
                </div><!--bottom-->
            </div>
        </div><!--main-->
    </main>
</body>
</html>