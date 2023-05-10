<?php
	$id = (int) $_GET['id_aluno'];
	$sql = mysqli_query($con, "select * from aluno where id_aluno = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Visualizar registro do Aluno - <?php echo $id; ?> </h3>
	<div class="row">
		<div class="col-md-2">
			<p><strong>Matrícula</strong></p>
			<p><?php echo $row['mat_alu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Nome Completo</strong></p>
			<p><?php echo $row['nome_alu'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Data Nascimento</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['dt_nasc_alu'])); ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Escolaridade</strong></p>
			<p><?php 
				if($row["esc_alu"]=="M") 
					echo "Médio"; 
				else 
					echo 'Superior'; 
				?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Sexo</strong></p>
			<p><?php 
				if($row["sexo_alu"]=="M") 
					echo "Masculino"; 
				else 
					echo 'Feminino'; 
				?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p><strong>Nome do Pai</strong></p>
			<p><?php echo $row['pai_alu'];?></p>
		</div>
		<div class="col-md-6">
			<p><strong>Nome da Mãe</strong></p>
			<p><?php echo $row['mae_alu'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p><strong>RG</strong></p>
			<p><?php echo $row['rg_alu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>ORG. EXP.</strong></p>
			<p><?php echo $row['oe_rg_alu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>CPF</strong></p>
			<p><?php echo $row['cpf_alu'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p><strong>CEP</strong></p>
			<p><?php echo $row['cep_alu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Número</strong></p>
			<p><?php echo $row['nr_alu'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Complemento</strong></p>
			<p><?php echo $row['comp_alu'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_alu" class="btn btn-default">Voltar</a>
				<?php echo "<a href=?page=fedita_alu&id_aluno=".$row['id_aluno']." class='btn btn-primary'>Editar</a>";?>
				<?php echo "<a href=?page=excluir_alu&id_aluno=".$row['id_aluno']." class='btn btn-danger'>Excluir</a>";?>
		</div>
	</div>
</div>
