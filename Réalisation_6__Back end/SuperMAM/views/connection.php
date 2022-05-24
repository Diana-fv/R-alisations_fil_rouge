<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super MAM</title>
    <meta name="description" content="SuperMAM - Garde d'enfants à Villeneuve Tolosane: une maison d'assistantes maternelles">
    <link href="assets/css/monCssFR.css" rel="stylesheet" />
    
	    <!-- CDN style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- favicon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!-- <script src="../views/js/w3data.js"></script>-->

</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h3 fw-bold mb-0">Nous sommes heureux de te revoir!</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="login" method="POST" style="width: 23rem;">

            <div class="form-outline mb-4">
            <label for="login_user">Login utilisateur</label>
            <input type="text" name="login_user" class="form-control form-control-lg" required>
            </div>

            <div class="form-outline mb-4">
            <label for="password_user">Mot de passe</label>
            <input type="password" name="password_user" class="form-control form-control-lg" required>
            <br>
            </div>

            <div class="pt-1 mb-4">
            <input type="submit" class="btn btn-info btn-lg btn-block" value="Connexion">
            </div>
          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="assets/img/kids1.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body>
</html>