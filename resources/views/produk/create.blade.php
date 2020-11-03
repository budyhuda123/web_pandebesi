<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Blog - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('gambar_pdk') is-invalid @enderror" name="gambar_pdk">

                                <!-- error message untuk title -->
                                @error('gambar_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama_pdk') is-invalid @enderror" name="nama_pdk" value="{{ old('nama_pdk') }}" placeholder="Masukkan Nama Produk">

                                <!-- error message untuk nama -->
                                @error('nama_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TYPE</label>
                                <input type="text" class="form-control @error('type_pdk') is-invalid @enderror" name="type_pdk" value="{{ old('type_pdk') }}" placeholder="Masukkan Type Produk">

                                <!-- error message untuk type -->
                                @error('type_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <textarea class="form-control @error('deskripsi_pdk') is-invalid @enderror" name="deskripsi_pdk" rows="5" placeholder="Masukkan Deskripsi Produk">{{ old('deskripsi_pdk') }}</textarea>

                                <!-- error message untuk deskripsi -->
                                @error('deskripsi_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">HARGA</label>
                                <input type="text" class="form-control @error('harga_pdk') is-invalid @enderror" name="harga_pdk" value="{{ old('harga_pdk') }}" placeholder="Masukkan Harga Produk">

                                <!-- error message untuk harga -->
                                @error('harga_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH</label>
                                <input type="text" class="form-control @error('jumlah_pdk') is-invalid @enderror" name="jumlah_pdk" value="{{ old('jumlah_pdk') }}" placeholder="Masukkan Jumlah Produk">

                                <!-- error message untuk jumlah -->
                                @error('jumlah_pdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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
    CKEDITOR.replace( 'deskripsi_pdk' );
</script>
</body>
</html>
