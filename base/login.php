<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Login</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>

  <form action="validacao.php" method="post">
    <section class="vh-30 gradient-custom">
      <div class="container py-5 h-70 ">
        <div class="row d-flex justify-content-center align-items-center h-600  ">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5 " style="">
            <div class="card text-white  logincont" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase titulo">Entrar</h2>               

                  <div class="form-outline form-white mb-4 caixatext">
                    <label class="form-label" for="typeEmailX">CPF</label>
                    <input type="tex" name="cpf" id="typeEmailX" placeholder="xxx.xxx.xxx-xx" class="form-control form-control-sm" />
                  </div>

                  <div class="form-outline form-white mb-4 caixatext">
                    <label class="form-label" for="typePasswordX">Senha</label>
                    <input type="password" name="senha" placeholder="***********" class="form-control form-control-sm" />
                  </div>

                  <button class="w-100 btnsub" type="submit">Entrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

  <!-- Script  -->
  <script src="js/dash.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>