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
    <title>detail rental</title>
</head>

<body>

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
                </ul>
            </div>
        </div>
    </nav>
    {{-- akhir navbar --}}

    {{-- body --}}
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <hr>
                        <h4>{{ $rental->namarental }}</h4>
                        <p class="tmt-3">
                            {!! $rental->alamat !!}
                        </p>
                        <p class="tmt-3">
                            {!! $rental->nohp !!}
                        </p>
                        <p class="tmt-3">
                            {!! $rental->deskripsi !!}
                        </p>
                    </div>
                </div>



                {{-- mobil  --}}
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mobil.create') }}" class="btn btn-md btn-success mb-3">TAMBAH MOBIL</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Plat Mobil</th>
                                    <th scope="col">Merk Mobil</th>
                                    <th scope="col">Bahan Bakar</th>
                                    <th scope="col">Muatan</th>
                                    <th scope="col">Harga Per Hari</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mobil as $mobil)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/fpto/' . $mobil->gambar) }}" class="rounded"
                                                style="width: 50px">
                                        </td>
                                        <td>{{ $mobil->plat_mobil }}</td>
                                        <td>{!! $mobil->merk_mobil !!}</td>
                                        <td>{!! $mobil->bahan_bakar !!}</td>
                                        <td>{!! $mobil->muatan !!}</td>
                                        <td>{!! $mobil->harga_per_hari !!}</td>
                                        <td>{!! $mobil->status !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('mobil.destroy', $mobil->id) }}" method="POST">
                                                {{-- <a href="{{ route('mobil.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a> --}}
                                                <a href="{{ route('mobil.edit', $mobil->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Mobil belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
