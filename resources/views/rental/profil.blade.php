<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
    <title>Profil</title>
</head>

<body style="background-color: #0F0F0F ;font-family: 'Montserrat', sans-serif;color: #ffffff">

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg" style="color: #092635">
        <div class="container">
            <a class="navbar-brand" style="color: snow; font-weight: bold;"
                href="{{ route('rental.index') }}">EZ-rent</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: snow; font-weight: bold;" href="{{ route('logout') }}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: snow; font-weight: bold;"
                        href="{{ route('profil.index') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: snow; font-weight: bold;"
                        href="{{ route('showpemesanan', ['id' => $user->id]) }}">Pemesanan</a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- akhir navbar  --}}

    {{-- body profil --}}
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="pimg">
                    <img src="/foto/a.jpg" alt="foto profil" style="width: 200px; border-radius:50%">
                </div>
            </div>
            <div class="row mt-5">
                <div class="headline col-12 justify-content-center">
                    <h1>My Profil</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="headline col-5 justify-content-center">
                    <h5>Nama Lengkap</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="headline col-5 justify-content-center">
                    <h5>Email</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->email }}</h5>
                </div>
            </div>
            <div class="row mt-1">
                <div class="headline col-5 justify-content-center">
                    <h5>Umur</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->umur }}</h5>
                </div>
            </div>
            <div class="row mt-1">
                <div class="headline col-5 justify-content-center">
                    <h5>No HP</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->nohp }}</h5>
                </div>
            </div>
            <div class="row mt-1">
                <div class="headline col-5 justify-content-center">
                    <h5>Alamat</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->alamat }}</h5>
                </div>
            </div>
            {{--  <div class="row mt-1">
                    <div class="headline col-5 justify-content-center">
                        <h5>KTP</h5>
                    </div>
                    <div class="headline col-1 justify-content-center">
                        <h5>:</h5>
                    </div>
                    <div class="headline col-6 justify-content-center">
                        <h5>KTP di database</h5>
                    </div>
                </div> --}}
            <div class="row mt-1">
                <div class="headline col-5 justify-content-center">
                    <h5>Jenis Kelamin</h5>
                </div>
                <div class="headline col-1 justify-content-center">
                    <h5>:</h5>
                </div>
                <div class="headline col-6 justify-content-center">
                    <h5>{{ Auth::user()->jk }}</h5>
                </div>
            </div>
        </div>
        <br><br>
        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
            <a href="#" class="btn btn-sm btn-primary">EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
        </form>
        <br><br><br>
    </div>
    </div>


    <br><br><br>
    <br><br><br>

    <footer class="p-2" style="background-color: #71717181; color: #ffffff">
        <div class="bio">
            <div class="container mt-4 mb-4">
                <h6>About Us :</h6>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <h6>Owner</h6>
                            <div class="text" style="font-size: 14px">
                                <p>Jasa Ar Mansyah <br>
                                    Muhammad Zikri H.M <br>
                                    Asmani <br>
                                    Hendra Natanael Sihombing </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <h6>Alamat</h6>
                        <div class="text" style="font-size: 14px">
                            <p>Jl Pramuka, Air Putih <br>
                                RT/RW : 02/02 <br>
                                Kabupaten Bengkalis <br>
                                Kode Post : 28711
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="row">
                            <p style="font-size: 30px">EZ-Rent</p>
                            <h6>Social Media :</h6>
                            <p>Instagram : @ezrentbengkalis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="p-2 text-center" style="background-color: #232D3F; color: #ffffff">
        <div class="container">
            <p class="mb-0">&copy; 2024 EZ-Rent. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
    {{-- akhir --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>

</html>
