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
    <title>tambah mobil</title>
</head>


<body style="background-color: #0F0F0F ;font-family: 'Montserrat', sans-serif;color: #ffffff">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-md btn-success mb-3" href="javascript:void(0);" onclick="history.back()">Kembali</a>
                <div class="card border-0 shadow-sm rounded" style="background-color: #2c2c2c; color: #ffffff;">
                    <div class="card-body">
                        <form action="{{ route('mobil.update', ['mobil' => $mobil->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="rental_id" value="{{ $user->id }}">
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar">

                                <!-- error message untuk gambar -->
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Plat Mobil</label>
                                <input type="text" class="form-control @error('plat_mobil') is-invalid @enderror"
                                    name="plat_mobil" value="{{ old('plat_mobil') ?: $mobil->plat_mobil }}"
                                    placeholder="Masukkan Judul Post">

                                <!-- error message untuk nama plat mobil -->
                                @error('plat_mobil')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Merk Mobil</label>
                                <input type="text" class="form-control @error('merk_mobil') is-invalid @enderror"
                                    name="merk_mobil" value="{{ old('merk_mobil') ?: $mobil->merk_mobil }}"
                                    placeholder="Masukkan Judul Post">

                                <!-- error message untuk merk_mobil-->
                                @error('merk_mobil')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Bahan Bakar</label>
                                <input type="text" class="form-control @error('bahan_bakar') is-invalid @enderror"
                                    name="bahan_bakar" value="{{ old('bahan_bakar') ?: $mobil->bahan_bakar }}"
                                    placeholder="Masukkan Judul Post">

                                <!-- error message untuk bahan_bakar -->
                                @error('bahan_bakar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Muatan</label>
                                <input type="number" class="form-control @error('muatan') is-invalid @enderror"
                                    name="muatan" value="{{ old('muatan') ?: $mobil->muatan }}"
                                    placeholder="Masukkan Judul Post">

                                <!-- error message untuk muatan -->
                                @error('muatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Harga Per Hari</label>
                                <input type="number" class="form-control @error('harga_per_hari') is-invalid @enderror"
                                    name="harga_per_hari" value="{{ old('harga_per_hari') ?: $mobil->harga_per_hari }}"
                                    placeholder="Masukkan Judul Post">

                                <!-- error message untuk harga/hari -->
                                @error('harga_per_hari')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-select mt-4">
                                <label for="status" class="text-secondary">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option disabled @if (old('status') === null && !isset($car)) selected @endif>Status Mobil
                                    </option>
                                    <option value="tersedia" @if (old('status') === 'tersedia' || (isset($car) && $car->status === 'tersedia')) selected @endif>Tersedia
                                    </option>
                                    <option value="terpakai" @if (old('status') === 'terpakai' || (isset($car) && $car->status === 'terpakai')) selected @endif>Terpakai
                                    </option>
                                </select>

                                <!-- Pesan kesalahan untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div><br>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        function goBack() {
            window.history.back('rental.show');
        }
    </script>
</body>

</html>
