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
    <title>Profil</title>
</head>

<body style="font-family: 'Montserrat', sans-serif;">

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('rental.index') }}">EZ-rent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>x
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rental.index') }}">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- body profil --}}


    <div class="row mt-5 mb-5">
        <div class="col-2" style="margin-right: 100px"> <a class="btn btn-success " href="{{ route('profil.create') }}"
                style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
        </div>
    </div>


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
        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
            <a href="#" class="btn btn-sm btn-primary">EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
        </form>
        <br><br><br>
    </div>
    </div>

    {{-- akhir --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>

</html>
