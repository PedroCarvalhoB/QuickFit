<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-10">
			<h2>Alunos</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_alu" class="btn btn-primary pull-right h2">Novo Aluno</a> 
		</div>
	</div>
	<hr/>

	<div> <?php include "mensagens.php"; ?> </div>

	<div id="list" class="row">
		<div class="table-responsive col-md-12">
			<?php

				$quantidade = 5;

				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;

				$data = mysqli_query($con, "select * from aluno order by id_aluno asc limit $inicio, $quantidade;") or die(mysqli_error($erro));

				echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				echo "<thead><tr>";
				echo "<td><strong>Matrícula</strong></td>"; 
				echo "<td><strong>Nome</strong></td>";
				echo "<td><strong>CPF</strong></td>";
				echo "<td><strong>Nascimento</strong></td>";
				echo "<td><strong>Sexo</strong></td>";
				echo "<td><strong>Escolaridade</strong></td>";
				echo "<td><strong>CEP</strong></td>";
				echo "<td><strong>Nº</strong></td>";
				echo "<td><strong>Complemento</strong></td>";
				echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
				echo "</tr></thead><tbody>";
				while($info = mysqli_fetch_array($data)){ 
					echo "<tr>";
					echo "<td>".$info['mat_alu']."</td>";
					echo "<td>".$info['nome_alu']."</td>";
					echo "<td>".$info['cpf_alu']."</td>";
					echo "<td>".date('d/m/Y',strtotime($info['dt_nasc_alu']))."</td>"; //Funções para converter formato da data do MySQL
					echo "<td>".$info['sexo_alu']."</td>";
					echo "<td>".$info['esc_alu']."</td>";
					echo "<td>".$info['cep_alu']."</td>";
					echo "<td>".$info['nr_alu']."</td>";
					echo "<td>".$info['comp_alu']."</td>";
					echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
					echo "<a class='btn btn-success btn-xs' href=?page=view_alu&id_aluno=".$info['id_aluno']."> Visualizar </a>";
					echo "<a class='btn btn-warning btn-xs' href=?page=fedita_alu&id_aluno=".$info['id_aluno']."> Editar </a>"; 
					echo "<a href=?page=excluir_alu&id_aluno=".$info['id_aluno']." class='btn btn-danger btn-xs'> Excluir </a></td>";
				}
				echo "</tr></tbody></table>";
				?>				
		</div>
	</div>
		
		<!-- PAGINAÇÃO -->
	<div id="bottom" class="row">
		<div class="col-md-12">
			<?php
				$sqlTotal 		= "select id_aluno from aluno;";
				$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error($con));
				$numTotal 		= mysqli_num_rows($qrTotal);
				$totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);

				$exibir = 3;

				$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
				$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;

				echo "<ul class='pagination'>";
				echo "<li class='page-item'><a class='page-link' href='?page=lista_alu&pagina=1'> Primeira</a></li> "; 
				echo "<li class='page-item'><a class='page-link' href=\"?page=lista_alu&pagina=$anterior\"> Anterior</a></li> ";

				echo "<li class='page-item'><a class='page-link' href='?page=lista_alu&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";

				for($i = $pagina+1; $i < $pagina+$exibir; $i++){
					if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_alu&pagina=".$i."'> ".$i." </a></li> ";
				}

				echo "<li class='page-item'><a class='page-link' href=\"?page=lista_alu&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
				echo "<li class='page-item'><a class='page-link' href=\"?page=lista_alu&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

			?>	
		</div>
	</div><!--bottom-->
</div>
