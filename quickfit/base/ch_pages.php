<?php
    if(isset($_GET['page'])){

        switch ($_GET['page']) {
            case 'home':
                include "home.php";
                break;
            
            case 'lista_alu':
                include "content/alunos/crud/lista_alu.php";
                break;
                
            case 'fadd_alu':
                include "content/alunos/crud/fadd_alu.php";
                break;
                
            case 'insere_alu':
                include "content/alunos/crud/insere_alu.php";
                break;
                
            case 'fedita_alu':
                include "content/alunos/crud/fedita_alu.php";
                break;
                    
            case 'view_alu':
                include "content/alunos/crud/view_alu.php";
                break;
                
            case 'excluir_alu':
                include "content/alunos/crud/excluir_alu.php";
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