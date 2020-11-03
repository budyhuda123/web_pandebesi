<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Blogs - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('produk.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PRODUK</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">JUMLAH</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($produks as $produk)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/produks/').$produk->gambar_pdk }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $produk->nama_pdk }}</td>
                                    <td>{{ $produk->type_pdk }}</td>
                                    <td>{!! $produk->deskripsi_pdk !!}</td>
                                    <td>{{ $produk->harga_pdk }}</td>
                                    <td>{{ $produk->jumlah_pdk }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Produk belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()-> has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

</body>
</html>
