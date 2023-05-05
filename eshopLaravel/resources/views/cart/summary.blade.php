<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Košík</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('css/cart.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
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
                        <a class="nav-link d-none d-md-inline " href="/">
                            <i class="zmdi zmdi-home fs-2"></i>
                        </a>
                        <a class="nav-link d-md-none" href="#">Domov</a>
                    </li>
                    <li class="nav-item">
                        <form action="/users/logout" method="POST">
                            @csrf
                            <button type="submit" class="nav-link d-none d-md-inline" href="#">
                                <i class="zmdi zmdi-power fs-2"></i>
                            </button>
                            <button type="submit" class="nav-link d-md-none" href="#">Odhlásiť sa</button>
                        </form>
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
        <main class="container p-4 overflow-auto">
            @unless (count($products) == 0)

            @foreach ($products as $key => $value)
            <form method="POST" action="/updateQuantity/{{$value['id']}}">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 col-sm d-flex justify-content-center p-1">
                        <img src="{{ asset('storage/' . $value['image']) }}">
                    </div>
                    <div class="col-12 col-sm d-flex align-items-center justify-content-center p-1">
                        <a>{{$value['name']}}</a>
                    </div>
                    <div class="col-12 col-sm-1 d-flex align-items-center justify-content-center p-1">
                        <input type="number" placeholder="{{$value['quantity']}}" class="item-number" name="quantity" value="{{ $value['quantity'] }}" onchange="this.form.submit()">
                    </div>
                    <div class="col d-none d-md-block">
    
                    </div>
                    <div class="col-12 col-sm d-flex align-items-center justify-content-center p-1">
                        <a>{{$value['price']}}€</a>
                    </div>
                    <div class="col-12 col-sm-1 d-flex align-items-center justify-content-center p-1">
                        <button type="button" class="btn btn-danger" onclick="location.href='/cart/del_cart_item/{{$value['id']}}'">X</button>
                    </div>
                </div>
            </form>
            @endforeach
                
            @endunless
        </main>
        <div class="container pt-3">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/products' }}'">Späť</button>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ '/cart/shipping' }}'">Pokračovať</button>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>