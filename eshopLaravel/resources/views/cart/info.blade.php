<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Košík</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('css/info.css') }}">
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
        <form action="/cart/store" method="POST">
            @csrf
        <main class="container pt-5 p-sm-5 overflow-auto">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="row">
                        @php
                            $user_id = 0;
                            try {
                                $user_id = auth()->user()->id;
                            } catch (Throwable $e){};
                        @endphp
                        <input type='hidden' name='shipping' value={{(old('shipping') == null) ? $shipping_id : old('shipping')}}>
                        <input type='hidden' name='payment' value={{(old('payment') == null) ? $payment_id : old('payment')}}>
                        <input type='hidden' name='user_id' value={{$user_id}}>
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="name" class="form-label">Meno</label>
                            <input type="text" class="form-information ms-2" name="name" value={{old('name')}}>
                        </div>
                        @error('name')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="surname" class="form-label">Priezvisko</label>
                            <input type="text" class="form-information ms-2" name="surname" value={{old('surname')}}>
                        </div>
                        @error('surname')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-information ms-2" name="email" value={{old('email')}}>
                        </div>
                        @error('email')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="psc" class="form-label">PSČ</label>
                            <input type="text" class="form-information ms-2" name="psc" value={{old('psc')}}>
                        </div>
                        @error('psc')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="street" class="form-label">Ulica</label>
                            <input type="text" class="form-information ms-2" name="street"  value={{old('street')}}>
                        </div>
                        @error('street')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="city" class="form-label">Mesto</label>
                            <input type="text" class="form-information ms-2" name="city" value={{old('city')}}>
                        </div>
                        @error('city')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                            <label for="country" class="form-label">Štát</label>
                            <input type="text" class="form-information ms-2" name="country" value={{old('country')}}>
                        </div>
                        @error('country')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                        <label for="phone" class="form-label">Tel. č.</label>
                        <input type="text" class="form-information ms-2" name="phone" value={{old('phone')}}>
                    </div>
                    @error('phone')
                            <p>{{$message}}</p>
                        @enderror
                    <div class="col-12 d-flex align-items-center justify-content-center mb-4">
                        <label for="other" class="form-label">Doručenie na inú adresu</label>
                        <input type='hidden' name='other' value="false">
                        <input type="checkbox" class="form-information-checkbox ms-2" name="other" value="true">
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                        <label for="psc-2" class="form-label">PSČ</label>
                        <input type="text" class="form-information ms-2" name="psc-2" value={{old('psc-2')}}>
                    </div>
                    @error('psc-2')
                            <p>{{$message}}</p>
                        @enderror
                    <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                        <label for="street-2" class="form-label">Ulica</label>
                        <input type="text" class="form-information ms-2" name="street-2" value={{old('street-2')}}>
                    </div>
                    @error('street-2')
                            <p>{{$message}}</p>
                        @enderror
                    <div class="col-12 d-flex align-items-center justify-content-center sm-justify-content-end  mb-5">
                        <label for="city-2" class="form-label">Mesto</label>
                        <input type="text" class="form-information ms-2" name="city-2" value={{old('city-2')}}>
                    </div>
                    @error('city-2')
                            <p>{{$message}}</p>
                        @enderror
                </div>
                <div class="col-12 col-lg-6 ps-lg-5">
                    <div class="row text-center">
                        <h1>Zhrnutie objednávky</h1>
                    </div>
                    <div class="col" id="summary">
                        <div class="col-12 d-flex justify-content-between p-3">
                            <b>Cierna mikina</b>
                            <a>3 ks</a>
                            <a>384€</a>
                        </div>
                        <div class="col-12 d-flex justify-content-between p-3">
                            <b>Cierna mikina</b>
                            <a>1 ks</a>
                            <a>128€</a>
                        </div>
                    </div>
                    <div class="row text-end mt-2">
                        <h2>Spolu: 512€</h2>
                    </div>
                </div>
            </div>
        </main>
        <div class="container pt-3">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <button type="submit" name="action" value="back" class="btn btn-success">Späť</button>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="submit" name="action" value="save" class="btn btn-success">Pokračovať</button>                    
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>