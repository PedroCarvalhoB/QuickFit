﻿<?php
if (!isset($_SESSION))
  session_start();
?>
<?php
	$id = $_SESSION['UsuarioID'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Visualizar registro do Aluno - <?php echo $id; ?> </h3>
	<div class="row">
		<div class="col-md-2">
			<p><strong>Matrícula</strong></p>
			<p><?php echo $row['matri_usu'];?></p>
		</div>
		<div class="col-md-6">
			<p><strong>Nome Completo</strong></p>
			<p><?php echo $row['nome_usu'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Data Nascimento</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['dt_nasc'])); ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Sexo</strong></p>
			<p><?php 
				if($row["sexo"]=="M") 
					echo "Masculino"; 
				else 
					echo 'Feminino'; 
				?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p><strong>Nome do Pai</strong></p>
			<p><?php echo $row['nome_pai'];?></p>
		</div>
		<div class="col-md-6">
			<p><strong>Nome da Mãe</strong></p>
			<p><?php echo $row['nome_mae'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><strong>CPF</strong></p>
			<p><?php echo $row['cpf'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p><strong>CEP</strong></p>
			<p><?php echo $row['cep'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Número</strong></p>
			<p><?php echo $row['numero'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>Complemento</strong></p>
			<p><?php echo $row['complemento'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<?php echo "<a href=?page=fedita_alu&id_usu=".$row['id_usu']." class='btn btn-primary'>Editar</a>";?>
		</div>
	</div>
</div>