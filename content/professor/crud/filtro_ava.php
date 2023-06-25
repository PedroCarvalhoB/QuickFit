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
                $sql = "SELECT * FROM avaliacao AS a
                INNER JOIN usuario AS u ON id_alu = id_usu
                WHERE id_prof = $id AND u.nome_usu LIKE '%" . $_GET['nome'] . "%' order BY u.id_usu asc;";

				$data_all = mysqli_query($con, $sql) or die(mysqli_error($con));

				echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				echo "<thead><tr>";
				echo "<td><strong>ID</strong></td>";
				echo "<td><strong>Aluno</strong></td>";
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
					echo "<a class='btn' href=?page=prof_ava&id=" . $info['id_usu'] . " > <i class='fa-solid fa-eye'></i> </a>"; 

					// Avaliação
					echo "<a class='btn' href=?page=fadd_ava&cpf=" . $info['cpf'] . "> <i class='fa-solid fa-book'></i> </a>";
				}
				echo "</tr></tbody></table>";
				?>

                <div class="col-xs-12">
                    <a href="?page=lista_ava" class="btn btn-primary pull-left h2">Listar todos</a>
                </div>

			</div><!-- Div Table -->
		</div><!--list-->
	</div>
</div><!--main-->