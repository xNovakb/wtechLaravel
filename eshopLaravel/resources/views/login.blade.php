<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eshop</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
              <div class="card border-dark text-white my-5">
                <div class="card-body text-dark">
                  <h5 class="card-title text-center">Prihlásenie</h5>
                  <form>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" placeholder="Zadajte email">
                    </div>
                    <div class="form-group ">
                      <label for="password">Heslo</label>
                      <input type="password" class="form-control" id="password" placeholder="Zadajte heslo">
                    </div>
                    <div class="form-group">
                      <div class="form-group text-center my-3">
                        <button type="submit" class="btn btn-success btn-block">Prihlásiť sa</button>
                      </div>
                      <div class="text-center bg-dark">
                        <hr class="my-3 ">
                      </div>
                      <h6 class="card-title text-center my-3">Ešte nemate účet?</h6>
                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-block">Zaregistrujte sa</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>
</html>
