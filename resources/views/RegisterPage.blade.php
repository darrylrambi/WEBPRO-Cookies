<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>

  <!-- Conect CSS bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <!-- Connect CSS -->
  <link rel="stylesheet" href="css/darryl.css">
</head>

<body>

  <!-- Wrapper untuk form masuk -->
  <div class="container content1">
    <div class="container" id="form_box">
      <!-- Insert bacotan formalitas -->
      <div class="fs-2 fw-bold text-center">Register</div>

      <form method = "POST" action = "RegisterPage">
        @csrf

        <!-- Isi Email -->
        <div class="mb-2">
          <label for="RegisterEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="RegisterEmail" name="RegisterEmail">
        </div>

        <!-- Isi kata sandi -->
        <div class="mb-4">
          <label for="RegisterPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="RegisterPassword" name="RegisterPassword">
        </div>

        <!-- Button masuk -->
        <div class="d-flex flex-column justify-content-center btn btn-primary">
          <button type="button" class="btn">Register</button>
        </div>

        <!-- Lempar ke daftar -->
        <div class="d-flex justify-content-center mt-2">
          <div class="fs-6">Sudah punya akun?</div>
          <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover ms-1"
            href="{{ route('LoginPage') }}">
            Masuk
          </a>
        </div>
      </form>
    </div>
  </div>

  <!-- Connect Bootsrap bundle-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>