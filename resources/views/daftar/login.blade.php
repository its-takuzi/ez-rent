<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap"
        rel="stylesheet">
    <link style="size: 200px" rel="icon" href="{{ asset('/storage/images/bgg.png') }}" type="image/png">
    <title>Login</title>
</head>

<body
    style="
    background-image: url(foto/bgg.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    background-color: rgba(193, 193, 193, 0.626) ; 
    font-family: 'Montserrat', sans-serif;">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card mx-auto" style="width: 40%; background-color: rgba(255, 255, 255, 0.8);">
            <div class="card-body p-4">
                <h3 class="card-title text-center">Login</h3>
                <form action="{{ route('postlogin') }}" method="POST"> @csrf <div class="form-group mt-4">
                        <label class="text-secondary">Email Anda</label> <input type="email"
                            class="form-control border border-secondary form-control-lg" name="email" required
                            value="{{ old('email') }}"> <span class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror </span>
                    </div><br>
                    <div class="form-group mt-1"> <label class="text-secondary">Password Anda</label> <input
                            type="password" class="form-control border border-secondary form-control-lg"
                            name="password"> <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror </span>
                    </div> <button type="submit" class=" form-control btn btn-primary mt-5">Login</button>
                </form>
                <p class="mt-2 text-center">Belum punya akun? <a href="{{ route('register') }}"
                        style="text-decoration: none">Ayo buat akun!</a></p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
