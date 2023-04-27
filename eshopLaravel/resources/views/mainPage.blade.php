<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mainPage.css') }}">
        <title>Admin obrazovka</title>
    </head>
    <body>
        <script src="{{ asset('js/mainPage.js') }}"></script>
        <header>
            <nav class="navbar navbar-expand-md bg-body-tertiary py-3">
                <div class="container-fluid justify-content-center px-4">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex align-items-center flex-grow-1 justify-content-end">
                      <form class="d-flex col-10" action="/" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn" type="submit">
                          <i class="zmdi zmdi-search fs-2"></i>
                        </button>
                      </form>
                    </div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link d-none d-md-inline " href="/cart/summary">
                                <i class="zmdi zmdi-shopping-cart-plus fs-2"></i>
                            </a>
                            <a class="nav-link d-md-none" href="#">Košík</a>
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

        <div class="container-fluid">
            <div class="row pb-3">
                <div class="col d-none d-sm-flex justify-content-center">
                    <a href="?{{ http_build_query(['sort' => 'name_asc'] + request()->all()) }}" class="sort mx-2" type="button">Odporúčané</a>
    <a href="?{{ http_build_query(['sort' => 'name_desc'] + request()->all()) }}" class="sort mx-2" type="button">Najpredávanejšie</a>
    <a href="?{{ http_build_query(['sort' => 'price_asc'] + request()->all()) }}" class="sort mx-2" type="button">Najlacnejšie</a>
    <a href="?{{ http_build_query(['sort' => 'price_desc'] + request()->all()) }}" class="sort mx-2" type="button">Najdrahšie</a>
</div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2 border-0">
                    <div class="card-body">
                      <form class="filter-form">
                        <div class="form-group py-3">
                            <label class="py-2">Cena</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="price_from">
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" name="price_to">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="py-2">Značka</label>
                          <select class="form-control" name="brand">
                            <option>Všetky značky</option>
                            <option>Adidas</option>
                            <option>Nike</option>
                            <option>Puma</option>
                          </select>
                        </div>
                        <div class="form-group py-3">
                            <label class="py-2">Farba</label>
                            <select class="form-control" name="color">
                              <option>Všetky farby</option>
                              <option>Červená</option>
                              <option>Biela</option>
                              <option>čierna</option>
                            </select>
                        </div>
                        <div class="form-group py-3">
                          <button type="submit" class="col-12 btn btn-success rounded-6">Vyhľadaj</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 py-2">
                            <div class="card text-center">
                                <div id="" class="carousel slide">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active cItem">
                                            <img src="assets/boots.png" class="d-block w-100 cImg" alt="...">
                                        </div>
                                        <div class="carousel-item cItem">
                                            <img src="assets/dress.jpg" class="d-block w-100 cImg" alt="...">
                                        </div>
                                        <div class="carousel-item cItem">
                                            <img src="assets/boots.png" class="d-block w-100 cImg" alt="...">
                                       </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="card-body justify-content-center">
                                    <h5 class="card-title col-12">{{ $product['name'] }}</h5>
                                    <ul class="list-inline m-1 col-12">
                                        <li class="list-inline-item fw-bold">Značka</li>
                                        <li class="list-inline-item">{{ $product['brand_id'] }}</li>
                                    </ul>
                                    <ul class="list-inline m-1 col-12">
                                        <li class="list-inline-item fw-bold">Farba</li>
                                        <li class="list-inline-item">{{ $product['color_id'] }}</li>
                                    </ul>
                                    <ul class="list-inline m-1 col-12">
                                        <li class="list-inline-item fw-bold">Cena</li>
                                        <li class="list-inline-item">{{ $product['price'] }}€</li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div>
                {{ $products->appends(['search' => request('search')])->links() }}
            </div>
        </footer>
        
    </body>
</html>