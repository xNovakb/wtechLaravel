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
                    <form class="d-flex col-9" action="/" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit">
                        <i class="zmdi zmdi-search fs-2"></i>
                    </button>
                    </form>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link d-none d-md-inline " href="/">
                            <i class="zmdi zmdi-home fs-2"></i>
                        </a>
                        <a class="d-flex nav-link d-md-none justify-content-center" href="/">Domov</a>
                    </li>
                    <li class="nav-item">
                        @if (Auth::check())
                            <form action="/users/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link d-none d-md-inline btn btn-link nav-link-button">
                                    <i class="zmdi zmdi-lock-outline fs-2"></i>
                                </button>
                                <button type="submit" class="nav-link d-md-none btn btn-link nav-link-button">Odhlásiť sa</button>
                            </form>
                            @else
                                <a class="nav-link d-none d-md-inline" href="/login">
                                    <i class="zmdi zmdi-lock-open fs-2"></i>
                                </a>
                                <a href="/login" class="nav-link d-md-none btn btn-link nav-link-button">Prihlasiť sa</a>
                            @endif
                    </li>
                </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="zmdi zmdi-menu fs-2"></i>
                </button>
            </div>
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
        <form action="/cart/payment" method="POST">
            @csrf
        <main class="container p-sm-5 overflow-auto">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="row p-3">
                        <h1>Zvoľte spôsob doručenia</h1>
                    </div>
                    <div class="bordered row p-4">
                        @unless(count($shippings) == 0)

                        @foreach ($shippings as $shipping)
                        <div class="form-check col-6 p-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="shipping" value={{$loop->iteration}}>
                            <label class="form-check-label" for="box">{{$shipping['shipping_type']}}</label>
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            {{($shipping['price'] == 0) ? 'Zadarmo' : $shipping['price'].'€'}}
                        </div>
                        <div class="col-3 p-4 d-flex justify-content-center align-items-center">
                            {{$shipping['time_delivery']}}
                        </div>
                        @endforeach
                            
                        @else
                            <p>No shipping methods</p>
                        @endunless
                    </div>
                </div>
                <div class="col-4 d-none d-lg-block">
                    <div class="row">
                        @unless (count($products) == 0)
                            @foreach ($products as $key => $value)
                            <div class="col-12 d-flex justify-content-around align-items-center text-center mb-3">
                                <img src="{{ asset('storage/' . $value['image']) }}">
                                <h3>{{$value['name']}}</h3>
                            </div>
                            @endforeach
                        @endunless
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
                    <button type="submit" class="btn btn-success">Pokračovať</button>                    
                </div>
            </div>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>