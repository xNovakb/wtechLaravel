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
        <link rel="stylesheet" href="{{ asset('css/editProduct.css') }}">
        <title>Edit produktu</title>
    </head>
    <body>

      <div class="container py-5">
        <form method="POST" action="/create/product" enctype="multipart/form-data">
            @csrf
          <div class="form-group row py-1">
            <label for="name" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Názov produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
              <input type="text" class="form-control p-sm-1" name="name" placeholder="Zadajte názov produktu">
              @error('name')
                <p>Toto pole je povinné</p>
              @enderror
            </div>
            <label for="size_id" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Veľkosť</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <select class="form-control p-sm-1" name="size_id">
                    @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                        <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
                @error('size_id')
                    p>Toto pole je povinné</p>
                @enderror
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="brand_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Značka</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
            <select name="brand_id" class="form-select p-sm-1">
                @foreach(['Adidas', 'Nike', 'Puma', 'Tommy Hilfiger', 'Lacoste', 'GAP', 'Guess', 'Gucci', 'Mango', "Bershka"] as $brand)
                    <option value="{{ $brand }}">{{ $brand }}</option>
                @endforeach
            </select>
                @error('brand_id')
                    <p>Toto pole je povinné</p>
                @enderror
            </div>
            <label for="sex_id" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Pohlavie</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
              <select class="form-control p-sm-1" name="sex_id">
                @foreach(['muž', 'žena'] as $sex)
                    <option value="{{ $sex }}">{{ $sex }}</option>
                @endforeach
              </select>
              @error('sex_id')
                <p>Toto pole je povinné</p>
              @enderror
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="color_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Farba</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
                <select class="form-control p-sm-1" name="color_id">
                    @foreach(['červená', 'modrá', 'zelená', 'biela', 'čierna', 'žltá', 'ružová', 'sivá', 'oranžová', 'hnedá'] as $color)
                        <option value="{{ $color}}">{{ $color }}</option>
                    @endforeach
                </select>
                @error('color_id')
                    <p>Toto pole je povinné</p>
                @enderror
            </div>
            <label for="price" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Cena</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
              <input type="text" class="form-control p-sm-1" name="price" placeholder="Zadajte cenu">
              @error('price')
                <p>Toto pole je povinné / Cena môže mať maximlne  desatiiné miesta</p>
              @enderror
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="category_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Kategória</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
                <select class="form-control p-sm-1" name="category_id">
                    @foreach(['Rifle', 'Mikiny', 'Tričká', 'Šaty', 'Bundy', 'Svetre', 'Sukne', 'Košele', 'Nohavice'] as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p>Toto pole je povinné</p>
                @enderror
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="description" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Popis produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
              <textarea class="form-control" name="description" rows="5"></textarea>
              @error('description')
                <p>Toto pole je povinné</p>
              @enderror
            </div>
          </div>
      </div>
      <div class="container py-3">
        <div class="row py-2">
          <div class="col-12">
            <i class="zmdi zmdi-image-o fs-1"></i>
            <label for="images" class="fs-2 px-2">Obrázky:</label>
            <input type="file" class="form-control" name="images[]" multiple/>
            @error('images')
                <p>Toto pole je povinné</p>
            @enderror
        </div>
        <div id="image-preview"></div>
           <!-- @error('images')
                <span class="text-danger">{{$message}} </span>
            @enderror
-->
          </div>
        </div>

      <footer class="footer py-3">
        <div class="container">
          <div class="d-flex justify-content-between">
            <a href="/admin/products" class="btn btn-success">Späť</a>
            <button type="submit" class="btn btn-success">Uložiť zmeny</button>
          </div>
        </div>
      </footer>
      </form>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('input[type="file"]').on('change', function() {
            let files = $(this).get(0).files;

            let preview = $('#image-preview');
            console.log(preview);
            preview.empty();
            for (let i = 0; i < files.length; i++) {
                let file = files[i];

                let img = $('<img />', {
                    src: URL.createObjectURL(file),
                    width: 300,
                    height: 200,
                });

                preview.append(img);
            }
            });
        </script>
    </body>
</html>
