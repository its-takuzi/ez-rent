<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <link style="size: 200px" rel="icon" href="{{ asset('/storage/images/bgg.png') }}" type="image/png">
    <title>detail rental</title>
</head>

<body style="background-color: #0F0F0F ;font-family: 'Montserrat', sans-serif;color: #ffffff">

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg" style="color: #092635">
        <div class="container">
            <a class="navbar-brand" style="color: snow; font-weight: bold;" href="{{ route('rhome') }}">EZ-rent</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: snow; font-weight: bold;" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>


    {{-- body --}}
    <div class="container">
        <div class="card" style="background-color: #2c2c2c81 ;color:#ffffff">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="imgrental">
                        <img src="{{ asset('/storage/fpto/' . $rental->gambar) }}" alt="gambar"
                            style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-8 text-right">
                    <div class="card-body">
                        <div class="namarental">
                            <h4>{{ $rental->namarental }}</h4>
                            <p class="tmt-3">{!! $rental->alamat !!}</p>
                            <p class="tmt-3">{!! $rental->nohp !!}</p>
                            <p class="tmt-3">{!! $rental->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="opsi text-center ">
                <a href="{{ route('mobil.create', ['rental_id' => $rental->id]) }}"
                    class="btn btn-md btn-info mb-3">Create Mobil</a>
                <a href="{{ route('pesanan', ['id' => $rental->id]) }}" class="btn btn-md btn-info mb-3">Daftar
                    Pesanan</a>
            </div>
            <div class="row">
                <div class="tittle text-center">
                    <h3>Daftar Mobil Yang Tersedia</h3>
                    <hr>
                </div>

                @forelse ($mobil as $mobilItem)
                    <div class="col-md-4 mb-4">
                        <div class="container mt-5">
                            <div class="card w-100 mx-auto ms-1 me-1"
                                style="width: 18rem; background-color: #2c2c2c81 ;color:#ffffff">
                                <img src="{{ asset('/storage/fpto/' . $mobilItem->gambar) }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;" alt="Car Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $mobilItem->merk_mobil }}</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="background-color: #2c2c2c81 ;color:#ffffff">
                                            Plat Mobil :{!! $mobilItem->plat_mobil !!}</li>
                                        <li class="list-group-item" style="background-color: #2c2c2c81 ;color:#ffffff">
                                            Bahan Bakar : {!! $mobilItem->bahan_bakar !!}</li>
                                        <li class="list-group-item" style="background-color: #2c2c2c81 ;color:#ffffff">
                                            Muatan : {!! $mobilItem->muatan !!}</li>
                                        <li class="list-group-item" style="background-color: #2c2c2c81 ;color:#ffffff">
                                            Status : {!! $mobilItem->status !!}</li>
                                        <li class="list-group-item" style="background-color: #2c2c2c81 ;color:#ffffff">
                                            Harga : {!! $mobilItem->harga_per_hari !!}</li>
                                    </ul>
                                    <div class="pesan text-end">
                                        <br>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('mobil.destroy', $mobilItem->id) }}" method="POST">
                                                <a href="{{ route('mobil.edit', $mobilItem->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="alert alert-danger">
                            Data Mobil belum Tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

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

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
