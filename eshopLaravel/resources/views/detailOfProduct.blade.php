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
        <div class="row">
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid big-img" src="https://via.placeholder.com/600x600" alt="Product Image">
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-4 mb-2">
                    <img class="img-fluid small-img" src="https://via.placeholder.com/150x150" alt="Product Image">
                </div>
                <div class="col-md-4 mb-2">
                    <img class="img-fluid small-img" src="https://via.placeholder.com/150x150" alt="Product Image">
                </div>
                <div class="col-md-4 mb-2">
                    <img class="img-fluid small-img" src="https://via.placeholder.com/150x150" alt="Product Image">
                </div>
                </div>
            </div>
            
            <div class="col-xs-12 d-md-none">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> 
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="https://via.placeholder.com/600x600" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/600x600" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/600x600" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>

            <div class="card border-dark col-md-8">
                <div class="col-sm-12">
                    <h2>Kožene topánky</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac euismod erat. Duis eu vehicula neque. Morbi ultricies nulla lectus, vitae volutpat nunc congue pharetra. Fusce eu ultricies nisl. Phasellus non tempus leo, nec vehicula enim. Duis et iaculis arcu. Nam tempus quam iaculis, rutrum enim quis, sodales magna. Donec a ultricies lorem. Vivamus pulvinar laoreet lorem, sit amet pharetra orci efficitur dictum. Suspendisse facilisis euismod dui, quis vestibulum enim pellentesque gravida.</p>
                    <p><strong>Značka:</strong> Adidas</p>
                    <p><strong>Farba:</strong> Červená</p>
                    <p><strong>Cena:</strong> 10€</p>
                    <br>
                    <form>
                        <div class="form-group row justify-content-end">
                        <input class="col-sm-2 col-md-4" type="number" class="form-control" id="quantity" min="1" max="10" value="1">
                        <div>
                            <button type="submit" class="btn btn-success">Vložiť do košíka</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>