<?php
if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION['UsuarioID'];

?>
<main style="padding: 10px;">

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
    
                            // $sql= "select * from usuario where tipo_usu = 'ALUNO' order by id_usu asc limit $inicio, $quantidade;";
                            $sql = "SELECT * FROM execucao e
                                INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                                INNER JOIN aparelho a ON e.id_apar = a.id_apar
                                INNER JOIN exercicio er ON e.id_exec = er.id_exec
                                INNER JOIN usuario u ON t.id_alu = u.id_usu
                                WHERE t.id_alu = '$id' and t.treino = 'a' AND dt_final IS NULL
                                GROUP BY e.id_execucao ORDER BY t.treino ASC;";
    
                            $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));
    
                            $check = mysqli_num_rows($data_all);
    
                            if ($check != 0) {
                                echo "<h3>Treino A</h3>";
                                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                                echo "<thead><tr>";
                                echo "<td><strong>Aparelho</strong></td>";
                                echo "<td><strong>Exercício</strong></td>";
                                echo "<td><strong>Séries</strong></td>";
                                echo "<td><strong>Repetições</strong></td>";
                                echo "<td><strong>Visuazlizar</strong></td>";
                                echo "</tr></thead><tbody>";
    
                                while ($info = mysqli_fetch_array($data_all)) {
                                    echo "<tr>";
                                    echo "<td>" . $info['nome_apar'] . "</td>";
                                    echo "<td>" . $info['nome_exec'] . "</td>";
                                    echo "<td>" . $info['num_serie'] . "</td>";
                                    echo "<td>" . $info['num_repeat'] . "</td>";
                                    echo "<td> <a class='btn' href=?page=view_exec_alu&id=" . $info['id_exec'] . " > <i class='fa-solid fa-eye'></i> </a> </td>";
                                    
                                    echo "<td><div class='btn-group btn-group-sm'>";
                                }
                                echo "</tr></tbody></table>";
                                echo "<br><br>";
                            }
                            ?>
                        </div><!-- Div Table -->
    
    
                        <div>
                            <?php
                            $sql_b = "SELECT * FROM execucao e
                                INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                                INNER JOIN aparelho a ON e.id_apar = a.id_apar
                                INNER JOIN exercicio er ON e.id_exec = er.id_exec
                                INNER JOIN usuario u ON t.id_alu = u.id_usu
                                WHERE t.id_alu = '$id' and t.treino = 'b' AND dt_final IS NULL
                                GROUP BY e.id_execucao ORDER BY t.treino ASC ;";
    
                            $data_all_b = mysqli_query($con, $sql_b) or die(mysqli_error($con));
                            $check_b = mysqli_num_rows($data_all_b);
    
                            if ($check_b != 0) {
                                echo "<h3>Treino B</h3>";
                                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                                echo "<thead><tr>";
                                echo "<td><strong>Aparelho</strong></td>";
                                echo "<td><strong>Exercício</strong></td>";
                                echo "<td><strong>Séries</strong></td>";
                                echo "<td><strong>Repetições</strong></td>";
                                echo "<td><strong>Visuazlizar</strong></td>";
                                echo "</tr></thead><tbody>";
    
                                while ($info = mysqli_fetch_array($data_all_b)) {
                                    echo "<tr>";
                                    echo "<td>" . $info['nome_apar'] . "</td>";
                                    echo "<td>" . $info['nome_exec'] . "</td>";
                                    echo "<td>" . $info['num_serie'] . "</td>";
                                    echo "<td>" . $info['num_repeat'] . "</td>";
                                    echo "<td> <a class='btn' href=?page=view_exec_alu&id=" . $info['id_exec'] . " > <i class='fa-solid fa-eye'></i> </a> </td>";
                                    echo "<td><div class='btn-group btn-group-sm'>";
                                }
                                echo "</tr></tbody></table>";
                                echo "<br><br>";
                            }
                            ?>
                        </div>
    
                        <div>
                            <?php
                            $sql_c = "SELECT * FROM execucao e
                                INNER JOIN treinamento t ON e.id_treinamento = t.id_treinamento
                                INNER JOIN aparelho a ON e.id_apar = a.id_apar
                                INNER JOIN exercicio er ON e.id_exec = er.id_exec
                                INNER JOIN usuario u ON t.id_alu = u.id_usu
                                WHERE t.id_alu = '$id' and t.treino = 'c' AND dt_final IS NULL
                                GROUP BY e.id_execucao ORDER BY t.treino ASC;";
    
                            $data_all_c = mysqli_query($con, $sql_c) or die(mysqli_error($con));
                            $check_c = mysqli_num_rows($data_all_c);
                            
                            if ($check_c != 0) {
                                echo "<h3>Treino C</h3>";
                                echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                                echo "<thead><tr>";
                                echo "<td><strong>Aparelho</strong></td>";
                                echo "<td><strong>Exercício</strong></td>";
                                echo "<td><strong>Séries</strong></td>";
                                echo "<td><strong>Repetições</strong></td>";
                                echo "<td><strong>Visuazlizar</strong></td>";
                                echo "</tr></thead><tbody>";
    
                                while ($info = mysqli_fetch_array($data_all_c)) {
                                    echo "<tr>";
                                    echo "<td>" . $info['nome_apar'] . "</td>";
                                    echo "<td>" . $info['nome_exec'] . "</td>";
                                    echo "<td>" . $info['num_serie'] . "</td>";
                                    echo "<td>" . $info['num_repeat'] . "</td>";
                                    echo "<td> <a class='btn' href=?page=view_exec_alu&id=" . $info['id_exec'] . " > <i class='fa-solid fa-eye'></i> </a> </td>";
                                    echo "<td><div class='btn-group btn-group-sm'>";
                                }
                                echo "</tr></tbody></table>";
                            }
    
                            if ($check == 0) {
                                echo "<h2>Sua ficha de treinamento ainda não está pronta.<br> Aguarde até que seu professor faça ela!</h2>";
                            }
                            ?>
                        </div>
    
                    </div><!--list-->
                </div>
            </div>
    </div>
</main>