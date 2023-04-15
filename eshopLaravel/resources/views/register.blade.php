<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
      <nav class="navbar navbar-expand-md bg-body-tertiary py-3">
        <div class="container-fluid justify-content-center px-4">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex align-items-center flex-grow-1">
              <form class="d-flex w-100">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit">
                  <i class="zmdi zmdi-search fs-2"></i>
                </button>
              </form>
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="zmdi zmdi-shopping-cart-plus fs-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link">
                  <i class="zmdi zmdi-power fs-2"></i>
                </a>
              </li>
            </ul>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="zmdi zmdi-menu fs-2"></i>
          </button>
      </nav>
      <div class="card border-dark">
        <div class="card-body">
          <form>
            <h2>Registrácia</h2>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email*</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Heslo*</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="name" placeholder="Heslo">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Potvrdenie hesla*</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" placeholder="Heslo">
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-3 col-form-label">Telefónne číslo*</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" id="phone" placeholder="0957864598">
              </div>
            </div>
            <h2>Fakturačné údaje</h2>
            <div class="form-group row">
                <label for="name-surname" class="col-sm-3 col-form-label">Meno a priezvisko*</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name-surname" placeholder="Jozef Mrkva">
                </div>
            </div>
            <div class="form-group row">
                <label for="street" class="col-sm-3 col-form-label">Ulica*</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="street" placeholder="Dolnozemská">
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-3 col-form-label">Mesto*</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="city" placeholder="Bratislava">
                </div>
            </div>
            <div class="form-group row">
                <label for="postalcode" class="col-sm-3 col-form-label">PSC*</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="postalcode" placeholder="02943">
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-success">Register</button>
              </div>
            </div>
          </form>
        </div>
  </div>
</div>
</body>
</html>