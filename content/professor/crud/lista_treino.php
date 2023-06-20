<?php
if (!isset($_SESSION))
  session_start();
?>

<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-10">
			<h2>Treinos</h2>
		</div>

		<!-- <div class='col-md-2'>
			<a href="?page=fadd_treino" class="btnsub">Novo Treino</a>
		</div> -->
	</div>
	<!--top - Lista dos Campos-->
	<hr />
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
</div><!--main-->