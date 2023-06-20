<?php 
   $id = (int) $_GET['id'];
   $sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
   $row = mysqli_fetch_array($sql);
?>
<!--  -->
<!doctype html>
<html lang="en">

<head>
    <title>Cadastro de Treino</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-11 titulo">
                    <h2>Cadastro de Treino</h2>
                </div>
            </div>

        <hr>

        <form action="?page=insere_treino" method="post">
            <!-- 1ª LINHA -->
            <div class="row">
                <input type="hidden" name="id" value="<?php $id ?>">
                <div class="form-group col-md-2">
                    <label for="objetivo">Treino</label>&nbsp;&nbsp;&nbsp;  
                    <input type="radio" name="treino" value="A">A &nbsp;
                    <input type="radio" name="treino" value="B">B &nbsp;
                    <input type="radio" name="treino" value="C">C &nbsp;
                </div>
                <div class="form-group col-md-5">
                    <label for="id_exec">Exercício</label>
                    <select class="form-select" name="id_exec" required>
                        <?php
                            $data = mysqli_query($con, "select * from exercicio order by nome_exec asc;") or die(mysqli_error($con));

                            while($info = mysqli_fetch_array($data)){
                            echo "<option value='".$info['id_exec']."'>".$info['nome_exec']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="id_apar">Aparelho</label>
                    <select class="form-select" name="id_apar" required>
                        <?php
                            $data = mysqli_query($con, "select * from aparelho order by nome_apar asc;") or die(mysqli_error($con));

                            while($info = mysqli_fetch_array($data)){
                            echo "<option value='".$info['id_apar']."'>".$info['nome_apar']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <br>

            <!-- 2ª LINHA -->
            <div class="row">
                <div class="form-group col-md-2">

                </div>
                <div class="form-group col-md-5">
                    <label for="num_serie">Séries</label>
                    <input type="number" class="form-control" name="num_serie" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="num_repeat">Repetições</label>
                    <input type="number" class="form-control" name="num_repeat" required>
                </div>
            </div>

            <hr />

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
                        $sql = "SELECT * FROM usuario AS u 
                        INNER JOIN matriculado AS m ON u.id_usu = m.id_usu
                        WHERE tipo_usu = 'ALUNO' AND id_acad = $acad 
                        ORDER BY u.id_usu ASC limit $inicio, $quantidade;";

                        $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

                        echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                        echo "<thead><tr>";
                        echo "<td><strong>ID</strong></td>";
                        echo "<td><strong>Aluno</strong></td>";
                        echo "<td><strong>Possui Treino</strong></td>";
                        echo "<td><strong>Data Início Treino.</strong></td>";
                        echo "<td class='actions'><strong>Ações</strong></td>";
                        echo "</tr></thead><tbody>";

                        while ($info = mysqli_fetch_array($data_all)) {
                            $sql_trei = "SELECT * FROM usuario AS u 
                            INNER JOIN matriculado AS m ON u.id_usu = m.id_usu
                            INNER JOIN treinamento as t on u.id_usu = t.id_alu
                            WHERE tipo_usu = 'ALUNO' AND id_acad = $acad and u.id_usu = ".$info['id_usu']."
                            ORDER BY u.id_usu ASC limit $inicio, $quantidade;";

                            $data_trei = mysqli_query($con, $sql_trei) or die(mysqli_error($con));

                            $info_trei = mysqli_fetch_array($data_trei);

                            if (mysqli_num_rows($data_trei) == 0) {
                                echo "<tr>";
                                echo "<td>" . $info['id_usu'] . "</td>";
                                echo "<td>" . $info['nome_usu'] . "</td>";
                                echo "<td>Não</td>";
                                echo "<td>Null</td>";
                                echo "<td><div class='btn-group btn-group-sm'>";
            
                            } else {
                                echo "<tr>";
                                echo "<td>" . $info['id_usu'] . "</td>";
                                echo "<td>" . $info['nome_usu'] . "</td>";
                                echo "<td>Sim</td>";
                                echo "<td>" . date('d/m/Y', strtotime($info_trei['dt_inicio'])) . "</td>";
                                echo "<td><div class='btn-group btn-group-sm'>";
            
                            }

                            // Visualizar
                            echo "<a class='btn' href=?page=view_usu&id=" . $info['id_usu'] . " > <i class='fa-solid fa-eye'></i> </a>"; 

                            // Treinamento 
                                echo "<a class='btn' href=?page=fadd_treino&id=" . $info['id_usu'] . "> <i class='fa-solid fa-dumbbell'></i> </a>";

                        }
                        echo "</tr></tbody></table>";

                        ?>
                        
                    </div><!-- Div Table -->
                </div><!--list-->

                <!-- PAGINAÇÃO -->
                <div id="bottom" class="row">
                    <div class="col-md-12">
                        <?php
                        $sqlTotal = "SELECT * FROM usuario AS u 
                        INNER JOIN matriculado AS m ON u.id_usu = m.id_usu
                        WHERE tipo_usu = 'ALUNO' AND id_acad = $acad 
                        ORDER BY u.id_usu ASC limit $inicio, $quantidade;";
                        $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
                        $numTotal = mysqli_num_rows($qrTotal);
                        $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

                        $exibir = 3;

                        $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
                        $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

                        echo "<ul class='pagination'>";
                        echo "<li class='page-item'><a class='page-link' href='?page=lista_treino&pagina=1'> Primeira</a></li> ";
                        echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino&pagina=$anterior\"> Anterior</a></li> ";

                        echo "<li class='page-item'><a class='page-link' href='?page=lista_treino&pagina=" . $pagina . "'><strong>" . $pagina . "</strong></a></li> ";

                        for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                            if ($i <= $totalpagina)
                                echo "<li class='page-item'><a class='page-link' href='?page=lista_treino&pagina=" . $i . "'> " . $i . " </a></li> ";
                        }

                        echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
                        echo "<li class='page-item'><a class='page-link' href=\"?page=lista_treino&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

                        ?>
                    </div>
                </div><!--bottom-->
            </div>

            <br>

            <hr>
            
            <div id="actions" class="row botoes">
                <div class="col-md-12">
                    <button type="submit" class="btnsub">Salvar</button>
                    <a href="?page=lista_treino" class="btncancel">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../assets/js/jquery-3.3.1.min.js" type="text/javascript" ></script>
  <script src="js/dash.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

