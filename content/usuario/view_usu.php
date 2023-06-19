<?php
if (!isset($_SESSION))
    session_start();
$id = (int) $_GET['id'];
$sql = mysqli_query($con, "select * from usuario where id_usu = '" . $id . "';");
$row = mysqli_fetch_array($sql);
?>

<div id="main" class="container-fluid">
    <br>

    <h3 class="page-header">Visualizar registro do Usuário -
        <?php echo $id; ?>
    </h3>

    <br>

    <!-- 1ª LINHA -->

    <div class="row">
        <div class="col-md-1">
            <p><strong>ID</strong></p>
            <p>
                <?php echo $row['id_usu']; ?>
            </p>
        </div>

        <div class="col-md-5">
            <p><strong>Nome do usuário</strong></p>
            <p>
                <?php echo $row['nome_usu']; ?>
            </p>
        </div>

        <div class="col-md-3">
            <p><strong>Data de Nascimento</strong></p>
            <p>
                <?php echo $row['dt_nasc']; ?>
            </p>
        </div>

        <div class="col-md-3">
            <p><strong>Tipo</strong></p>
            <p>
                <?php echo $row['tipo_usu']; ?>
            </p>
        </div>
    </div>

    <br>

    <!-- 2ª LINHA -->

    <div class="row">

        <div class="col-md-2">
            <p><strong>Matrícula</strong></p>
            <p>
                <?php echo $row['matri_usu']; ?>
            </p>
        </div>

        <div class="col-md-4">
            <p><strong>CPF</strong></p>
            <p>
                <?php echo $row['cpf']; ?>
            </p>
        </div>

        <div class="col-md-3">
            <p><strong>CEP</strong></p>
            <p>
                <?php echo $row['cep']; ?>
            </p>
        </div>

        <div class="col-md-2">
            <p><strong>Ativo</strong></p>
            <p>
                <?php
                if ($row["status_usu"] == 1) {
                    echo "SIM";
                } else if ($row["status_usu"] == 0) {
                    echo "NÃO";
                }
                ?>
            </p>
        </div>

    </div>

    <hr />

    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="?page=lista_usu" class="btncancel">Voltar</a>
            <?php
            $nivel = $_SESSION['UsuarioNivel'];

            switch ($nivel) {
                case '2':
                    // Avaliação
                    echo "<a class='btn' href=?page=fadd_ava&id=" . $row['id_usu'] . " class='btncancel'> Avaliação </a>";

                    // Treinamento 
                    echo "<a class='btn' href=?page=fadd_treino&id=" . $row['id_usu'] . " class='btncancel'> Treino </a>";
                    break;

                case '4':
                    echo "<a href=?page=fedita_usu&id=" . $row['id_usu'] . " class='btnsub'>Editar</a>";

                    if ($row["status_usu"] == 1) {
                        echo "<a href=?page=block_usu&id=" . $row['id_usu'] . " class='btn btn-danger'>Bloquear</a>";
                    } else if ($row["status_usu"] == 0) {
                        echo "<a href=?page=ativa_usu&id=" . $row['id_usu'] . " class='btn btn-success'>&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a>";
                    }
                    break;

                default:
                    break;
            }
            ?>
        </div>
    </div>
</div>