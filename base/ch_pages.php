<?php
    if(isset($_GET['page'])){

        switch ($_GET['page']) {
            case 'home':
                include "home.php";
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

            default:
                include "index.php";
                break;
            }
    }
?>