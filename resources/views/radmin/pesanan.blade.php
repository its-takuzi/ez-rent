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
    <link style="size: 200px" rel="icon" href="{{ asset('/storage/images/bgg.png') }}" type="image/png">
    <title>home admin</title>
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


    {{-- header --}}
    <header>
        <div class="container">
            <div class="tagline mt-4">
                <h4>Selamat datang di halaman daftar pesanan</h4>
                <hr>
            </div>
        </div>
    </header>
    {{-- akhir header --}}

    {{-- card pemesanan --}}
    @foreach ($pemesanan as $pemesanan)
        <div class="container">
            <div class="card mb-3" style="background-color: #2c2c2c81; max-height:100%; color: #ffffff">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/storage/fpto/' . $pemesanan->mobil->gambar) }}"
                            class="img-fluid rounded-start" style="width: 100%; height: 300px;" alt="gambar mobil">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pemesanan->mobil->merk_mobil }}</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text">Nama pemesan :{{ $pemesanan->user->name }}</p>
                                    <p class="card-text">Plat Mobil : {{ $pemesanan->mobil->plat_mobil }}</p>
                                    <p class="card-text">Tanggal Pemesanan Mobil : {{ $pemesanan->tgl_pemesanan }}</p>
                                    <p class="card-text">Tanggal Pengambilan Mobil : {{ $pemesanan->tgl_pengembalian }}
                                    </p>
                                    <p class="card-text">Tanggal Pengambilan Mobil : {{ $pemesanan->tgl_pengembalian }}
                                    </p>
                                    <p class="card-text">Status Peminjaman : {{ $pemesanan->status }}</p>
                                </div>
                                <div class="col-6">
                                    {{-- Cek nilai sebelum perkalian --}}
                                    <p class="card-text">Hari: {{ $pemesanan->hari }}</p>
                                    <p class="card-text">Harga: {{ $pemesanan->mobil->harga_per_hari }}</p>

                                    {{-- Cek hasil perkalian --}}
                                    <p class="card-text">Total Harga : {{ $pemesanan->total_harga }}</p>
                                    <p class="card-text">Tipe Pembayaran : {{ $pemesanan->pembayaran }}</p>
                                </div>
                            </div>
                            <hr>


                            <div class="batal d-flex justify-content-end">
                                <form action="{{ route('transfer', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary me-1">Transfer</button>
                                </form>
                                <form action="{{ route('cod', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning me-1">COD</button>
                                </form>
                                <form action="{{ route('terima', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success me-1">Accept</button>
                                </form>
                                <form action="{{ route('tolak', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger  me-1">Decline</button>
                                </form>
                                <form action="{{ route('hapus', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger  me-1">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- footer --}}

    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
