<?php
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            include "content/home.php";
            break;

        case 'home_adm':
            include "content/admin/home.php";
            break;

        case 'home_alu':
            include "content/aluno/home.php";
            break;

        case 'home_func':
            include "content/funcionario/home.php";
            break;

        case 'home_ger':
            include "content/gerente/home.php";
            break;

        case 'home_prof':
            include "content/professor/home.php";
            break;

        case 'logout':
            include "base/logout.php";
            break;

        case 'fadd_cad':
            include "cadastro/fadd_cad.php";
            break;

        case 'insere_cad':
            include "insere_cad.php";
            break;

        case 'lista_usu':
            include "content/usuario/lista_usu.php";
            break;

        case 'view_usu':
            include "content/usuario/view_usu.php";
            break;

        case 'fedita_usu':
            include "content/usuario/fedita_usu.php";
            break;

        case 'fedita_alu':
            include "content/alunos/crud/fedita_alu.php";
            break;

        case 'view_alu':
            include "content/alunos/crud/view_alu.php";
            break;

        case 'atualiza_alu':
            include "content/alunos/crud/atualiza_alu.php";
            break;

        case 'fadd_exec':
            include "content/gerente/crud/fadd_exec.php";
            break;

        case 'insere_exec':
            include "content/gerente/crud/insere_exec.php";
            break;

        case 'fadd_acad':
            include "content/gerente/crud/fadd_acad.php";
            break;

        case 'insere_acad':
            include "content/gerente/crud/insere_acad.php";
            break;

        case 'fadd_apar':
            include "content/gerente/crud/fadd_apar.php";
            break;

        case 'insere_apar':
            include "content/gerente/crud/insere_apar.php";
            break;

        case 'fadd_apar_exec':
            include "content/gerente/crud/fadd_apar_exec.php";
            break;

        case 'insere_apar_exec':
            include "content/gerente/crud/insere_apar_exec.php";
            break;

        case 'fadd_ava':
            include "content/professor/crud/fadd_ava.php";
            break;

        case 'insere_ava':
            include "content/professor/crud/insere_ava.php";
            break;

        case 'fadd_trein':
            include "content/professor/crud/fadd_trein.php";
            break;

        case 'insere_ava':
            include "content/professor/crud/insere_trein.php";
            break;

        default:
            include "content/home.php";
            break;
    }
}
