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

     <!--<link rel="stylesheet" href="style-sass.css">-->
        <title>Edit produktu</title>
    </head>
    <body>
      <div class="container py-5">
        <form>
          <div class="form-group row py-1">
            <label for="product" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Názov produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
              <input type="text" class="form-control p-sm-1" id="product" placeholder="Zadajte názov produktu">
            </div>
            <label for="size" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Veľkosť</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <select class="form-control p-sm-1" id="size">
                  <option>XS</option>
                  <option>S</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                  <option>XXL</option>
                </select>
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="brand" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Značka</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
              <input type="text" class="form-control p-sm-1" id="brand" placeholder="Zadajte značku">
            </div>
            <label for="sex" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Pohlavie</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
              <select class="form-control p-sm-1" id="sex">
                <option>Ženy</option>
                <option>Muži</option>
                <option>Unisex</option>
              </select>
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="farba" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Farba</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
              <input type="text" class="form-control p-sm-1" id="farba" placeholder="Zadajte kategóriu">
            </div>
            <label for="farba" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Cena</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
              <input type="text" class="form-control p-sm-1" id="farba" placeholder="Zadajte cenu">
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="category" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Kategória</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
              <input type="text" class="form-control" id="category" placeholder="Zadajte kategóriu">
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="productInfo" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Popis produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
              <textarea class="form-control" id="productInfo" rows="5"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="container py-3">
        <div class="row py-2">
          <div class="col-12">
            <i class="zmdi zmdi-image-o fs-1"></i>
            <label for="obrazky" class="fs-2 px-2">Obrázky:</label>
            <button class="btn btn-success px-3">+ Nový</button>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-3 px-3 d-flex">
            <i class="zmdi zmdi-delete fs-2 d-inline-block"></i>
            <img class="px-3 d-inline-block" src="assets/hoodie.jpg" alt="">
          </div>
        </div>
      </div>
      <footer class="footer py-3">
        <div class="container">
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Späť</button>
            <button type="submit" class="btn btn-success">Uložiť zmeny</button>
          </div>
        </div>
      </footer>
    </body>
</html>
