<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Košík</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('css/shipping.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=Roboto+Mono:wght@100;400&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body-tertiary py-3">
            <div class="container-fluid justify-content-center px-4">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex align-items-center flex-grow-1 justify-content-end">
                    <form class="d-flex col-10">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit">
                        <i class="zmdi zmdi-search fs-2"></i>
                    </button>
                    </form>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link d-none d-md-inline " href="/products">
                            <i class="zmdi zmdi-home fs-2"></i>
                        </a>
                        <a class="nav-link d-md-none" href="#">Košík</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-none d-md-inline" href="#">
                            <i class="zmdi zmdi-power fs-2"></i>
                        </a>
                        <a class="nav-link d-md-none" href="#">Odhlásiť sa</a>
                    </li>
                </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="zmdi zmdi-menu fs-2"></i>
                </button>
            </nav>
        </header>
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
                <div class="col col-lg-8">
                    <div class="row p-3">
                        <h1>Zvoľte spôsob doručenia</h1>
                    </div>
                    <form class="bordered row p-4">
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="transport-radio" value="" id="box">
                            <label class="form-check-label" for="box">XYBox</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            1,49€
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            do 24 hod.
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="transport-radio" value="" id="shop">
                            <label class="form-check-label" for="shop">Predajňa</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            Zadarmo
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            Ihneď
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="transport-radio" value="" id="zasielkovna">
                            <label class="form-check-label" for="zasielkovna">Zasielkovňa</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            1,99€
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            2-3 dni
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="transport-radio" value="" id="posta">
                            <label class="form-check-label" for="posta">Slovenská Pošta</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            1,99€
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            2-3 dni
                        </div>
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="transport-radio" value="" id="adress">
                            <label class="form-check-label" for="adress">Doručenie na adresu (DPD)</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            3,49€
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            3-5 dní
                        </div>
                    </form>
                </div>
                <div class="col-4 d-none d-lg-block">
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
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/cart/summary' }}'">Späť</button>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/cart/payment' }}'">Pokračovať</button>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>