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

            default:
                include "home.php";
                break;
            }
    }
?>