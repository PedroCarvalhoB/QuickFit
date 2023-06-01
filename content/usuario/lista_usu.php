﻿<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-10">
			<h2>Usuários</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_cad" class="btnsub">Novo Usuário</a> 
		</div>
	</div>
	<!--top - Lista dos Campos-->
	<hr/>
	<div id="bloco-list-pag">	
		<div id="list" class="row">
			<div class="table-responsive col-xs-12">
				<?php
					$quantidade = 10;

					$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
					$inicio = ($quantidade * $pagina) - $quantidade;

					$sql= "select * from usuario order by id_usu asc limit $inicio, $quantidade;";

					$data_all = mysqli_query($con,$sql ) or die(mysqli_error($erro));

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

					while($info = mysqli_fetch_array($data_all)){ 
						echo "<tr>";
						echo "<td>".$info['matri_usu']."</td>";
						echo "<td>".$info['id_usu']."</td>";
						echo "<td>".$info['nome_usu']."</td>";
						echo "<td>".$info['tipo_usu']."</td>";
						echo "<td>".$info['cpf']."</td>";

						if($info['status_usu'] == 1){
							echo "<td>Ativo</td>";
						}else if($info['ativo'] == 0){
							echo "<td>NÃO</td>";
						}
						echo "<td>".date('d/m/Y',strtotime($info['dt_nasc']))."</td>";
						echo "<td><div class='btn-group btn-group-xs'>";
						echo "<a class='btn btn-info btn-xs' href=?page=view_usu&id=".$info['id_usu']."> Visualizar </a>";
						echo "<a class='btn btn-warning btn-xs' href=?page=fedita_usu&id=".$info['id_usu']."> Editar </a>";
						if($info['status_usu'] == 1){
							echo "<a class='btn btn-danger btn-xs'  href=?page=block_usu&id=".$info['id_usu']."> Bloquear </a>";
						}else if($info['status_usu'] == 0){
							echo "<a class='btn btn-success btn-xs'  href=?page=ativa_usu&id=".$info['id_usu'].">&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a></div></td>";
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
					$sqlTotal 		= "select id_usu from usuario;";
					$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error($con));
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);

					$exibir = 3;

					$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;

					echo "<ul class='pagination'>";
					echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=1'> Primeira</a></li> "; 
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$anterior\"> Anterior</a></li> ";

					echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";

					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$i."'> ".$i." </a></li> ";
					}

					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

				?>	
			</div>
		</div><!--bottom-->
	</div>
</div><!--main-->