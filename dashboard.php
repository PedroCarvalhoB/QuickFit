<?php
if (!isset($_SESSION))
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/css/edit_aluno.css">
</head>

<body>

  <!-- SideBar  -->

  <?php
  switch ($_SESSION['UsuarioNivel']) {
    case 1:
      include "content/alunos/sidebar.php";
      break;

    case 2:
      include "content/professor/sidebar.php";
      break;

    case 3:
      include "content/personal/sidebar.php";
      break;

    case 4:
      include "content/funcionario/sidebar.php";
      break;

    case 5:
      include "content/gerente/sidebar.php";
      break;

    case 6:
      include "content/admin/sidebar.php";
      break;

    default:
      header("Location: index.php");
      break;
  }
  ?>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <!-- <span class="text">QuickFit</span> -->
    </div>

    <?php include "base/config.php" ?>
    <?php include "base/ch_pages.php" ?>
    
    
  </section>

  <!-- Script  -->
  <script src="assets/js/dash.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>