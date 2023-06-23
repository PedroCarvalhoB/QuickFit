<?php
if (!isset($_SESSION))
  session_start();

include "../../../base/config.php";

?>

<div id="main" class="container-fluid">
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
                // $sql = "select * from usuario where tipo_usu = 'ALUNO' and nome_usu like '%" . $_GET['nome'] . "%' order by id_usu asc";
                $sql = "select * from usuario u
                INNER JOIN matriculado m ON u.id_usu = m.id_usu
                WHERE u.tipo_usu = 'ALUNO' AND m.id_acad = '$acad' AND u.nome_usu LIKE '%" . $_GET['nome'] . "%' order BY u.id_usu asc;";

				$data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

				echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				echo "<thead><tr>";
				echo "<td><strong>ID</strong></td>";
				echo "<td><strong>Aluno</strong></td>";
                echo "<td><strong>Possui Treino</strong></td>";
				echo "<td><strong>Data Início Treino</strong></td>";
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

					// Avaliação
					echo "<a class='btn' href=?page=fadd_ava&id=" . $info['id_usu'] . "> <i class='fa-solid fa-book'></i> </a>";

                    // Treinamento 
                    echo "<a class='btn' href=?page=lista_treino_alu&id=" . $info['id_usu'] . "> <i class='fa-solid fa-dumbbell'></i> </a>";

				}
				echo "</tr></tbody></table>";
				?>

                <div class="col-xs-12">
                    <a href="?page=lista_treino" class="btn btn-primary pull-left h2">Listar todos</a>
                </div>

			</div><!-- Div Table -->
		</div><!--list-->
	</div>
</div><!--main-->