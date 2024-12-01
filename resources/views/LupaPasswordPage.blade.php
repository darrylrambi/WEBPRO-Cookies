<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lupa Password</title>

  <!-- Conect CSS bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>

  <!-- Wrapper untuk form masuk -->
  <div class="container content1">
    <div class="container" id="form_box">
      <!-- Insert bacotan formalitas -->
      <div class="fs-2 fw-bold text-center">Lupa Password</div>

      <form method = "POST" action = "LupaPasswordPage">
        @if($errors->has('GantiPasswordError'))
            <div class="alert alert-danger">
                {{ $errors->first('GantiPasswordError') }}
            </div>
        @endif

        @csrf

        <!-- Isi Email -->
        <div class="mb-2">
          <label for="LupaPasswordEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="LupaPasswordEmail" name="LupaPasswordEmail">
        </div>

        <!-- Isi kata sandi -->
        <div class="mb-4">
          <label for="PasswordBaru" class="form-label">Password Baru</label>
          <input type="password" class="form-control" id="PasswordBaru" name="PasswordBaru">
        </div>

        <!-- Button masuk -->
        <div class="d-flex flex-column justify-content-center btn btn-primary">
          <button class="btn">Reset</button>
        </div>

        <!-- Lempar ke Lupa password -->
        <div class="d-flex justify-content-center mt-2">
          <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover ms-1"
            href="{{ route('LoginPage') }}">
            Kembali
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