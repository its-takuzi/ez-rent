<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Pemesanan</title>
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
    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif

    {{-- header --}}
    <div class="header">
        <div class="container">
            <div class="tagline mt-4">
                <h4>Selamat Memesan {{ $user->name }}</h4>
                <hr>
            </div>
        </div>

    </div>
    {{-- akhir header --}}

    {{-- pemesanan page --}}

    <div class="container">
        <div class="row">
            {{-- Bagian kiri --}}
            <div class="col-6 mt-3">
                <div class="img">
                    <img src="{{ asset('/storage/fpto/' . $mobil->gambar) }}" alt="gambar mobil"
                        class="d-flex p-2 w-100 h-100">
                </div>
                <div class="deskripsi">
                    <div class="col-12">
                        <h6> Merk Mobil :{{ $mobil->merk_mobil }}</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p> ID Mobil : {{ $mobil->id }}</p>
                        </div>
                        <div class="col-6">
                            <p>Plat Mobil : {{ $mobil->plat_mobil }}</p>
                        </div>
                        <div class="col-6">
                            <p>Bahan Bakar : {{ $mobil->bahan_bakar }}</p>
                        </div>
                        <div class="col-6">
                            <p>Muatan Mobil : {{ $mobil->muatan }}</p>
                        </div>
                        <div class="col-6">
                            <p>Harga Rental : {{ $mobil->harga_per_hari }}</p>
                        </div>
                        <div class="col-6">
                            <p>Status: {{ $mobil->status ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- Bagian kanan (form) --}}

            <div class="col-6 mt-5">
                <form method="POST" action="{{ route('storep') }}">
                    @csrf
                    <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                    <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                    <div class="mb-3">
                        <label for="tgl_pemesanan" class="form-label">Tanggal Pengambilan</label>
                        <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-control"
                            onchange="hitungJumlahHari()">
                        @error('tgl_pemesanan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pengambilan" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control"
                            onchange="hitungJumlahHari()">
                        @error('tgl_pengembalian')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Jumlah Hari Peminjaman</label>
                        <input type="number" name="hari" id="hari" class="form-control" readonly>
                        @error('hari')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>

            </div>
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
    {{-- akhir pemesanan --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        function hitungJumlahHari() {
            var tglPemesanan = document.getElementById('tgl_pemesanan').value;
            var tglPengembalian = document.getElementById('tgl_pengembalian').value;

            $.ajax({
                type: 'POST',
                url: '{{ route('hitung.jumlah.hari') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tgl_pemesanan": tglPemesanan,
                    "tgl_pengembalian": tglPengembalian,
                },
                success: function(response) {
                    document.getElementById('hari').value = response.hari;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
</body>

</html>
