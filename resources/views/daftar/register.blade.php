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
    <title>Register</title>
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
    <div class="container
    mt-3">
        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Registrasi
                    Gagal!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container d-flex justify-content-center align-items-center hv-100">
        <div class="card w-100 mx-auto mt-5 mb-5" style="width: 40%; background-color: rgba(255, 255, 255, 0.8);">
            <div class="card-body p-4">
                <h3 class="card-title text-center">Register</h3>
                <form action="{{ route('postr') }}" method="POST"> @csrf <div class="form-group mt-4"> <label
                            class="text-secondary">Nama Anda</label> <input type="text"
                            class="form-control border border-secondary form-control-lg" name="name" required
                            value="{{ old('name') }}"> <span class="text-danger"> @error('name')
                                {{ $message }}
                            @enderror </span> </div><br>
                    <div class="form-group mt-1"> <label class="text-secondary">Email Anda</label> <input type="email"
                            class="form-control border border-secondary form-control-lg" name="email" required
                            value="{{ old('email') }}"> <span class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror </span> </div><br>
                    <div class="form-group mt-1"> <label class="text-secondary">Password Anda</label> <input
                            type="password" class="form-control border border-secondary form-control-lg"
                            name="password"> <span class="text-danger"> @error('password')
                                {{ $message }}
                            @enderror </span> </div><br>
                    <div class="form-group mt-1"> <label class="text-secondary">Konfirmasi Password Anda</label> <input
                            type="password" class="form-control border border-secondary form-control-lg"
                            name="password_confirmation" required> <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror </span>
                    </div>

                    {{--    <div class="form-group mt-3">
                        <label class="font-weight-bold">KTP</label>
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp">

                        <!-- error message untuk gambar -->
                        @error('ktp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}

                    {{--   <div class="form-group mt-3">
                        <label class="font-weight-bold">Photo Profil</label>
                        <input type="file" class="form-control @error('pp') is-invalid @enderror" name="pp">

                        <!-- error message untuk gambar -->
                        @error('pp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}

                    <div class="form-group mt-3">
                        <label class="font-weight-bold">Umur</label>
                        <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur"
                            value="{{ old('umur') }}" placeholder="Masukkan umur">

                        <!-- error message untuk alamat-->
                        @error('umur')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label class="font-weight-bold">no hp</label>
                        <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                            value="{{ old('nohp') }}" placeholder="Masukkan nohp">

                        <!-- error message untuk nohp -->
                        @error('nohp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-5">
                        <label class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                            value="{{ old('alamat') }}" placeholder="Masukkan alamat">

                        <!-- error message untuk deskripsi -->
                        @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-select mt-1">
                        <label for="jk" class="text-secondary">Jenis Kelamin</label>
                        <select id="jk" name="jk" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <span class="text-danger">
                            @error('user_level')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class=" form-control btn btn-primary mt-5">Register</button>
                </form>
                <p class="mt-2 text-center">Sudah punya akun? <a href="{{ route('login') }}"
                        style="text-decoration: none">Ayo masuk!</a></p>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
