<?php
    if(isset($_GET['page'])){

        switch ($_GET['page']) {
            case 'home':
                include "home.php";
                break;

            case 'fadd_cad':
                include "fadd_cad.php";
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

            default:
                include "home.php";
                break;
            }
    }
?>