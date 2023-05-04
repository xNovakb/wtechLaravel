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
        <form method="POST" action="/edit/product/{{$product->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="form-group row py-1">
            <label for="name" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Názov produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
              <input type="text" class="form-control p-sm-1" name="name" placeholder="Zadajte názov produktu" value="{{$product->name}}">
            </div>
            <label for="size_id" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Veľkosť</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <select class="form-control p-sm-1" name="size_id" value="{{$product->name}}">
                    @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                        <option value="{{ $size }}" @if($size == $product->size_id) selected @endif>{{ $size }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="brand_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Značka</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
                <select name="brand_id" class="form-select p-sm-1" value="{{$product->brand_id}}">
                    @foreach(['Adidas', 'Nike', 'Puma', 'Tommy Hilfiger', 'Lacoste', 'GAP', 'Guess', 'Gucci', 'Mango', "Bershka"] as $brand)
                        <option value="{{ $brand }}" @if($brand == $product->brand_id) selected @endif>{{ $brand }}</option>
                    @endforeach
                </select>
            </div>
            <label for="sex_id" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Pohlavie</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <select class="form-control p-sm-1" name="sex_id" value="{{$product->sex_id}}">
                    @foreach(['muž', 'žena'] as $sex)
                        <option value="{{ $sex }}" @if($sex == $product->sex_id) selected @endif>{{ $sex }}</option>
                    @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="color_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Farba</label>
            <div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
                <select class="form-control p-sm-1" name="color_id" value="{{$product->color_id}}">
                    @foreach(['červená', 'modrá', 'zelená', 'biela', 'čierna', 'žltá', 'ružová', 'sivá', 'oranžová', 'hnedá'] as $color)
                        <option value="{{ $color }}" @if($color == $product->color_id) selected @endif>{{ $color }}</option>
                    @endforeach
                </select>
            </div>
            <label for="price" class="col-xs-4 col-sm-4 col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-form-label">Cena</label>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
              <input type="text" class="form-control p-sm-1" name="price" placeholder="Zadajte cenu" value="{{$product->price}}">
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="category_id" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Kategória</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
                <select class="form-control p-sm-1" name="category_id" value="{{$product->category_id}}">
                    @foreach(['Rifle', 'Mikiny', 'Tričká', 'Šaty', 'Bundy', 'Svetre', 'Sukne', 'Košele', 'Nohavice'] as $category)
                        <option value="{{ $category }}" @if($category == $product->category_id) selected @endif>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row py-1">
            <label for="description" class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Popis produktu</label>
            <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 col-xxl-10">
              <textarea class="form-control" name="description" rows="5">{{$product->description}}</textarea>
            </div>
          </div>
      </div>
 <!--     <div class="container py-3">
        <div class="row py-2">
          <div class="col-12">
            <i class="zmdi zmdi-image-o fs-1"></i>
            <label for="images" class="fs-2 px-2">Obrázky:</label>
            <input type="file" class="form-control" name="images[]" multiple />
            </div>
                        <div class="container py-3">
            <div class="row">
                @foreach($product->images as $image)
                <div class="col-md-3">
                    <img src="{{asset('storage/'.$image->image)}}" class="img-fluid" alt="{{$product->name}} image">
                </div>
                @endforeach
            </div>
            </div>
        </div>
      </div>
-->
      <footer class="footer py-3">
        <div class="container">
          <div class="d-flex justify-content-between">
            <a href="/admin/products" class="btn btn-success">Späť</a>
            <button type="submit" class="btn btn-success">Uložiť zmeny</button>
          </div>
        </div>
      </footer>
      </form>
    </body>
</html>
