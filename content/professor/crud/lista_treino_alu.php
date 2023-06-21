<?php 
   $id = (int) $_GET['id'];
   $sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
   $row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
    <div id="top" class="row">
		<div class="col-md-10">
			<h2><?php echo "Treinos de ".$row["nome_usu"]."" ?></h2>
		</div>

		<div class="col-md-2">
			<?php echo "<a href=?page=fadd_treino&id=".$row['id_usu']." class='btnsub'>Novo Treino</a>"; ?>
		</div>
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
                    $sql = "SELECT *, up.nome_usu AS nome_prof FROM treinamento t
                    INNER JOIN usuario u ON t.id_alu = u.id_usu
                    INNER JOIN usuario up ON t.id_prof = up.id_usu
                    WHERE id_alu = ".$row['id_usu']." AND t.treino = 'A'
                    GROUP BY t.id_treinamento ASC ORDER BY dt_inicio DESC
                    limit $inicio, $quantidade;";
    
                    $data_all = mysqli_query($con, $sql) or die(mysqli_error($con));
    
                    echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
                    echo "<thead><tr>";
                    echo "<td><strong>ID</strong></td>";
                    echo "<td><strong>Nome Professor</strong></td>";
                    echo "<td><strong>Treino</strong></td>";
                    echo "<td><strong>Data de criagem</strong></td>";
                    echo "<td class='actions'><strong>Ações</strong></td>";
                    echo "</tr></thead><tbody>";
    
                    while ($info = mysqli_fetch_array($data_all)) {
                        echo "<tr>";
                        echo "<td>" . $info['id_treinamento'] . "</td>";
                        echo "<td>" . $info['nome_prof'] . "</td>";
                        echo "<td>" . $info['treino'] . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($info['dt_inicio'])) . "</td>";
                        echo "<td><div class='btn-group btn-group-sm'>";

                        // Visualizar
                        echo "<a class='btn' href=?page=view_usu&id=" . $info['id_usu'] . " > <i class='fa-solid fa-eye'></i> </a>";
    
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
                    WHERE t.dt_final IS NULL AND t.id_alu = ".$row['id_usu']." 
                    GROUP BY e.id_execucao ORDER BY t.treino ASC limit $inicio, $quantidade;";
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

            <hr />

                <div id="actions" class="row botoes">
                    <div class="col-md-12">
                        <a href="?page=lista_treino" class="btncancel">Voltar</a>
                    </div>
                </div>
        </div><!--bottom-->
    </div>
</div>