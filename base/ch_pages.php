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
            include "content/usuario/crud/fedita_usu.php";
            break;

        case 'atualiza_usu':
            include "content/usuario/crud/atualiza_usu.php";
            break;

        case 'block_usu':
            include "content/usuario/crud/block_usu.php";
            break;

        case 'ativa_usu':
            include "content/usuario/crud/ativa_usu.php";
            break;

        case 'fedita_alu':
            include "content/aluno/crud/fedita_alu.php";
            break;

        case 'view_alu':
            include "content/aluno/crud/view_alu.php";
            break;

        case 'atualiza_alu':
            include "content/aluno/crud/atualiza_alu.php";
            break;

        case 'fadd_exec':
            include "content/gerente/crud/fadd_exec.php";
            break;

        case 'insere_exec':
            include "content/gerente/crud/insere_exec.php";
            break;

        case 'lista_acad':
            include "content/gerente/crud/lista_acad.php";
            break;

        case 'fadd_acad':
            include "content/gerente/crud/fadd_acad.php";
            break;

        case 'insere_acad':
            include "content/gerente/crud/insere_acad.php";
            break;

        case 'lista_apar':
            include "content/gerente/crud/lista_apar.php";
            break;

        case 'fadd_apar':
            include "content/gerente/crud/fadd_apar.php";
            break;

        case 'insere_apar':
            include "content/gerente/crud/insere_apar.php";
            break;

        case 'view_apar':
            include "content/gerente/crud/view_apar.php";

        case 'fadd_apar_exec':
            include "content/gerente/crud/fadd_apar_exec.php";
            break;

        case 'insere_apar_exec':
            include "content/gerente/crud/insere_apar_exec.php";
            break;

        case 'lista_ava':
            include "content/professor/crud/lista_ava.php";
            break;

        case 'aluno_ava':
            include "content/aluno/crud/lista_ava.php";
            break;

        case 'prof_ava':
            include "content/professor/crud/view_ava.php";
            break;

        case 'fadd_ava':
            include "content/professor/crud/fadd_ava.php";
            break;

        case 'insere_ava':
            include "content/professor/crud/insere_ava.php";
            break;

        case 'view_ava':
            include "content/aluno/crud/view_ava.php";
            break;

        case 'lista_treino':
            include "content/professor/crud/lista_treino.php";
            break;

        case 'fadd_treino':
            include "content/professor/crud/fadd_treino.php";
            break;

        case 'insere_treino':
            include "content/professor/crud/insere_treino.php";
            break;

        case 'excluir_exec':
            include "content/professor/crud/excluir_exec.php";
            break;

        case 'view_treino':
            include "content/aluno/crud/view_treino.php";
            break;

        case 'view_adm':    
            include "content/admin/crud/view_adm.php";
            break;

        case 'fedita_adm':
            include "content/admin/crud/fedita_adm.php";
            break;

        case 'view_prof':
            include "content/professor/crud/view_prof.php";
            break;

        case 'fedita_prof':
            include "content/professor/crud/fedita_prof.php";
            break;

        case 'atualiza_adm':
            include "content/admin/crud/atualiza_adm.php";
            break;
                
        default:
            include "content/home.php";
            break;
    }
}