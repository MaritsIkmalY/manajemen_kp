{{-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
</head>

<body>
    <h1>Login bro</h1>
    <form action="{{ route('loginUser.auth') }}" method='post'>
        @csrf
        <div>
            <label for="email">Username</label>
            <input type="email" name='email' id='email'>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name='password' id='password'>
        </div>
        <button name='submit'>submit</button>
    </form>
</body>

</html> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <!-- Font Poppins Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Condensed:wght@300&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Manajemen KP</h1>
                        <p>Help you</p>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('loginUser.auth') }}" method="post">
                            @csrf
                            <!-- Email Input -->
                            <label for="email" class="form-label">Username</label>
                            <input name='email' type="email" class="form-control" id="email"
                                placeholder="Enter your email" required>

                            <!-- Password Input -->
                            <label for="password" class="form-label">Password</label>
                            <input name='password'type="password" class="form-control" id="password"
                                placeholder="Enter your password" required>

                            <!-- Forgot Password-->
                            <a href="#">Forgot Password?</a><br>
                            <button class="log-in" name='submit'>Login</button>
                        </form>
                        {{-- <button class="sign-up">Sign Up</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active data-bs-interval="10000"">
                        <img src="{{ url('img/image 3.png') }}" class="d-block w-100" alt="image 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <img src="{{ url('img/image 4.png') }}" class="d-block w-100" alt="image 4">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item"data-bs-interval="10000">
                        <img src="{{ url('img/image 5.png') }}" class="d-block w-100" alt="image 5">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
