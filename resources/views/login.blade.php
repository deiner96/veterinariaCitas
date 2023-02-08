<! DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>VETERINARIA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
.bg-image-vertical {
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}
</style>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="px-5 ms-xl-4 p-3">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0 p-3">CITAS VETERINARIA</span>
        </div>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-0 pt-3 pt-xl-0 mt-xl-n5 col-md-12 col-12">
          <form class="px-2" style="width: 23rem;" method="POST" action="{{route('inicia-sesion')}}">
              @csrf

            <h3 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Login</h3>

            <div class="form-outline mb-3">
              <input type="email" id="emailInput" class="form-control form-control-lg" name="email" required autocomplete="disable" />
              <label class="form-label mt-1" for="email">Email address</label>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="inputPassword" class="form-control form-control-lg" name="password" required />
              <label class="form-label" for="inputPassword">Password</label>
            </div>

            <div class="pt-1 mb-3">
              <button type="submit" class="btn btn-info btn-lg btn-block" type="button">Login</button>
            </div>

            <p class="small mb-2 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>No tienes aún cuenta? <a href="{{route('registro')}}" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
      <div style="height: 97%;" class="col-sm-6 py-5 px-0 d-none d-sm-block mt-2 p-2">
        <img src="https://i.postimg.cc/L5B9LRJ6/vte.jpg"
          alt="Login image" class="w-100" style="object-fit: cover; object-position: center; height: 100%">
      </div>
    </div>
  </div>
</section>
