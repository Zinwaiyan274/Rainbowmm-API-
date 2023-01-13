<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ 'assets/album/Logo.svg' }}">
    <title>Rainbow mm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
</head>
<body>
  <!-- logo -->
  <div class="text-center logo">
      <img src="{{ 'assets/album/Logo.svg' }}" alt="logo" width="250">
  </div>
  <!-- logo -->

  <!-- Login Form Card -->
  <div class="head">
      <h1>Sign in to your account</h1>
  </div>

  <section class="">
    <div class="container">
      <div class="row">
        <div class="d-flex justify-content-center align-items-center">
          <div class="card shadow-lg" style="height: 100%">
            <div class="card-body px-5" >
             <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-md-5 mt-md-4">
                    <!-- Username Input -->
                    <div class="form-outline form-white mb-4 ">
                      <label class="form-label">Username</label>
                      <input type="text" name="userName" class="col-12" placeholder="Enter Name"/>
                        @error('userName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Username Input -->

                    <!-- Password Input -->
                    <div class="form-outline form-white mb-4">
                      <label class="form-label">Password</label>
                      <div class="d-flex align-items-center">
                        <input type="password" name="password" class="col-12" placeholder="******" id="pass">
                        <i class="fa-solid fa-eye" id="togglePassword"></i>
                      </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        @if (Session::has('error'))
                            <span>{{ Session::get('error') }}</span>
                        @endif
                    </div>
                    <!-- Password Input -->

                    <button class="btn px-5 mt-4 text-center col-12" type="submit">Sign in</button>
                </div>
             </form>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Login Form Card -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pass');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</html>
