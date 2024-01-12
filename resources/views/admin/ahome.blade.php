<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap"
        rel="stylesheet">
    <title>home admin</title>
</head>

<body style="background-color: #fffffff6 ;font-family: 'Montserrat', sans-serif;">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: snow; font-weight: bold;" href="{{ route('hadmin') }}">EZ-rent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>x
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="color: snow; font-weight: bold;"
                            href="{{ route('logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: snow; font-weight: bold;"
                            href="{{ route('profil.index') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: snow; font-weight: bold;" href="{{ route('regisa') }}">Tambah
                            admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- akhir navbar  --}}

    {{-- header --}}
    <div class="container">
        <header>
            <div class="col-12 logo text-center">
                <img src="foto/Group 127.png" alt="logo" class="fs-1 text" style="height: 50%" />
            </div>
        </header>
    </div>
    {{-- akhir header --}}

    {{-- nama user --}}
    <div class="container">
        <div class="col-12 ms-4">
            <p>selamat datang {{ Auth::user()->name }} di daftar rental</p>
        </div>
    </div>

    {{-- daftar user --}}
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-center align-items-center">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->level !!}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('hapususer', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- akhir daftar user --}}

    {{-- card rental --}}
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col-2" style="margin-right: 100px"> <a class="btn btn-success" href="{{ route('rental.create') }}"
                style="text-decoration: none; margin-left: 30px">Tambah Data +</a> </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @forelse ($rental as $rental)
                <div class="col-md-3 mb-4">
                    <div class="card text-center" style="background-color: #70cf35a5; height:100%">
                        <div class="d-flex align-items-center justify-content-center mt-2" style="height: 150px;">
                            <img src="{{ asset('/storage/fpto/' . $rental->gambar) }}" alt="gambar rental"
                                class="rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $rental->namarental }}</h5>
                            <p class="card-title">{{ $rental->alamat }}</p>
                            <p class="card-text">{{ $rental->nohp }}</p>
                            <div class="card-footer">
                                <a class="btn btn-primary mb-1" href="{{ route('rental.show', $rental->id) }}">Lihat
                                    Profil</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('rental.destroy', $rental->id) }}" method="POST">
                                    <a href="{{ route('rental.edit', $rental->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    {{-- akhir card rental --}}




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
