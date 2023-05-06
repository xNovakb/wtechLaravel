<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detailOfProduct.css') }}">
</head>
<body>
    <div class="container">
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
                            <a class="nav-link d-md-none btn btn-link nav-link-button" href="/cart/summary">Košík</a>
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
              </nav>
        </header>
        <div class="row">
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($product->images) > 0)
                            <img class="img-fluid big-img" src="{{ asset('storage/' . $product->images[0]->image) }}" alt="Product Image">
                        @else
                            <img class="img-fluid big-img" src="https://via.placeholder.com/600x600" alt="Product Image">
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach ($product->images as $key => $image)
                        @if ($key > 0)
                            <div class="col-md-4 mb-2">
                                <img class="img-fluid small-img" src="{{ asset('storage/' . $image->image) }}" alt="Product Image">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <div class="col-xs-12 d-md-none">
                <div class="card text-center">
                    <div id="carousel-{{ $product->id }}" class="carousel slide" data-bs-interval="false">
                        <div class="carousel-indicators">
                            @foreach ($product->images as $key => $image)
                                <button type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($product->images as $key => $image)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }} cItem">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 cImg" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{ $product->id }}" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{ $product->id }}" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-dark col-md-8">
                <div class="col-sm-12">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p><strong>Značka:</strong> {{ $product->brand_id }}</p>
                    <p><strong>Farba:</strong> {{ $product->color_id }}</p>
                    <p><strong>Cena:</strong> {{ $product->price }}</p>
                    <br>
                    <form action="/product/{{$product->id}}" method="POST">
                      @csrf
                        <div class="form-group row justify-content-end">
                        <input class="col-sm-2 col-md-4" type="number" class="form-control" id="quantity" min="1" max="10" value="1" name="quantity">
                        <div>
                            <button type="submit" class="btn btn-success">Vložiť do košíka</button>
                        </div>
                        </div>
                    </form>
                    @if (session('added-items') && in_array($product->id, array_column(session('added-items'), 'item_id')))
                    <form action="/cart/del_cart_item/{{ $product->id }}" method="GET">
                      @csrf
                        <div class="form-group row justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-danger">Odstrániť z košíka</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>