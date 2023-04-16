<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Košík</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('css/payment.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=Roboto+Mono:wght@100;400&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-body-tertiary py-3">
        <div class="container-fluid justify-content-center px-4">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex align-items-center flex-grow-1">
              <form class="d-flex justify-content-center w-100">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">
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
                  <i class="zmdi zmdi-account-circle fs-2"></i>
                </a>
              </li>
            </ul>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="zmdi zmdi-menu fs-2"></i>
          </button>
      </nav>
    <div class="container">
        <nav class="container d-none d-sm-block m-4">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-sm-2 d-flex align-items-center justify-content-center cart-nav" id="nav-cart">Košík</div>
                <div class="col-lg-2 col-sm-2 d-flex align-items-center justify-content-center cart-nav" id="nav-transport">Doprava</div>
                <div class="col-lg-2 col-sm-2 d-flex align-items-center justify-content-center text-center cart-nav" id="nav-payment">Spôsob platby</div>
                <div class="col-lg-2 col-sm-2 d-flex align-items-center justify-content-center text-center cart-nav" id="nav-information">Dodacie údaje</div>
            </div>
        </nav>
        <main class="container p-sm-5 overflow-auto">
            <div class="row">
                <div class="col col-lg-6">
                    <div class="row p-3">
                        <h1>Zvoľte spôsob platby</h1>
                    </div>
                    <form class="row p-4 bordered">
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="payment-radio" value="" id="card">
                            <label class="form-check-label" for="card">Kreditná karta</label>
                        </div>
                        <div class="col-6 p-4 d-flex justify-content-end align-items-center">
                            -1,00€
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="payment-radio" value="" id="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                        <div class="col-6 p-4 d-flex justify-content-end align-items-center">
                            -1,00€
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="payment-radio" value="" id="dobierka">
                            <label class="form-check-label" for="dobierka">Na dobierku</label>
                        </div>
                        <div class="col-6 p-4 d-flex justify-content-end align-items-center">
                            +1,99€
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="payment-radio" value="" id="transfer">
                            <label class="form-check-label" for="transfer">Prevodom na účet</label>
                        </div>
                        <div class="col-6 p-4 d-flex justify-content-end align-items-center">
                            +1,00€
                        </div>
                    </form>
                </div>
                <div class="col-6 d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-around align-items-center text-center mb-3">
                            <img src="https://www.celiostore.sk/assets/files/catalog/item-pictures/thumbs/1500x2000c/b0777616-541e-4be2-b54c-d034bd2383cd-1100236-0.webp">
                            <h3>Cierna mikina</h3>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center text-center mb-3">
                            <img src="https://www.celiostore.sk/assets/files/catalog/item-pictures/thumbs/1500x2000c/b0777616-541e-4be2-b54c-d034bd2383cd-1100236-0.webp">
                            <h3>Cierna mikina</h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="container pt-3">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/cart/shipping' }}'">Späť</button>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/cart/info' }}'">Pokračovať</button>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>