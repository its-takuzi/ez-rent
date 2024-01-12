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


    {{-- midtrans --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
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

    {{-- header --}}
    <header>
        <div class="container">
            <div class="tagline mt-4">
                <h4>Daftar Pemesanan {{ $user->name }}</h4>
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
                                    <p class="card-text">Nama Rental : {{ $pemesanan->rental->namarental }}</p>
                                    <p class="card-text">Plat Mobil : {{ $pemesanan->mobil->plat_mobil }}</p>
                                    <p class="card-text">Tanggal Pemesanan Mobil : {{ $pemesanan->tgl_pemesanan }}</p>
                                    <p class="card-text">Tanggal Pengambilan Mobil : {{ $pemesanan->tgl_pengembalian }}
                                    </p>
                                    <p class="card-text">Status Mobil : {{ $pemesanan->status }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text">Hari: {{ $pemesanan->hari }}</p>
                                    <p class="card-text">Harga: {{ $pemesanan->mobil->harga_per_hari }}</p>

                                    {{-- Cek hasil perkalian --}}
                                    <p class="card-text">Total Harga: {{ $pemesanan->total_harga }}</p>
                                    <p class="card-text">Tipe Pembayaran : {{ $pemesanan->pembayaran }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="batal d-flex justify-content-end">
                                <button class="btn btn-success me-1" id="pay-button">Bayar
                                    Pesanan</button>
                                <form action="{{ route('deletep', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger me-1">Batal Pesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <br><br><br><br>



    {{-- akhir card pemesanan --}}



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- midtrans --}}
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            console.log('Snap Token:', '{{ $snapToken }}');

            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>

</html>
